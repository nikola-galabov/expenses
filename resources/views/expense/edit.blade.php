@extends('layouts.app')

@section('title', 'Edit Expense')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Expense</h3>
        </div>

        <div class="panel-body">
            @include('expense._form')
        </div>
    </div>
@endsection