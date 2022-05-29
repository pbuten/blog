<?php

Flight::route('/', array('MainController', 'index'));

Flight::route('/hello', function(){
    echo "Hello!";
});
 
Flight::route('/hello/@name', array('MainController', 'test'));
