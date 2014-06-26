<?php

namespace {

    use Sohoa\Framework\Framework;

    require_once __DIR__ . '/../vendor/autoload.php';

        $server = new Hoa\Websocket\Server(
            new Hoa\Socket\Server('tcp://0.0.0.0:8889')
        );

        $server->on('open' , function ( Hoa\Core\Event\Bucket $bucket ) {
            echo date('H:i:s').' : connect ',"\n";
            return;
        });

        $server->on('message', function ( Hoa\Core\Event\Bucket $bucket ) {

            $data = $bucket->getData();
            echo date('H:i:s').' : message: ', $data['message'], "\n";
            $bucket->getSource()->send($data['message']);
            return;
        });

           $server->on('close' , function ( Hoa\Core\Event\Bucket $bucket ) {
            echo date('H:i:s').' : close ',"\n";
            return;
        });

        $server->run();

}

