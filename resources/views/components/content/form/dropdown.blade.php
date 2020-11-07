
    <label for="{{ $name }}">{{ $title }}</label>
    <select id="{{ $name }}" class="{{ $name }} select2-selection select2-selection--multiple" name="{{ $name }}[]" multiple="multiple" style="width: 100%">
        @foreach($contacts as $contact)
            <option value="{{ $contact->id }}">{{ $contact->nom }} {{ $contact->prenom }}</option>
        @endforeach

    </select>