<div>
  
    <x-app-table name="List stocks">
        <x-slot name="header">
      <x-table-button icon="fa-solid fa-circle-plus" target="addModel" />
        </x-slot>
        
        <x-slot name="head">
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Product</th>
            <th>SKU</th>
            <th>Supplier</th>
            <th>Average cost price</th>
            <th>current balance</th>
            <th>Actions</th>
          </tr>
        </x-slot>
        
        <x-slot name="body">
                    @foreach($this-> data as $row)
                                <tr>
                                <td>{{$row->id}}</td>
                                <td>{{dateOnly($row->created_at)}}</td>
                                <td>{{$row->product?->name}} </td>
                                <td>{{$row->product?->sku}} </td>
                                <td>{{$row->supplier?->name}} </td>
                                <td>
                                  {{
                                  number_format(
                                  $row->transactions()
                                    ->join('prices', 'stock_transactions.id', '=', 'prices.pricable_id')
                                    ->where('prices.pricable_type', \App\Models\StockTransaction::class)
                                    ->average('prices.price'),2)}}
                                </td>
                                <td>{{$row->balance?->current_stock}} </td>
                               <td>  
                                <div>
                                  <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                                    Actions
                                  </button>
                                  <div class="dropdown-menu">       
                                    <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>             
                                    <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteModel" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa-solid fa-trash danger"></i> Remove</a></li>  
                                    <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#newStockModel" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa-solid fa-circle-plus"></i> new stock</a></li>        
                                  </div>
                                </div>
                               </td>
                              
                              </tr>
                             
                              @endforeach  
        </x-slot>
        
        <x-slot name="footer">
          @include('livewire.admin.inventory.stockModal')
          {{ $this->data->links() }}
        
        </x-slot>
        </x-app-table>

</div>
