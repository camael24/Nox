(function() {
    var host = 'ws://127.0.0.1:8889';
    var socket = null;
    var output = $('#output');
    var timeout = null;
    var ptcl = {
        type: "cmd",
        token: 'azerty',
    };
    var print = function(message) {

        var samp = document.createElement('samp');
        samp.innerHTML = message + '\n';
        output.append(samp);
        return;
    };

    function disableAction() {
        $('button[data-action]').each(function(index) {
            $(this).attr('disabled', 'disabled');
        });
    }

    function enableAction() {
        $('button[data-action]').each(function(index) {
            $(this).attr('disabled', null);
        });
    }

    function checkActivity(json) {
        if (json.isActive == true) {
            $('#active')
                .removeClass('btn-default')
                .removeClass('btn-warning')
                .removeClass('btn-danger')
                .addClass('btn-success')
                .attr('disabled', null)
                .html('<span class="glyphicon glyphicon-play"></span>');
        } else {
            $('#active')
                .removeClass('btn-default')
                .removeClass('btn-success')
                .removeClass('btn-danger')
                .addClass('btn-danger')
                .attr('disabled', null)
                .html('<span class="glyphicon glyphicon-pause"></span>');
        }
    }


    $('button[data-action]').click(function() {

        ptcl.action = $(this).attr('data-action');
        ptcl.bot = $(this).attr('data-bot-action');

        disableAction();
        socket.send(JSON.stringify(ptcl));
    })

    function ws_connect() {
        clearTimeout(timeout);

        $('#status')
            .removeClass('btn-default')
            .removeClass('btn-danger')
            .removeClass('btn-warning')
            .addClass('btn-warning')
            .html('<span class="glyphicon glyphicon-refresh"></span>');
        try {
            socket = new WebSocket(host);
            socket.onopen = function() {
                $('#status')
                    .removeClass('btn-default')
                    .removeClass('btn-danger')
                    .removeClass('btn-warning')
                    .addClass('btn-success')
                    .html('<span class="glyphicon glyphicon-signal"></span>');

                output.empty();
                print('Connection open');

                ptcl.action = 'init';
                socket.send(JSON.stringify(ptcl));
                return;
            };
            socket.onmessage = function(msg) {
                enableAction();
                var j = JSON.parse(msg.data)
                checkActivity(j);
                print(msg.data);
                console.log(j);

                return;
            };
            socket.onclose = function() {
                $('#status')
                    .removeClass('btn-default')
                    .removeClass('btn-success')
                    .removeClass('btn-warning')
                    .addClass('btn-danger')
                    .html('<span class="glyphicon glyphicon-off"></span>');

                print('connection is closed');
                setTimeout(ws_connect, 1000);

                return;
            };
        } catch (e) {
            console.log(e);
        }
    }

    ws_connect();
})(this);