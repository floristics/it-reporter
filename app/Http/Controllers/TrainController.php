<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function orm()
    {
        $Organisation = \App\Organisation::first();

        dd( $Organisation->Catalog->toArray() );
    }
}
