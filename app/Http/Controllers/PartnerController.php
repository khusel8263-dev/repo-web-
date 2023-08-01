<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function Getlist(){
        $partners = Partner::paginate(10);
        return view('admin.partner')->with('partners', $partners);
    }
}
