<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Whitecube\NovaPage\Pages\Manager;

class PositionController extends Controller
{
    public function index(Manager $page)
    {
        $page->load('positions');

        $positions = \App\Models\Position::all();

        return view('pages.positions',compact('positions'));
    }
}
