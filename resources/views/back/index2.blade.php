@extends('test')

@section('navbar')

    @include('components.topmenu.userpanel')

@endsection

@section('content-header')

    @include('components.content.breadcrumb',[
        'title' => "Dashboard",
        'comment' => "rapide coup d'oeil au PKI"]
    )

@endsection

@section('content')

    @include('components.content.statbox',[
        'entreprises_count' => $entreprises_count,
        'contact_count => $contacts_count']
    )

@endsection