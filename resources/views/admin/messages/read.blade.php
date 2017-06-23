@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <a href="{{ url()->previous() }}">Retour à la page précédente</a>
        <ul>
            <li>{{ $msg->id }}</li>
            <li>{{ $msg->subject }}</li>

        </ul>
    </div>
@endsection