@extends('layouts.app')

@section('title', 'Budgets')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Budgets</h3>
        </div>

        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Period</th>
                        <th>Spent</th>
                        <th>Budget</th>
                        <th>Balance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @unless(count($budgets))
                        <tr>
                            <td colspan="4">
                                There are no records found.
                            </td>
                        </tr>
                    @endunless

                    @foreach($budgets as $budget)
                        <tr>
                            <td>{{ $budget->id }}</td>
                            <td>{{ $budget->start_date->toDateString() }} - {{ $budget->end_date->toDateString() }}</td>
                            <td>{{ $budget->expenses->sum('price') }}</td>
                            <td>{{ $budget->incomes->sum('price') }}</td>
                            <td>{{ $budget->expenses->sum('price') - $budget->incomes->sum('price') }}</td>
                            <td>
                                <a class="btn btn-link" href="/budgets/{{ $budget->id }}"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>

                                @include(
                                    'partials.modal',
                                    [
                                        'modal' => [
                                            'id' => 'edit-budget-' . $budget->id,
                                            'header' => 'Edit Budget',
                                            'body' => 'budget._form',
                                            'openButtonText' => '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>',
                                            'openButtonClass' => 'btn-link',
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
                                            'openButtonText' => '<span class="text-danger glyphicon glyphicon-remove" aria-hidden="true"></span>',
                                            'openButtonClass' => 'btn-link',
                                            'noFooter' => false,
                                            'footer' => null,
                                            'confirmBtnId' => 'confirm-delete-budget-' . $budget->id . '-btn',
                                            'confirmButtonClass' => 'btn-danger',
                                            'confirmButtonText' => 'Delete'
                                        ]
                                    ]
                                )
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            @php
                unset($budget);
            @endphp
            
            @include(
                'partials.modal',
                [
                    'modal' => [
                        'id' => 'create-budget',
                        'header' => 'Create Budget',
                        'body' => 'budget._form',
                        'openButtonText' => 'Create',
                        'openButtonClass' => 'btn-primary',
                        'noFooter' => true,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-create-budget-btn',
                        'confirmButtonClass' => 'btn-primary',
                        'confirmButtonText' => 'Confirm'
                    ]
                ]
            )
        </div>
    </div>
@endsection