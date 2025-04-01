<?php

namespace App\Traits;

use Livewire\Livewire;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;



trait HasPhotosUpload {

    use WithFileUploads;

    public $photos =[];
    public $uploadedPreviews = [];
    public $currentPhotos = [];
    public function HasPhotosUploadBoot()
{
    Livewire::config([
        'chunk_uploads' => true,
        'chunk_size' => 1024 * 1024, // 1 MB per chunk
    ]);
}
    
    protected function rules()
    {
         return [ 
            'photos.*' => 'required|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
       
         ];               
    }
 
    public function updatedPhotos()
    {
 
            $this->dispatch('refresh');
            foreach ($this->photos as $photo) {
            $tempPath = $photo->store('temp', 'public'); // Store files temporarily
            $this->uploadedPreviews[] = asset('storage/' . $tempPath); // Store preview URL
        }
    }

    /**
     * Remove photo from the preview list
     */
    public function removePhoto($index)
    {
        unset($this->uploadedPreviews[$index]);
        unset($this->photos[$index]);
        $this->uploadedPreviews = array_values($this->uploadedPreviews); // Reindex the array
        $this->photos = array_values($this->photos); // Reindex the array
    }
    

    
    
   
    


 
}