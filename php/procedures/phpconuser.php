<?php
    try {
        //TODO PROD
       $con = new PDO('mysql:host=212.44.101.107;dbname=lanceout_landingpage', 'lanceout_lanceout', 'WH~pid9G41~#',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

	if(!$con)
	{
        die('Could not connect: '.mysql_error());
	}

?>
