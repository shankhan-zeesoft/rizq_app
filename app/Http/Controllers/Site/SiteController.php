<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    public $url;
    public function __construct()
    {
        $this->url = request()->path();
    }

    public function index()
    {
        // redirect to login
        return redirect()->route('login');
    }

    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }
}
