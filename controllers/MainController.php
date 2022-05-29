<?php
	class MainController {

        public function __construct() {}

        public static function index() {
            echo 'Hello world!';
        }

        public static function test($name) {
            Flight::view()->display('template.html', ["name"=>$name]);
        }
    }
		
