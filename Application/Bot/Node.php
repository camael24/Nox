<?php
namespace Application\Bot {

    class Node extends \Hoa\Websocket\Node
    {
        protected $_type = null;
        protected $_token = null;

        public function setType($type)
        {
            $this->_type = $type;
        }

        public function getType()
        {
            return $this->_type;
        }

        public function setToken($token)
        {
            $this->_token = $token;
        }

        public function getToken()
        {
            return $this->_token;
        }
    }
}