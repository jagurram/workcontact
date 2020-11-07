@extends('test')


@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Entreprises",
        'comment' => "Fiche complete"]
    )

@endsection


@section('content')


    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <!-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> -->

                    <h3 class="profile-username text-center">{{ $entreprise_detail->raison_social }}</h3>

                    <!-- <p class="text-muted text-center">Software Engineer</p> -->

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Adresse</b> <a class="pull-right">{{ $entreprise_detail->adresse1 }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Code Postal</b> <a class="pull-right">{{ $entreprise_detail->code_postal }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Ville</b> <a class="pull-right">{{ $entreprise_detail->ville }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Pays</b> <a class="pull-right">{{ $entreprise_detail->pays }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Telephone Fixe :</b> <a class="pull-right">{{ $entreprise_detail->telephone_fixe }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{ $entreprise_detail->email }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Website</b> <a class="pull-right">{{ $entreprise_detail->website }}</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
           
            
        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Dossiers</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Employees</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Offres d'emploi</a></li>
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Dropdown <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                        </ul>
                    </li> -->
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>

                <div class="tab-content">
                
                    <div class="tab-pane active" id="tab_1">
                        <!-- /DataTable with features -->
                        <div class="box-body">
                            <table id="table-dossiers" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Titre</th>
                                        <th>Commentaire</th>
                                        <th>Crée</th>
                                        <th>Update</th>
                                        <th>Resolution</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dossiers as $dossier)
                                    <tr>

                                        <td><a href="{{ route('dossiers.show', $dossier->id )}}">{{ $dossier->titre  }}</a></td>
                                        <td><small>{{ $dossier->commentaire  }}</small></td>
                                        
                                        
                                        <td>{{ $dossier->created_at  }}</td>
                                        <td>{{ $dossier->updated_at  }}</td>
                                        
                                        <td>
                                            @if($dossier->isResolved)
                                                <a class="btn btn-success glyphicon glyphicon-ok btn-xs" href=""></a>
                                            @else
                                                <a class="btn btn-success glyphicon glyphicon-hourglass btn-xs" href=""></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success glyphicon glyphicon-pencil btn-xs" href="{{ route('dossiers.edit', $dossier->id )}}"></a>
                                            <a class="btn btn-danger glyphicon glyphicon-trash btn-xs" href="{{ route('dossiers.delete', [ $dossier->id, $entreprise_detail->id ] )}}"></a>
                                        </td>
                                    </tr>
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>

                        <div class="box-footer clearfix">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalFormDossier" id="open">Creation d'un dossier</button>
                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>

                            {{--FORMULAIRE CREATION DOSSIER--}}
                            <form method="POST" action="{{ route('dossiers.storejson.entreprises') }}" id="formDossierCreation">
                                @csrf
                                <!-- Modal -->
                                    <div class="modal" tabindex="-1" role="dialog" id="modalFormDossier">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div id="alert-danger" class="alert alert-danger" style="display:none"></div>
                                                <div id="alert-success" class="alert alert-success" style="display:none"></div>
                                                                                                
                                                <div class="modal-header">

                                                    <h5 class="modal-title">Creer un dossier</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
                                                    @include('components.content.form.inputhidden' , [
                                                        'name' => 'entreprise_id',
                                                        'valeur' => $entreprise_detail->id, 
                                                    ])
                                                    
                                                    @include('components.content.form.form-group-row' , [
                                                        'variable_name' => 'titre',
                                                        'title' => 'Titre',
                                                        'type' => 'text',
                                                        'oldvalue' => '',
                                                        'required' => 'required' 
                                                    ])

                                                    @include('components.content.form.form-group-row' , [
                                                        'variable_name' => 'commentaire',
                                                        'title' => 'Commentaire',
                                                        'type' => 'text',
                                                        'oldvalue' => '',
                                                        'required' => '' 
                                                    ])
                                                                                            
                                                                                                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="closedossierform" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button  class="btn btn-success" id="submitModalFormDossier">Créer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>

                        </div>
                    </div>

                    @include('components.content.paneltab.entreprise.employee',[
                        'employees' => $employees,
                        ]
                    )
                
                    @include('components.content.paneltab.entreprise.emploi')
            
                </div>
            </div>
        </div>
    </div>

@endsection



@section('js_script')
<script>
  
  // FORMULAIRE DE CREATION DE DOSSIER
    jQuery(document).ready(function(){

        $('.sidebar-menu').tree();

        $('#table-dossiers').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
        })

        $("#submitModalFormDossier").click(function(e){
            $('.alert-success').text("");
            $('.alert-success').hide();
            $('.alert-danger').text("");
            $('.alert-danger').hide();
            
            
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "http://127.0.0.1:8000/admin/dossiers/create/entreprises/json",
                data: {
                    titre: jQuery('#titre').val(),
                    commentaire: jQuery('#commentaire').val(),
                    entreprise_id: jQuery('#entreprise_id').val(),
                },
                dataType : 'json',
                               
            })
            .done(function(data) {
                $('.alert-success').show('slow');
                $('.alert-success').text(data.success);
                console.log(data);
                                
            })
            .fail(function(data) {
                $('.alert-danger').show('slow');
                $('.alert-danger').text(data.responseJSON.errors);
                console.log(data.responseJSON.errors);
               
            });
        });  

        $("#closedossierform").click(function(e){
            $('.alert-success').text("");
            $('.alert-success').hide();
            $('.alert-danger').text("");
            $('.alert-danger').hide();
        }); 

        $("#selectEmployeeBox").select2();

        $("#submitModalFormCreateContact").click(function(e){
            $('#alert-danger-contact').text("");
            $('#alert-success-contact').hide();
            $('#alert-danger-contact').text("");
            $('#alert-success-contact').hide();
            
            
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "http://127.0.0.1:8000/admin/contacts/create/json",
                data: {
                    nom: jQuery('#nom').val(),
                    prenom: jQuery('#prenom').val(),
                    fonction: jQuery('#fonction').val(),
                    user_id: jQuery('#user_id').val(),
                },
                dataType : 'json',
                               
            })
            .done(function(data) {
                $('#alert-success-contact').show('slow');
                $('#alert-success-contact').text(data.success);
                
                console.log(data);
                                
            })
            .fail(function(data) {
                $('#alert-danger-contact').show('slow');
                $('#alert-danger-contact').text(data.responseJSON.errors);
                
                console.log(data.responseJSON.errors);
               
            });
        });

        $("#closeContactForm").click(function(e){
            $('#alert-danger-contact').text("");
            $('#alert-danger-contact').hide();
            $('#alert-success-contact').text("");
            $('#alert-success-contact').hide();
        }); 
    });

</script>
@endsection
