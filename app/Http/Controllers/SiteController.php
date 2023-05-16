<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $plan;

    public function __construct(Plan $plan)
    {
            $this->plan = $plan;
    }

    public function index()
    {

        $plans = $this->plan->with(['features'])->get();

        return view('home.index', compact('plans'));
    }

    public function createSessionPlan($urlPlan)
    {

        $plan = $this->plan->where('url', $urlPlan)->first();



        if(! $plan)
        {
            return redirect()->route('site.home');
        }

        session()->put('plan', $plan);

            return redirect()->route('subscriptions.checkout');

    }
}
