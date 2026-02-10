<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    // Landing page for referral link: mansorysmart/{slug}
    public function referralLanding($partner_slug)
    {
        $partner = Partner::where('slug', $partner_slug)->firstOrFail();

        // ذخیره شریک در سشن برای استفاده بعد از ثبت نام / لاگین
        session(['referral_partner_id' => $partner->id]);

        return view('public.referral', compact('partner'));
    }

    // Partner dashboard
    public function dashboard()
    {
        $partner = Auth::user()->partner;
        $projects = $partner->projects()->latest()->get();
        $commissions = $partner->commissions()->latest()->get();

        return view('partner.dashboard', compact('partner', 'projects', 'commissions'));
    }

    public function projects()
    {
        $partner = Auth::user()->partner;
        $projects = $partner->projects()->latest()->get();

        return view('partner.projects', compact('projects'));
    }

    public function commissions()
    {
        $partner = Auth::user()->partner;
        $commissions = $partner->commissions()->latest()->get();

        return view('partner.commissions', compact('commissions'));
    }

    public function referralLink()
    {
        $partner = Auth::user()->partner;
        $link = url('/') . '/' . $partner->slug;

        return view('partner.referral-link', compact('link'));
    }

    public function profile()
    {
        $partner = Auth::user()->partner;
        return view('partner.profile', compact('partner'));
    }
}
