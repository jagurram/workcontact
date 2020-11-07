@extends('test')


@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Entreprises",
        'comment' => "Editez l'entreprise puis sauvegarder"]
    )

@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edition</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('entreprises.update', ['id' => $entreprise_detail->id] ) }}" aria-label="{{ __('Edit') }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="box-body">

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'raison_social',
                    'title' => 'Raison Social',
                    'oldvalue' => $entreprise_detail->raison_social,
                    'required' => 'required'
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'adresse1',
                    'title' => 'Adresse',
                    'oldvalue' => $entreprise_detail->adresse1,
                    'required' => 'required'
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'adresse2',
                    'title' => '',
                    'oldvalue' => $entreprise_detail->adresse2,
                    'required' => 'required'
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'code_postal',
                    'title' => 'Code Postal',
                    'oldvalue' => $entreprise_detail->code_postal,
                    'required' => 'required'
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'ville',
                    'title' => 'Code Postal',
                    'oldvalue' => $entreprise_detail->ville,
                    'required' => 'required'
                ])

                @include('components.content.form.multipleselect' , [
                    'name' => 'pays',
                    'title' => 'Pays',
                    'type' => 'text',
                    'liste_pays' => $liste_pays,
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'telephone_fixe',
                    'title' => 'Telephone Fixe',
                    'oldvalue' => $entreprise_detail->telephone_fixe,
                    'required' => 'required'
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'email',
                    'title' => 'Email',
                    'oldvalue' => $entreprise_detail->email,
                    'required' => 'required'
                ])

                @include('components.content.form.form-group-row' , [
                    'variable_name' => 'website',
                    'title' => 'Website',
                    'oldvalue' => $entreprise_detail->website,
                    'required' => 'required'
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
    $('#pays').val('{{old('pays',$entreprise_detail->pays) }}');
  })
  </script>
@endsection