<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    use SoftDeletes;

    protected $dates = [
        'start_date',
        'end_date',
        'deleted_at'
    ];

    protected $fillable = [
        'start_date',
        'end_date',
    ];

    public function incomes()
    {
        return $this->belongsToMany('App\Income', 'budget_incomes');
    }

    public function expenses()
    {
        return $this->belongsToMany('App\Expense', 'budget_expenses');
    }
}
