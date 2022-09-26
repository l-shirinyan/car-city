<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RecaptchaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (app()->environment('local')) {
            return $next($request);
        }
        $client = new Client();
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => config('app.captcha_secret_key'),
                'response' => $request->input('captcha_response')
            ]
        ]);
        $response = json_decode($response->getBody());
        if($response->success && $response->score >= config('app.captcha_score', 0)) {
            return $next($request);
        }
        abort(403, 'This request is only available for humans');
    }
}
