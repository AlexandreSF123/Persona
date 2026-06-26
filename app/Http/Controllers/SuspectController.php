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
                  'age' => 'required|integer|min:0|max:120',
                  'height' => 'required|numeric|min:0|max:300',
                  'weight' => 'required|numeric|min:0|max:500',
                  'nacionality' => 'required|min:3|max:255',
                  'work' => 'required|min:3|max:255',
                  'skin_color' => 'required|min:3|max:255'
              ],
              [
                  'name.required' => 'The name is required.',
                  'name.min' => 'The name field must contain at least 3 characters.',
                  'name.max' => 'The name field must contain at most 255 characters.',
                  'age.required' => 'The age is required.',
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
              ->route('suspect.index')
              ->withErrors($validator)
              ->withInput();
      }
        $suspect = new \App\Models\SuspectModel();
        $suspect::create($dados->all());

        //RECUPERANDO TODOS SUSPEITOS DO BANCO E ENVIANDO PARA A VIEW
				
        $suspects = new \App\Models\SuspectModel();

        return view('suspect.index', ['success'=>'Registered!', 'suspects'=>$suspects::all()]);
       
    }
    function remove(string $id) {

        $suspect = new \App\Models\SuspectModel();
        $suspect::destroy($id);

        return view('suspect.index', ['success'=>'Removed!', 'suspects'=>$suspect::all()]);

    }
    function update(string $id) {
        $suspect = new \App\Models\SuspectModel();
        $suspect = $suspect::find($id);

        return view('suspect.update', ['suspect'=>$suspect]);
    }
    function save(Request $dados) {

        $suspect = new \App\Models\SuspectModel();
        $suspect = $suspect::find($dados->id);
        $suspect->update($dados->all());

        return view('suspect.index', ['success'=>'Updated!', 'suspects'=>$suspect::all()]);
    }
    
}
