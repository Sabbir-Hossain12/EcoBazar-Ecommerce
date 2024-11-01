<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
       return view('frontend.pages.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();


            $name = Auth::user()->name;
            Toastr::success('Welcome '.$name.' ', 'You are logged in successfully.');


            return redirect()->intended(url('/user-dashboard'));
        }

        catch (ValidationException $exception) {
            Toastr::error($exception->getMessage(), 'Login Failed');
            return redirect()->back();
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        Toastr::success('Success','You are logged Out successfully.',["positionClass" => "toast-bottom-center","closeButton"=> true,
            "progressBar" => true]);

        return redirect('/');
    }
}
