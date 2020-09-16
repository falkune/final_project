<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
	/**
	*Create a new controller instance.
	*@return void
	**/
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	*affiche la page d'accueil de l'administateur
	**/
	public function index(){
		return view('back.accueil');
	}
	

	/*
	*permet la deconnexion de l'admin
	*/
	public function logout(){
		auth()->logout();
		return redirect('/login');
	}
}
