<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails, RedirectsUsers;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('verification.notice', [
                'pageTitle' => __('Account Verification'), 'user' => $request->user()
            ]);
    }

    public function phone(Request $request)
    {
        if ($request->user()->hasVerifiedEmail() && $request->user()->phone != null) {
            return redirect($this->redirectPath());
        } else if ($request->user()->email_verified_at == null) {
            return view('verification.notice', ['pageTitle' => __('Account Verification'), 'user' => $request->user()]);
        } else if ($request->user()->email_verified_at != null && $request->user()->phone == null) {
            return view('verification.phone', ['user' => $request->user()]);
        }
    }

    public function indexEmail(Request $request)
    {
        $data = User::findOrFail(Auth::user()->id);
        return view('verification.update_email', $data);
    }

    public function updateEmail(Request $request)
    {
        $data = User::findOrFail(Auth::user()->id);
        $data->update([
            'email' => $request->email
        ]);

        event(new Registered($data));

        return redirect('/')->with('success', "Account successfully updated.");
    }

    public function updatePhone(Request $request)
    {
        $data = User::findOrFail(Auth::user()->id);
        $request->validate([
            'phone' => 'unique:users,phone,' . $data->id
        ]);

        $data->update([
            'phone' => $request->phone
        ]);

        return redirect('/')->with('success', "Account successfully updated.");
    }
}
