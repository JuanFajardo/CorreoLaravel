<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Correo;
use \App\Unidad;

class ControllerCorreo extends Controller
{
  public function __construct(){
  //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Correo::all();
    $unidads = Unidad::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('correo.index', compact('datos', 'unidads'));
    }
  }

  public function store(Request $request){
    $dato = new Correo;
    $dato->fill($request->all());
    $dato->save();

    $unidad = $request->unidad;
    $contador = \DB::table('unidads')->where('unidad', '=', $unidad)->count();

    if( $contador == '0' ){
      $dato = new Unidad;
      $dato->unidad = $unidad;
      $dato->save();
    }

    return redirect('/Correo');
  }

  public function show($id){
    $datos = Correo::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){

    if( $request->entrega == "SI" ){
      $request['fecha_activacion'] = date('Y-m-d H:i:s');
    }

    $dato = Correo::find($id);
    $dato->clave    = $request->clave;
    $dato->nombre   = $request->nombre;
    $dato->cargo    = $request->cargo;
    $dato->unidad   = $request->unidad;
    $dato->entrega  = $request->entrega;
    $dato->fecha_activacion   = $request->fecha_activacion;
    $dato->fecha_desactivacion= $request->fecha_desactivacion;

    $dato->save();
    return redirect('/Correo');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      //$dato = Correo::find($id);
      $dato->delete();
      return "Bien Eliminado";
    }else{
      return redirect('/');
    }
  }

  public function reporte($id){
    $dato  = Correo::find($id);

    $view =  \View::make('correo.reporte', compact('dato') )->render();
    $pdf = \App::make('dompdf.wrapper');
    //$pdf->setPaper('office', 'landscape');
    $pdf->loadHTML($view);
    return $pdf->stream('ReporteQuass.pdf');
  }

}
