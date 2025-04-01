<div>
    <x-app-table name=" List of Page Links">
    
      <x-slot name="header">
     @can ('write system settings')
    <x-table-button icon="fa-solid fa-circle-plus" target="addModel" />
     @endcan
      </x-slot>
      
      <x-slot name="head">
        
        <th >ID</th>
        <th>Page URL</th>
        <th> Category </th>
        <th> Parent Page </th>
        <th> Sub pages  </th>
        <th> English title</th>
        <th> Arabic title</th>
        <th> status </th>
        <th > Actions</th>   
      </x-slot>
      
      <x-slot name="body">
                 @foreach($this-> data as $row)
                              <tr>
                              <td>{{$row->id}}</td>
                              <td>{{$row->slug}} </td>
                              <td>  <span class="badge bg-dark"> {{$row->type?->name}} </span></td>
                              <td>{{$row->parent?->title_en}}</td>
                              <td> 
                                @if($row->children)
                                @foreach($row->children as $key => $child)
                                <span class="badge bg-success"> {{$child->title_en}} </span>
                                @endforeach
                                @else
                                <span class="badge bg-danger"> no sub pages</span>
                                @endif
                              </td>
                              <td>{{$row->title_en}} </td>
                              <td>{{$row->title_ar}} </td>
                              <td>   <span class="badge {{$row->statusClass()}}">{{$row->status}}</span> </td>

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
                            
                            </tr>
                           
                            @endforeach  
      </x-slot>
      
      <x-slot name="footer">
        @include('livewire.admin.settings.pageLinksModal')
        {{ $this->data->links() }}
      
      </x-slot>
      </x-app-table>
      
    </div>
    
    