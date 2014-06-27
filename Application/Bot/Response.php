<?php
namespace Application\Bot {

    class Response
    {
        protected $_resp = array();

        public function __call($name , $arg){
            $string = array_shift($arg);

            $this->_resp[$name] = $string;

            return $this;
        }

        public function render()
        {
            return json_encode($this->_resp);
        }
    }
}