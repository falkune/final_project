@extends('layout.master')

@section('title')
  Page sondage
@endsection

@section('content')
  <div id="front_index_container">
    <div id="questions">
      <div class="footer">
        <img id="logoimg" src="{{ asset('images/bigscreen_logo.png') }}">
        <p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>
      </div>
      <form action="{{ url('save') }}" method="POST">
        @csrf
        @foreach ($questions as $question)
          <div class="question">
            <div>Question {{$question->numero_question}}/20</div>
            <label class="libelle_question">{{$question->libelle_question}}</label>
            {{-- pour les questions de type "A" on recupere la liste des reponse possible dans la table listereponses et on presente sous forme de liste deroulante--}}
            @if ($question->type_question == "A")
              <select name="question_{{$question->numero_question}}">
                <option value="">Selectionnez une valeur</option>
                @foreach ($question->listereponses as $choix)
                  <option value="{{$choix->libelle_choix}}"> {{$choix->libelle_choix}} </option>
                @endforeach
              </select>
              {{-- affichage des erreurs apres validation par l'utilisateur --}}
              @if($errors->has('question_'.$question->numero_question))
                <p>{{$errors->first('question_'.$question->numero_question)}}</p>
              @endif
            @endif
            {{-- pour les questions de type "B" on on affiche un champ input de type texte ou l'utilisateur va entrer sa reponse --}}
            @if ($question->type_question == "B")
              <input type="text" name="question_{{$question->numero_question}}" value="{{old('question_'.$question->numero_question)}}">
              {{-- affichage des erreurs apres validation par l'utilisateur --}}
              @if($errors->has('question_'.$question->numero_question))
                <p>{{$errors->first('question_'.$question->numero_question)}}</p>
              @endif
            @endif
            {{-- pour les questions de type "C" on propose un champ de type number de  valeurs compris entre 1 et 5 --}}
            @if ($question->type_question == "C")
              <input type="number" name="question_{{$question->numero_question}}" min="1" max="5"  value="{{old('question_'.$question->numero_question)}}">
              {{-- affichage des erreurs apres validation par l'utilisateur --}}
              @if($errors->has('question_'.$question->numero_question))
                <p>{{$errors->first('question_'.$question->numero_question)}}</p>
              @endif
            @endif
          </div>
        @endforeach
        <div class="footer">
          <input id="save_btn" type="submit" value="Finaliser"/>
        </div>
      </form>
    </div>
  </div>
@endsection