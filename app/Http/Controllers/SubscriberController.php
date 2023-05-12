<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $subscriber = Subscriber::where('email', $request->email)->first();

        if ($subscriber) {
            return back()->with('warning', 'You are already subscribed!');
        } else {
            $subscriber = Subscriber::create($request->only('email'));

            // Send email
            Mail::raw('Thank you for subscribing to our newsletter!', function ($message) use ($subscriber) {
                $message->to($subscriber->email)->subject('Subscription Confirmation');
            });

            return back()->with('success', 'Thank you for subscribing!');
        }
    }
}

