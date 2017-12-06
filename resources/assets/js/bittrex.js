console.log('start');

function GetBittrexInfo() {
  console.log('update bittrex info');
  $.ajax({
    type: 'GET',
    url: "/bittrex/getmarketsummaries",
    contentType: 'application/json',
    success: function(result){
      UpdateCoinInfo(result);
    }
  });
  setTimeout(GetBittrexInfo, 60000);
}

GetBittrexInfo();


function UpdateCoinInfo(msg) {
  let coins = JSON.parse(msg);
  for (let i = 0; i < coins.length; i++) {
    let coin = coins[i];
    let elementId = '#table-ticker #' + coin.MarketName;
    $(elementId + ' > .high').text(coin.High.toFixed(10));
    $(elementId + ' > .low').text(coin.Low.toFixed(10));
    $(elementId + ' > .last').text(coin.Last.toFixed(10));
    $(elementId + ' > .volume').text(coin.Volume.toFixed(10));
    $(elementId + ' > .openbuyorders').text(coin.OpenBuyOrders);
    $(elementId + ' > .opensellorders').text(coin.OpenSellOrders);
  }
};