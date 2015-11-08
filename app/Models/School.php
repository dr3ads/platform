<?php

namespace Platform\Models;

use Illuminate\Database\Eloquent\Model;
use Jackpopp\GeoDistance\GeoDistanceTrait;
use Postcode;
use Log;

class School extends Model
{
	use	GeoDistanceTrait;

    protected $table = 'schools';
	protected $fillable = ['lat','long'];

    public function getFormattedPayoutAttribute()
	{
	    return '$'.number_format($this->getAttribute('payout'), 2);
	}

	public function fields(){
		return $this->BelongsToMany('Platform\Models\Field');
	}

	public static function boot(){
		static::saving(function($school){
			$lookup = Postcode::lookup($school['zipcode']);
			Log::info($lookup);
			$school['lat'] = $lookup['latitude'];
			$school['lng'] = $lookup['longitude'];

			return $school;
		});
	}


}
