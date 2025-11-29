<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     */
    public function __invoke(Request $request, $locale)
    {
        // Validate locale
        if (!in_array($locale, ['en', 'ar'])) {
            $locale = 'en';
        }

        // Set locale in session
        Session::put('locale', $locale);

        // Set locale for current request
        App::setLocale($locale);

        // Get the previous URL
        $previousUrl = url()->previous();

        // If previous URL exists and is from the same application, redirect there
        if ($previousUrl && str_starts_with($previousUrl, url('/'))) {
            return redirect($previousUrl);
        }

        // Otherwise redirect to dashboard home (or login if not authenticated)
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return redirect()->route('login.form');
    }
}
