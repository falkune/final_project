@extends('layout.master')

@section('title')
  Confirmation
@endsection

@section('content')
  <div id="confirmation_container">
    <p>{{$message}}</p>
    <a href="{{$lien}}">Vos réponses ici</a>
  </div>
@endsection