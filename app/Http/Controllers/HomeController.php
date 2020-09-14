<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Question_User;
use Response;

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
	 *affiche la page d'accueil de l'administateur
	*/
	public function index(){
		return view('back.accueil');
	}

	/**
	 *affiche la page d'accueil de l'administateur
	*/
	public function accueil(){
		// pour chaque materiel de la question numero 6 on compte son nombre d'utilisateur 
		$Occulus_Rift_s = Question_User::where('user_reponse', 'Occulus Rift/s')->count();
		$HTC_Vive = Question_User::where('user_reponse', 'HTC Vive')->count();
		$Windows_Mixed_Reality = Question_User::where('user_reponse', 'Windows Mixed Reality')->count();
		$PSVR = Question_User::where('user_reponse', 'PSVR')->count();

		// pour chaque materiel de la question numero 7 on compte son nombre d'utilisateur 
		$SteamVR = Question_User::where('user_reponse', 'SteamVR')->count();
		$Occulus_store = Question_User::where('user_reponse', 'Occulus store')->count();
		$Viveport = Question_User::where('user_reponse', 'Viveport')->count();
		$Playstation_VR = Question_User::where('user_reponse', 'Playstation VR')->count();
		$Google_Play = Question_User::where('user_reponse', 'Google Play')->count();
		$Windows_store = Question_User::where('user_reponse', 'Windows store')->count();

		// pour chaque materiel de la question numero 10 on compte son nombre d'utilisateur 
		$direct_tv = Question_User::where('user_reponse', 'regarder des émissions TV en direct')->count();
		$watch_movies = Question_User::where('user_reponse', 'regarder des films')->count();
		$play_solo = Question_User::where('user_reponse', 'jouer en solo')->count();
		$play_team = Question_User::where('user_reponse', 'jouer en team')->count();


		/* pour les questions allant de 11 à 15 on calcule la moyenne de chacune */

		// recuperation de l'identifiant de la question 11
		$id_11 = Question::where('numero_question', 11)->first()->id;
		$moyenne_question_11 = Question_User::where('question_id', $id_11)->avg('user_reponse');

		// recuperation de l'identifiant de la question 12
		$id_12 = Question::where('numero_question', 12)->first()->id;
		$moyenne_question_12 = Question_User::where('question_id', $id_12)->avg('user_reponse');


		// recuperation de l'identifiant de la question 13
		$id_13 = Question::where('numero_question', 13)->first()->id;
		$moyenne_question_13 = Question_User::where('question_id', $id_13)->avg('user_reponse');


		// recuperation de l'identifiant de la question 14
		$id_14 = Question::where('numero_question', 14)->first()->id;
		$moyenne_question_14 = Question_User::where('question_id', $id_14)->avg('user_reponse');

		// recuperation de l'identifiant de la question 15
		$id_15 = Question::where('numero_question', 15)->first()->id;
		$moyenne_question_15 = Question_User::where('question_id', $id_15)->avg('user_reponse');

		/*pour chaque groupe de question on range les valeur dans un tableau afin de pouvoir les utiliser avec la biblioteque chart js pour dessider nos graphiques*/
		$question_6 = [$Occulus_Rift_s, $HTC_Vive, $Windows_Mixed_Reality, $PSVR];
		$question_7 = [$SteamVR, $Occulus_store, $Viveport, $Playstation_VR, $Google_Play, $Windows_store];
		$question_10 = [$direct_tv, $watch_movies, $play_solo, $play_team];
		$question_11_to_15 = [$moyenne_question_11, $moyenne_question_12, $moyenne_question_13, $moyenne_question_14, $moyenne_question_15];
		
		// on retourne du json pour pouvoir l'exploiter avec le javascript
		return Response::json(array('question_6' => $question_6, 'question_7' => $question_7, 'question_10' => $question_10, 'question_11_to_15' => $question_11_to_15));
	}

	/*
	*retourne le questionnaire
	*/
	public function questionnaire(){
		$questions = Question::all();
		return view('back.questionnaire', ['questions' => $questions]);
	}

	/*
	*retourne l'ensempble des reponses des sondés 
	*/
	public function reponse(){
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

	/*
	*permet la deconnexion de l'admin
	*/
	public function deconnexion(){
		auth()->logout();
		return redirect('/login');
	}
}
