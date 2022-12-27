<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Brief;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        /// change param value : 
        // $request->merge(['page' => 1]);
        // $r=$request->all();
        $brief=Brief::all();
        $tasks =Task::paginate(3);
        // dd($tasks);
        return view('tasks.index',['brief'=>$brief,'tasks'=>$tasks]);
        
    }
    public function filter_bief(Request $request){
        $task=Task::where('id_brief','Like','%'.$request->filter.'%')->get();
        return response(['dataTask'=>$task]);
}

    public function search_tache(Request $request){
        $searchtask=Task::where('name','Like','%'.$request->searchtask.'%')->get();
        return response(['search'=>$searchtask]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:50',
            'duree'=>'required'
        ]);
        Task::create([

            'name'=>$request->name,
            'description'=>$request->description,
            'duree'=>$request->duree
        ]);

        return to_route('task.index');
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
        $edit=Task::findOrFail($id);
        return view('tasks.edit',compact('edit'));
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
        $update=Task::findOrFail($id);
        $update->name=$request->get('name');
        $update->description=$request->get('description');
        $update->duree=$request->get('duree');
        $update->save();


        return redirect('/task')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Task::findOrFail($id);
        $delete->delete();
        return redirect('/task');
    }


      // export data format excel

      public function exportexcel(){
        return Excel::download(new TaskExport,'datapage.xlsx');
    }

     // import data format excel
     public function importexcel(Request $request){

        Excel::import(new TaskImport, $request->file);
        return redirect()->back();

    }
}
