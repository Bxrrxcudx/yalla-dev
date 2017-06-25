@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @foreach($data as $info)
            <ul>
                <li>
                {{ $info->mail }}
                </li>
            </ul>
        @endforeach
    </div>
@endsection