@extends('back.home')

@section('title')
Accueil
@endsection

@section('contenue')
	@foreach($users_responses as $user_response)
		<table class="table-bordered small alert-dark">
			<thead class="text-uppercase table-dark table">
				<tr>
					<td class="question_numder"> Numero </td>
					<td class="question_body"> Libelle </td>
					<td class="question_answer"> Reponse </td>
				</tr>
			</thead>
			<tbody>
				@foreach($user_response as $user)
					<tr>
						<td> {{ $user['numero_question'] }} </td>
						<td> {{ $user['libelle_question'] }} </td>
						<td> {{ $user['reponse_question'] }} </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endforeach
@endsection
