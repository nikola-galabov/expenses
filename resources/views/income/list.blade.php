@extends('layouts.app')

@section('title', 'Incomes')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Incomes</h3>
        </div>

        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>                  
                <tbody>
                    @unless(count($incomes))
                        <tr>
                            <td colspan="3">
                                There are no incomes entered.
                            </td>
                        </tr>
                    @endunless
                    
                    @foreach($incomes as $income)
                        <tr>                            
                            <td>{{ $income->id }}</td>
                            <td>{{ $income->name }}</td>
                            <td>{{ $income->type->name }}</td>
                            <td>{{ money_format('$%i', $income->amount) }}</td>
                            <td>
                                <a class="btn btn-link" href="/incomes/{{ $income->id }}"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>
                                {{-- <a href="/incomes/{{ $income->id }}/edit">Edit</a> --}}

                                @include(
                                    'partials.modal',
                                    [
                                        'modal' => [
                                            'id' => 'edit-income-',
                                            'header' => 'Edit Income',
                                            'body' => 'income._form',
                                            'openButtonText' => '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>',
                                            'openButtonClass' => 'btn-link',
                                            'noFooter' => true,
                                            'footer' => null,
                                            'confirmBtnId' => 'confirm-edit-income--btn',
                                            'confirmButtonClass' => 'btn-primary',
                                            'confirmButtonText' => 'Confirm'
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
                                                '<form action="/incomes/' . $income->id . '" method="POST">' .
                                                    csrf_field() .
                                                    '<input type="hidden" name="_method" value="DELETE">' .
                                                    '<button class="btn btn-danger">Delete</button>' .
                                                '</form>',
                                            'openButtonText' => '<span class="text-danger glyphicon glyphicon-remove" aria-hidden="true"></span>',
                                            'openButtonClass' => 'btn-link',
                                            'noFooter' => false,
                                            'footer' => null,
                                            'confirmBtnId' => 'confirm-delete-income-' . $income->id .'-btn',
                                            'confirmButtonClass' => 'btn-primary',
                                            'confirmButtonText' => 'Confirm'
                                        ]
                                    ]
                                )
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @include(
                'partials.modal',
                [
                    'modal' => [
                        'id' => 'create-income',
                        'header' => 'Create Income',
                        'body' => 'income._form',
                        'openButtonText' => 'Create',
                        'openButtonClass' => 'btn-primary',
                        'noFooter' => true,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-create-income-btn',
                        'confirmButtonClass' => 'btn-primary',
                        'confirmButtonText' => 'Confirm'
                    ]
                ]
            )
        </div>
    </div>
@endsection        