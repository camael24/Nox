<?php

namespace {


    require_once __DIR__ . '/../vendor/autoload.php';

        \Sohoa\Framework\Framework::initialize();
        /**
        * WS Type  : ['command_control', 'web', 'bot']
        * command_control : Send action to bot
        * web             : Send active status,cookie,session to bot + status to command_control
        * bot             : Do actio
        */
        $response = new \Application\Bot\Response();
        $bot      = new \Application\Bot();
        $action   = new \Application\Bot\Action($response, $bot);
        $server   = new \Hoa\Websocket\Server(new \Hoa\Socket\Server('tcp://0.0.0.0:8889'));
        $server
            ->getConnection()
            ->setNodeName('\\Application\\Bot\\Node');

        $server->on('open' , function ( Hoa\Core\Event\Bucket $bucket ) use ($action){
            echo \Hoa\Console\Chrome\Text::colorize(' '.date('H:i:s').' : connect ', 'fg(green)')."\n";

            return;
        });

        $server->on('message', function ( Hoa\Core\Event\Bucket $bucket ) use ($action, $response) {

            $data     = $bucket->getData();
            $json     = json_decode($data['message'] , true);
            $cmd      = null;

            echo \Hoa\Console\Chrome\Text::colorize('> '.date('H:i:s').' : '.$data['message'], 'fg(blue) bg(white)')."\n";

            if(array_key_exists('action', $json)){
                $act      = $json['action'];
                $arg      = (isset($json['arg'])) ? $json['arg'] : array();
                $cmd      = $action->make($bucket, $act, $json);
            }

            if(is_object($cmd)){
                $cmd->response();
            } else {
                $response->message(date('H:i:s').' : message: '. $json['action']);
            }

            $response->isActive($action->getBot()->isActive());

            echo \Hoa\Console\Chrome\Text::colorize('< '.date('H:i:s').' : '.$response->render(), 'fg(blue) bg(green)')."\n";
            $bucket->getSource()->send($response->render());
            return;
        });

           $server->on('close' , function ( Hoa\Core\Event\Bucket $bucket ) use ($action){
            $type = $bucket->getSource()->getConnection()->getCurrentNode()->getType();

            echo \Hoa\Console\Chrome\Text::colorize(' '.date('H:i:s').' : ['.$type.'] close ', 'fg(white) bg(red)')."\n";
            return;
        });

        $server->run();

}

