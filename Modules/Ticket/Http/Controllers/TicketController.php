<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Modules\Ticket\Entities\TicketBoards;
use Modules\Ticket\Entities\TicketGroup;
use Modules\Ticket\Entities\TicketPost;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $TicketPosts = TicketPost::where('ticket_id', 0)
                                ->when(!isset(auth()->user()->userPermission()['ticket.admin']))
                                ->where('user_id', auth()->user()->id)
                                ->with('user', 'group')
                                ->orderBy('status', 'DESC')
                                ->orderBy('updated_at', 'DESC')
                                ->get();

        $Boards = TicketBoards::get();

        return view('ticket::index', compact('TicketPosts', 'Boards'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ticket::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $Post = new TicketPost;
        $Post->text = $request->message;
        $Post->title = $request->topic;
        $Post->ticket_id = 0;
        $Post->image = '0';
        $Post->group_id = $request->boardid;
        $Post->user_id = auth()->user()->id;
        $Post->status = 0;

        $Post->save();

        return Redirect::back(); //->withErrors(['msg' => 'Gelöscht']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        $FirstPost = TicketPost::where('id', $id)
            ->orderBy('created_at', 'ASC')
            ->with('user')
            ->first();

        if ( $FirstPost->user_id == auth()->user()->id )
        {
            $FirstPost->status = 1;
            $FirstPost->save();
        }

        $Posts = TicketPost::where('ticket_id', $id)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('ticket::show', compact('Posts', 'FirstPost'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ticket::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $Post = new TicketPost;
        $Post->text = $request->message;
        $Post->ticket_id = $id;
        $Post->title = '0';
        $Post->image = '0';
        $Post->group_id = 0;
        $Post->user_id = auth()->user()->id;
        $Post->status = 0;

        $Post->save();

        $FPost = TicketPost::where('id', $id)->first();
        $FPost->status = 0;
        $FPost->save();

        return Redirect::back(); //->withErrors(['msg' => 'Gelöscht']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (auth()->user()->userPermission()['ticket.admin'])
        {
            $Post = TicketPost::where('id', $id)->first();

            $Post->status = ( $Post->status == 0 ? '1':'0' );

            $Post->save();
        }

        return Redirect::back(); //->withErrors(['msg' => 'Gelöscht']);
    }
}
