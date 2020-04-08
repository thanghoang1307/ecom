<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use use App\Repositories\Order\CustomerInterface;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $link;
    protected $customer;
    public function __construct($link, CustomerInterface $customer)
    {
        $this->link = $link;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.password.reset_password')->with([
            'link' = $link,
            'customer' = $customer,
        ]);
    }
}
