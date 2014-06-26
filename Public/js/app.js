(function() {
  var host   = 'ws://127.0.0.1:8889';
  var socket = null;
  var output = $('#output');
  var timeout = null;
  var print  = function ( message ) {

      var samp       = document.createElement('samp');
      samp.innerHTML = message + '\n';
      output.append(samp);

      return;
  };



  $('button[data-action]').click(function() {

    var data = $(this).attr('data-action');

    socket.send(data);
  })

function ws_connect(){
    clearTimeout(timeout);
    print('Connect ?');
  try {

      socket = new WebSocket(host);
      socket.onopen = function ( ) {

          $('#status').removeClass('btn-default').removeClass('btn-danger').addClass('btn-success').text('Connection open');
          print('Connection open');
          input.focus();

          return;
      };
      socket.onmessage = function ( msg ) {

          print(msg.data);

          return;
      };
      socket.onclose = function ( ) {

    $('#status').removeClass('btn-default').removeClass('btn-success').addClass('btn-danger').text('Connection close');
          print('connection is closed');
            setTimeout(ws_connect, 1000);
          return;
      };
  }
  catch ( e ) {console.log(e);}
 }

 ws_connect();
})(this);