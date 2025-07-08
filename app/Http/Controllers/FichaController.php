<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;

class FichaController extends Controller
{

    public function index()
    {
        $fichas = Ficha::all();
        $listaTotalAprendices = [];
        $listaTotalArchivos = [];
        foreach($fichas as $ficha){
            $totalAprendices = DB::select('SELECT count(*) AS total FROM aprendizs WHERE ficha_id = ?', [$ficha->id]);
            $totalArchivos = DB::select('SELECT count(*) AS total FROM aprendizs INNER JOIN archivos ON aprendizs.id = archivos.aprendiz_id WHERE ficha_id = ?', [$ficha->id]);
            foreach($totalAprendices as $total){
                array_push($listaTotalAprendices, $total->total);
            };
            foreach($totalArchivos as $total){
                array_push($listaTotalArchivos, $total->total);
            };
        };
       
        return view('admin/fichas')->with('fichas', $fichas)->with('listaTotalAprendices', $listaTotalAprendices)->with('listaTotalArchivos', $listaTotalArchivos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ficha'=> 'required|numeric',
            'programa'=> 'required',
            'nivelFormacion'=> 'required',
            'fechaInicio'=> 'required',
            'fechaFin'=> 'required',
        ]);

        $ficha = new Ficha();
        $ficha->ficha = $request->get('ficha');
        $ficha->nombre_programa = Str::upper($request->get('programa'));
        $ficha->nivel_formacion = $request->get('nivelFormacion');
        $ficha->fecha_inicio = $request->get('fechaInicio');
        $ficha->fecha_fin = $request->get('fechaFin');

        $ficha->save();

        $path = storage_path('app/Archivos/'). $request->get('ficha');
        File::makeDirectory($path, $mode = 0777, true, true);

        return redirect()->route('homeAdmin')->with('success', 'Nueva Ficha creada exitosamente!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'editarFicha'=> 'required|numeric',
            'editarPrograma'=> 'required',
            'editarNivelFormacion'=> 'required',
            'editarFechaInicio'=> 'required',
            'editarFechaFin'=> 'required',
        ]);
        
        $numeroFicha = DB::table('fichas')
        ->where('id', $id)
        ->first();

        Storage::move('Archivos/'.$numeroFicha->ficha, 'Archivos/'.$request->get('editarFicha'));

        $ficha = Ficha::find($id) ;
        $ficha->ficha = $request->get('editarFicha');
        $ficha->nombre_programa = Str::upper($request->get('editarPrograma'));
        $ficha->nivel_formacion = $request->get('editarNivelFormacion');
        $ficha->fecha_inicio = $request->get('editarFechaInicio');
        $ficha->fecha_fin = $request->get('editarFechaFin');

        $ficha->save();

        return redirect()->route('homeAdmin')->with('success', 'Está Ficha fue editada exitosamente!');
    }

}
