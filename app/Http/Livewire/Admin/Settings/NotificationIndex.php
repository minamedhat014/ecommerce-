<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Traits\HasTable;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationIndex extends Component
{

 use HasTable;
       
 public $unReadnotifications=[];

    public function readAll(){
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
    }
    




    public function render()
    {
      $this->unReadnotifications = Auth::user()->unreadNotifications
        ->sortByDesc('created_at')
        ->pluck('data'); 

  
 
        return view('livewire.admin.settings.notification-index');
    }
}
