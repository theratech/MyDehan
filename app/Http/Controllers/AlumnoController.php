<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Nivel;
use App\Reconocimiento;

session_start();

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesion = $_SESSION["loggedIn"]; 

        $currentUser = Usuario::where('u_id',$sesion['u_id'])->first();
        $currentBook = $currentUser->libros->last()->info;
        $currentLevel = $currentBook->nivel;

        $colegio = $currentUser->connect();

        $grafica = "";

        $meses = ["01" => "Enero","02"=>"Febrero", "03"=>"Marzo", "04"=>"Abril", "05"=>"Mayo", "06"=>"Junio", "07"=>"Julio", "08"=>"Agosto", "09"=>"Septiembre", "10"=>"Octubre", "11"=>"Noviembre", "12"=>"Diciembre"];

        $menor = 99;
        foreach($currentUser->libros as $lbd){
            if($menor>$lbd->info->l_graph){
                $menor = $lbd->info->l_graph;
            }
            $grafica .= "{ month:'".$meses[date('m',strtotime($lbd->al_fecha))].date(' Y',strtotime($lbd->al_fecha))."', value: ".$lbd->info->l_graph." },";
        }

        $data = [
            'datos' => $grafica,
            'user' => $currentUser,
            'colegio' => $colegio,
            'libroActual' => $currentBook,
            'nivelActual' => $currentLevel,
            'reconocimientos' => Reconocimiento::where('r_usuario',$currentUser->u_id)->get(),
            'nivelSiguiente' => Nivel::where('n_id',$currentLevel->n_id+1)->first(),
            'menor' => floor($menor),
            'var' => "hola"
        ];

        return view('alumno/default/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
