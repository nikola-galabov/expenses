@extends('layouts.app')

@section('title', 'Create Expense Type')
    
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Create Expense Type
            </h3>
        </div>
        <div class="panel-body">
            @include('expenseType._form')
        </div>
    </div>
@endsection