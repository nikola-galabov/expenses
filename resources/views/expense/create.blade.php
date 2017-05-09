@extends('layouts.app')

@section('title', 'Create Expense')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Create Expense</h3>
        </div>

        <div class="panel-body">
            @include('expense._form')
        </div>
    </div>
@endsection