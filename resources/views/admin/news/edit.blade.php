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
                <li><a href="{{ route('news.index') }}">Actualités</a></li>
                <li class="active">Editer</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <form action="{{ route('news.update', ['news' => $news->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-xs-9">
                        <div class="box box-primary">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="title">Titre de l'actualité</label>
                                    <input type="text" class="form-control" name="title" value="{{ $news->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="authors">Auteur(s) :</label>
                                    <input type="text" class="form-control" id="authors" name="authors" value="{{ $news->authors }}">
                                </div>
                                <div class="form-group">
                                    <label for="content">Contenu</label>
                                    <textarea class="form-control" id="tinyMCE" name="content">{{ $news->content }}</textarea>
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
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $id => $category)
                                            @if($news->category_id === $id)
                                            <option value="{{ $id }}" selected>{{ $category }}</option>
                                            @else
                                            <option value="{{ $id }}">{{ $category }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" class="form-control" name="tags" {{ $news->tags }}>
                                </div>
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