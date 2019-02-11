<?php 

	/**
	 * Esta clase representa la configuracion del proyecto MVC
	 */
	class Config
	{
		private static $configuracion = array();
		
		public static function get($key){
			if (self::$configuracion[$key]) {
				return self::$configuracion[$key];
			}else{
				return null;
			}
		}

		public static function set($key, $val){
			self::$configuracion[$key] = $val;
		}

		function __construct()
		{
			# code...
		}
	}
	

 ?>