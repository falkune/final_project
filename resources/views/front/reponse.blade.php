@extends('layout.master')

@section('title')
  Mes reponses
@endsection

@section('content')
  <div id="reponse_container">
    <p>Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{$jour}} à {{$heure}} </p>
    @foreach ($reponses as $reponse)
      <div class="reponse">
        <h4>Question {{$reponse['numero_question']}}/20</h4>
        <div>{{$reponse['libelle_question']}}</div>
        <span>{{$reponse['reponse_question']}}</span>
      </div>
    @endforeach
  </div>
@endsection