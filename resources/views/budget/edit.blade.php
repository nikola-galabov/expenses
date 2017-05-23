@extends('layouts.app')

@section('title', 'Edit Budget')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Budget</h3>
        </div>

        <div class="panel-body">
            @include('budget._form')
        </div>
    </div>
@endsection