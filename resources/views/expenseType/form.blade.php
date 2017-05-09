@extends('layouts.app')

@section('title', 'Create Expense Type')
    
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                @if(isset($expenseType))
                    Edit
                @else
                    Create
                @endif
                Expense Type
            </h3>
        </div>
        <div class="panel-body">
            <form class="form" role="form" method="POST" action="/expenseTypes{{ isset($expenseType) ? '/' . $expenseType->id : '' }}">
                {{ csrf_field() }}

                @if(isset($expenseType))
                    <input type="hidden" name="_method" value="PUT">
                @endif
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name:</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ isset($expenseType) ? $expenseType->name : old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-primary pull-right">{{ isset($expenseType) ? 'Update' : 'Create'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection