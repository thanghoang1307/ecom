<?php

namespace App\Repositories\Order;

use App\Repositories\EloquentRepository;
use App\Repositories\Order\OrderInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class OrderRepository extends EloquentRepository implements OrderInterface
{

    public function getModel()
    {
        return \App\Models\Order\Order::class;
    }

    public function uniqueOrderNumber()
    {   
        $currentYear = Carbon::today()->format('y');
        $currentWeek = Carbon::today()->format('W');
        $number = 0;
        do {$order_number = $currentYear.$currentWeek.sprintf("%03d",$number); $number++;} while ($this->_model->where('order_number', $order_number)->first());
        return $order_number;
    }

    public function getFromOrderNumber($order_number)
    {
        return $this->_model->where('order_number', $order_number)->first();
    }

    public function getAllOrder()
    {
        return $this->_model->where('status', '>=', -1)->paginate(12);
    }

    public function getTimeSale($time)
    {
        switch ($time) {
            case 'yesterday':
                $start = Carbon::yesterday();
                $end = Carbon::today();
                break;
            case 'week':
                $start = Carbon::today()->startOfWeek();
                $end = Carbon::today()->endOfWeek();
                break;
            case 'month':
                $start = Carbon::today()->startOfMonth();
                $end = Carbon::today()->endOfMonth();
                break;
            default:
                $start = Carbon::today();
                $end = Carbon::tomorrow();
        }

        return $this->_model->where('status', '>=', '0')->whereBetween('created_at', [$start, $end])->get('total');
    }

    public function getDateRangeSale()
    {
        $start = Carbon::today()->startOfMonth();
        $end = Carbon::today()->endOfMonth();
        return $this->_model
            ->where('status', '>=', '0')
            ->whereBetween('created_at', [$start, $end])
            ->selectRaw('sum(total) sale')
            ->groupBy('created_at')
            ->pluck('sale');
    }

    public function getValueRange($range)
    {
        switch ($range) {
            case 'past-28-days':
                $end = Carbon::today();
                $start = Carbon::today()->subDays(27);
                $day = $start;
                do {
                    $check_sale = $this->_model
                        ->where('status', '>=', '0')
                        ->whereDay('created_at', $day->day)->get();
                    if (count($check_sale)) {
                        $day_sale[] = $this->_model
                            ->where('status', '>=', '0')
                            ->whereDay('created_at', $day->day)
                            ->sum('total');
                    } else {
                        $day_sale[] = 0;
                    }
                    $day->add(1, 'day');
                } while (
                    $day <= $end
                );
                return $day_sale;
                break;
            case 'past-12-months':
                $end = Carbon::today();
                $start = Carbon::today()->sub(11, 'months');
                $month = $start;
                do {
                    $check_sale = $this->_model
                        ->where('status', '>=', '0')
                        ->whereMonth('created_at', $month->month)->get();
                    if (count($check_sale)) {
                        $month_sale[] = $this->_model
                            ->where('status', '>=', '0')
                            ->whereMonth('created_at', $month->month)
                            ->sum('total');
                    } else {
                        $month_sale[] = 0;
                    }
                    $month->add(1, 'month');
                } while (
                    $month <= $end
                );
                return $month_sale;
                break;
            case 'by-year':
                $start = Carbon::today()->sub(4, 'years');
                $end = Carbon::today();
                $year = $start;
                do {
                    $check_sale = $this->_model
                        ->where('status', '>=', '0')
                        ->whereYear('created_at', $year->year)->get();
                    if (count($check_sale)) {
                        $year_sale[] = $this->_model
                            ->where('status', '>=', '0')
                            ->whereYear('created_at', $year->year)
                            ->sum('total');
                    } else {
                        $year_sale[] = 0;
                    }
                    $year->add(1, 'year');
                } while (
                    $year <= $end
                );
                return $year_sale;
                break;
        }
    }

}
