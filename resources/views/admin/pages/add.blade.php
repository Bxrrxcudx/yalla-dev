@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ajouter une nouvelle actualité
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="{{ route('pages.index') }}">Pages</a></li>
                <li class="active">Ajouter</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <form action="{{ route('pages.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-xs-9">
                        <div class="box box-primary">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="title">Titre de l'actualité</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="authors">Chemin dans l'URL :</label>
                                    <input type="text" class="form-control" id="slug" name="slug">
                                </div>
                                <div class="form-group">
                                    <label for="authors">Description :</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="form-group">
                                    <label for="content">Contenu</label>
                                    <textarea class="form-control" id="tinyMCE" name="content"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Options</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="categories">Catégories</label>
                                    <input type="text" class="form-control" name="categories">
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" class="form-control" name="tags">
                                </div>
                                <input type="submit" value="Publier la page">
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection