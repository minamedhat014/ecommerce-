<?php

namespace App\Traits;

trait HasImageView {

    public $images =[];

    public function viewImage(int $id){ 
        try{
         
            $model =$this->model::findOrFail($id);
            $collectionName= $model->media->first()->collection_name;
            return 
            $this->images= $model->getMedia($collectionName) ;
        }catch (\Exception $e) {  
        errorMessage($e);
        } 
           }
    

}