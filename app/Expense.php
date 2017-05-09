<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product',
        'price',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\ExpenseType');
    }
}
