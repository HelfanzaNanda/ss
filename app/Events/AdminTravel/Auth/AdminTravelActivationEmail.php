<?php

namespace App\Events\AdminTravel\Auth;


use App\AdminTravel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * @property  travel
 */
class AdminTravelActivationEmail
{
    use Dispatchable, SerializesModels;

    public $travel;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AdminTravel $travel)
    {
        $this->travel = $travel;
    }

}
