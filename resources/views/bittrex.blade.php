@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                    <table id="table-ticker" class="table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>MarketName</th>
                                <th>MarketCurrencyLong</th>
                                <th>High</th>
                                <th>Low</th>
                                <th>Last</th>
                                <th>Volume</th>
                                <th>OpenBuyOrders</th>
                                <th>OpenSellOrders</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($coins as $coin)
                            <tr id={{ $coin->MarketName }}>
                                <td class="logo">
                                    <a href="/bittrex/tradingview/{{ $coin->MarketName }}">
                                        <div class="logo-wrapper">
                                        @if ($coin->LogoUrl)
                                            <img src={{ $coin->LogoUrl }} alt="Bittrex Coin"/>
                                        @else
                                            {{ $coin->MarketName }}
                                        @endif
                                        </div>
                                    </a>
                                </td>
                                <th>{{ $coin->MarketName }}</th>
                                <td class="name">{{ $coin->BaseCurrency }} / {{ $coin->MarketCurrencyLong }}</td>
                                <td class="high">{{ number_format($coin->High, 10) }}</td>
                                <td class="low">{{ number_format($coin->Low, 10) }}</td>
                                <td class="last">{{ number_format($coin->Last, 10) }}</td>
                                <td class="volume">{{ number_format($coin->Volume, 10) }}</td>
                                <td class="openbuyorders">{{ number_format($coin->OpenBuyOrders) }}</td>
                                <td class="opensellorders">{{ number_format($coin->OpenSellOrders) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bittrex.js') }}"></script>
@endsection
