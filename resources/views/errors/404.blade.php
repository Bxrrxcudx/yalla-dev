@if(session_status() == 1)
    @extends('layouts.admin')
@elseif (session_status() == 0)
    @extends('layouts.app')
@endif
@section('content')
    <div class="content-wrapper">
        Page is not defined
    </div>
@endsection