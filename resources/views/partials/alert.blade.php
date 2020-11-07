@if(Session::has('flash.new'))
    @foreach (Session::get('flash.new') as $flashKey)
        <p class="alert alert-{{ Session::get($flashKey)['type'] }}">
            {{ Session::get($flashKey)['message'] }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </p>
    @endforeach
@endif