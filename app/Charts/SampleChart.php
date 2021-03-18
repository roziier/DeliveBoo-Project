<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use App\Payment;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $ordName = Payment::orderBy('created_at') -> pluck('firstname','created_at');
        $ordPrice = Payment::orderBy('created_at') -> pluck('total_price','created_at');

        return Chartisan::build()
            -> labels([$ordName]) //n. ordine -
            -> dataset('Orders', [1,2,3]); //n. piatti |
    }
}