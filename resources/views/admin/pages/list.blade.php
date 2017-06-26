@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Liste des actualités publiées
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li class="active">Actualités</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Actualités</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Titre de la page</th>
                                        <th>Chemin dans l'URL</th>
                                        <th>Description</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Suppression</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pages as $article)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="mailbox-subject"><b><a href="{{ route('pages.edit', ['pages' => $article->id]) }}">{{ $article->title }}</a></b>
                                            <td class="mailbox-name">{{ $article->slug ?: 'Non spécifié' }}</td>
                                            </td>
                                            <td class="mailbox-date">{{ $article->description }}</td>
                                            <td class="mailbox-date">{{ $article->content }}</td>
                                            <td class="mailbox-star">
                                                @if(is_null($article->deleted_at))
                                                    <form action="{{ route('pages.trash', ['id' => $article->id]) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            Dépublier
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('pages.restore', ['id' => $article->id]) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            Publier
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('pages.destroy', ['pages' => $article->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Supprimer définitivement
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                        </div>
                        <div class="box-footer no-padding">
                            <div class="pull-right">
                                <div class="btn-group">
                                    {{ $pages->render() }}
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