@extends('layouts.app')

@section('title', 'View Budget')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">View Budget {{ $budget->id }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">Period:</div>
                <div class="col-md-6"><strong>{{ $budget->start_date->toDateString() }} - {{ $budget->end_date->toDateString() }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Spent:</div>
                <div class="col-md-6"><strong>{{ $budget->expenses->sum('price') }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Budget:</div>
                <div class="col-md-6"><strong>{{ $budget->incomes->sum('amount') }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Balance:</div>
                <div class="col-md-6"><strong>{{ $budget->incomes->sum('amount') - $budget->expenses->sum('price') }}</strong></div>
            </div>
            <div class="row">
                <div class="col-md-6">Last Modified:</div>
                <div class="col-md-6"><strong>{{ $budget->updated_at->toDateTimeString() }} ({{ $budget->updated_at->diffForHumans()}})</strong></div>
            </div>
        </div>
        <div class="panel-footer">
            @include(
                'partials.modal',
                [
                    'modal' => [
                        'id' => 'edit-budget-' . $budget->id,
                        'header' => 'Edit Budget',
                        'body' => 'budget._form',
                        'openButtonText' => 'Edit',
                        'openButtonClass' => 'btn-primary',
                        'noFooter' => true,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-edit-budget-' . $budget->id . '-btn',
                        'confirmButtonClass' => 'btn-primary',
                        'confirmButtonText' => 'Confirm'
                    ]
                ]
            )

            @include(
                'partials.modal',
                [
                    'modal' => [
                        'id' => 'delete-budget-' . $budget->id,
                        'header' => 'Delete Budget',
                        'body' => 'Are you sure that you want to delete this budget?' .
                            '<form action="/budgets/' . $budget->id . '" method="POST">' .
                                csrf_field() .
                                '<input type="hidden" name="_method" value="DELETE">' .
                            '</form>',
                        'openButtonText' => 'Delete',
                        'openButtonClass' => 'btn-danger',
                        'noFooter' => false,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-delete-budget-' . $budget->id . '-btn',
                        'confirmButtonClass' => 'btn-danger',
                        'confirmButtonText' => 'Delete'
                    ]
                ]
            )
        </div>
    </div>
@endsection