<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organisation;


class OrganisationController extends Controller
{
    //
    public function organisation($id_org)
    {
        $org = Organisation::find($id_org);
        return view('organisation', compact('org'));
    }
}
