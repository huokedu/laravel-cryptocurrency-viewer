@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table-striped table-bordered table-hover table-ticker">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>id</th>
                                <th>last</th>
                                <th>lowestAsk</th>
                                <th>highestBid</th>
                                <th>baseVolume</th>
                                <th>quoteVolume</th>
                                <th>high24hr</th>
                                <th>low24hr</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($coins as $coin)
                            <tr>
                                <td>{{ $coin->name }}</td>
                                <td>{{ $coin->id }}</td>
                                <td>{{ number_format($coin->last, 10) }}</td>
                                <td>{{ number_format($coin->lowestAsk, 10) }}</td>
                                <td>{{ number_format($coin->highestBid, 10) }}</td>
                                <td>{{ number_format($coin->baseVolume, 10) }}</td>
                                <td>{{ number_format($coin->quoteVolume, 10) }}</td>
                                <td>{{ number_format($coin->high24hr, 10) }}</td>
                                <td>{{ number_format($coin->low24hr, 10) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
