<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceOfferController extends Controller
{
    public function index(){
        return view("pages.priceoffer");
    }
}
