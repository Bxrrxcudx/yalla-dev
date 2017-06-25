@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @foreach($msgs as $msg)
            <ul>
                <li>
                {{ $msg->mail }}
                </li>
            </ul>
        @endforeach
    </div>
@endsection