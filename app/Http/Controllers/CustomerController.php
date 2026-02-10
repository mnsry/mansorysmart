<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $customer = Auth::user()->customer;
        $projects = $customer->projects()->latest()->get();

        return view('customer.dashboard', compact('customer', 'projects'));
    }

    public function projects()
    {
        $projects = Auth::user()->customer->projects()->latest()->get();
        return view('customer.projects', compact('projects'));
    }

    public function showProject($id)
    {
        $project = Project::where('id', $id)
            ->where('customer_id', Auth::user()->customer->id)
            ->firstOrFail();

        return view('customer.project-show', compact('project'));
    }

    public function profile()
    {
        $customer = Auth::user()->customer;
        return view('customer.profile', compact('customer'));
    }
}
