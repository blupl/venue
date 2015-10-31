<?php namespace Blupl\Venue\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Blupl\Venue\Model\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Orchestra\Foundation\Http\Controllers\AdminController;

class PrintingController extends AdminController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function setupFilters()
    {
        $this->beforeFilter('control.csrf', ['only' => 'delete']);
    }

    /**
     * Get landing pages
     * @return mixed
     */
    public function index(Request $request)
    {
//        $members = Venue::where('status', '=', 1)->paginate(15);
        if($request->has('column') && $request->has('value')) {
            $members = Board::where($request->get('column'), 'like', $request->get('value'))->where('status', '=', 1)->paginate(15);
        } else {
            $members = Board::where('status', '=', 1)->paginate(15);
        }
        return view('blupl/venue::printing.list-printing', compact('members'));
    }

    /**
     * Show a role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
    public function show($memberId)
    {
        $member = Venue::find($memberId);
        return view('blupl/venue::printing.print-single', compact('member'));
    }

    public function pdf($memberId)
    {
        $mem = Venue::find($memberId);
        $mem->zone= $mem->zone->toArray();
        $members[] = $mem->toArray();
        $pdf = App::make('dompdf');
        $pdf->setPaper('a7');
        $pdf->loadView('blupl/venue::printing._print-single', compact('members'));

        return $pdf->stream();
    }


    public function batchPrinting(Request $request)
    {
//        dd(Venue::find($request->member[0])->zone);
        foreach($request->member as $member) {
            $mem = Venue::find($member);
            $mem->zone= $mem->zone->toArray();
            $members[] = $mem->toArray();
        }
        $pdf = App::make('dompdf');
        $pdf->setPaper('a7');
        $pdf->loadView('blupl/venue::printing._print-batch', compact('members'));

        return $pdf->stream();
    }




}
