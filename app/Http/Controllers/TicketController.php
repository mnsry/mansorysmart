<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $tickets = Ticket::latest()->get();
            return view('admin.tickets.index', compact('tickets'));
        }

        $tickets = Auth::user()->customer->tickets()->latest()->get();
        return view('customer.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('customer.tickets.create');
    }

    public function store(Request $request)
    {
        Auth::user()->customer->tickets()->create([
            'subject' => $request->subject,
            'description' => $request->description,
            'status' => 'open',
        ]);

        return redirect()->route('customer.tickets')->with('success', 'تیکت ثبت شد');
    }

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return redirect()->back()->with('success', 'تیکت به‌روزرسانی شد');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->back()->with('success', 'تیکت حذف شد');
    }
}
