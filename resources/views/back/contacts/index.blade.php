@extends('test')


@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Contacts",
        'comment' => "listing de tous les contacts"]
    )

@endsection

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Contact Listing</h3>

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
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Origine</th>
                        <th>Fonction</th>
                        <th>Email</th>
                        <th>Telephone mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach( $contacts as $contact)
                    <tr>
                        <td><a href="{{ route('contacts.show',$contact->id) }}"> {{ $contact->nom }}</a></td>
                        <td>{{ $contact->prenom }}</td>
                        <td>{{ $contact->origine }}</td>
                        <td>{{ $contact->fonction }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->telephone_mobile }}</td>
                        <td>
                            <a class="btn btn-success glyphicon glyphicon-pencil btn-xs" href="{{ route('contacts.edit',$contact->id )}}"></a>
                            <a class="btn btn-danger glyphicon glyphicon-trash btn-xs" href="{{ route('contacts.delete',$contact->id )}}"></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalFormContact" id="open">Creation eclair d'un contact</button>
            <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Formulaire de creation</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>

            {{--FORMULAIRE CREATION RAPIDE DE CONTACT--}}
                        <form method="post" action="{{ route('contacts.storejson') }}" id="formContactCreation">
                        @csrf
                        <!-- Modal -->
                            <div class="modal" tabindex="-1" role="dialog" id="modalFormContact">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div id="alert-danger" class="alert alert-danger" style="display:none"></div>
                                        <div id="alert-success" class="alert alert-success" style="display:none"></div>
                                        <div class="modal-header">

                                            <h5 class="modal-title">Creer un contact au vol</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="prenom">Prenom:</label>
                                                    <input type="text" class="form-control" name="prenom" id="prenom">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="nom">Nom:</label>
                                                    <input type="text" class="form-control" name="nom" id="nom">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="fonction">Fonction:</label>
                                                    <input type="text" class="form-control" name="fonction" id="fonction">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button id="closecontactform" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button  class="btn btn-success" id="submitModalFormContact">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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