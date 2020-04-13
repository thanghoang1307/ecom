<?php
namespace App\Repositories\Prd;

use App\Repositories\EloquentRepository;
use App\Repositories\Prd\PrdInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use \DateTime;

class PrdRepository extends EloquentRepository implements PrdInterface
{
    public function getModel()
    {
        return \App\Models\Prd\Prd::class;
    }

    public function filter($request)
    {
        if ($request->price) {
            $prices = explode('_', $request->price);
        } else { $prices = null;}
        if ($request->orderby) {
            $orderby = explode('-', $request->orderby);
        } else { $orderby = null;}
        $search = $request->search;
        $prds = $this->_model->where(function ($q) use ($prices, $search) {
            if ($search) {
                $q->where('name', 'like', '%' . $search . '%');
                $q->orWhere('sku', 'like', '%' . $search . '%');
            }
            if ($prices) {
                $i = 0;
                foreach ($prices as $price) {
                    $price = explode('-', $price);
                    if ($i == 0) {
                        $q->where([
                            ['regular_price', '>=', $price[0]],
                            ['regular_price', '<=', $price[1]],
                        ]);
                        $i++;
                    } else {
                        $q->orWhere([
                            ['regular_price', '>=', $price[0]],
                            ['regular_price', '<=', $price[1]],
                        ]);
                    }
                }
            }
        });

        if (!$orderby) {
            return $prds->orderBy('created_at', 'desc');
        } else {
            return $prds->orderBy($orderby[0] == 'price' ? 'current_price' : $orderby[0], $orderby[1]);
        }

    }

    public function getNew($qty)
    {
        return $this->_model->orderBy('created_at', 'desc')->take($qty)->get();
    }

    public function createUniqueSlug($slug)
    {
        $unique_slug = $slug;
        $i = 1;
        while ($this->_model->where('slug', $unique_slug)->count()) {
            $unique_slug = $slug . '-' . $i;
            $i++;
        }
        return $unique_slug;
    }

    public function addAttr($prd_id, array $attrs_id_array = null)
    {
        if ($attrs_id_array) {
            foreach ($attrs_id_array as $attr_id) {
                DB::table('prd_attr_vals')->insert([
                    'prd_id' => $prd_id,
                    'attr_id' => $attr_id,
                ]);
            }
        }
    }

    public function getAttrsIn($id)
    {
        return $this->find($id)->attrs()->get();
    }

    public function getAttrsInIdArray($id)
    {
        return $this->find($id)->attrs()->pluck('attr_id')->toArray();
    }

    public function deleteAttrFromPrd($attr_id, $prd_id)
    {
        DB::table('prd_attr_vals')->where('attr_id', $attr_id)->where('prd_id', $prd_id)->delete();
    }

    public function addAttrValue($prd_id, $request)
    {$attr_default = ['name', 'sku', 'brand_id', 'regular_price', 'sale_price', 'short_desc', 'long_desc', 'thumb', 'slug', '_token', 'categories', 'images', 'is_show'];
        $attrs_in = array_diff_key($request, array_flip($attr_default));

        if ($attrs_in) {
            foreach ($attrs_in as $code => $value) {
                $attr = DB::table('attrs')->where('code', $code)->first();
                switch ($attr->type) {
                    case 'datetime':
                        $attrs_in[$attr->code] = [$attr->type . '_val' => $value ? DateTime::createFromFormat("d/m/Y H:i", $value) : null];
                        break;
                    case 'date':
                        $attrs_in[$attr->code] = [$attr->type . '_val' => $value ? DateTime::createFromFormat("d/m/Y", $value) : null];
                        break;
                    case 'boolean':
                        if (count($attrs_in[$attr->code]) == 2) {
                            $attrs_in[$attr->code] = [$attr->type . '_val' => true];
                        } else {
                            $attrs_in[$attr->code] = [$attr->type . '_val' => false];
                        }

                        break;
                    default:
                        $attrs_in[$attr->code] = [$attr->type . '_val' => $value];
                }

                $attrs_in[$attr->id] = $attrs_in[$attr->code];
                unset($attrs_in[$attr->code]);
            }
            // Sync chưa sync được những value không có trong database

            $this->_model->find($prd_id)->attrs()->sync($attrs_in);}
    }

    public function addCats($id, $request)
    {
        $this->_model->find($id)->cats()->sync($request);
    }

    public function sumPrice($items)
    {
        $total = 0;
        $ids = array_keys($items);
        $prds = $this->find($ids);
        foreach ($prds as $prd) {
            $total += $prd->current_price * $items[$prd->id];
        }
        return $total;
    }

    public function getRelatedPrd($prd)
    {
        return $this->_model->with('cats')->whereHas('cats', function ($q) use ($prd) {
            $q->where('cats.id', $prd->cats->pluck('id'));
        })->get();
    }

    public function getTopPrdsBy($range)
    {
        switch ($range) {
            case 'past-12-months':
                $start = Carbon::today()->sub(11, 'months');
                $end = Carbon::today();
                break;
            case 'past-28-days':
                $start = Carbon::today()->subDay(27);
                $end = Carbon::today();
                break;
            default:
                $start = Carbon::today()->sub(6, 'days');
                $end = Carbon::today();
        }
        return $this->_model
            ->leftJoin('order_prds', 'prds.id', 'order_prds.prd_id')
            ->whereBetween('order_prds.created_at', [$start, $end])
            ->selectRaw('prds.name, prds.thumb, prds.slug, prds.id, sum(order_prds.qty) total')
            ->groupBy('prds.name', 'prds.thumb', 'prds.slug', 'prds.id')
            ->orderBy('total', 'desc')
            ->take(3)
            ->get();
    }

}
