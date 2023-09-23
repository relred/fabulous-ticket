<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SalesController extends Controller
{
    public function print($id)
    {
        $sale = Sale::where('cluster_id', $id)->first();
        return view('print', ['sale' => $sale]);
    }
}
