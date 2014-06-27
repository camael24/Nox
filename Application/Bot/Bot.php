<?php
namespace Application  {

    class Bot {
        protected $_active = true;
        protected $_inprogress = false;

        public function suspend()
        {
            $this->_active = false;
        }

        public function active()
        {
            $this->_active = true;
        }

        public function isActive()
        {
            return $this->_active;
        }

        public function run($cmd)
        {
            if($this->_active === false)
                return false;

            $cmd = str_replace('.', '_', $cmd);

            if(in_array($cmd, get_class_methods($this))){
                return call_user_func_array(array($this, $cmd), array());
            }
            else{
                echo 'Bot::'.$cmd.'() function not found, think to reboot the server'."\n";
                return false;
            }


        }

        public function login()
        {
            return 'logged or not :p';
        }


    }
}