<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingsController extends Controller
{
    public function index(){
    return view('admin.settings.dropdownLists');
    }

    public function notify(){
        return view('admin.settings.notification');
           }

           public function siteInfo(){
            return view('admin.settings.site-info');
            }
            
public function socialLinks(){
    return view('admin.settings.social-media-links');
}


public function bannerImages(){
    return view('admin.settings.banner-images');
}


public function pageLinks(){
    return view('admin.settings.page-links');
}
}

