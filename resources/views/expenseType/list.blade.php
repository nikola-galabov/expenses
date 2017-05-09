@extends('layouts.app')

@section('title', 'Expense Types')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Expense Types</h3>
        </div>
        <div class="panel-body">
            @if(count($types))
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
                        @foreach($types as $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->created_at->toDateTimeString() }}</td>
                                <td>
                                    <a href="/expenseTypes/{{ $type->id }}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    <button data-id="{{ $type->id }}" class="btn btn-link" data-toggle="modal" data-target="#delete-modal"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></button>
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

            <a class="btn btn-primary" href="/expenseTypes/create">Create</a>
        </div>        
    </div>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteModalLabel">Delete Expense Type</h4>
            </div>
            <div class="modal-body">
                <p class="text-danger">Are you sure that you want to delete this expense type?</p>
                <form id="delete-expense-form" method="post" action="/expenseTypes/">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="confirm-delete" type="button" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
    </div>    
@endsection
