<?php namespace Blupl\Venue\Http\Controllers;

use Blupl\Venue\Model\Venue;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Orchestra\Foundation\Http\Controllers\AdminController;
use Orchestra\Support\Facades\Mail as Mailer;


class ApprovalController extends AdminController
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
     * Get landing page.
     *
     * @return mixed
     */
    public function index(Venue $venue)
    {
        return view('blupl/venue::approval.home-approval', compact('venue'));

    }


    /**
     * Show a role.
     */
    public function show($member, Request $request)
    {
//        $members = Venue::where('status', '=', 0)->paginate(15);
        if($request->has('column') && $request->has('value')) {
            $members = Venue::where('designation', '=', $member)->where($request->get('column'), 'like', $request->get('value'))->where('status', '=', 0)->paginate(15);
        } else {
            $members = Venue::where('designation', '=', $member)->where('status', '=', 0)->paginate(15);
        }
        return view('blupl/venue::approval.list', compact('members'));
    }

    public function showReporter($memberID)
    {
        $member = Venue::find($memberID);


        if($member != null && $member->status == 0) {
            return view('blupl/venue::member', compact('member'));
        }else {
            if($member->status == 1) {
                $massage = "Already Approve";
            } else {
                $massage = "Reporter Not Found";
            }
            Flash::error($massage);
            return $this->redirect(handles('blupl/venue::approval'));
        }
    }



    /**
     * Update the role.
     * @return mixed
     */
    public function update($memberId, Request $request)
    {
        $member = Venue::find($memberId);

        if ($member->status == 0) {
                foreach ($request->zone as $key => $zone) {
                    $member->zone()->create(['zone'=>$zone]);
                }
                $member->grade()->create(['grade'=>$request->grade, 'number'=>$request->number]);

                $member->status = 1;
                $member->save();
        }else {
            if($member->status == 1) {
                $massage = "Already Approve";
            } else {
                $massage = "Reporter Not Found";
            }
            Flash::error($massage);
            return $this->redirect(handles('blupl/venue::approval'));
        }

        Mailer::send('blupl/venue::email.update', ['yoo'=>'Yoo'], function ($m) use ($member) {
            $m->to($member->email);
            $m->from('info@accreditationbd.com');
            $m->subject('Thank you for your Registration');
        });
        Flash::success($member->name.' Approved Successfully');
        return $this->redirect(handles('blupl/venue::approval/all'));

    }

    public function batchApproval(Request $request)
    {
        foreach ($request->member as $member) {
            $members[] = Venue::find($member);
        }
        return view('blupl/venue::approval.batch', compact('members'));
    }

    public function storeBatchApproval(Request $request)
    {
        foreach($request->member as $member) {
            $member = Venue::find($member);
            if ($member->status == 0) {
                foreach ($request->zone as $key => $zone) {
                    foreach ($request->zone as $key => $zone) {
                        $member->zone()->create(['zone'=>$zone]);
                    }
                    $member->grade()->create(['grade'=>$request->grade, 'number'=>$request->number]);

                    $member->status = 1;
                    $member->save();
                }
            }
        }
        Flash::success(' Approved Successfully');
        return $this->redirect(handles('blupl/venue::approval/all'));

    }

    public function archive($memberId)
    {
        $member = Venue::find($memberId);
        $member->status = '3';
        $member->save();
        return $this->redirect(handles('blupl/venue::approval/all'));

    }

    public function pdf($memberID)
    {
        $member = Venue::find($memberID)->toArray();
        $pdf = App::make('dompdf');
        $pdf->loadView('blupl/venue::printing._print-single', $member);

        return $pdf->stream();
    }


}
