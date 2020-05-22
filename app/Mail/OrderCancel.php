<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order\Order;

class OrderCancel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
            ->subject('ONESTOPSHOP.VN: Đơn hàng #' . $this->order->order_number . ' đã bị huỷ')
            ->markdown('mail.order.cancel')->with(['order' => $this->order]);
    }
}
