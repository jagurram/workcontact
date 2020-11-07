@if(Session::has('flash_message'))
    @foreach(Session::get('flash_message') as $flash)
        <div class="alert alert-{{ $flash['type'] }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>  {{ $flash['titre'] }}</h4>
            {{ $flash['message'] }}
        </div>
    @endforeach
@endif