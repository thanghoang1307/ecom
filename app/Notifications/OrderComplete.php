<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order\Order;

class OrderComplete extends Notification implements ShouldQueue
{
    use Queueable;
    public $tries = 5;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'slack'];
    }

    private function setMailConfig()
    {
        $existing = config('mail');
        $new = array_merge(
            $existing,
            [
                'from' => [
                    'address' => 'sales@onestopshop.vn',
                    'name' => 'CSKH One Stop Shop',
                ],
                'encryption' => $host->encryption,
                'username' => 'sales@onestopshop.vn',
                'password' => 'Osop@199',
            ]
        );

        config(['mail' => $new]);
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $this->setMailConfig();
        $order = $this->order;
        return (new MailMessage)
            ->subject('ONESTOPSHOP.VN: Đơn hàng #' . $order->order_number . ' đã được tiếp nhận')
            ->markdown('mail.order.complete', ['order' => $order]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
