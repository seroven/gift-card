<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    public function __construct() {
    }

    function generate(Request $request){
        $data = $request->all();
        $pdf = Pdf::loadView('pdf.gift-card', compact('data'));
        return $pdf->stream();
        // return view('pdf.gift-card', compact('data'));
    }
}
