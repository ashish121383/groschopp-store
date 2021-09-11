<?php

	function array_to_csv($arraydata, $delim = ",", $newline = "\n", $enclosure = '"')
	{
		if ( ! is_array($arraydata))
		{
		        die('You must submit a valid array of csv data');
		}       
		$out = '';
		
		// Next blast through the result array and build out the rows
		foreach ($arraydata as $row)
		{
		        foreach ($row as $item)
		        {
		                $out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $item).$enclosure.$delim;
		        }
		        $out = substr($out, 0, -1);
		        $out = rtrim($out);
		        $out .= $newline;
		}
		return $out;
	}

	ini_set('display_errors', true);

	require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

	global $wpdb;

	$sql = "SELECT ip_address, torque_type, has_results, clicked_results, created_at FROM motor_match_log";
	$results = $wpdb->get_results($sql);
	
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	
	echo '"IP ADDRESS","TORQUE TYPE","RESULTS","CLICKED","CREATED AT"'."\n";
	echo array_to_csv($results);

	// fclose($outstream);
	
	exit;