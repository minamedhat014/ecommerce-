<?php

use Carbon\Carbon;
use App\Models\PageLink;

use App\Models\BannerImage;
use App\Models\ecommerceInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;



if (! function_exists('dateFormat')) {
function dateFormat($date,$format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($format);    
}}

////////////////////////////////////////////

if (! function_exists('trimString')) {
function trimString($string, $repl, $limit) 
{
  if(strlen($string) > $limit) 
  {
    return substr($string, 0, $limit) . $repl; 
  }
  else 
  {
    return $string;
  }
}}



if (! function_exists('siteLogo')) {
  function siteLogo() {
      return Cache::remember('site_logo', 3600, function () {
          $info = ecommerceInfo::where('status', 'active')->latest()->first();
          
          if ($info) {
              return $info->getFirstMediaUrl('site info');
          } else {
              return '';
          }
      });
  }
}

if (!function_exists('frontLinks')) {
  function frontLinks(string $name) {
      return Cache::remember("front_links_{$name}", 3600, function () use ($name) {
          return PageLink::with(['type', 'parent', 'children'])
              ->where('status', 'active')
              ->whereNull('parent_id')
              ->whereRelation('type', 'name', $name)
              ->get();
      });
  }
}


if (!function_exists('bannerImages')) {
  function bannerImages() {
      return Cache::remember('banner_images', 3600, function () {
          $models = BannerImage::with('media')->where('status', 'active')->get();
          $images = [];

          if ($models->isNotEmpty()) {
              foreach ($models as $model) {
                  // Assuming getMedia('banner images') returns a collection of media items
                  $mediaItems = $model->getMedia('banner images');
                  foreach ($mediaItems as $media) {
                      $images[] = $media->getUrl('banner'); // Collect the media URL or relevant info
                  }
              }
          }

          return $images;
      });
  }
}



if (!function_exists('bannerSpeed')) {
  function bannerSpeed() {
    return Cache::remember('banner_speed', 3600, function () {
      $speed = BannerImage::where('status', 'active')->latest()->first()->speed;
      if($speed){
        return $speed;
        }else{
          return 2000;
        }
        });
  }
}

if (!function_exists('siteInfo')) {
  function siteInfo(string $attribute) {
      return Cache::remember('site_info_' . $attribute, 3600, function () use ($attribute) {
          $info = ecommerceInfo::where('status', 'active')->latest()->first();
          
          if ($info && isset($info->$attribute)) {
              return $info->$attribute;
          } else {
              return 'No ' . $attribute;
          }
      });
  }
}

 
 


if (!function_exists('authName')) {
  function authName()
  {
      return Auth::user()->name." ". Auth::user()->id;
  }
}


if (!function_exists('onlyDate')) {
  function onlyDate($date, $format = 'd-m-Y')
  {
    return Carbon::parse($date)->format($format);
  }
}

if (!function_exists('authedCan')) {
  function authedCan($permission)
  {
      return Auth::user()->can($permission);
  }
}

if (!function_exists('errorMessage')) {
  function errorMessage($e)
  {
      if (is_string($e)) {
          return session()->flash('error', $e);
      } elseif ($e instanceof \Exception) {
          return session()->flash('error', $e->getMessage());
      } else {
          return session()->flash('error', 'An unknown error occurred');
      }
  }
}


if (!function_exists('successMessage')) {
  function successMessage($message = 'done successfully ')
  {
      return  session()->flash('success',$message);
  }
}


if (!function_exists('dateOnly')) {
  function dateOnly($datetime, $format = 'Y-m-d') {
      return Carbon::parse($datetime)->format($format);
  }
}

if (!function_exists('displayCreatedBy')) {
  function displayCreatedBy($name)
  {
      return 
      preg_replace('/\d+/', ' ', $name);
  }
}



?>