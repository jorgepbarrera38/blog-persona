<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function store (Request $request) {
        $data = $request->validate([
            'email' => 'required|email|max:50'
        ]);
        
        $countSubscriber = Subscriber::where('email', $request->input('email'))->count();
        
        if (!$countSubscriber) {
            Subscriber::create($data);
        }

        return redirect()->back()->with('success', '¡Gracias por suscribirte!');
    }
}
