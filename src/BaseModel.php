<?php 
	class BaseModel
	{
		protected $db;
		protected $info_list;
		function __construct() { $this->db = App::getDB(); $this->info_list = [];}
	}


 ?>