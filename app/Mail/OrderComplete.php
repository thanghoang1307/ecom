<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order\Order;
use Illuminate\Support\Facades\Log;

class OrderComplete extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sales@onestopshop.vn', 'One Stop Shop')
            ->subject('ONESTOPSHOP.VN: Đơn hàng #' . $this->order->order_number . ' đã được tiếp nhận')
            ->markdown('mail.order.complete')->with(['order' => $this->order]);
    }
}
