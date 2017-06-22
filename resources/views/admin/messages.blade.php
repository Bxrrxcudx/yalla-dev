@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @foreach ($msgs as $msg)
            <ul>
                <li><a href="{{url('/admin/messages/'.$msg->id)}}">{{ $msg->subject }}</a></li>
            </ul>
        @endforeach

        <form action="{{ route('messages.store') }}" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="last_name">Nom</label>
                <input type="text" name="last_name" id="last_name">
            </div>
            <div>
                <label for="first_name">Prénom</label>
                <input type="text" name="first_name" id="first_name">
            </div>
            <div>
                <label for="mail">E-mail</label>
                <input type="text" name="mail" id="mail">
            </div>
            <div>
                <label for="subject">Sujet</label>
                <input type="text" name="subject" id="subject">
            </div>
            <div>
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="50" rows="10"></textarea>
            </div>
            <input type="submit" value="Envoyer">
        </form>

    </div>
@endsection

