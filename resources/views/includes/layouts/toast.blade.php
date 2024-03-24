<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">{{session('toast-label')}}</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body d-flex align-items-center justify-content-center">
       {{session('toast-message')}}

       @session('toast-method')
        @if(session('toast-method' === 'GET'))
            <a href="{{route(session('toast-route'))}}"
            class="btn btn sm btn-{{session('toast-button-type','info')}}">
            {{session('toast-button-label')}}
            </a>
        @else
            <form action="{{route(session(toast-route))}}" method="POST">
                @csrf
                @method(session('toast-method'))
                <button class="btn btn sm btn-{{session('toast-button-type','info')}}">{{session('toast-button-label')}}</button>
            </form>
        @endif
       @endsession
      </div>
    </div>
  </div>