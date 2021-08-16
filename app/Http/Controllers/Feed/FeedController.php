<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feed\Feed;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::all();
        return view('admin.feed.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.feed.create');
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
            $feed = new Feed();
            $feed->en_name = $request->en_name;
            $feed->tg_name = $request->tg_name;
            $feed->save();

        session()->flash('success', 'Feed has been created !!');
        return redirect('admin/feeds');  
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
       $feed = Feed::find($id);
        return view('admin.feed.edit', compact('feed'));
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
        $feed = Feed::find($id);
        $feed->en_name = $request->en_name;
        $feed->tg_name = $request->tg_name;
        $feed->save();

        session()->flash('success', 'Feed has been updated !!');
        return redirect('admin/feeds');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feed = Feed::find($id);
        if (!is_null($feed)) {
            $feed->delete();
        }

        session()->flash('success', 'Feed has been deleted !!');
        return back();
    }
}
