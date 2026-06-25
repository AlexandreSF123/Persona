<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuspectController extends Controller
{
    function index(){ 
        $suspect = new \App\Models\SuspectModel();

        return view('suspect.index', ['suspects'=>$suspect::all()]);
    }

    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'name' => 'required|min:3|max:255',
              ],
              [
                  'name.required' => 'O campo nome é obrigatório.',
                  'name.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
                  'name.max' => 'O campo nome deve conter no máximo 255 caracteres.',
              ]
      );

      if ($validator->fails()) {
          return redirect()
              ->route('suspect.index')
              ->withErrors($validator)
              ->withInput();
      }
        $suspect = new \App\Models\SuspectModel();
        $suspect::create($dados->all());

        //RECUPERANDO TODOS SUSPEITOS DO BANCO E ENVIANDO PARA A VIEW
				
        $suspects = new \App\Models\SuspectModel();

        return view('suspect.index', ['success'=>'Cadastrado!', 'suspects'=>$suspects::all()]);
       
    }
    function remove(string $id) {

        $suspect = new \App\Models\SuspectModel();
        $suspect::destroy($id);

        return view('suspect.index', ['success'=>'Removido!', 'suspects'=>$suspect::all()]);

    }
    function atualizar(string $id) {
        $suspect = new \App\Models\SuspectModel();
        $suspect = $suspect::find($id);

        return view('suspect.atualizar', ['suspect'=>$suspect]);
    }
    function save(Request $dados) {

        $suspect = new \App\Models\SuspectModel();
        $suspect = $suspect::find($dados->id);
        $suspect->update($dados->all());

        return view('suspect.index', ['success'=>'Atualizado!', 'suspects'=>$suspect::all()]);
    }
    
}
