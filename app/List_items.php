<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_items extends Model
{
    public function List_items()
	{
		return $this->belongsTo('App\Lists');
	}
}
