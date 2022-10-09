<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Category;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('maps');
        $maps=Map::orderBy('name', 'asc')->simplepaginate(3);
        return view('map.index', compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('map.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required',
            'address' => 'required',
            'category' => 'required'],
            ['name.required' => '名称を入力してください。',
            'address.required' => '住所を入力してください。',
            'category.required' => 'カテゴリーを入力してください。']
        );

        //return dd($request->all());

        $map=new Map();
        $map->name=$request->name;
        $map->address=$request->address;
        $map->category_id=$request->category;
        $map->save();
        return redirect()->route('map.create')->with('message', '地図を新規登録しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function show(Map $map)
    {
        return view('map.show', compact('map'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function edit(Map $map)
    {
        return view('map.edit', compact('map'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Map $map)
    {
        $request->validate(
            ['name' => 'required',
            'address' => 'required',
            'category' => 'required'],
            ['name.required' => '名称を入力してください。',
            'address.required' => '住所を入力してください。',
            'category.required' => 'カテゴリーを入力してください。']
        );
        //return dd($request->all());
       
        $map->name=$request->name;
        $map->address=$request->address;
        $map->category_id=$request->category;
        $map->save();
        return redirect()->route('map.create')->with('message', '地図を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function destroy(Map $map)
    {
        $map->delete();
        return redirect()->route('map.index')->with('message', '地図を削除しました。');
    }
}
