<?php

namespace Modules\Gameserver\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gameserver\Entities\Game;
use Modules\Gameserver\Entities\GameServer;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('gameserver::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('gameserver::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $store = new Game;
        $store->name = $request->name;
        $store->desc = $request->desc;
        $store->color = $request->color;
        $store->image = $request->image;

        $store->save();

        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $Game = Game::whereId($id)->first();
        $GameServers = GameServer::where('game_id', $id)->get();

        return view('gameserver::show', compact('Game', 'GameServers'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('gameserver::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $Game = Game::whereId($id)->first();
        $Game->name = $request->name;
        $Game->desc = $request->desc;
        $Game->color = $request->color;
        $Game->image = $request->image;

        $Game->save();

        return redirect('gameserver');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
