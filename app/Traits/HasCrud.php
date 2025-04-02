<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait HasCrud {
   
   
    public $edit_id;
    public $check_permission;
 
    protected function close(){
        $this->closeModal();
        $this->dispatch('closeModal');
    }


    
 public function gettingId(int $id){
    $this->edit_id= $id;
    }

    private function handleMedia($record, $validatedData, $mediaCollection)
    {
        try{
          $record->clearMediaCollection($mediaCollection);
        if (isset($validatedData['photo'])) {
            // Single photo upload
            $record->addMedia($validatedData['photo'])->toMediaCollection($mediaCollection);
        } elseif (isset($validatedData['photos']) && is_array($validatedData['photos'])) {
            // Multiple photos upload
            foreach ($validatedData['photos'] as $photo) {
                $record->addMedia($photo)->toMediaCollection($mediaCollection);
            }
        }
    }catch(\Exception $e){
        errorMessage($e);
     } 
    }

    private function handleRelationships($record, $relationships)
    {
    
        foreach ($relationships as $relation => $data) {
            if (method_exists($record, $relation)) {
                $relationInstance = $record->$relation();
    
                switch (get_class($relationInstance)) {
                    case \Illuminate\Database\Eloquent\Relations\BelongsToMany::class:
                        if (isset($data['sync']) && $data['sync']) {
                            $relationInstance->sync($data['data']);
                        } elseif (isset($data['syncWithoutDetaching']) && $data['syncWithoutDetaching']) {
                            $relationInstance->syncWithoutDetaching($data['data']);
                        } else {
                            $relationInstance->sync($data);
                        }
                        break;
    
                    case \Illuminate\Database\Eloquent\Relations\HasMany::class:
                        $existingIds = $relationInstance->pluck('id')->toArray();
                        $newIds = [];
    
                        foreach ($data as $attributes) {
                            if (isset($attributes['id']) && in_array($attributes['id'], $existingIds)) {
                                $relationInstance->find($attributes['id'])->update($attributes);
                                $newIds[] = $attributes['id'];
                            } else {
                                $newRecord = $relationInstance->create($attributes);
                                $newIds[] = $newRecord->id;
                            }
                        }
    
                        $relationInstance->whereNotIn('id', $newIds)->delete();
                        break;
    
                    case \Illuminate\Database\Eloquent\Relations\BelongsTo::class:
                        $relationInstance->associate($data);
                        break;
    
                    case \Illuminate\Database\Eloquent\Relations\MorphTo::class:
                        $relationInstance->associate($data);
                        break;
    
                    case \Illuminate\Database\Eloquent\Relations\MorphMany::class:
                        $existingIds = $relationInstance->pluck('id')->toArray();
                        $newIds = [];
    
                        foreach ($data as $attributes) {
                            if (isset($attributes['id']) && in_array($attributes['id'], $existingIds)) {
                                $relationInstance->find($attributes['id'])->update($attributes);
                                $newIds[] = $attributes['id'];
                            } else {
                                $newRecord = $relationInstance->create($attributes);
                                $newIds[] = $newRecord->id;
                            }
                        }
    
                        $relationInstance->whereNotIn('id', $newIds)->delete();
                        break;
    
                    case \Illuminate\Database\Eloquent\Relations\MorphOne::class:
                        if ($relationInstance->exists()) {
                            $relationInstance->update($data);
                        } else {
                            $relationInstance->create($data);
                        }
                        break;
    
                    default:
                        throw new \Exception("Unsupported relationship type for '{$relation}'.");
                }
            }
        }
    
        $record->isDirty() && $record->save();
    }
    
    

    public function storeRecord($model, $validatedData, $mediaCollection = null,$relationships = [])
    {
        try {
            // Check permissions
            $this->check_permission($this->write_permission);
            DB::beginTransaction();
             // Get the model's fillable attributes
             $fillableAttributes = (new $model)->getFillable();
            // Filter validated data to only include fillable fields
            $fillableData = array_filter(
                $validatedData,
                fn ($key) => in_array($key, $fillableAttributes),
                ARRAY_FILTER_USE_KEY
            );
            $fillableData['created_by'] = authName();
            // Create the record
            $record = $model::create($fillableData);

            // Handle media uploads
            if (!empty($mediaCollection)) {
                $this->handleMedia($record, $validatedData, $mediaCollection);
            }
           // Handle relationships 
            $this->handleRelationships($record, $relationships);
            DB::commit();
            $this->close();
            return $record;
            $record = $this->record;
        } catch (\Exception $e) {
            DB::rollBack();
            errorMessage($e);
        }
    }
   
    public function updateRecord($record, $validatedData, $mediaCollection = null, $relationships = [])
    {
        try {
            $this->check_permission($this->write_permission);
            DB::beginTransaction();   
            $fillableAttributes = $record->getFillable();
            // Filter validated data to only include fillable fields
            $fillableData = array_filter(
                $validatedData,
                fn ($key) => in_array($key, $fillableAttributes),
                ARRAY_FILTER_USE_KEY
            );
            $fillableData['updated_by'] = authName();
            // Update the record
            $record->update($fillableData);
            // Handle media uploads
            if (!empty($mediaCollection)) {
                $this->handleMedia($record, $validatedData, $mediaCollection);
            }
             // Handle relationships
             $this->handleRelationships($record, $relationships);
             DB::commit();
            $this->close();
        } catch (\Exception $e) {
            DB::rollBack();
            errorMessage($e);
            
        }
    }

    public function deleteRecord ($record){
    try {
     $this->check_permission($this->write_permission);
     $record->delete();
     successMessage() ;
     }catch (\Exception $e){
         errorMessage($e);
     }
 }

    }
   





