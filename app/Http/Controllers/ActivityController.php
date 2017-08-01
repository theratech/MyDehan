<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colegio;
use App\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request)
    {   
        if($request->get('c')){
            $activity = Activity::where('sc_colegio','=',$request->get('c'))->latest('sc_fecha')->get();
            $colegio = Colegio::where('col_id','=',$request->get('c'))->get();
        }else{
            $activity = Activity::latest('sc_fecha')->get();
            $colegio = null;
        }
        $metadata = [
            'activities' => $activity,
            'colegio' => $colegio,
            'request' => $request
        ];
        return view('activity.print',$metadata);
    }
    public function index(Request $request)
    {
        if($request->get('c')){
            $activity = Activity::where('sc_colegio','=',$request->get('c'))->latest('sc_fecha')->get();
            $colegio = Colegio::where('col_id','=',$request->get('c'))->get();
        }else{
            $activity = Activity::latest('sc_fecha')->get();
            $colegio = null;
        }
        $metadata = [
            'activities' => $activity,
            'colegio' => $colegio,
            'request' => $request
        ];
        return view('activity.show',$metadata);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $act = new Activity;

        $act->sc_colegio = $request->col;
        $act->sc_fecha = $request->fecha;
        $act->sc_motivo = $request->titulo;
        $act->sc_observacion = $request->observacion;
        $act->sc_user = $request->user;
        $act->timestamps = false;

        if($act->save()){
            return redirect('activity?c='.$request->col);
        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::where('sc_id',$id)->first();
        $metadata = [
            'activity' => $activity,
        ];
        return view('activity.edit',$metadata);
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
        $activity = Activity::where('sc_id',$id)->first();

        $activity->timestamps = false;

        if(
            $activity->update([
                'sc_motivo' => $request->titulo,
                'sc_observacion' => $request->observacion,
            ])
        ){
            return "true";
        }else{
            return "false";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::where('sc_id',$id)->delete();
        return "Success";
    }
}
