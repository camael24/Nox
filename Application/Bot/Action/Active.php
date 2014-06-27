<?php
namespace Application\Bot\Action {

    class Active {

            protected $_action = array();

            public function __construct($action, $bucket, $argument = array())
            {
                $this->_action = $action;
                $this->_action->getBot()->active();
            }

            public function response()
            {
                $this->_action->getResponse()->message('Bot active')->valid(true);
            }
    }
}