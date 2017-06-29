@extends('layouts.home')
@section('content')
    <div class="content-wrapper">
        Page is not defined
        <a href="{{ url('/') }}">Back to Home</a>
    </div>
@endsection

@section('scripts')
    <script>
        document.title = 'Page 404';
    </script>
@endsection