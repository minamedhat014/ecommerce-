<div class="social-links mt-5">
    <ul class="d-flex list-unstyled gap-2">
@foreach($data as $key => $row)
<li>
    <a href="{{$row->link}}" class="btn btn-outline-info">
        <i class="{{$row->icon}}"></i>
    </a>
  </li>
@endforeach
    </ul>
  </div> 

