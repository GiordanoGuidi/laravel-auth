@session('message')
    <div class="alert alert-{{session('type','info')}} alert-dismissible fade show my-3" role="alert">
    {{$value}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endsession