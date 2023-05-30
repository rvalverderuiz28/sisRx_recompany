<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class VideoconferenciaController extends Controller
{
    protected $clients;
    public $userObj, $data;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;  
        $this->userObj = new \App\Models\User(); 
    }    
    
    public function index()
    {
        $users = User::where('id', '<>',Auth::user()->id)
            ->where('estado', '1')
            ->get();   

        $users->updateSession(); 

        return view('videoconferencias.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showId(Request $request)
    {
        // return view('estados.show', compact('estado'));
        if (!$request->user_id) {
            $html='';
        } else {
            $data = User::where('estado','1')
            ->where('id',$request->user_id)
            ->get();

            $html=$data;
        }
        return response()->json(['html' => $html]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $queryString = $conn->httpRequest->getUri()->getQuery();
        parse_str($queryString, $query);
        if($data = $this->userObj->getUserBySession($query['token']))
        {
            $this->data = $data;
            $conn->data = $data;
            $this->clients->attach($conn);
            //var_dump($this->userObj->userData('1'));
            echo "New connection! ({$conn->resourceId})\n";
        }
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s'."\n", $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client){
            if($from !== $client){

            }
        }
    }
}
