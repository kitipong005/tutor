<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\User;
use Session;
use Mapper;

class MapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function location()
    {
        Mapper::location('Chiang Mai');
    
        return view('admin.map.map');

    }
}
