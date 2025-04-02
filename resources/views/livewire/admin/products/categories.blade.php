<div>
    <x-app-table name=" List of Product categories">
    
      <x-slot name="header">
    <x-table-button icon="fa-solid fa-circle-plus" target="addModel" />
      </x-slot>
      
      <x-slot name="head">
        
        <th >ID</th>
        <th> Arabic name</th>
        <th> English name </th>
        <th> Slug</th>
        <th> image</th>
        <th>Descripation</th>
        <th > Actions</th>   
      </x-slot>
      
      <x-slot name="body">
                 @foreach($this-> data as $row)
                              <tr>
                              <td>{{$row->id}}</td>
                              <td>{{$row->name_ar}} </td>
                              <td>{{$row->name_en}} </td>
                              <td>{{$row->slug}} </td>
                              <td>
                                <img src="{{$row->getFirstMediaUrl('categories','thumb')}}" alt="{{ $row->name}}" class="noti-image">
                              </td>

                              <td>{{$row->description}} </td>
                             <td>  
                              <div>
                                <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                                  Actions
                                </button>
                                <div class="dropdown-menu">       
                                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>             
                                  <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteModel" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa-solid fa-trash danger"></i> Remove</a></li>    
                                </div>
                              </div>
                             </td>
                            
                            </tr>
                           
                            @endforeach  
      </x-slot>
      
      <x-slot name="footer">
        @include('livewire.admin.products.categoryModal')
        {{ $this->data->links() }}
      
      </x-slot>
      </x-app-table>
      
    </div>
    
    
