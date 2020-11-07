@extends('test')


@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => $dossier->titre,
        'comment' => $dossier->commentaire]
    )

@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Activites</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table-activites" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="hidden">id</th>
                            <th>Description</th>
                            <th>Date Evenement</th>
                            <th class="hidden">Debut</th>
                            <th class="hidden">Fin</th>
                            <th>Commentaire</th>
                            <th>Categorie</th>
                            <th>Sous Categorie</th>
                            <th>Contact</th>
                            <th>Closed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-activites-body">

                            @foreach($activites as $activite )
                                <tr>

                                    <th class="hidden">{{ $activite->id }}</th>
                                    <th>{{ $activite->description }}</th>
                                    <th>{{ $activite->dateEvenement }}</th>
                                    <th class="hidden">{{ $activite->dateDebut }}</th>
                                    <th class="hidden">{{ $activite->dateFin }}</th>
                                    <th>{{ $activite->commentaire }}</th>
                                    <th>{{ $activite->categorie }}</th>
                                    <th>{{ $activite->sous_categorie }}</th>
                                    <th>{{ $activite->mode_contact }}</th>
                                    <th>@if($activite->isClosed)
                                            <span class="btn btn-success glyphicon glyphicon-ok btn-xs" href=""></span>
                                        @else
                                            <span class="btn btn-success glyphicon glyphicon-hourglass btn-xs" href=""></span>
                                        @endif
                                    </th>
                                    <th> <a class="btn btn-danger glyphicon glyphicon-trash btn-xs" href="{{ route('activites.delete', [ $activite->id, $activite->dossier_id ] )}}"></a></th>

                                </tr>
                            @endforeach

                    </tbody>
                    
                    <tfoot>

                    </tfoot>

                    {{--FORMULAIRE  CREATION DE CONTACT RAPIDE--}}
                    <form method="post" action="{{ route('activites.storebyjson') }}" id="formCreateActivite">
                        @csrf
                                <!-- Modal -->
                        <div class="modal" tabindex="-1" role="dialog" id="modalFormActivite">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div id="alert-danger-contact" class="alert alert-danger" style="display:none"></div>
                                    <div id="alert-success-contact" class="alert alert-success" style="display:none"></div>
                                    <div class="modal-header">

                                        <h5 class="modal-title">Crée une activité</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        @include('components.content.form.inputhidden' , [
                                            'name' => 'dossier_id',
                                            'valeur' => $dossier->id,
                                        ])

                                        @include('components.content.form.form-group-row' , [
                                            'variable_name' => 'description',
                                            'title' => 'Description',
                                            'type' => 'text',
                                            'oldvalue' => '',
                                            'required' => 'required'
                                        ])

                                        @include('components.content.form.textearea' , [
                                            'name' => 'commentaire',
                                            'title' => 'Commentaire',
                                            'type' => 'text',
                                            'oldvalue' => '',
                                            'required' => '',
                                            'row'   => 4,
                                        ])

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Debut :</label>
                                            <div class="input-group date col-sm-8" data-provide="datepicker">
                                                <input id="dateStart_input" type="text" class="form-control">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Fin :</label>
                                            <div class="input-group date col-sm-8" data-provide="datepicker">
                                                <input id="dateEnd_input" type="text" class="form-control">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Evenement :</label>
                                            <div class="input-group date col-sm-8">

                                                <input type="text" value="2012-05-15 21:05" id="dateEvenement_input" class="form-control">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="form-group row">

                                            <label for="categorie_input" class="col-sm-2">Categorie</label>
                                            <div class="input-group col-sm-8">
                                                <select id="categorie_input" class="categorie_input select2-selection" name="categorie_input[]" style="width: 100%">
                                                    @foreach($categories as $categorie)
                                                        <option value="{{ $categorie }}">{{ $categorie }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label for="sous_categorie_input" class="col-sm-2">Sous-categorie</label>
                                            <div class="input-group col-sm-8">
                                                <select id="sous_categorie_input" class="sous_categorie_input select2-selection" name="sous_categorie_input[]" style="width: 100%">
                                                    @foreach($sous_categories as $sous_categorie)
                                                        <option value="{{ $sous_categorie }}">{{ $sous_categorie }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label for="mode_contact_input" class="col-sm-2">Mode contact</label>
                                            <div class="input-group col-sm-8">
                                                <select id="mode_contact_input" class="mode_contact_input select2-selection" name="mode_contact_input[]" style="width: 100%">
                                                    @foreach($mode_contacts as $mode_contact)
                                                        <option value="{{ $mode_contact }}">{{ $mode_contact }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button id="closeContactForm" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button  class="btn btn-success" id="submitModalFormCreateActivite">Ajouter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </table>
            </div>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalFormActivite" id="open">Ajouter une activite</button>
            </div>
        </div>
          
    </div>


    <div class="col-md-12">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Activité</a></li>
                <li><a href="#tab_2" data-toggle="tab">Fichiers</a></li>
                <li><a href="#tab_3" data-toggle="tab">Log</a></li>

                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <form method="POST" action="{{ route('dossiers.storejson.entreprises') }}" id="formDossierCreation">
                        @csrf
                        <input type="hidden" id="activite_id" name="activite_id" value="">

                        <div class="form-group row col-md-5 col-lg-5">

                            <div class="form-group">
                                <label for="dateEnd" class="col-sm-3 col-form-label">Date Fin :</label>

                                <div class="input-group date col-sm-8" data-provide="datepicker">
                                    <input id="dateEnd" type="text" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Date Debut :</label>
                                <div class="input-group date col-sm-8" data-provide="datepicker">
                                    <input id="dateStart" type="text" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date evenement :</label>
                                    <div class="input-group date col-sm-8">

                                        <input type="text" value="2012-05-15 21:05" id="dateEvenement" class="form-control">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="categorie" class="col-sm-3 col-form-label">Categorie :</label>
                                <div class="col-sm-8">
                                    <select id="categorie" class="categorie select2-selection" name="categories[]" style="width: 100%">
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie }}">{{ $categorie }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="sous_categorie" class="col-sm-3 col-form-label">Sous Categorie :</label>
                                <div class="col-sm-8">
                                    <select id="sous_categorie" class="categorie select2-selection" name="sous_categorie[]" style="width: 100%">
                                        @foreach($sous_categories as $sous_categorie)
                                            <option value="{{ $sous_categorie }}">{{ $sous_categorie }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="mode_contact" class="col-sm-3 col-form-label">Mode contact</label>
                                <div class="col-sm-8">
                                    <select id="mode_contact" class="categorie select2-selection" name="mode_contacts[]" style="width: 100%">
                                        @foreach($mode_contacts as $mode_contact)
                                            <option value="{{ $mode_contact }}">{{ $mode_contact }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row col-md-7 col-lg-7">

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" value="{{old('description') }}" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="commentaire" class="col-sm-2 col-form-label">Commentaire</label>
                                <div class="col-sm-10">

                                    <textarea  style="height:15em"  class="form-control {{ $errors->has('commentaire') ? ' is-invalid' : '' }}" name="commentaire" id="commentaire" value="{{old('commentaire') }}"  autofocus>
                                    </textarea>


                                    <button  class="btn btn-success pull-right" id="submitChangeFormActivite">Modifier</button>

                                    <button  class="btn btn-danger pull-right" id="submitUnlockFormActivite">Unlock</button>

                                </div>
                            </div>

                        </div>

                        <div class="form-group row "></div>

                    </form>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Bootstrap WYSIHTML5
                                <small>Simple and fast</small>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">

                            <textarea id="comment" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                        </div>
                    </div>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.

                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->


    </div>

    
</div>
	

@endsection

@section('js_script')

<script>
  
  // FORMULAIRE DE CREATION DE DOSSIER
    jQuery(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '-3d'
        });

        var table =  $('#table-activites').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
        })

        $("#categorie").select2();
        $("#sous_categorie").select2();
        $("#mode_contact").select2();

        $("#categorie_input").select2();
        $("#sous_categorie_input").select2();
        $("#mode_contact_input").select2();

        $("#mode_contact").val('SMS');
        $('#mode_contact').trigger('change');

        $('#comment').wysihtml5();

        $('#dateEvenement').datetimepicker({
            format: 'yyyy-mm-dd hh:ii'
        });

        $('#dateEvenement_input').datetimepicker({
            format: 'yyyy-mm-dd hh:ii'
        });

