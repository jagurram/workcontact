<div class="form-group row">
    <label for=" {{ $name }} " class="col-sm-2 col-form-label"> {{ $title }}</label>
    <div class="col-sm-10">
        
        <textarea  style="height:15em" row ="{{ $row }}" class=" textarea form-control {{ $errors->has('$name') ? ' is-invalid' : '' }}" name="{{ $name }}" id="{{ $name }}" value="{{old($name,$oldvalue) }}" {{ $required }} autofocus>
        </textarea>
        @if ($errors->has('$variable_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('$variable_name') }}</strong>
            </span>
        @endif -->
        
    </div>
</div>