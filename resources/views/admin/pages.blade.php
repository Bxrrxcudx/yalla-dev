@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @foreach($msgs as $msg)
            <ul>
                <li>
                {{ $msg->title }}
                </li>
                <li>
                    {{ $msg->description }}
                </li>
                <li>
                    {{ $msg->content }}
                </li>
                <li>
                    {{ $msg->authors }}
                </li>
            </ul>
        @endforeach
    </div>
@endsection