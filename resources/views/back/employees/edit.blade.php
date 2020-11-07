@extends('back.layout')


@section('header_logo')
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>MMWL</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Manage</b>MyWorkLife</span>
    </a>
@endsection

@section('header_searchbar')
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
@endsection


@section('header_messages')
    <!-- Messages: style can be found in dropdown.less-->
    <li class="dropdown messages-menu">
        <!-- Menu toggle button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <!-- User Image -->
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                            <!-- Message title and timestamp -->
                            <h4>
                                Support Team
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <!-- The message -->
                            <p>Why not buy a new awesome theme?</p>
                        </a>
                    </li>
                    <!-- end message -->
                </ul>
                <!-- /.menu -->
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
    </li>
@endsection

@section('header_notifications')
    <!-- Notifications Menu -->
    <li class="dropdown notifications-menu">
        <!-- Menu toggle button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                    <li><!-- start notification -->
                        <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                    </li>
                    <!-- end notification -->
                </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
        </ul>
    </li>
@endsection

@section('header_tasks')
    <li class="dropdown tasks-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">9</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 9 tasks</li>
            <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                    <li><!-- Task item -->
                        <a href="#">
                            <!-- Task title and progress text -->
                            <h3>
                                Design some buttons
                                <small class="pull-right">20%</small>
                            </h3>
                            <!-- The progress bar -->
                            <div class="progress xs">
                                <!-- Change the css width attribute to simulate progress -->
                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- end task item -->
                </ul>
            </li>
            <li class="footer">
                <a href="#">View all tasks</a>
            </li>
        </ul>
    </li>
@endsection






@section('content_header')

    <h1>
        Employees
        <small>Formulaire de saisie</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employees</li>
        <li class="active">Edition</li>
    </ol>

@endsection

@section('content_flash_message')


    @include('flash::message')


@endsection

@section('content_main')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edition</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('employees.update', ['id' => $employee->id] )}}" aria-label="{{ __('Edit') }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="box-body">

                <div class="form-group">
                    <label for="pro_metier">[PRO] Fonction</label>
                    <input type="text" class="form-control{{ $errors->has('pro_metier') ? ' is-invalid' : '' }}"
                           name="pro_metier" id="pro_email" value="{{old('pro_metier', $employee->fonction)}}">

                    @if ($errors->has('pro_metier'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_metier') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="pro_email">[PRO] Email</label>
                    <input type="text" class="form-control{{ $errors->has('pro_email') ? ' is-invalid' : '' }}"
                           name="pro_email" id="pro_email" value="{{old('pro_email', $employee->email)}}">

                    @if ($errors->has('pro_email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="pro_telephone_fixe">[PRO] Telephone Fixe</label>
                    <input type="text" class="form-control{{ $errors->has('pro_telephone_fixe') ? ' is-invalid' : '' }}"
                           name="pro_telephone_fixe" id="pro_telephone_fixe" value="{{old('pro_telephone_fixe', $employee->telephone_fixe)}}">

                    @if ($errors->has('pro_telephone_fixe'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_telephone_fixe') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="pro_telephone_mobile">[PRO] Telephone Mobile</label>
                    <input type="text" class="form-control{{ $errors->has('pro_telephone_mobile') ? ' is-invalid' : '' }}"
                           name="pro_telephone_mobile" id="pro_telephone_mobile" value="{{old('pro_telephone_mobile', $employee->telephone_mobile)}}">

                    @if ($errors->has('pro_telephone_mobile'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_telephone_mobile') }}</strong>
                        </span>
                    @endif
                </div>



                <div class="form-group">
                    <label for="pro_commentaire">Commentaire</label>
                    <input type="text" class="form-control{{ $errors->has('pro_commentaire') ? ' is-invalid' : '' }}"
                           name="pro_commentaire" id="pro_commentaire" value="{{old('pro_commentaire', $employee->commentaire)}}">

                    @if ($errors->has('pro_commentaire'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_commentaire') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
    <!-- /.box -->

@endsection

@section('rightbar_home')
    <h3 class="control-sidebar-heading">Recent Activity</h3>
    <ul class="control-sidebar-menu">
        <li>
            <a href="javascript:;">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                    <p>Will be 23 on April 24th</p>
                </div>
            </a>
        </li>
    </ul>

    <!-- /.control-sidebar-menu -->

    <h3 class="control-sidebar-heading">Tasks Progress</h3>
    <ul class="control-sidebar-menu">
        <li>
            <a href="javascript:;">
                <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
                </h4>

                <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
            </a>
        </li>
    </ul>
@endsection

@section('rightbar_parameter')
    <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
            <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
                Some information about this general settings option
            </p>
        </div>
        <!-- /.form-group -->
    </form>
@endsection