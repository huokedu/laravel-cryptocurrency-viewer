console.log('start');

function WebSocketTest()
{
   if ("WebSocket" in window)
   {
      console.log("WebSocket is supported by your Browser!");
      
      // Let us open a web socket
      var ws = new WebSocket("wss://api2.poloniex.com");

      ws.onopen = function()
      {
         // Web Socket is connected, send data using send()
         ws.send(`{"command": "subscribe", "channel": "1002"}`);
         console.log("Message is sent...");
      };

      ws.onmessage = function (evt) 
      { 
         var received_msg = evt.data;
        //  console.log("Message is received..." + received_msg);
         UpdateCoinInfo(received_msg);
      };

      ws.onclose = function()
      { 
         // websocket is closed.
         alert("Connection is closed..."); 
      };
 
      window.onbeforeunload = function(event) {
         socket.close();
      };
   }
   
   else
   {
      // The browser doesn't support WebSocket
      alert("WebSocket NOT supported by your Browser!");
   }
}

WebSocketTest();

function UpdateCoinInfo(msg) {
  let info = JSON.parse(msg);
  let coinInfo = info[2]
  if (coinInfo) {
    // console.log(coinInfo);
    let infoObj = {
      id: coinInfo[0],
      last: coinInfo[1],
      lowestAsk: coinInfo[2],
      highestBid: coinInfo[3],
      percentChange: coinInfo[4],
      baseVolume: coinInfo[5],
      quoteVolume: coinInfo[6],
      isFrozen: coinInfo[7],
      high24hr: coinInfo[8],
      low24hr: coinInfo[9]
    };
    // console.log(infoObj.id);
    $('#coin' + infoObj.id + ' > .last').text(infoObj.last);
    $('#coin' + infoObj.id + ' > .lowestAsk').text(infoObj.lowestAsk);
    $('#coin' + infoObj.id + ' > .highestBid').text(infoObj.highestBid);
    $('#coin' + infoObj.id + ' > .percentChange').text(infoObj.percentChange);
    $('#coin' + infoObj.id + ' > .baseVolume').text(infoObj.baseVolume.toFixed(2));
    $('#coin' + infoObj.id + ' > .quoteVolume').text(infoObj.quoteVolume.toFixed(2));
    $('#coin' + infoObj.id + ' > .isFrozen').text(infoObj.isFrozen);
    $('#coin' + infoObj.id + ' > .high24hr').text(infoObj.high24hr);
    $('#coin' + infoObj.id + ' > .low24hr').text(infoObj.low24hr);
  }
};