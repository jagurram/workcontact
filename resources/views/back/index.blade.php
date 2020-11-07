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
                                <img src="{{ asset('storage/'. Auth::user()->photo_path ) }}" class="img-circle" alt="User Image">
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




@section('sidebar_menu')
    <li class="header">Navigation</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="{{ route('admin') }}"><i class="fa fa-link"></i> <span>Home</span></a></li>
    {{--<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>--}}


    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Entreprises</span>
            <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('entreprises.index') }}">Index</a></li>
            <li><a href="{{ route('entreprises.create') }}">Create</a></li>
        </ul>
    </li>

@endsection

@section('content_header')
    <h1>
        Dashboard
        <small>resumé des informations stockés</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>

    </ol>
@endsection


@section('content_flash_message')


@endsection

@section('content_main')
    <!-- Small boxes (Stat box) -->
    <div class="row">

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $entreprises_count }}</h3>

                    <p>Entreprises</p>
                </div>
                <div class="icon">
                    <i class="ion ion-business"></i>
                </div>
                <a href="{{ route('entreprises.index') }}" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>{{ $contacts_count }}</h3>

                    <p>Contacts</p>
                </div>
                <div class="icon">

                    <a href="{{ route('contacts.index') }}">
                        <i class="ion ion-person"></i>
                    </a>

                </div>
                <a href="{{ route('contacts.index') }}" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>Offres emplois</p>
                </div>
                <div class="icon">
                    <i class="ion ion-paper"></i>
                </div>
                <a href="#" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Candidatures</p>
                </div>
                <div class="icon">
                    <i class="ion ion-send"></i>
                </div>
                <a href="#" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
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