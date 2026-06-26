<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    function index(){ 
        $guest = new \App\Models\GuestModel();

        return view('guest.index', ['guests'=>$guest::all()]);
    }

    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'name' => 'required|min:3|max:255',
                  'age' => 'required|min:0|max:120',
                  'height' => 'required|min:0|max:300',
                  'weight' => 'required|min:0|max:500',
                  'nacionality' => 'required|min:3|max:255',
                  'work' => 'required|min:3|max:255',
                  'skin_color' => 'required|min:3|max:255',
              ],
              
              [
                  'name.required' => 'The name is required for save.',
                  'name.min' => 'The name needs minimum 3 characters.',
                  'name.max' => 'The name needs maximum 255 characters.',
                  'age.required' => 'The age is required for save.',
                  'age.min' => 'The age needs minimum 0.',
                  'age.max' => 'The age needs maximum 120.',
                  'height.required' => 'The height is required for save.',
                  'height.min' => 'The height needs minimum 0.',
                  'height.max' => 'The height needs maximum 300.',
                  'weight.required' => 'The weight is required for save.',
                  'weight.min' => 'The weight needs minimum 0.',
                  'weight.max' => 'The weight needs maximum 500.',
                  'nacionality.required' => 'The nacionality is required for save.',
                  'nacionality.min' => 'The nacionality needs minimum 3 characters.',
                  'nacionality.max' => 'The nacionality needs maximum 255 characters.',
                  'work.required' => 'The work is required for save.',
                  'work.min' => 'The work needs minimum 3 characters.',
                  'work.max' => 'The work needs maximum 255 characters.',
                  'skin_color.required' => 'The skin color is required for save.',
                  'skin_color.min' => 'The skin color needs minimum 3 characters.',
                  'skin_color.max' => 'The skin color needs maximum 255 characters.',
              ]
      );

      if ($validator->fails()) {
          return redirect()
              ->route('guest.index')
              ->withErrors($validator)
              ->withInput();
      }
        $guest = new \App\Models\GuestModel();
        $guest::create($dados->all());

        //RECUPERANDO TODOS ALUNOS DO BANCO E ENVIANDO PARA A VIEW
				
        $guests = new \App\Models\GuestModel();

        return view('guest.index', ['success'=>'Cadastrado!', 'guests'=>$guests::all()]);
       
    }
    function remove(string $id) {

        $guest = new \App\Models\GuestModel();
        $guest::destroy($id);

        return view('guest.index', ['success'=>'Removed!', 'guests'=>$guest::all()]);

    }
    function update(string $id) {
        $guest = new \App\Models\GuestModel();
        $guest = $guest::find($id);

        return view('guest.update', ['guest'=>$guest]);
    }
    function save(Request $dados) {

        $guest = new \App\Models\GuestModel();
        $guest = $guest::find($dados->id);
        $guest->update($dados->all());

        return view('guest.index', ['success'=>'Updated!', 'guests'=>$guest::all()]);
    }
    

}