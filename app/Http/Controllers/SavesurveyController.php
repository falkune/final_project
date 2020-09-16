<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Question_User;

class SavesurveyController extends Controller
{
  public function store(Request $request){
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

		$user_id = User::where('email', request('question_1'))->first()->id;
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
			
			$message =  "Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à votre investissement, nous vous préparons une application toujours plus facile à utiliser, seul ou en famille. Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez cette adresse : ";

			$lien = "http://final_project.com/mesReponses/".$link;

			return view('front.confirmation', [
				'message' => $message,
				'lien' => $lien
			]);
		}
		else{
			$user = User::find($user_id);
			$link = $user->user_link;

			$message = "Merci d'avoir bien répondu à l'enquette pour consulter vos réponses cliquer sur le lien ci dessous : ";

			$lien = "http://final_project.com/mesReponses/".$link;

			return view('front.confirmation', [
				'message' => $message,
				'lien' => $lien
			]);
		}
	}
}
