<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){

        $films = Film::paginate(10);

        return view('peliculas.index', compact('films'));
    }

    public function edit(){
        return view('peliculas.edit', compact('film'));
    }

    public function update(Request $request, Film $film){
        $request->validate([
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Precio' => 'required',
            'Categoria' => 'required'
        ]);
        $input = $request->all();

        $film->update($input);
    
        return redirect()->route('peliculas.index');
    }

    public function buscarfilm(Request $request)
    {
    $buscarfilm = $request->get('buscarfilm');
    $films = Film::where("title","LIKE",'%'.$buscarfilm.'%')->paginate(10);
    return view('peliculas.index', compact('films'));
    }

    
}
