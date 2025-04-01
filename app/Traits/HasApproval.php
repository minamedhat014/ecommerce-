<?php

namespace App\Traits;

use App\Models\Approval;

trait HasApproval {
   
    public $approved_model;
    public $edit_id;

   public function  askApproval(){

    $perviousApproval= Approval::where('approvable_type',$this->approved_model)
    ->where('approvable_id',$this->edit_id)->first();
    if($perviousApproval ){
        errorMessage('this record alaready approved'  );
    } else {
    }
   } 
}