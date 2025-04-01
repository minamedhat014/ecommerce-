<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class languageController extends Controller
{
    
    public function switchLang($locale)
    {

        if (!in_array($locale, ['ar', 'en'])) {
            abort(400);
        }

        // حفظ اللغة في الجلسة
        Session::put('locale', $locale);
        Session::save(); // تأكد من حفظ الجلسة

        return redirect()->back();
    }
      
    }

