<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;

class SearchController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('search');
    }

    //Live Search for Dashboard
    public function showAllNodes(){
        $dataSearch=Node::select('id','hier','name')->orderBy('memOf')->get();
        return view('search',[
            'dataSearch'=>$dataSearch
        ]);
    }


}
