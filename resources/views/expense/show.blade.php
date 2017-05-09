@extends('layouts.app')

@section('title', 'View Expense')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Expense #{{ $expense->id }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">Product:</div>
                <div class="col-md-6"><strong>{{ $expense->product }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Type:</div>
                <div class="col-md-6"><strong>{{ $expense->type->name }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Money Spent:</div>
                <div class="col-md-6"><strong>{{ $expense->price }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Last Modified:</div>
                <div class="col-md-6"><strong>{{ $expense->updated_at->toDateTimeString() }} ({{ $expense->updated_at->diffForHumans()}})</strong></div>
            </div>
        </div>
        <div class="panel-footer">
            @include(
                'partials.modal',
                [
                    'modal' => [
                        'openButtonText' => 'Update',
                        'openButtonClass' => 'btn-primary',
                        'header' => 'Edit Expense',
                        'id' => 'edit-expense',
                        'body' => 'expense._form',
                        'noFooter' => true,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-edit-expense-btn',
                        'confirmButtonClass' => 'btn-primary',
                        'confirmButtonText' => 'Update'
                    ]
                ]
            )

            @include(
                'partials.modal',
                [
                    'modal' => [
                        'id' => 'delete-expense-' . $expense->id,
                        'header' => 'Delete Expense',
                        'body' => '<p>Are you sure you want to delete this expense?</p>' .
                            '<form action="/expenses/' . $expense->id . '" method="post">' . 
                                csrf_field() .
                                '<input type="hidden" name="_method" value="DELETE">' .
                            '</form>',
                        'openButtonText' => 'Delete',
                        'openButtonClass' => 'btn-danger',
                        'noFooter' => false,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-delete-expense-' . $expense->id . '-btn',
                        'confirmButtonClass' => 'btn-danger',
                        'confirmButtonText' => 'Delete'
                    ]
                ]
            )
        </div>
    </div>
@endsection