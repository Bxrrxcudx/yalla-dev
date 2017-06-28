@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Adhérents</h3>

                        </div>
                        <div class="box-body">

                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Téléphone</th>
                                            <th>Mail</th>
                                            <th>Activité</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $info)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="mailbox-subject"><b><a
                                                            href="{{ route('subscribers.show', ['subscribers' => $info->id]) }}">{{ $info->mail }}</a></b>
                                            <td class="mailbox-name">{{ $info->mail }}</td>
                                            </td>
                                            <td class="mailbox-date">{{ $info->tel }}</td>
                                            <td class="mailbox-date">{{ $info->mail }}</td>
                                            <td class="mailbox-date">{{ $info->activity }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table -->
                                <div>
                                    <button class="btn btn-default"><a href="{{ route('subscribers.create') }}">Ajouter un membre</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer no-padding">
                            <div class="pull-right">
                                <div class="btn-group">

                                </div>
                                <!-- /.btn-group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection