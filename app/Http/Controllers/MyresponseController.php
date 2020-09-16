<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Question_User;

class MyresponseController extends Controller
{
  /**
	* affiche les reponses d'un sondé
	*/
	public function show($link){
		$user = User::where('user_link', $link)->first();
		
		$date = explode(' ', $user['updated_at']);

		$jour = explode('-', $date[0]);
		$jour = $jour[2].'.'.$jour[1].'.'.$jour[0];

		$heure = explode(':', $date[1]);
		$heure = $heure[0].'.'.$heure[1];

		$questions = Question::all();

		$reponses = array();
		foreach($questions as $question){
			$reponse = array();
			if($question['numero_question']==1){
				$reponse['numero_question'] = $question['numero_question'];
				$reponse['libelle_question'] = $question['libelle_question'];
				$reponse['reponse_question'] = $user['email'];
			}
			else{
				$reponse['numero_question'] = $question['numero_question'];
				$reponse['libelle_question'] = $question['libelle_question'];
				$reponse['reponse_question'] = Question_User::where(['user_id' => $user['id'], 'question_id' => $question['id']])->first()->user_reponse;
			}
			array_push($reponses, $reponse);
		}

		return view('front.reponse', [
			'reponses' => $reponses,
			'jour' => $jour,
			'heure' => $heure
		]);
	}
}
