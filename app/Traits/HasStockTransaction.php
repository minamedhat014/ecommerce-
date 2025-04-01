<?php

namespace App\Traits;

use App\Enums\stockConditions;
use App\Models\StockBalance;
use App\Enums\stockTransactions;
use App\Models\StockTransaction;


trait HasStockTransaction {

      


public function AddStock($stock_id,$qantity,$price){

   $stock = StockTransaction::create([
        'stock_id' => $stock_id,
        'type' => stockTransactions::IN, 
        'condition'=>stockConditions::GOOD,
        'quantity' =>$qantity,
        'created_by'=>authName(),
    ]);
    $stock->price()->create([
        'price' => $price 
    ]);
    $this->updateBalance($stock_id, $qantity,$price);
    successMessage('Stock added successfully');
}
 



private function updateBalance($stockId, $change) {
    $balance = StockBalance::firstOrCreate([
    'stock_id' => $stockId,
    'condition'=>stockConditions::GOOD,
]);
    $balance->current_stock += $change;
    $balance->save();
}
    }
    
    

    
    

