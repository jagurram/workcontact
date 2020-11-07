

<div class="form-group row">
    <label for=" {{ $variable_name }} " class="col-sm-2 col-form-label"> {{ $title }}</label>
    <div class="col-sm-10">
        
        <input type="text" class="form-control {{ $errors->has('$variable_name') ? ' is-invalid' : '' }}" name="{{ $variable_name }}" id="{{ $variable_name }}" value="{{old($variable_name,$oldvalue) }}" {{ $required }} autofocus>

        <!-- @if ($errors->has('$variable_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('$variable_name') }}</strong>
            </span>
        @endif -->
        
    </div>
</div>