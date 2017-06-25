@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @foreach($msgs as $msg)
            <ul>
                <li>
                    {{ $msg->city}}
                </li>
                <li>
                    {{ $msg->activity }}
                </li>
                <li>
                    {{ $msg->tel }}
                </li>
                <li>
                    {{ $msg->mail }}
                </li>
            </ul>
        @endforeach
    </div>
@endsection