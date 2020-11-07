<div class="tab-pane active" id="tab_1">
                <!-- /DataTable with features -->
                <div class="box-body">
                    <table id="table-dossiers" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Commentaire</th>
                                <th>Crée</th>
                                <th>Update</th>
                                <th>Resolution</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dossiers as $doc)
                            <tr>
                                <td>{{ $doc->id  }}</td>
                                <td>{{ $doc->description  }}</td>
                                <td>{{ $doc->commentaire  }}</small></td>
                                
                                
                                <td>{{ $doc->created_at  }}</small></td>
                                <td>{{ $doc->updated_at  }}</small></td>
                                
                                <td>
                                     @if($doc->isResolved)
                                        <a class="btn btn-success glyphicon glyphicon-ok btn-xs" href=""></a>
                                    @else
                                        <a class="btn btn-success glyphicon glyphicon-hourglass btn-xs" href=""></a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success glyphicon glyphicon-pencil btn-xs" href="{{ route('dossiers.edit', $doc->id )}}"></a>
                                    <a class="btn btn-danger glyphicon glyphicon-trash btn-xs" href="{{ route('dossiers.delete',$doc->id )}}"></a>
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
                    <form method="post" action="{{ route('dossiers.storejson.entreprises') }}" id="formDossierCreation">
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

                                            @include('components.content.form.form-group-row' , [
                                                'variable_name' => 'description',
                                                'title' => 'Description',
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
                                            <button id="closedossierform" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button  class="btn btn-success" id="submitModalFormDossier">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
</div>