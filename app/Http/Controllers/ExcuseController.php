<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Excuse;

class ExcuseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $excuse = new Excuse;
        if($request->excuse == "o"){
            $excuse->fill(["user_id"=>$request->user_id, "excuse"=>$request->description]);
        }else{
            $excuse->fill(["user_id"=>$request->user_id, "excuse"=>$request->excuse]);
        }
        if($excuse->save()){
            echo "done!";
        }else{
            abort(403);
        }
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
       //nulled
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $excuse = Excuse::find($id);
        if($excuse->destroy()){
            echo "done";
        }else{
            abort(403);
        }
    }
}
