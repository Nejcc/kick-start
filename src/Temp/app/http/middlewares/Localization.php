<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Session;
use App\Models\Language;

class Localization
{
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setlocale(Session::get('locale'));
        }

        if(empty(session('locale_id')))
        {
            session()->put('locale_id', 1);
        }

        return $next($request);
    }
}
