@extends('layouts.app')

@section('title', 'Expense Types')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Expense Types</h3>
        </div>
        <div class="panel-body">
            @if(count($expenseTypes))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenseTypes as $expenseType)
                            <tr>
                                <td>{{ $expenseType->id }}</td>
                                <td>{{ $expenseType->name }}</td>
                                <td>{{ $expenseType->created_at->toDateTimeString() }}</td>
                                <td>
                                    @include(
                                        'partials.modal',
                                        [
                                            'modal' => [
                                                'id' => 'edit-expenseType-' . $expenseType->id,
                                                'header' => 'Edit Expense Type',
                                                'body' => 'expenseType._form',
                                                'openButtonText' => '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>',
                                                'openButtonClass' => 'btn-link',
                                                'noFooter' => true,
                                                'footer' => null,
                                                'confirmBtnId' => 'confirm-edit-expenseType-' . $expenseType->id . '-btn',
                                                'confirmButtonClass' => 'btn-primary',
                                                'confirmButtonText' => 'Confirm'
                                            ]
                                        ]
                                    )
                                    
                                    @include(
                                        'partials.modal',
                                        [
                                            'modal' => [
                                                'id' => 'delete-expenseType-' . $expenseType->id,
                                                'header' => 'Delete Expense Type',
                                                'body' => 'Are you sure that you want to delete this expence tpye?' .
                                                    '<form action="/expenseTypes/' . $expenseType->id . '" method="post">' .
                                                        csrf_field() .
                                                        '<input type="hidden" name="_method" value="delete">' .
                                                    '</form>',
                                                'openButtonText' => '<span class="text-danger glyphicon glyphicon-remove" aria-hidden="true"></span>',
                                                'openButtonClass' => 'btn-link',
                                                'noFooter' => false,
                                                'footer' => null,
                                                'confirmBtnId' => 'confirm-delete-expenseType-' . $expenseType->id . '-btn',
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
            @else
                <p>
                    There are no expense types.
                </p>
            @endif

            @php
                unset($expenseType)
            @endphp

            @include(
                'partials.modal',
                [
                    'modal' => [
                        'id' => 'create-expeseType',
                        'header' => 'Create Expense Type',
                        'body' => 'expenseType._form',
                        'openButtonText' => 'Create',
                        'openButtonClass' => 'btn-primary',
                        'noFooter' => true,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-create-expeseType-btn',
                        'confirmButtonClass' => 'btn-primary',
                        'confirmButtonText' => 'Confirm'
                    ]
                ]
            )
        </div>        
    </div> 
@endsection
