<?php

namespace App\Http\Controllers;

use App\Models\Ulke;
use Illuminate\Http\Request;

class PriceOfferController extends Controller
{
    public function index(){
        $ulkes=Ulke::get();
        return view("pages.priceoffer",compact("ulkes"));
    }
}
