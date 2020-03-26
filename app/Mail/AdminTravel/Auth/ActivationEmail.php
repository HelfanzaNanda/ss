<?php

namespace App\Mail\AdminTravel\Auth;

use App\AdminTravel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $travel;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AdminTravel $travel)
    {
        $this->travel = $travel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.activation');
    }
}
