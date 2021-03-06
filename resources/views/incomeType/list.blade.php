@extends('layouts.app')

@section('title', 'Incomes')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Income Types</h3>
        </div>

        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @unless(count($incomeTypes) > 0)
                        <tr>
                            <td colspan="3">There are no records found.</td>
                        </tr>
                    @endunless

                    @foreach($incomeTypes as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>
                                @include(
                                    'partials.modal',
                                    [
                                        'modal' => [
                                            'id' => 'incomeType' . $type->id . '-edit',
                                            'header' => 'Edit Income Type',
                                            'body' => 'incomeType._form',
                                            'openButtonText' => '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>',
                                            'openButtonClass' => 'btn-link',
                                            'noFooter' => true,
                                            'footer' => null,
                                            'confirmBtnId' => 'confirm-incomeType' . $type->id . '-edit-btn',
                                            'confirmButtonClass' => 'btn-primary',
                                            'confirmButtonText' => 'Update'
                                        ]
                                    ]
                                )
                                
                                @include(
                                    'partials.modal',
                                    [
                                        'modal' => [
                                            'id' => 'incomeType' . $type->id . '-delete',
                                            'header' => 'Delete Income Type',
                                            'body' => '<p>Are you sure you want to delete this income type?</p>' .
                                                '<form action="/incomeTypes/' . $type->id . '" method="post">' . 
                                                    csrf_field() .
                                                    '<input type="hidden" name="_method" value="DELETE">' .
                                                '</form>',
                                            'openButtonText' => '<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>',
                                            'openButtonClass' => 'btn-link',
                                            'noFooter' => false,
                                            'footer' => null,
                                            'confirmBtnId' => 'confirm-incomeType' . $type->id . '-edit-btn',
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
                unset($type);
            @endphp

            @include(
                'partials.modal',
                [
                    'modal' => [
                        'id' => 'create-incomeType',
                        'header' => 'Create Income Type',
                        'body' => 'incomeType._form',
                        'openButtonText' => 'Create',
                        'openButtonClass' => 'btn-primary',
                        'noFooter' => true,
                        'footer' => null,
                        'confirmBtnId' => 'confirm-create-incomeType-btn',
                        'confirmButtonClass' => 'btn-primary',
                        'confirmButtonText' => 'Update'
                    ]
                ]
            )
        </div>
    </div>
@endsection
