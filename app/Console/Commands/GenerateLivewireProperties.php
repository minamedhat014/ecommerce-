<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateLivewireProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewire:generate-properties {model}';
    protected $description = 'Generate Livewire properties for a given model fillable attributes';
    /**
     * Execute the console command.
     */
        public function handle()
        {
            $modelName = $this->argument('model');
            $modelClass = "App\\Models\\$modelName";
    
            if (!class_exists($modelClass)) {
                $this->error("Model $modelName does not exist.");
                return;
            }
    
            $model = new $modelClass();
    
            if (!property_exists($model, 'fillable')) {
                $this->error("The $modelName model does not have a \$fillable property.");
                return;
            }
    
            $fillable = $model->getFillable();
    
            if (empty($fillable)) {
                $this->error("The $modelName model does not have any fillable attributes.");
                return;
            }
    
            $output = "";
            foreach ($fillable as $attribute) {
                $output .= "public \$$attribute;\n";
            }
    
            $this->info("Generated Livewire properties for $modelName model:");
            $this->line("\n$output");
        }
    }
