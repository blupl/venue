<?php namespace Blupl\Venue\Http\Requests;

use App\Http\Requests\Request;

class VenueRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required',
            'gender' => 'required',
            'personal_id' => 'required',
            'department' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'required',
            'function' => 'required',
            'present_address1' => 'required',
            'present_district' => 'required',
            'present_zip' => 'required',
            'permanent_address1' => 'required',
            'permanent_district' => 'required',
            'permanent_zip' => 'required',
            'file1' => 'required',
            'file2' => 'required',
		];
	}

}
