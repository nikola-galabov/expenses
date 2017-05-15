@extends('layouts.app')

@section('title', 'View Income')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Income #{{ $income->id }}</h3>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">Name:</div>
                <div class="col-md-6"><strong>{{ $income->name }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Type:</div>
                <div class="col-md-6"><strong>{{ is_null($income->type) ? 'N/A' : $income->type->name }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Amount:</div>
                <div class="col-md-6"><strong>{{ $income->amount }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Last Modified:</div>
                <div class="col-md-6"><strong>{{ $income->updated_at->toDateTimeString() }} ({{ $income->updated_at->diffForHumans()}})</strong></div>
            </div>
        </div>

        <div class="panel-footer">
            @include(
                'partials.modal',
                [
                    'modal' => [
                        'openButtonText' => 'Edit',
                        'openButtonClass' => 'btn-primary',
                        'header' => 'Edit Income',
                        'id' => 'edit-income',
                        'body' => 'income._form',
                        'noFooter' => true,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-edit-income-btn',
                        'confirmButtonClass' => 'btn-primary',
                        'confirmButtonText' => 'Update'
                    ]
                ]
            )

            @include(
                'partials.modal',
                [
                    'modal' => [
                        'id' => 'delete-income-' . $income->id,
                        'header' => 'Delete Income',
                        'body' => '<p>Are you sure you want to delete this income?</p>' .
                            '<form action="/incomes/' . $income->id . '" method="post">' . 
                                csrf_field() .
                                '<input type="hidden" name="_method" value="DELETE">' .
                            '</form>',
                        'openButtonText' => 'Delete',
                        'openButtonClass' => 'btn-danger',
                        'noFooter' => false,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-income-expense-' . $income->id . '-btn',
                        'confirmButtonClass' => 'btn-danger',
                        'confirmButtonText' => 'Delete'
                    ]
                ]
            )
        </div>
    </div>
@endsection