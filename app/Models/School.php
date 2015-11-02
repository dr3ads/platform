<?php

namespace Platform\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    public function getFormattedPayoutAttribute()
	{
	    return '$'.number_format($this->getAttribute('payout'), 2);
	}

	public function fields(){
		return $this->BelongsToMany('Platform\Models\Field');
	}

}
