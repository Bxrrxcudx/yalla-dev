@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <form action="{{ url('admin/news/post') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titre">
            </div>
            <div class="form-group">
                <label for="authors">Auteurs :</label>
                <input type="text" class="form-control" id="authors" name="authors" placeholder="Auteurs">
            </div>
            <div class="form-group">
                <label for="slug">Chemin dans l'url :</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Chemin">
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Décrire en 1 ligne">
            </div>
            <div class="form-group">
                <label for="content">Contenu du sujet :</label>
                <textarea name="content" id="" class="form-control" placeholder="Les détails ..."></textarea>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection