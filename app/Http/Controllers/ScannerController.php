<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Ticket;

class ScannerController extends Controller
{
    public function view($id)
    {
        if ($sale = Sale::where('cluster_id', $id)->first()) {
            $isScanned = $sale->state;

            if ($sale->state != 'scanned') {
                $sale->state = 'scanned';
                $sale->save();
            }

            return view('scanner', ['sale' => $sale, 'ticket' => 'undefined', 'isScanned' => $isScanned, 'id' => $id]);
        }
        
        if ($ticket = Ticket::where('cluster_id', $id)->first()) {
            $isScanned = $ticket->state;

            if ($ticket->state != 'scanned') {
                $ticket->state = 'scanned';
                $ticket->save();
            }

            return view('scanner', ['sale' => 'undefined', 'ticket' => $ticket, 'isScanned' => $isScanned, 'id' => $id]);
        }

        return view('scanner', ['sale' => 'undefined', 'ticket' => 'undefined', 'isScanned' => 'undefined', 'id' => $id]);
    }


    public function viewEmergency($id)
    {
        if ($sale = Sale::find($id)) {
            $isScanned = $sale->state;

            if ($sale->state != 'scanned') {
                $sale->state = 'scanned';
                $sale->save();
            }

            return view('scanner', ['sale' => $sale, 'ticket' => 'undefined', 'isScanned' => $isScanned, 'id' => $id]);
        }
        
        if ($ticket = Ticket::where('cluster_id', $id)->first()) {
            $isScanned = $ticket->state;

            if ($ticket->state != 'scanned') {
                $ticket->state = 'scanned';
                $ticket->save();
            }

            return view('scanner', ['sale' => 'undefined', 'ticket' => $ticket, 'isScanned' => $isScanned, 'id' => $id]);
        }

        return view('emergency-scanner', ['sale' => 'undefined', 'ticket' => 'undefined', 'isScanned' => 'undefined', 'id' => $id]);
    }

    public function scanEmergency(Request $request)
    {
        return redirect()->route('scanner.emergency', $request->id);
    }

    public function scan(Request $request)
    {
        return redirect()->route('scanner', $request->id);
    }
}
