<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeRequest;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::latest()->paginate(20);
        return view('Admin.episode.all',compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.episode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EpisodeRequest|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpisodeRequest $request)
    {
        $episode = Episode::create($request->all());
        $this->setCourseTime($episode);
        return redirect(route('episodes.index'));
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
     * @param Episode $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        return  view('Admin.episode.edit',compact('episode'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param EpisodeRequest|Request $request
     * @param Episode $episode
     * @return \Illuminate\Http\Response
     */
    public function update(EpisodeRequest $request, Episode $episode)
    {
        $episode->update($request->all());
        $this->setCourseTime($episode);
        return redirect(route('episodes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        $episode->delete();
        return back();
    }
}
