<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
       
          
        

        if($request->hasFile('avatar_trainer'))
        {
            $file = $request->file('avatar_trainer');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
           
        }
       $trainer = new Trainer();
       $trainer->nombre = $request->input('name_trainer');
       $trainer->avatar = $name;
       $trainer->descripcion = $request->input('description_trainer');
       $trainer->slug = $request->input('name_trainer');
        $trainer->save();
        return 'saved';
       // return $request->input('name_trainer');
       //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //$trainer = Trainer::find($id);
        //$trainer = Trainer::where('slug', '=',$slug)->firstOrfail();
        return view('trainers.show',compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
      return view('trainers.edit',compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $trainer = Trainer::where('slug', '=',$slug)->firstOrfail();
        if($request->hasFile('avatar_trainer'))
        {
            $file = $request->file('avatar_trainer');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
           $trainer->avatar= $name;
        }
        $trainer->nombre = $request->input('name_trainer');
       $trainer->descripcion = $request->input('description_trainer');
        $trainer->save();
        return 'saved';

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
        return 'deleted';
    }
}
