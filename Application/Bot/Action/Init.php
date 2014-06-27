<?php
namespace Application\Bot\Action {

    class Init {

            protected $_structure = array();
            protected $_bucket = array();
            protected $_action = array();

            public function __construct($action, $bucket, $argument = array())
            {
                $this->_action      = $action;
                $this->_bucket      = $bucket;
                $this->_structure   = $argument;
                $type               = $this->_get('type');
                $token              = $this->_get('token');
                $node               = $bucket->getSource()->getConnection()->getCurrentNode();

                $node->setToken($token);
                $node->setType($type);
            }

            protected function _get($name)
            {
                return (isset($this->_structure[$name])) ? $this->_structure[$name] : null;
            }

            public function response()
            {
                $msg = 'Init of => Type : '.$this->_bucket->getSource()->getConnection()->getCurrentNode()->getType()
                           .' and Token : '.$this->_bucket->getSource()->getConnection()->getCurrentNode()->getToken();

                $this->_action->getResponse()->message($msg)->valid(true);
            }
    }
}