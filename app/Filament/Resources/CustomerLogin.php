<?php

namespace App\Filament\Resources;

use Filament\Pages\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLogin extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-login';
    protected static string $view = 'filament.pages.customer-login';

    public function mount(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('filament.customer.resources.order.index');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('filament.customer.resources.order.index'));
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}