<?php

namespace App\Listeners;

use App\EventModel;
use App\Events\FEvent;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    //public $name;
    public function __construct()
    {
        //
        //$this->name = $user->name;
    }

    /**
     * Handle the event.
     *
     * @param  FEvent  $event
     * @return void
     */
    public function handle(FEvent $event)
    {
        //
        $name = $event->name;
        $emodel = new EventModel();
        $emodel->name = $name;
        $emodel->save();
    }
}
