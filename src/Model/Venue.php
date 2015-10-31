<?php namespace Blupl\Venue\Model;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model {


    protected $table = 'venue_operators';

    protected $morphClass = 'venue_operators';

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'personal_id',
        'department',
        'mobile',
        'email',
        'date_of_birth',
        'function',
        'present_address1',
        'present_address2',
        'present_district',
        'present_zip',
        'permanent_address1',
        'permanent_address2',
        'permanent_district',
        'permanent_zip',
        'photo',
        'attachment',
        'status'
    ];


    public function zone()
    {
        return $this->morphMany('Blupl\PrintMedia\Model\Zone', 'zoneable');
    }

    public function grade()
    {
        return $this->morphMany('Blupl\PrintMedia\Model\Grade', 'gradeable');
    }

}
