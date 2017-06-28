@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Liste des adhérents
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Adhérents</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Read Mail</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-container="body" title="Delete">
                                    <i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-read-info">
                                <h5>Prénom : {{ $data->{ 'first-name' } }}</h5>
                                <h5>Nom : {{ $data->{ 'last-name' } }}</h5>
                                <h5>Téléphone : {{ $data->{ 'tel' } }}</h5>
                                <h5>Mail : {{ $data->{ 'mail' } }}</h5>
                                <h5>Activité : {{ $data->{ 'activity' } }}</h5>
                                <h5>Adresse : {{ $data->{ 'address' } }}</h5>
                                <h5>City : {{ $data->{ 'city' } }}</h5>
                            </div>
                            <!-- /.mailbox-read-info -->
                            <div class="mailbox-read-message">
                                {{ $data->message }}
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

