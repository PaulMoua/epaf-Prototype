<?php

/* Crée une connection à une base de donnée. Les paramètres de connexion sont écrits en dure*/

class BDDConnect{
	protected $conn=null;
	protected $pservername='localhost';
	protected $pusername='root';
	protected $ppassword='root'; 
	protected $pdbname="vlveter";

	public function BDDConnection(){

	try {

		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';

	    $this->conn = new PDO("mysql:host=$this->pservername;dbname=$this->pdbname", $this->pusername, $this->ppassword, $pdo_options);
	    // set the PDO error mode to exception
	    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    /*echo "Connected successfully";*/
	    }
	catch(PDOException $e)
	    {
	    /*echo "Connection failed: " . $e->getMessage();*/
	    }
	}



}