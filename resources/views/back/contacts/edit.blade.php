@extends('test')

@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Contacts",
        'comment' => "Editer votre contact puis sauvegarder"]
    )

@endsection

@section('content')

    
    <div class="box-header with-border">
        <h3 class="box-title">Creation</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edition</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('contacts.update', ['id' => $contact_detail->id] )}}" aria-label="{{ __('Edit') }}">
            @method('PUT')
            @csrf

            <div class="box-body">

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'prenom',
                    'title' => 'Prenom',
                    'oldvalue' => $contact_detail->prenom,
                    'required' => 'required'
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'nom',
                    'title' => 'nom',
                    'oldvalue' => $contact_detail->nom,
                    'required' => 'required'
                ])

                @include('components.content.form.inputfile' , [
                    'name' => 'photo',
                    'title' => 'Photo',
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'origine',
                    'title' => 'origine',
                    'oldvalue' => $contact_detail->origine,
                    'required' => ''
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'fonction',
                    'title' => 'Fonction',
                    'oldvalue' => $contact_detail->fonction,
                    'required' => 'required'
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'code_postal',
                    'title' => 'Code Postal',
                    'oldvalue' => $contact_detail->code_postal,
                    'required' => ''
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'ville',
                    'title' => 'Ville',
                    'oldvalue' => $contact_detail->ville,
                    'required' => ''
                ])

                @include('components.content.form.multipleselect' , [
                    'name' => 'pays',
                    'title' => 'Pays',
                    'type' => 'text',
                    'liste_pays' => $liste_pays,
                ])
                
                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'email',
                    'title' => 'Email',
                    'oldvalue' => $contact_detail->email,
                    'required' => ''
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'telephone_fixe',
                    'title' => 'Telephone Fixe',
                    'oldvalue' => $contact_detail->telephone_fixe,
                    'required' => ''
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'telephone_mobile',
                    'title' => 'Telephone Mobile',
                    'oldvalue' => $contact_detail->telephone_mobile,
                    'required' => ''
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'commentaire',
                    'title' => 'Commentaire',
                    'oldvalue' => $contact_detail->commentaire,
                    'required' => ''
                ])


            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
    <!-- /.box -->

@endsection


@section('js_script')
<script>
  $(function () {
   
    $('#pays').val('{{old('pays',$contact_detail->pays) }}');
    
  })
  </script>
@endsection