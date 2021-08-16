<?php

namespace App\Http\Controllers\Breed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Breed\Breed;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breeds = Breed::all();
        return view('admin.breed.index', compact('breeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.breed.create');
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
            'en_name' => 'required',   
            'tg_name' => 'required',   
        ]);    
            // Create New User
            $breed = new Breed();
            $breed->en_name = $request->en_name;
            $breed->tg_name = $request->tg_name;
            $breed->save();

        session()->flash('success', 'Breed has been created !!');
        return redirect('admin/breeds');  
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
        $breed = Breed::find($id);
        return view('admin.breed.edit', compact('breed')); 
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
        $breed = Breed::find($id);
        $breed->en_name = $request->en_name;
        $breed->tg_name = $request->tg_name;
        $breed->save();

        session()->flash('success', 'Breed has been updated !!');
        return redirect('admin/breeds');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $breed = Breed::find($id);
        if (!is_null($breed)) {
            $breed->delete();
        }

        session()->flash('success', 'Breed has been deleted !!');
        return back();
    }
}
