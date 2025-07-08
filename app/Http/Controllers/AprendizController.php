<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Ficha;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use App\Imports\AprendicesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class AprendizController extends Controller
{

    public function index()
    {
        $aprendices = Aprendiz::all();
        $estados = [];

        foreach($aprendices as $aprendiz){
            $estado = DB::table('archivos')
            ->where('aprendiz_id', $aprendiz->id)
            ->first();
        
            if(!$estado){
                array_push($estados, FALSE);
            }else{
                array_push($estados, TRUE);
            }
        }
        return view('admin/aprendices')->with('aprendices', $aprendices)->with('estados', $estados);
    }

    public function create(Request $request)
    {

        $aprendiz = new Aprendiz();

        $idFicha = DB::table('fichas')
        ->where('ficha', $request->get('ficha'))
        ->first();

        if($idFicha){

            $aprendiz->tipo_documento = $request->get('tipo_documento');
            $aprendiz->numero_documento = $request->get('numeroDocumento');
            $aprendiz->nombre_completo = Str::upper($request->get('nombre'));
            $aprendiz->estado = $request->get('estado');
            $aprendiz->ficha_id = $idFicha->id;
            $aprendiz->save();

            return redirect()->route('aprendices.index')->with('success', 'El Aprendiz fue creado exitosamente!');

        }else{
            return redirect()->route('aprendices.index')->with('error', 'Por favor verifique, esté número de ficha no se encuentra registrado');
        }

    }

    public function store(Request $request)
    {

        $ficha = $request->get('ficha');

        $consultarFicha = DB::table('fichas')
        ->where('ficha', $ficha)
        ->first();

        if($consultarFicha){
            
            $file = $request->file('listaAprendices');
            Excel::import(new AprendicesImport, $file);

            return redirect()->route('aprendices.index')->with('success', 'Listado de aprendices importados exitosamente!');
        }else{

            return redirect()->route('aprendices.index')->with('error', 'Por favor verifique, esté número de ficha no se encuentra registrado');
        }
    }

    public function login(Request $request){

        $request->validate([
            'numero_documento'=> 'required',
            'tipo_documento'=> 'required',
        ]);

        $tipo_documento = $request->get('tipo_documento');
        $numero_documento = $request->get('numero_documento');

        $userAprendiz = DB::table('aprendizs')
        ->where('numero_documento', $numero_documento)
        ->where('tipo_documento',$tipo_documento)
        ->first();

        if($userAprendiz){

            $idAprendiz = $userAprendiz->id;

            $estadoAprendiz = DB::table('archivos')
            ->where('aprendiz_id', $idAprendiz)
            ->first();

            if($estadoAprendiz){
                return redirect(route('indexAprendiz'))->with('error', 'Ingreso no valido, esté usuario ya ha enviado sus datos!');
            }else{
                $ficha = Ficha::find($userAprendiz->ficha_id);
                return view('inicioUsuario')
                ->with(['documento'=>$numero_documento])
                ->with(['tipo'=>$tipo_documento])
                ->with('ficha', $ficha);
            }

        }else{
            return redirect(route('indexAprendiz'))->with('error', 'Usuario no registrado por favor verifique su documento!');
        }
    }

    public function update(Request $request, $id)
    {
        $aprendiz = Aprendiz::find($id);
        
        $idFicha = DB::table('fichas')
        ->where('ficha', $request->get('editarFicha'))
        ->first();

        if($idFicha){

            $aprendiz->tipo_documento = $request->get('editarTipo_documento');
            $aprendiz->numero_documento = $request->get('editarNumeroDocumento');
            $aprendiz->nombre_completo = Str::upper($request->get('editarNombre'));
            $aprendiz->estado = $request->get('editarEstado');
            $aprendiz->ficha_id = $idFicha->id;
            $aprendiz->save();

            return redirect()->route('aprendices.index')->with('success', 'El aprendiz fue editado exitosamente!');

        }else{
            return redirect()->route('aprendices.index')->with('error', 'Por favor verifique, esté número de ficha no se encuentra registrado');
        }

    }

    public function destroy($id)
    {
        $aprendiz = Aprendiz::find($id); 
        $aprendiz->delete();
        return redirect()->route('aprendices')->with('success', 'El aprendiz fue eliminado exitosamente!');
    }

}
