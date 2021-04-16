<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the plan "Creating" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function Creating(Plan $plan)
    {
        
        $plan->url =  Str::slug($plan->name);
    }

    /**
     * Handle the plan "Updating" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function Updating(Plan $plan)
    {
        $plan->url =  Str::slug($plan->name);
    }


   
}
