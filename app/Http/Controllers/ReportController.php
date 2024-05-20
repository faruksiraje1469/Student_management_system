<?php

namespace App\Http\Controllers; // Assuming this is the correct namespace for your controllers

use Illuminate\Http\Request;
use App\Models\Payment;
use Auth;
use Illuminate\Routing\Controller; // Importing Controller class from correct namespace

class ReportController extends Controller
{
    public function report1($pid)
    {
        $payment = Payment::find($pid);
        $pdf = \App::make('dompdf.wrapper');
        $print = "<div style='margin:20px; padding:20px;'>"; // Added closing quote for style attribute
        $print .= "<h1 align='center'>Payment Receipt</h1>"; // Corrected spelling of 'Receipt'
        $print .= "<hr/>";
        $print .= "<p>Receipt No: <b>" . $pid . "</b></p>"; // Corrected concatenation
        $print .= "<p>Date: <b>" . $payment->paid_date . "</b></p>"; // Corrected concatenation
        $print .= "<p>Enrollment No: <b>" . $payment->enrollment->enroll_no . "</b></p>"; // Corrected concatenation
        $print .= "<p>Student Name: <b>" . $payment->enrollment->student->name . "</b></p>"; // Corrected concatenation
        $print .= "<hr/>";
        $print .= "<table style='width: 100%;'>"; // Added closing quote for style attribute
        $print .= "<tr>"; 
        $print .= "<td>Description</td>"; 
        $print .= "<td>Amount</td>"; 
        $print .= "</tr>";
        $print .= "<tr>";
        $print .= "<td><h3>" .  $payment->enrollment->batch->name . "</h3></td>" ;
        $print .= "<td><h3>" .  $payment->amount . "</h3></td>" ;
        $print .= "</tr>";
        $print .= "</table>";
        $print .= "<hr/>";
        $print .= "<span>Printed By: <b>" . Auth::user()->name . "</b></span>";
        $print .= "<span>Printed Date: <b>" . date('Y-m-d') . "</b></span>";
        $print .= "</div>";
        $pdf->loadHTML($print);
        return $pdf->stream();
    }
}
