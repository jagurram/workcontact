
<div class="col-md-9">

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Creation Dossier</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('create.document.employee.store',  $employee_detail->id) }}" aria-label="{{ __('Create') }}">
        @csrf
        <div class="box-body">

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                       name="description" id="description" value="{{ old('description') }}">

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                @endif

            </div>

            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <input type="text" class="form-control{{ $errors->has('commentaire') ? ' is-invalid' : '' }}"
                       name="commentaire" id="commentaire" value="{{ old('commentaire') }}">

                @if ($errors->has('commentaire'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('commentaire') }}</strong>
                        </span>
                @endif
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>

</div>
<!-- /.box -->