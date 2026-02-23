<?php

namespace App\Http\Controllers;

use App\Mail\LeadCapturedMail;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'service_type' => ['required', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:5000'],
            'source' => ['nullable', 'string', 'max:100'],
        ]);

        $lead = Lead::create([
            ...$data,
            'source' => $data['source'] ?? 'contact_form',
        ]);

        $recipient = config('mail.from.address');
        if ($recipient) {
            Mail::to($recipient)->send(new LeadCapturedMail($lead));
        }

        return back()->with('success', 'Thank you. Our team will contact you shortly.');
    }
}
