@extends('back.home')

@section('title')
Accueil
@endsection

@section('contenue')
	<div id="graphics">
		<div class="graphic"><canvas id="myChart1"></canvas></div>
		<div class="graphic"><canvas id="myChart2"></canvas></div>
		<div class="graphic"><canvas id="myChart3"></canvas></div>
		<div class="graphic"><canvas id="myChart4"></canvas></div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script type="text/javascript" src="js/style.js"></script>
@endsection
