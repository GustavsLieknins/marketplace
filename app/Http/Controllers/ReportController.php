<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request, $id)
    {
        if (!Report::where('listing_id', $id)->where('user_id', $request->created_by)->exists()) {
            $report = new Report();
            $report->listing_id = $id;
            $report->user_id = $request->created_by;

            $report->save();
        }

        return back();
    }
}
