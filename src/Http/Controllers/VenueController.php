<?php namespace Blupl\Venue\Http\Controllers;


use Blupl\Venue\Http\Requests\VenueRequest;
use Blupl\Venue\Model\Venue;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use Orchestra\Foundation\Http\Controllers\AdminController;

class VenueController extends AdminController {

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function setupFilters()
    {
        $this->beforeFilter('control.csrf', ['only' => 'delete']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Venue $venue)
	{
        return view('blupl/venue::venue', compact('venue'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('blupl/venue::edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(VenueRequest $request )
	{
        try {
            $file = Input::file('file1');
            $filename1 = 'venue_'.uniqid() . '.jpg';
            $destinationPath = 'images/venue';
            $itemImage = Image::make($file)->fit(350, 450);
            $itemImage->save($destinationPath . '/' . $filename1);
            $request['photo'] = $destinationPath.'/'.$filename1;

            $attachFile = Input::file('file2');
            $filename2 = 'venue_attach_'.uniqid() . '.jpg';
            $destinationPathAttach = 'images/venue';
            $itemAttachment = Image::make($attachFile)->fit(450, 350);

            $itemAttachment->save($destinationPathAttach . '/' . $filename2);
            $request['attachment'] = $destinationPathAttach.'/'.$filename2;

            $venue = Venue::create($request->all());

        } catch (Exception $e) {
            Flash::error('Unable to Save');
            return $this->redirect(handles('blupl/venue::venue'));
        }
        Flash::success($venue->name.' Franchise Save Successfully');
        return $this->redirect(handles('blupl/venue::member'));

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
