<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Question_User;

class ResponseController extends Controller
{
	/*
	*retourne l'ensempble des reponses des sondés 
	*/
  public function index(){
		$all_users = User::where('user_link', '!=', NULL)->get();// l'esemble des sondés

		$questions = Question::all();// l'ensemble des questions du sondage

		/*initialisation du tableau pour contenir les réponses de tous les sondés. Ce tableau contiendra plusieurs petit tableaux qui correpondrons à l'ensemble des reponses d'un sondé*/
		$users_responses = array();

		foreach($all_users as $user){

			$user_email = User::where('id', $user['id'])->first()->email;// le mail du sondé iterer

			$user_responses = array();// initialisation du tableau qui va contenir l'ensemble des reponses du sondé

			foreach($questions as $question){
				$response = array(); // initialisation du tableau pour chaque question

				if($question['numero_question']==1){
					$response['numero_question'] = $question['numero_question'];
					$response['libelle_question'] = $question['libelle_question'];
					$response['reponse_question'] = $user_email;
				}
				else{
					$response['numero_question'] = $question['numero_question'];
					$response['libelle_question'] = $question['libelle_question'];
					$response['reponse_question'] = Question_User::where(['user_id' => $user['id'], 'question_id' => $question['id']])->first()->user_reponse;
				}
				array_push($user_responses, $response);
			}
			array_push($users_responses, $user_responses); // on ajoute le tableau 
		}
		return view('back.reponse', ['users_responses' => $users_responses]);
	}
}
