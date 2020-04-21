<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Order\Order;
use App\Mail\OrderComplete;
use App\User;
use Illuminate\Support\Facades\Log;

class SendOrderCompleteEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::where('role', 0)->first();
        $customer = $this->order->customer_id ? $this->order->customer : $this->order->guest;

        // Backup your default mailer
        $backup = Mail::getSwiftMailer();

        // Setup your gmail mailer
        $transport = new \Swift_SmtpTransport('smtp.zoho.com', 587, 'tls');
        $transport->setUsername('sales@onestopshop.vn');
        $transport->setPassword('Osop@199');
        // Any other mailer configuration stuff needed...

        $gmail = new \Swift_Mailer($transport);
        // Set the mailer as gmail
        Mail::setSwiftMailer($gmail);

        // Send your message


        Mail::to($customer->email)->send(new OrderComplete($this->order));

        // Restore your original mailer
        Mail::setSwiftMailer($backup);
    }
}
