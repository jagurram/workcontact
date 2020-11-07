@if (session()->has('info'))

    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Information !</h4>
        {{ session()->get('success') }}
    </div>

@endif