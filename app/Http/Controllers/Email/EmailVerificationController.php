<?php

namespace App\Http\Controllers\Email;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class EmailVerificationController extends Controller
{
    /**
     * Подтвердить адрес электронной почты пользователя.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        event(new Verified($request->user()));

        return redirect('/home')->with('success', 'Адрес электронной почты успешно подтвержден.');
    }

    /**
     * Отправить повторно письмо с подтверждением.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendVerificationNotification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Ссылка для подтверждения отправлена!');
    }
}
