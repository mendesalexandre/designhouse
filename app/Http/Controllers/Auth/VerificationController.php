<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;



class VerificationController extends Controller
{
    use VerifiesEmails;

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request, User $user)
    {
        //check if the url is a valid signed url
        // Verifica se a URL tem uma assinatura/chave válida.
        if (!URL::hasValidSignature($request)) {
            return response()->json(["errors" => [
                "message" => "Invalid verification link or signature"
            ]], 422);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(["errors" => [
                "message" => "Email Adress already verified"
            ]], 422);
        }

        $user->markEmailAsVerified();
        event(new Verified($user));

        return response()->json(["message" => "Email successfully verified"], 200);
    }

    public function resend(Request $request)
    {
        $this->validate($request, [
            'email' => ['email', 'required']
        ]);

        // $user = User::where('email', $request->email)->first();

        $user = $this->user->where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'errors' => [
                    "email" => "No user could be found with this email address",
                ]
            ], 422);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(["errors" => [
                "message" => "Email Adress already verified"
            ]], 422);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(
            ['status' => 'Verification link resent']
        );
    }
}
