<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Question_User;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('back.accueil');
	}

	public function questionnaire(){
		$questions = Question::all();
		return view('back.questionnaire', ['questions' => $questions]);
	}

	public function reponse(){
		$all_users = User::where('user_link', '!=', NULL)->get();
		$questions = Question::all();

		$user_responses = array(); //tableau des reponses du visiteur
		foreach($all_users as $user){
			$id = $user['id'];
			// pour chaque sondé on recupere son email 
			$user_email = User::where('id', $id)->first()->email;
			$reponses = array();

			foreach($questions as $question){
				$reponse = array();
				if($question['numero_question']==1){
					$reponse['numero_question'] = $question['numero_question'];
					$reponse['libelle_question'] = $question['libelle_question'];
					$reponse['reponse_question'] = $user_email;
				}
				else{
					$reponse['numero_question'] = $question['numero_question'];
					$reponse['libelle_question'] = $question['libelle_question'];
					$reponse['reponse_question'] = Question_User::where(['user_id' => $id, 'question_id' => $question['id']])->first()->user_reponse;
				}
				array_push($reponses, $reponse);
			}
			array_push($user_responses, $reponses);
		}
		return view('back.reponse', ['user_responses' => $user_responses]);
	}
}
