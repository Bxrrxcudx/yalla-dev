@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ajouter une nouvelle page
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="{{ route('pages.index') }}">Pages</a></li>
                <li class="active">Ajouter</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                @include('admin.errors')
                <form action="{{ route('pages.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="title">Titre de la page</label>
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description :</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
                                </div>
                                <div class="form-group">
                                    <label for="content">Contenu</label>
                                    <textarea class="form-control" id="tinyMCE" name="content" value="{{old('content')}}"></textarea>
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
                                <input type="submit" value="Publier">
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection