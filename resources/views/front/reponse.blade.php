@extends('layout.master')

@section('title')
  Mes reponses
@endsection

@section('content')
  <div id="front_reponse_container">
    <h1> Bienvenue </h1>
    <p>Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{$jour}} à {{$heure}} </p>
    @foreach ($reponses as $reponse)
      <div>Question {{$reponse['numero_question']}}/20</div>
      {{$reponse['libelle_question']}}
      <p>{{$reponse['reponse_question']}}</p>
    @endforeach
  </div>
@endsection