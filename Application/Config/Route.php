<?php

/* @var $framework \Sohoa\Framework\Framework */

// Defines the defaults route
$this->get('/', array('as' => 'root','to' => 'Main#index'));

$err = $this->getFramework()->getErrorHandler();
$err->handleErrorsAsException();
$err->routeError(\Sohoa\Framework\ErrorHandler::ROUTE_ALL_ERROR, 'Error#Default');
$err->routeError(\Sohoa\Framework\ErrorHandler::ROUTE_ERROR_404, 'Error#Err404');
$err->routeError('\ErrorException', 'Error#PHP');
