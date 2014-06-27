<?php
namespace Application\Bot {

    class Action {
        protected $_response = null;
        protected $_bot      = null;

        public function __construct(Response $response, $bot)
        {
            $this->_response = $response;
            $this->_bot      = $bot;
        }

        public function getBot()
        {
            return $this->_bot;
        }

        public function getResponse()
        {
            return $this->_response;
        }
        public function make($bucket, $action, $arguments = array())
        {
            $name = '\\Application\\Bot\\Action\\'.ucfirst($action);

            if(class_exists($name , true)){
                return new $name($this, $bucket, $arguments);
            }

            return null;
        }



    }
}