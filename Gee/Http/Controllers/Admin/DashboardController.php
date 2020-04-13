<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Controller;
use App\Repositories\Order\OrderInterface;
use App\Repositories\Prd\PrdInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    protected $order;
    protected $prd;
    /**
     * Construct
     */
    public function __construct(OrderInterface $order, PrdInterface $prd)
    {
        $this->order = $order;
        $this->prd = $prd;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Sale Board
        $sale = new \stdClass();
        $sale->today = $this->order->getTimeSale('today');
        $sale->yesterday = $this->order->getTimeSale('yesterday');
        $sale->thisWeek = $this->order->getTimeSale('week');
        $sale->thisMonth = $this->order->getTimeSale('month');

        // Chart Board
        $chart = new \stdClass();
        $chart->label = $this->createRange('past-28-days');
        $chart->value = $this->order->getValueRange('past-28-days');

        // Top Prd Board
        $topPrds = new \stdClass();
        $topPrds->byWeek = $this->prd->getTopPrdsBy('past-7-days');
        return view('admin.dashboard.index', compact('sale', 'topPrds', 'chart'));
    }

    public function getChartData(Request $request)
    {
        $chart = new \stdClass();
        $chart->label = $this->createRange($request->range);
        $chart->value = $this->order->getValueRange($request->range);
        return response()->json(['chart' => $chart]);
    }

    public function getTopPrds(Request $request)
    {
        $topPrds = new \stdClass();
        $topPrds = $this->prd->getTopPrdsBy($request->range);
        return response()->json(['html' => view('admin.dashboard.top_prds', compact('topPrds'))->render()]);
    }

    private function createRange($range)
    {
        switch ($range) {
            case 'past-28-days':
                $end = Carbon::today();
                $start = Carbon::today()->subDays(27);
                $day = $start;
                do {
                    $date_range[] = $day->format('m-d');
                    $day = $day->modify('+1 day');
                } while ($day <= $end);
                return $date_range;
                break;
            case 'past-12-months':
                $end = Carbon::today();
                $start = Carbon::today()->sub(11, 'months');
                $month = $start;
                do {
                    $month_range[] = $month->format('M');
                    $month = $month->modify('+1 month');
                } while ($month <= $end);
                return $month_range;
                break;
            case 'by-year':
                $start = Carbon::today()->sub(4, 'years');
                $end = Carbon::today();
                $year = $start;
                do {
                    $year_range[] = $year->format('Y');
                    $year = $year->modify('+1 year');
                } while ($year <= $end);
                return $year_range;
                break;
        }
    }
}
