<div>
    <x-app-table name=" List of previous info">
    
      <x-slot name="header">
     @can ('write system settings')
    <x-table-button icon="fa-solid fa-circle-plus" target="addModel" />
     @endcan
      </x-slot>
      
      <x-slot name="head">
        
        <th >ID</th>
        <th> Name</th>
        <th> Descriptions </th>
        <th> key words</th>
        <th>Phone</th>
        <th> logo</th>
        <th> Email </th>
        <th> Status </th>
        <th> Address</th>
        <th> Actions</th>
      
        
      </x-slot>
      
      <x-slot name="body">
                 @foreach($this-> data as $row)
                              <tr>
                              <td>{{$row->id}}</td>
                              <td>{{$row->name}} </td>
                              <td>{{$row->discriptions}}</td>
                              <td>{{$row->key_words}}</td>
                              <td>   <span class="badge bg-success"> {{$row->phone}} </span> </td>
                              <td> 
                                <img src="{{$row->getFirstMediaUrl('site info')}}" alt="{{ $row->name }}"  class="profile">
                            </td>
                           
                            <td>{{$row->email}}</td>
                            <td>   <span class="badge {{$row->statusClass()}}">{{$row->status}}</span> </td>


                        
                        
                            <td>{{$row->address}}</td>

                              @can('write system settings')
                             <td>  
                              <div>
                                <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                                  Actions
                                </button>
                                <div class="dropdown-menu">       
                                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>             
                                  <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteModel" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa-solid fa-trash danger"></i> Remove</a></li>  
                                  <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#activateModal" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa-solid fa-play"></i> Activate </a></li>       
                                  <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deactivateModal" type="button"   wire:click='gettingId({{$row->id}})' > <i class="fa-solid fa-stop"></i> Dectivate </a></li> 
                                </div>
                              </div>
                             </td>
                             @endcan
                            </tr>
                           
                            @endforeach  
      </x-slot>
      
      <x-slot name="footer">
        @include('livewire.admin.settings.siteInfoModal')
        {{ $this->data->links() }}
      
      </x-slot>
      </x-app-table>
      
    </div>
    
    
    
    
    
    