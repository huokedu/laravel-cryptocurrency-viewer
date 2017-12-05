@extends('layouts.app')

@section('content')
<div class="container">
    <!-- TradingView Widget BEGIN -->
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
    new TradingView.widget({
    "width": 980,
    "height": 610,
    "symbol": "{{$symbol}}",
    "interval": "D",
    "timezone": "Etc/UTC",
    "theme": "Light",
    "style": "1",
    "locale": "en",
    "toolbar_bg": "#f1f3f6",
    "enable_publishing": false,
    "allow_symbol_change": true,
    "withdateranges": true,
    "hideideas": true
    });
    </script>
    <!-- TradingView Widget END -->
</div>
@endsection
