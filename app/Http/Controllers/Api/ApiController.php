<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Activities
     */
    public function index()
    {
        return view('api.index', [

            'title' => 'Api',

        ]);
    }
}
