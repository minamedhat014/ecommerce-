<?php

namespace App\Traits;

trait HasStatus {

    

 protected static array $allowedStatuses = ['not_ready', 'active', 'inactive'];   
       


 public function changeStatus(string $status): bool
    {
        if (!in_array($status, static::$allowedStatuses)) {
            throw new \InvalidArgumentException("Invalid status: {$status}");
        }

        $this->status = $status;

        return $this->save();
    }

 public function hasStatus(string $status): bool
    {
        return $this->status === $status;
    }

    public function statusClass(): string
    {
        return match ($this->status) {
            'active' => 'bg-success',
            'inactive' => 'bg-danger',
            'not_ready' => 'bg-warning',
            default => 'bg-light',
        };
    }
    
    public function activate(){
        try {
            $this->check_permission($this->write_permission);
            $record =$this->model::FindOrFail($this->edit_id);
            $record->changeStatus('active');
            successMessage('record has been activated');
            }catch (\Exception $e){
                errorMessage($e);
            }
        }

        public function deactivate(){
            try {
                $this->check_permission($this->write_permission);
                $record =$this->model::FindOrFail($this->edit_id);
                $record->changeStatus('inactive');
                successMessage('record has been deactivated');
                }catch (\Exception $e){
                    errorMessage($e);
                }
            }
}