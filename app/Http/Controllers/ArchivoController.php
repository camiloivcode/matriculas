<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ArchivoController extends Controller
{
    public function index(){
        $archivo = Archivo::all();
    }

    public function loadView(){

    }

    public function storeArchivo(Request $req){

            $archivo = $req->all();

            $numero_documento = $req->get('numero_documento');

                $userAprendiz = DB::table('aprendizs')
                ->where('numero_documento', $numero_documento)
                ->first();

                $fichaAprendiz = DB::table('fichas')
                ->where('id', $userAprendiz->ficha_id)
                ->first();

                $idAprendiz = $userAprendiz->id;
                $nombreArchivo= $userAprendiz->numero_documento;

                if($req->hasFile('documento_identidad')){
                    $archivo['documento_identidad'] = $req->file('documento_identidad')->store('Archivos/'.$fichaAprendiz->ficha.'/'. $nombreArchivo);
                }

                if($req->hasFile('diploma_acta_bachiller')){
                    $archivo['diploma_acta_bachiller'] = $req->file('diploma_acta_bachiller')->store('Archivos/'.$fichaAprendiz->ficha.'/' . $nombreArchivo);
                }

                if($req->hasFile('certificado_eps')){
                    $archivo['certificado_eps'] = $req->file('certificado_eps')->store('Archivos/'.$fichaAprendiz->ficha.'/' . $nombreArchivo);
                }

                if($req->hasFile('icfes')){
                    $archivo['icfes'] = $req->file('icfes')->store('Archivos/'.$fichaAprendiz->ficha.'/' . $nombreArchivo);
                }

                if($req->hasFile('compromiso_aprendiz')){
                    $archivo['compromiso_aprendiz'] = $req->file('compromiso_aprendiz')->store('Archivos/'.$fichaAprendiz->ficha.'/' . $nombreArchivo);
                }

                if($req->hasFile('tratamientos_datos')){
                    $archivo['tratamientos_datos'] = $req->file('tratamientos_datos')->store('Archivos/'.$fichaAprendiz->ficha.'/' . $nombreArchivo);
                }

                if($req->hasFile('documento_acudiente')){
                    $archivo['documento_acudiente'] = $req->file('documento_acudiente')->store('Archivos/'.$fichaAprendiz->ficha.'/' . $nombreArchivo);
                }

                $archivo['aprendiz_id'] = $idAprendiz;

                Archivo::create($archivo);
                session()->flash('exito', 'Archivos enviados con éxito.');
            return redirect()->route('indexAprendiz');
    }

    public function downloadArchivo(){

    }
}
