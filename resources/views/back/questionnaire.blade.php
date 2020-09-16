@extends('back.home')

@section('title')
Accueil
@endsection

@section('contenue')
	<table class="table-bordered small alert-dark">
		<thead class="text-uppercase table-dark table">
			<tr>
				<td class="question_numder">numero</td>
				<td class="question_body">libelle</td>
				<td class="question_answer">type</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($questions as $question)
				<tr>
					<td> {{ $question->numero_question }} </td>
					<td> {{ $question->libelle_question }} </td>
					<td> {{ $question->type_question }} </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
