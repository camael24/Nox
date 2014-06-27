<?php
namespace Application\Bot\Action {

    interface Init {

            public function __construct($action, $bucket, $argument = array());

            public function response();
    }
}