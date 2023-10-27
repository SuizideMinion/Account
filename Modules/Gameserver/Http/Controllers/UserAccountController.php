<?php

namespace Modules\Gameserver\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gameserver\Entities\Game;
use Modules\Gameserver\Entities\GameServer;
use Modules\Gameserver\Entities\UserAccount;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Games = Game::with('gameServers')->get();
        $UserAccs = UserAccount::where('user_id', auth()->user()->id)->get();

        return view('gameserver::indexuseraccount', compact('Games', 'UserAccs'));
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
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $Account = UserAccount::whereId($id)->first();
        $Server = GameServer::where('id', $Account->gameserver_id)->first();

        $db_temp = mysqli_connect($Server->host, $Server->database_username, $Server->database_password);
        mysqli_select_db($db_temp, $Server->database);

        //Loginkey erzeugen
        $loginkey = md5(rand(1,1000000) * time());

//        mysqli_query($db_temp, "UPDATE {$Server->user_data_table} SET loginkey='{$loginkey}', loginkeytime=UNIX_TIMESTAMP( ), WHERE user_id = '" . $Server-> . "';");


        return view('gameserver::showuseraccount');
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
        //
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
