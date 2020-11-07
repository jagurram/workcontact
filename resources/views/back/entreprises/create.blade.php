@extends('test')


@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Entreprises",
        'comment' => "Creer votre fiche et sauvegarder"]
    )

@endsection

@section('content')
    <div>    
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
            <h3 class="box-title">Creation</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('entreprises.store') }}" aria-label="{{ __('Create') }}" >
            @csrf
            <div class="box-body">
                
                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'raison_social',
                    'title' => 'Raison Social',
                    'type' => 'text', 
                    'oldvalue' => '',
                    'required' => 'requried',
                ])

                @include('components.content.form.multipleselect' , [
                    'name' => 'pays',
                    'title' => 'Pays',
                    'type' => 'text',
                    'liste_pays' => $liste_pays,
                ])


                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'adresse1',
                    'title' => 'Adresse',
                    'type' => 'text',
                    'oldvalue' => '',
                    'required' => '', 
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'adresse2',
                    'title' => '',
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

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'telephone_fixe',
                    'title' => 'Telephone fixe',
                    'type' => 'text',
                    'oldvalue' => '',
                    'required' => '', 
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'email',
                    'title' => 'Email',
                    'type' => 'email',
                    'oldvalue' => '',
                    'required' => '', 
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'website',
                    'title' => 'Web Site',
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
  $(function () {
   @if(old('pays'))
        $('#pays').val('{{old('pays') }}');
    @else
    $('#pays').val('France');
    @endif      
  })
  </script>
@endsection