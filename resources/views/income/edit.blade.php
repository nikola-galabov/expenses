@extends('layouts.app')

@section('title', 'Edit Income')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Income</h3>
        </div>
        <div class="panel-body">
            @include('income._form')
        </div>
    </div>
@endsection