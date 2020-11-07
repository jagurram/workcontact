 <!-- /.tab-pane -->
 {{--BOX POUR LA LISTE DES EMPLOYEES--}}
            <div class="tab-pane" id="tab_2">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Employees</h3>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Contact ID</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Fonction</th>
                                <th>Fixe</th>
                                <th>Mobile</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $emp)
                                <tr>
                                    <td> ?? a programmer </td>
                                    <td>{{ $emp->contact->nom  }}</td>
                                    <td>{{ $emp->contact->prenom  }}</td>
                                    <td>{{ $emp->fonction  }}</td>
                                    <td>{{ $emp->telephone_fixe  }}</td>
                                    <td>{{ $emp->telmephone_mobile  }}</td>
                                    <td>
                                        <a class="btn btn-success glyphicon glyphicon-pencil btn-xs" href="{{ route('employees.edit',$emp->id )}}"></a>
                                        <a class="btn btn-danger glyphicon glyphicon-trash btn-xs" href="{{ route('employees.delete',$emp->id )}}"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-body -->

                    <div class="box-footer clearfix">

                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalFormContact" id="open">Cree un Contact</button>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalFormSelectEmployee" id="open">Ajouter un employee</button>
                        <button type="button" class="btn btn-info btn-sm" id="create_employee" href="{{ route('employees.create',$entreprise_detail->id) }}">Creer un employee</button>

                        <a href="{{ route('employees.create',$entreprise_detail->id) }}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                     
                        {{--FORMULAIRE  SELECTION DES EMPLOYEES--}}
                        <form method="post" action="{{ route('employees.addcontact') }}" id="formSelectEmployee">
                        @csrf
                        <!-- Modal -->
                            <div class="modal" tabindex="-1" role="dialog" id="modalFormSelectEmployee">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="alert alert-danger" style="display:none"></div>
                                        <div class="modal-header">

                                            <h5 class="modal-title"><b>Contact à promouvoir en tant qu'employées :</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    @include('components.content.form.dropdown' , [
                                                        'name' => 'selectEmployeeBox',
                                                        'title' => "",
                                                        'contacts' => $contacts
                                                    ])
                                                </div>

                                            </div>
                                            <input type="hidden" id="entreprise" name="entreprise" value="{{ $entreprise_detail->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button  class="btn btn-success" id="submitModalFormSelect">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{--FORMULAIRE  CREATION DE CONTACT RAPIDE--}}
                        <form method="post" action="{{ route('contacts.storejson') }}" id="formCreateContact">
                        @csrf
                        <!-- Modal -->
                            <div class="modal" tabindex="-1" role="dialog" id="modalFormContact">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div id="alert-danger-contact" class="alert alert-danger" style="display:none"></div>
                                    <div id="alert-success-contact" class="alert alert-success" style="display:none"></div>
                                        <div class="modal-header">

                                            <h5 class="modal-title">Crée un contact rapide</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                
                                                @include('components.content.form.inputhidden' , [
                                                    'name' => 'user_id',
                                                    'valeur' => $entreprise_detail->user_id, 
                                                ])
                                                
                                                @include('components.content.form.form-group-row' , [
                                                    'variable_name' => 'nom',
                                                    'title' => 'Nom',
                                                    'type' => 'text',
                                                    'oldvalue' => '',
                                                    'required' => 'required' 
                                                ])

                                                @include('components.content.form.form-group-row' , [
                                                    'variable_name' => 'prenom',
                                                    'title' => 'Prenom',
                                                    'type' => 'text',
                                                    'oldvalue' => '',
                                                    'required' => '' 
                                                ])

                                                @include('components.content.form.form-group-row' , [
                                                    'variable_name' => 'fonction',
                                                    'title' => 'Fonction',
                                                    'type' => 'text',
                                                    'oldvalue' => '',
                                                    'required' => '' 
                                                ])
                                                                                        
                                                                                                                            
                                            </div>
                                        <div class="modal-footer">
                                            <button id="closeContactForm" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button  class="btn btn-success" id="submitModalFormCreateContact">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>