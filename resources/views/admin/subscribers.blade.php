@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @foreach($data as $info)
            <ul>
                <li>
                    {{ $info->city}}
                </li>
                <li>
                    {{ $info->activity }}
                </li>
                <li>
                    {{ $info->tel }}
                </li>
                <li>
                    {{ $info->mail }}
                </li>
            </ul>
        @endforeach
    </div>
@endsection