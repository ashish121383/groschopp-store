<?
	require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

	ini_set('memory_limit','32M');
	ini_set('max_execution_time', 300);

	global $wpdb;

	echo "Loading ...<br/>";

	define("CSV_DIRECTORY", "/home/a5c464df/groschopp.com/html/data/other/");
	define("FILE_NAME", "data.csv");

	if(file_exists(CSV_DIRECTORY.FILE_NAME)) {
		$wpdb->query('truncate product');

		// IMPORT RAW CSV DATA
		echo FILE_NAME." Found.<br/>";

		echo "Opening File ...<br/>";
		$handle = fopen(CSV_DIRECTORY.FILE_NAME, "r");

		$i = 1;
		while (!feof($handle) ) {
			$row = fgetcsv($handle, 1024);
			//echo $i . $row[0] . $row[1]. $row[2] . "<BR>";
			if($i != 1) {
				$wpdb->insert('product', array(
					'type_id'			=> $row[0],
					'ordering_number'	=> $row[1],
					'voltage'			=> $row[2],
					'phase'				=> $row[3],
					'horse_power'		=> $row[4],
					'ratio'				=> $row[5],
					'watts'				=> $row[6],
					'output_speed'		=> $row[7],
					'torqk'				=> $row[8],
					'full_load_amps'	=> $row[9],
					'efficiency'		=> $row[10],
					'system_hp'			=> $row[11],
					'open_b'			=> $row[12],
					'open_c'			=> $row[13],
					'connection_diagram'=> $row[14],
					'capacitor'			=> $row[15],
					'model'				=> $row[16],
					'cadfile'			=> $row[17],
					'brush_card'		=> $row[18],
					'enclosure'			=> $row[19],
					'hertz'				=> $row[20],
					'shipping_weight'	=> $row[21],
					'list_price'		=> $row[22],
					'ldim'				=> $row[23],
					'status'			=> $row[24],
					'ms_number'			=> $row[25],
					'gs_number'			=> $row[26],
					'reason'			=> $row[27]
				));
				//echo "Line ".$i." ................. Imported.<br/>";
			}
			$i++;
		}
		echo $i." Records Imported<br/>";

		echo "Closing File...<br/>";
		fclose($file_handle);

		// DONE ... FINALLY!
		echo "Import Done!<br/><br/><a href='/wp-admin/admin.php?page=database/index.php' target='_top'>Return to dashboard</a>";
	} else {
		echo FILE_NAME." NOT FOUND!";
		exit;
	}

?>
