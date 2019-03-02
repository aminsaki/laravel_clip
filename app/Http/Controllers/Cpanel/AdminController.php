<?php

namespace App\Http\Controllers\Cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index(){

       $title_name="صفحه اصلی";
       return  view('Cpanel.index',compact('title_name'));
    }

}
