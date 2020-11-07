@extends('test')


@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Entreprises",
        'comment' => "listing de tous les entreprises"]
    )

@endsection

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Entreprises Listing</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table id="table-dossiers" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Raison Social</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Telephone Fixe</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach( $entreprises as $entreprise)
                    <tr>
                        <td> <a href="{{ route('entreprises.show',$entreprise->id )}}"> {{ $entreprise->raison_social }}</a></td>
                        <td>{{ $entreprise->adresse1 }}</td>
                        <td>{{ $entreprise->code_postal }}</td>
                        <td>{{ $entreprise->ville }}</td>
                        <td>{{ $entreprise->pays }}</td>
                        <td>{{ $entreprise->telephone_fixe }}</td>
                        <td>{{ $entreprise->email }}</td>
                        <td><a href="{{ $entreprise->website }}">{{ $entreprise->website }}</a></td>
                        <td>
                            <a class="btn btn-success glyphicon glyphicon-pencil btn-xs" href="{{ route('entreprises.edit',$entreprise->id )}}"></a>
                            <a class="btn btn-danger glyphicon glyphicon-trash btn-xs" href="{{ route('entreprises.delete',$entreprise->id )}}"></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->

        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="{{ route('entreprises.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Ajouter une entreprise</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>


           
        </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->

@endsection

@section('js_script')
<script>
  $(function () {
   
    $('#table-dossiers').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  </script>
@endsection