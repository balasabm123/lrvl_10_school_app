<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class taskObserver
{
  
    public function creating(User $user): void
    { 
        Log::info('Task-Creating',['task'=>$user]);
        $user->name = 'Task - '.$user->name;
        Log::info("After Task-Creating",['task'=>$user]);
    }

    public function created(User $user): void
    { 
        Log::info("Task-Creating",['task'=>$user]);
        $user->slug =Str::slug($user->name);
        $user->save();
        Log::info("After Task-Creating",['task'=>$user]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
