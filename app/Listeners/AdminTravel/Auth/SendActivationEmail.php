<?php

namespace App\Listeners\AdminTravel\Auth;

use App\AdminTravel;
use App\Events\AdminTravel\Auth\AdminTravelActivationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminTravel\Auth\ActivationEmail;


class SendActivationEmail
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  AdminTravelActivationEmail  $event
     * @return void
     */

    public function handle(AdminTravelActivationEmail $event)
    {
        if ($event->travel->active){
            return;
        }

        Mail::to($event->travel->email)->send(new ActivationEmail($event->travel));
    }


    /*public function handle(AdminTravelActivationEmail $event)
    {
        if ($event->travel->active == '2'){
            return;
        }
        Mail::to($event->travel->email)->send(new ActivationEmail($event->travel));
    }*/
}
