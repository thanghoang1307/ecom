<?php

namespace App\Exports;

use App\Models\Order\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class OrdersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Order::with('customer', 'guest', 'company')->where('status', '>', -2)->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Mã đơn hàng',
            'Tổng giá trị',
            'Tên khách hàng',
            'Số điện thoại khách hàng',
            'Địa chỉ khách hàng',
            'Tên công ty',
            'Mã số thuế',
            'Địa chỉ công ty',
            'Hình thức thanh toán',
            'Trạng thái đơn hàng',
            'Ngày thực hiện',
        ];
    }

    public function map($order): array
    {
        if ($order->customer_id) {
            $customer = $order->customer;
        } else {
            $customer = $order->guest;
        }

        if ($order->company_id) {
            $company = $order->company;
        } else {
            $company = new stdClass();
            $company->name = null;
            $company->mst = null;
            $company->address = null;
        }

        $payment = $order->payment_type == 0 ? 'COD' : 'Chuyển khoản';

        switch ($order->status) {
            case -1:
                $status = 'Hoàn trả';
                break;
            case 0:
                $status = 'Chưa xử lý';
                break;
            case 1:
                $status = 'Đã xác nhận đơn hàng';
                break;
            case 2:
                $status = 'Đã giao hàng, chưa thu tiền';
                break;
            case 3:
                $status = 'Đã thu tiền';
                break;
        }

        return [
            $order->id,
            $order->order_number,
            $order->total,
            $customer->name,
            $customer->phone,
            $customer->address,
            $company->name,
            $company->mst,
            $company->address,
            $payment,
            $status,
            date_format($order->created_at, 'd-m-Y'),
        ];
    }
}
