@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modifier une actualité
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="{{ route('pages.index') }}">Actualités</a></li>
                <li class="active">Editer</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                @include('admin.errors')
                <form action="{{ route('pages.update', $pages->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-xs-9">
                        <div class="box box-primary">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="title">Titre de l'actualité</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $pages->title) }}">
                                </div>
                                <div class="form-group">
                                    <label for="authors">Description :</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $pages->description) }}">
                                </div>
                                <div class="form-group">
                                    <label for="content">Contenu</label>
                                    <textarea class="form-control" id="tinyMCE" name="content">{{ old('content', $pages->content) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Publier la page</h3>
                            </div>
                            <div class="box-body">
                                <input type="submit" value="Publier la modification">
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection