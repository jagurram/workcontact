@extends('test')

@section('navbar')

    @include('components.topmenu.userpanel')

@endsection


@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Contacts",
        'comment' => "Fiche complete"]
    )

@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('storage/images/'.$employee_detail->phot) }}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $employee_detail->nom }} {{ $employee_detail->prenom }}</h3>

                    <p class="text-muted text-center">{{ $employee_detail->fonction }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Origine</b> <a class="pull-right">{{ $employee_detail->origine }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Telephone Fixe</b> <a class="pull-right">{{ $employee_detail->telephone_fixe }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Telephone Mobile</b> <a class="pull-right">{{ $employee_detail->telephone_mobile }}</a>

                        </li>

                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{ $employee_detail->email }}</a>
                        </li>

                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                    <p class="text-muted">{{ $employee_detail->adresse }}, {{ $employee_detail->ville }} ( {{ $employee_detail->code_postal }} ), {{ $employee_detail->pays }}</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>{{ $employee_detail->commentaire }}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        <div class="col-md-9">
            @include('back.dossiers.tab')
        </div>

       

    </div>
@endsection


