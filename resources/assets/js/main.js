console.log('start');

function WebSocketTest()
{
   if ("WebSocket" in window)
   {
      alert("WebSocket is supported by your Browser!");
      
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
         console.log("Message is received..." + received_msg);
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