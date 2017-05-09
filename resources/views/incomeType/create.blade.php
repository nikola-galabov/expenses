@extends('layouts.app')

@section('title', 'Create Income Type')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Create Income Type</h3>
        </div>
        <div class="panel-body">
            @include('incomeType._form')
        </div>
    </div>
@endsection