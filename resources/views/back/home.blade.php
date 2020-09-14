@extends('layouts.app')

@section('title')
  Home page
@endsection

@section('content')
  <div id="home_container">
  	<div id="left_side">
  		<a href=""> <img id="logo" src="{{ asset('images/bigscreen_logo.png') }}"> </a>
      
  		<ul>
  			<li> <a href="{{route('accueil')}}"> Accueil </a></li>
  			<li> <a href="{{route('questionnaire')}}"> Questionnaire </a></li>
  			<li> <a href="{{route('reponse')}}"> Reponses </a></li>
  		</ul>

      <a href="/deconnexion" class="badge-light"> <i class="fas fa-power-off"></i> Déconnexion</a>
  	</div>
  	<div id="right_side">
			@yield('contenue')
  	</div>
	</div>
@endsection
