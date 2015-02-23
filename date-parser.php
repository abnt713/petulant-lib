<?php

final class DateParser{
	
	private static $instance;
	
	private function __construct(){ }
	
	public static function getInstance(){
		
		if(self::$instance == null){
			self::$instance = new DateParser();
		}
		
		return self::$instance;
	}
	
	public function toDatabaseFormat($date){
		$parsedDate = '';
		$exploded = explode(' ', $date);
		$onlyDate = $exploded[0];
		
		$explodedDate = explode('/', $onlyDate);
		$parsedDate .= $explodedDate[2] . '-';
		$parsedDate .= $explodedDate[1] . '-';
		$parsedDate .= $explodedDate[0];
		
		$parsedDate .= isset($exploded[1]) ? '' . $exploded[1] : '';
			
			
		return $parsedDate;
	}
	
	public function toFormat($date, $format){
		$date = new DateTime($date);
		
		return $date->format($format);
	}
	
}
