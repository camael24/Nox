<?php
namespace Application\Bot\Action {

    class Bot {

            protected $_action = array();
            protected $_run    = '';
            protected $_valid  = false;

            public function __construct($action, $bucket, $argument = array())
            {
                $this->_action = $action;
                $this->_run    = $argument['bot'];
                $this->_valid  = $this->_action->getBot()->run($this->_run);
            }

            public function response()
            {
                $this->_action->getResponse()->message('Bot do '.$this->_run)->valid($this->_valid);
            }
    }
}