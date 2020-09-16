<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Question_User;

class PublicController extends Controller
{
	/**
	*affiche le formulaire
	*/
	public function index()
	{
		$questions = Question::all();
		return view('front.index', ['questions' => $questions]);
	}

}
