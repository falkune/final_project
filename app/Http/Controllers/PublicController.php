<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Question_User;

class PublicController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$questions = Question::all();
		return view('front.index', ['questions' => $questions]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'question_1' => 'required|max:255|email|exists:users,email',
			'question_2' => 'required|max:255',
			'question_3' => 'required',
			'question_4' => 'required',
			'question_5' => 'required|max:255',
			'question_6' => 'required',
			'question_7' => 'required',
			'question_8' => 'required',
			'question_9' => 'required',
			'question_10' => 'required',
			'question_11' => 'required',
			'question_12' => 'required',
			'question_13' => 'required',
			'question_14' => 'required',
			'question_15' => 'required',
			'question_16' => 'required',
			'question_17' => 'required',
			'question_18' => 'required',
			'question_19' => 'required',
			'question_20' => 'required|max:255',
		]);

		$user_id = User::where('email', request('question_1'))->first()->id; // l'id de l'utilisateur
		$user_link = User::where('email', request('question_1'))->first()->user_link;
		if($user_link === NULL){
			$link = uniqid();
			$user = User::find($user_id);
			$user->user_link = $link;
			$user->save();

			for($i = 2; $i <= 20; $i++){
				$id_question = Question::where('numero_question', $i)->first()->id;
				Question_User::insert([ 
					['user_id' => $user_id, 'question_id' => $id_question, 'user_reponse' => request('question_'.$i)]
				]);
			}
			
			$message =  "oute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à votre investissement, nous vous préparons une application toujours plus facile à utiliser, seul ou en famille. Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez cette adresse : ";

			$lien = "http://final_project.com/mesReponses/".$link;

			return view('front.confirmation', [
				'message' => $message,
				'lien' => $lien
			]);
		}
		else{
			$user = User::find($user_id);
			$link = $user->user_link;

			$message = "vous avez deja repondu à l'enquette vous pouvez consulter vos reponses sur cette adresse : ";

			$lien = "http://final_project.com/mesReponses/".$link;

			return view('front.confirmation', [
				'message' => $message,
				'lien' => $lien
			]);
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($link)
	{
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
