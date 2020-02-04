<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;


class NodeController extends Controller
{
    //
    public function index(){
        $nodes=Node::select('abbrEN')->get();
        return $nodes;
    }
}
