<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'type_id',
        'amount'
    ];

    public function type()
    {
        return $this->belongsTo('App\IncomeType');
    }
}
