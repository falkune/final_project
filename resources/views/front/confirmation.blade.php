@extends('layout.master')

@section('title')
  Confirmation
@endsection

@section('content')
  <div id="front_reponse_container">
    <h1> Bienvenue </h1>
    <p>{{$message}}</p>
    <a href="{{$lien}}">{{$lien}}</a>
  </div>
@endsection