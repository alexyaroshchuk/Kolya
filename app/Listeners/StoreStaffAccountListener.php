<?php

namespace App\Listeners;

use App\Events\onStoreStaffAccountEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Staff;

class StoreStaffAccountListener
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
     * @param  onStoreStaffAccountEvent  $event
     * @return void
     */
    public function handle(onStoreStaffAccountEvent $event)
    {
        $user_id=$event->user_id;
        $staff_id=$event->staff_id;
        
        Staff::where('id',  $staff_id)->update([
                                              'user_id'=>$user_id,
                                              ]);
    }
}
