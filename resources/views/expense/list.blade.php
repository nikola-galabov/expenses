@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Expenses</h3>
        </div>
        <div class="panel-body">
            @if(count($expenses))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                            <tr>
                                <td>{{ $expense->id }}</td>
                                <td>{{ $expense->product }}</td>
                                <td>{{ $expense->type->name }}</td>
                                <td>{{ $expense->price }}</td>
                                <td>{{ $expense->created_at->toDateTimeString() }}</td>
                                <td>
                                    <a class="btn btn-link" href="/expenses/{{ $expense->id }}"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>                                    

                                    @include(
                                        'partials.modal',
                                        [
                                            'modal' => [
                                                'openButtonText' => '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>',
                                                'openButtonClass' => 'btn-link',
                                                'header' => 'Edit Expense',
                                                'id' => 'edit-expense-' . $expense->id,
                                                'body' => 'expense._form',
                                                'noFooter' => true,
                                                'footer' => null,
                                                'confirmBtnId' => 'confirm-edit-expense-' . $expense->id . '-btn',
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
                                                'openButtonText' => '<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>',
                                                'openButtonClass' => 'btn-link',
                                                'noFooter' => false,
                                                'footer' => null,
                                                'confirmBtnId' => 'confirm-delete-expense-' . $expense->id . '-btn',
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
                    There are no expenses entered.
                </p>
            @endif

            {{-- We have to unset the $expense variable, because otherwhise we will include the update form instead of create --}}
            @php
                unset($expense);    
            @endphp

            @include(
                'partials.modal',
                [
                    'modal' => [
                        'openButtonText' => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
                        'openButtonClass' => 'btn-success btn-lg',
                        'header' => 'Create Expense',
                        'id' => 'create-expense',
                        'body' => 'expense._form',
                        'noFooter' => true,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-create-expense',
                        'confirmButtonClass' => 'btn-primary',
                        'confirmButtonText' => 'Create'
                    ]
                ]
            )
        </div>        
    </div>   
@endsection
