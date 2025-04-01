<div>
  
    <x-app-table name="List of Products">
    
      <x-slot name="header">
  
    @can('write product')
    <x-table-button icon="fa-solid fa-circle-plus" target="addProductsModel" />
    @endCan

    @can('export products')
    <x-table-button icon="fa-solid fa-file-download " target="Download" />
    @endCan

      </x-slot>
      
      <x-slot name="head">
        <th>ID</th>
        <th> Created at</th>
        <th> English name</th>
        <th> Arabic Name</th>
        <th> Category </th>
        <th> SKU</th>
        <th> English description </th>
        <th> Arabic description </th>
        <th> Status</th>
        <th> Image </th>
        <th> Offers </th>
        <th> Price</th>
        <th> Actions </th>
      </x-slot>
      
      <x-slot name="body">
        @foreach ($this->data as $row)
        <tr>
        <td>{{$row->id}}</td>
        <td>{{dateOnly($row->created_at)}}</td>
        <td>
          <x-read-more text="{{$row->name_en}}"/>
        </td>
        <td>
          <x-read-more text="{{$row->name_ar}}"/>
        </td>
        <td>{{$row->category?->name_en}}</td>
        <td>{{$row->sku}}</td>
        <td>
          <x-read-more text="{{ $row->description_en }}"/>
        </td>
        <td>
  
          <x-read-more text="{{$row->description_ar}}"/>
        </td>
      
        <td>   <span class="badge {{$row->statusClass()}}">{{$row->status}}</span> </td>
        <td>
          <img src="{{$row->getFirstMediaUrl('products','thumb')}}" alt="{{ $row->name}}" class="noti-image">
        </td>
        <td>

          @if($row->offers->isNotEmpty())
        
          @foreach($row->offers()->get() as $key => $ro)
          <span class="badge bg-success"> 
          {{$ro->name}}
          </span>
          @endforeach
          @else
          <span class="badge bg-danger"> 
            no offers applied 
            </span>
          @endif
          </td>

          <td>{{ number_format($row->price?->price,0)}} EGP</td>
        <td>
          <div>
            <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
              Actions
            </button>
            <div class="dropdown-menu">
              @can('write product')
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editProductsModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteProductsModel" type="button"  wire:click='gettingId({{$row->id}})'> <i class="fa-solid fa-trash danger"></i> Remove</a></li>
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#activateModal" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa-solid fa-play"></i> Activate </a></li>       
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deactivateModal" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa-solid fa-stop"></i> Dectivate </a></li>    
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#AddFeatureModal" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa fa-plus-circle"></i> Add Features </a></li> 
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#showFeatureModal" type="button"   wire:click='showFeatures({{$row->id}})' > <i class="fa-solid fa-eye"></i> Show Features</a></li> 
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteProductsfeaturesModel" type="button"  wire:click='gettingId({{$row->id}})'> <i class="fa-solid fa-trash danger"></i> Remove Features</a></li>   
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#addApplicationModal" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa fa-plus-circle"></i> Add applications </a></li> 
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#showApplicationModal" type="button"   wire:click='showApplications({{$row->id}})' > <i class="fa-solid fa-eye"></i> Show Applications</a></li> 
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteProductApplicationModel" type="button"  wire:click='gettingId({{$row->id}})'> <i class="fa-solid fa-trash danger"></i> Remove applications</a></li>   
              @endcan
            </div>
          </div>
        </td> 
        </tr>
        @endforeach
      </x-slot>
      
      <x-slot name="footer">
        {{ $this->data->links() }} 
      </x-slot>
      </x-app-table>
      
      @include('livewire.admin.products.productModel')
      </div>
      
    
      
    