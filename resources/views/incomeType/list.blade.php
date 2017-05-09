@extends('layouts.app')

@section('title', 'Income Types')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Income Types</h3>
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
                                    <a href="#">Edit</a>
                                    <a href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="/incomeTypes/create">Create</a>
            </div>
        </div>
    </div>
@endsection
