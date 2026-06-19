<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Guest extends Controller
{
    function index(){ 
        $guest = new \App\Models\Guest();

        return view('guest.index', ['guests'=>$guest::all()]);
    }

    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'name' => 'required|min:3|max:255',
              ],
              [
                  'name.required' => 'The area name is required for save.',
                  'name.min' => 'The area name needs minimum 3 characters.',
                  'name.max' => 'The area name needs maximum 255 characters.',
              ]
      );

      if ($validator->fails()) {
          return redirect()
              ->route('guest.index')
              ->withErrors($validator)
              ->withInput();
      }
        $guest = new \App\Models\Guest();
        $guest::create($dados->all());

        //RECUPERANDO TODOS ALUNOS DO BANCO E ENVIANDO PARA A VIEW
				
        $guests = new \App\Models\Guest();

        return view('guest.index', ['success'=>'Cadastrado!', 'guests'=>$guests::all()]);
       
    }
    function remove(string $id) {

        $guest = new \App\Models\Guest();
        $guest::destroy($id);

        return view('guest.index', ['success'=>'Removed!', 'guests'=>$guest::all()]);

    }
    function atualizar(string $id) {
        $guest = new \App\Models\Guest();
        $guest = $guest::find($id);

        return view('guest.update', ['guest'=>$guest]);
    }
    function save(Request $dados) {

        $guest = new \App\Models\Guest();
        $guest = $guest::find($dados->id);
        $guest->update($dados->all());

        return view('guest.index', ['success'=>'Updated!', 'guests'=>$guest::all()]);
    }
    

}