//        document.getElementById("description").disabled = true;
//        document.getElementById("categorie").disabled = true;
//        document.getElementById("mode_contact").disabled = true;
//        document.getElementById("dateStart").disabled = true;
//        document.getElementById("dateEnd").disabled = true;
//        document.getElementById("dateEvenement").disabled = true;
//        document.getElementById("sous_categorie").disabled = true;
//        document.getElementById("commentaire").disabled = true;
//        document.getElementById("submitChangeFormActivite").disabled = true;

        var activites = {!! json_encode($activites) !!};

        console.log(activites);

        $("#submitModalFormCreateActivite").click(function(e){
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
              url: "http://127.0.0.1:8000/admin/activites/storebyjson",
              data: {
                  description: jQuery('#titre').val(),
                  commentaire: jQuery('#commentaire').val(),
                  entreprise_id: jQuery('#entreprise_id').val(),
                  dossier_id: jQuery('#dossier_id').val()
              },
              dataType : 'json'

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

        $('#table-activites tbody').on( 'click', 'tr', function () {

                  data = table.row( this ).data();
                  console.log(data);
                  document.getElementById("description").value = data[1];

                  // Date Evenement

                  // Date Debut

                  // Date Fin

                  document.getElementById("commentaire").value = data[5];

                  $("#categorie").val(data[6]);
                  $('#categorie').trigger('change');

                  $("#sous_categorie").val(data[7]);
                  $('#sous_categorie').trigger('change');

                  $("#mode_contact").val(data[8]);
                  $('#mode_contact').trigger('change');

              });

  });

</script>


@endsection