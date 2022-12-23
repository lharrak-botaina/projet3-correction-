<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Tache;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brif=Brief::all();
        $tache=Tache::all();
        return view('myfilter.filter',['mybridf'=>$brif,'mytache'=>$tache]);
    }
    public function filterbif(Request $request){
        $output="";
        $tache=Tache::where('idbrif','Like','%'.$request->filter.'%')->get();

        foreach($tache as $tach)
        {
            $output.=
            '<tr>
            <td> '.$tach->nomtache.' </td>
            <td> '.$tach->dateD.' </td>
            </tr>';
        }
        return response($output);
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
