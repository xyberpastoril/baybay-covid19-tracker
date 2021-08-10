<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveCases extends Model 
{

    protected $table = 'active_cases_log';
    public $timestamps = true;
    protected $fillable = array('date_issued', 'confirmed', 'probable', 'suspected', 'reference');

}