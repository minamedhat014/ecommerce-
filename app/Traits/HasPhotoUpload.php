<?php

namespace App\Traits;

use Livewire\Livewire;
use Livewire\WithFileUploads;




trait HasPhotoUpload {

    use WithFileUploads;

    public $photo = null;  // Store a single photo
    public $uploadedPreview = null;  // Store the preview for a single photo
    
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
            'photo' => 'required|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max for a single photo
        ];
    }
    
    public function updatedPhoto()
    {
        // Handle the file upload and generate preview for a single photo
        if ($this->photo) {
            $tempPath = $this->photo->store('temp', 'public'); // Store the file temporarily
            $this->uploadedPreview = asset('storage/' . $tempPath); // Store the preview URL
        }
    }
    
    /**
     * Remove the photo from the preview and reset
     */
    public function removePhoto()
    {
        $this->uploadedPreview = null;
        $this->photo = null;
    }
    

    
    


 
}