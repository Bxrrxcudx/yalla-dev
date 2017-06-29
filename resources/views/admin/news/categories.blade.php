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

                <div class="col-md-8">
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
                                                <button class="btn btn-default btn-sm btn-edit">
                                                    Modifier
                                                </button>
                                            </td>
                                            <td>
                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Supprimer définitivement
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <tr class="edit-form" style="display: none;">
                                            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <td class="cat-name">
                                                    <label for="name"></label>
                                                    <input type="text" name="name" value="{{ $category->name }}"/>
                                                </td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-default btn-sm">
                                                        Valider
                                                    </button>
                                                </td>
                                                <td>

                                                </td>
                                            </form>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
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

                                <button class="btn btn-default" type="submit">
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

@section('scripts')

    <script>

        var btn_edit = document.querySelectorAll('.btn-edit'),
            edit_form = document.querySelectorAll('.edit-form');

        console.log(btn_edit);
        console.log(edit_form);

        for (var i = 0; i < btn_edit.length; i++){
            showEditForm(i);
        }

        function showEditForm(index){
            btn_edit[index].addEventListener('click', function () {
                if (edit_form[index].style.display === 'none') {
                    edit_form[index].style.display = '';
                } else {
                    edit_form[index].style.display = 'none';
                }
            })
        }



    </script>

@endsection