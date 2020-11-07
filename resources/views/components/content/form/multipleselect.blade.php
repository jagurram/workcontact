<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ $title }}</label>
    
    <div class="col-sm-10">
        <select id="{{ $name }}" class="form-control{{ $errors->has('pays') ? ' is-invalid' : '' }}
                select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="{{ $name }}">

            @foreach($liste_pays as $pays)
                <option value="{{ $pays->nom_fr_fr }}" @if($pays->nom_fr_fr==old('pays')) selected @endif>{{ $pays->nom_fr_fr }}</option>
            @endforeach

            

        </select>

        @if ($errors->has('pays'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('pays') }}</strong>
            </span>
        @endif

    </div>
    
    
    
</div>