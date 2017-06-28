@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Liste des catégories disponibles
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="{{ route('news.index') }}">Actualités</a></li>
                <li class="active">Catégories</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Catégories</h3>

                        </div>
                        <div class="box-body">

                            <div class="table-responsive">

                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom de la catégorie</th>
                                        <th>URL / slug</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td><b>{{ $category->name }}</b></td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-default">
                                                        Modifier
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
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
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter une nouvelle catégorie</h3>

                        </div>
                        <div class="box-body">
                            <form action="{{ route('categories.store') }}"
                                  method="POST">
                                {{ csrf_field() }}
                                <div class="form-group pull-left">
                                    <label for="name">Nom de catégorie</label>
                                    <input type="text" name="name" id="name">
                                </div>

                                <button class="btn btn-default pull-right" type="submit">
                                    Ajouter une catégorie
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection