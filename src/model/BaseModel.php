<?php
namespace Model;

class BaseModel
{
	protected $db;

	function __construct( $db )
	{
		$this->db = $db;
	}
 
}