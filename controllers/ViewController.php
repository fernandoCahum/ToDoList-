<?php
class ViewController {

	private static $view_path = __DIR__ . "/../views/layouts/";

	public function load_view ($view){
		require_once( self::$view_path . 'header.php' );
		require_once( self::$view_path . '../' . $view . '.php' );
		require_once( self::$view_path . 'footer.php' );
	}
}