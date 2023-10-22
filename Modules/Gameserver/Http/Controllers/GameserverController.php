<?php

namespace Modules\Gameserver\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gameserver\Entities\Game;
use Modules\Gameserver\Entities\GameServer;

class GameserverController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Games = Game::get();

        return view('gameserver::index', compact('Games'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $server = new GameServer;

        $server->name = $request->name;
        $server->tag = $request->tag;
        $server->wt = $request->wt;
        $server->kt = $request->kt;
        $server->desc = $request->desc;
        $server->host = $request->host;
        $server->url = $request->url;
        $server->payserver = $request->payserver;
        $server->lang = $request->lang;
        $server->database = $request->database;
        $server->database_host = $request->database_host;
        $server->database_username = $request->database_username;
        $server->database_password = $request->database_password;
        $server->user_data_table = $request->user_data_table;
        $server->game_id = $request->game_id;

        $server->save();

        return redirect("gameserver");
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $Server = GameServer::whereId($id)->first();

        return view('gameserver::showserver', compact('Server'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $server = GameServer::whereId($id)->first();

        $server->name = $request->name;
        $server->tag = $request->tag;
        $server->wt = $request->wt;
        $server->kt = $request->kt;
        $server->desc = $request->desc;
        $server->host = $request->host;
        $server->url = $request->url;
        $server->payserver = $request->payserver;
        $server->lang = $request->lang;
        $server->database = $request->database;
        $server->database_host = $request->database_host;
        $server->database_username = $request->database_username;
        $server->database_password = $request->database_password;
        $server->user_data_table = $request->user_data_table;
        $server->game_id = $request->game_id;

        $server->save();

        return redirect("gameserver");

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
