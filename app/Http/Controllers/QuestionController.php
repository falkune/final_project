<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;


class QuestionController extends Controller
{
  /*
	*retourne le questionnaire
	*/
	public function index(){
		$questions = Question::all();
		return view('back.questionnaire', ['questions' => $questions]);
	}
}
