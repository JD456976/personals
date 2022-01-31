<?php

namespace App\Listeners;

use App\Events\ReportReceivedEvent;
use App\Mail\ReportReceived;
use App\Mail\ReportReceivedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ReportReceivedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ReportReceivedEvent  $event
     * @return void
     */
    public function handle(ReportReceivedEvent $event)
    {
        Mail::to('admin@packagethieves.com')->send(new ReportReceivedMail($event->report));
    }
}
