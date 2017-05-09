@extends('layouts.app')

@section('title', 'Dashboard')
    
@section('content')
    <div class="row">
        <div class="col-md-12">
            <canvas id="mounthly-balance-chart" width="400" height="150"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Expenses</h3>
                </div>
                <div class="panel-body">
                    @unless(count($expenses) > 0)
                        <p>You have no expenses</p>
                    @endunless

                    @foreach($expenses as $expense)
                        <div class="col-md-12">
                            <div class="col-md-4">
                                {{ $expense->product }}
                            </div>
                            <div class="col-md-4">
                                {{ money_format('$%i', $expense->price) }}
                            </div>
                            <div class="col-md-4">
                                <a href="/expenses/{{ $expense->id }}">Details</a>
                            </div>
                        </div>    
                    @endforeach
                </div>
                <div class="panel-footer clearfix">
                    {{-- We have to unset the $expense variable, because otherwhise we will include the update form instead of create --}}
                    @php
                        unset($expense);
                    @endphp

                    @include(
                        'partials.modal',
                        [
                            'modal' => [
                                'openButtonText' => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
                                'openButtonClass' => 'btn-success pull-right',
                                'header' => 'Add Expense',
                                'id' => 'add-expense',
                                'body' => 'expense._form',
                                'noFooter' => true,
                                'footer' => null,
                                'confirmBtnId' => 'confirm-add-expense-btn',
                                'confirmButtonClass' => 'btn-primary',
                                'confirmButtonText' => 'Confirm'
                            ]
                        ]
                    ) 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Summary</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <strong>Budget:</strong>
                            </div>
                            <div class="col-md-6">
                                {{ money_format('$%i', 1000.05) }}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <strong>Daily total:</strong>
                            </div>
                            <div class="col-md-6">
                                {{ money_format('$%i', 12.05) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <strong>Mounthly total:</strong>
                            </div>
                            <div class="col-md-6">
                                {{ money_format('$%i', 120) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <strong>Balance:</strong>
                            </div>
                            <div class="col-md-6">
                                {{ money_format('$%i', 820) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var $chartEl = $("#mounthly-balance-chart");
        var monthlyBalanceChart = new Chart($chartEl, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.1)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection