<?php
namespace Application\Bot\Action {

    class Suspend {

            protected $_action = array();

            public function __construct($action, $bucket, $argument = array())
            {
                $this->_action = $action;
                $this->_action->getBot()->suspend();
            }

            public function response()
            {
                $this->_action->getResponse()->message('Bot inactive')->valid(true);
            }
    }
}