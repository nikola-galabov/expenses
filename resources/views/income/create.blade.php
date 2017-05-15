@extends('layouts.app')

@section('title', 'Create Income')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Create Income</h3>
        </div>
        <div class="panel-body">
            @include('income._form')
        </div>
    </div>
@endsection