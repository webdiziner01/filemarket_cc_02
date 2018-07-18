<?php

namespace App\Listeners\Checkout;

use App\Events\Checkout\SaleCreated;
use App\Mail\Checkout\SaleConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendEmailToBuyer
{
    /**
     * Handle the event.
     *
     * @param  SaleCreated  $event
     * @return void
     */
    public function handle(SaleCreated $event)
    {
        Mail::to($event->sale->buyer_email)->send(new SaleConfirmation($event->sale));
    }
}
