@extends('test')

@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Contacts",
        'comment' => "Creer votre contact puis sauvegarder"]
    )

@endsection

@section('content')

    <div class="box">
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

            
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('contacts.store') }}" aria-label="{{ __('Create') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'prenom',
                    'title' => 'Prenom',
                    'type' => 'text',
                    'required' => 'required',
                    'oldvalue' => '',
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'nom',
                    'title' => 'Nom',
                    'type' => 'text',
                    'required' => 'required',
                    'oldvalue' => '',
                ])

                @include('components.content.form.inputfile' , [
                    'name' => 'photo',
                    'title' => 'Photo',
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'origine',
                    'title' => 'Origine',
                    'type' => 'text',
                    'oldvalue' => '', 
                    'required' => '',

                ])


                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'fonction',
                    'title' => 'Fonction',
                    'type' => 'text',
                    'oldvalue' => '',
                    'required' => '', 
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'adresse',
                    'title' => 'Adresse',
                    'type' => 'text', 
                    'oldvalue' => '',
                    'required' => '',
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'code_postal',
                    'title' => 'Code Postal',
                    'type' => 'text', 
                    'oldvalue' => '',
                    'required' => '',
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'ville',
                    'title' => 'Ville',
                    'type' => 'text',
                    'oldvalue' => '',
                    'required' => '',
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
                    'type' => 'email',
                    'oldvalue' => '',
                    'required' => '', 
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'telephone_fixe',
                    'title' => 'Telephone Fixe',
                    'type' => 'type',
                    'oldvalue' => '',
                    'required' => '',
                ])


                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'telephone_mobile',
                    'title' => 'Telephone Mobile',
                    'type' => 'text',
                    'oldvalue' => '',
                    'required' => '', 
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'commentaire',
                    'title' => 'Commentaire',
                    'type' => 'text',
                    'oldvalue' => '',
                    'required' => '', 
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
 
    jQuery(document).ready(function(){
        @if(old('pays'))
            $('#pays').val('{{old('pays') }}');
        @else
            $('#pays').val('France');
        @endif
    });
    
</script>
@endsection