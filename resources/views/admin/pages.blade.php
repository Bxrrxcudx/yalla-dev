@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @foreach($data as $info)
            <ul>
                <li>
                {{ $info->title }}
                </li>
                <li>
                    {{ $info->description }}
                </li>
                <li>
                    {{ $info->content }}
                </li>
                <li>
                    {{ $info->slug }}
                </li>
            </ul>
        @endforeach
    </div>
@endsection