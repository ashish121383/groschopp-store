<?php

/*
Plugin Name: Groschopp Database V3
Description: Custom Product Database Uploader
Version: 1.0
Author: Arcstone Technologies
Author URI: http://www.arcstone.com
*/

	require_once "conversion.php";

	register_activation_hook(__FILE__, 'install');

	function install()
	{
		global $wpdb, $wp_roles;

		$wp_roles->add_role("productdatabaseuser", "Product Database User");
		$wp_roles->add_cap("productdatabaseuser", "product_database");
		$wp_roles->add_cap("productdatabaseuser", "read");
	}

	function menu_item() {
		global $wp_roles;
		$wp_roles->add_cap("product_database", 'administrator');


		add_menu_page('Product Database', 'Product Database', 'manage_options', __FILE__, 'router');
	}

	function router() {
		$action = (isset($_GET['action']))? $_GET['action'] : 'splash' ;

		$action();
	}

	function splash() {
		echo "<div class='wrap'>";
		echo "<h2>Product Database Uploader</h2>";
		echo "<div style='height:100px; text-align:center; margin-top:100px;'><a href='/wp-admin/admin.php?page=groschopp-database/index.php&action=start' class='button'>Begin Product Database Upload</a></div>";
		echo "</div>";
	}

	function start() {
		echo "<div class='wrap'>";
		echo "<h2>Process Started ...</h2>";
		echo "<p>Please do not close this screen till upload is complete.</p>";
		echo "<iframe src='/wp-content/plugins/groschopp-database/upload.php' name='process' id='process' style='width:400px; height:200px;'></iframe>";
		echo "</div>";
	}


	//function get_products_count($v = false, $voltage = false, $order = 'voltage') {
	function get_products_count($args) {

		global $wpdb;

		$sql = $wpdb->prepare("SELECT count(*) as count, MIN(output_speed) as speed_min, MAX(output_speed) as speed_max, MIN(torqk) as torqk_min, MAX(torqk) as torqk_max, MIN(system_hp) as power_min, MAX(system_hp) as power_max FROM product WHERE 1 = 1 AND status = 'A' AND voltage != 0", array());

		if($args['ids']) {

			$ids = explode("|", $args['ids']);

			$sql .= $wpdb->prepare(" AND type_id IN(".implode(",", $ids).")", array());
		}

		if($args['s']) {
			$sql .= " AND ";
		}

		if($args['voltage']) {

			$voltages = explode("|", $args['voltage']);

			$sql .= $wpdb->prepare(" AND voltage IN (".implode(",", $voltages).")", array());
		}

		if($args['phase']) {
			$sql .= $wpdb->prepare(" AND phase = %s", $args['phase']);
		}

		if($args['speed_from'] || $args['speed_to']) {
			$sql .= $wpdb->prepare(" AND (output_speed >= %d AND output_speed <= %d)", $args['speed_from'], $args['speed_to']);
		}

		if($args['torque_from'] || $args['torque_to']) {
			$sql .= $wpdb->prepare(" AND (torqk >= %f AND torqk <= %f)", $args['torque_from'], $args['torque_to']);
		}

		if($args['power_from'] || $args['power_to']) {
			$sql .= $wpdb->prepare(" AND (system_hp >= %f AND system_hp <= %f)", $args['power_from'], $args['power_to']);
		}

		if($args['orderby']) {
			$sql .= " ORDER BY " . $args['orderby'] . " " . $args['order'];
		}

		//echo $sql."<br/>";

		return $wpdb->get_results($sql);

		// if($v) {
  //           if(!strstr($v, ',')) {
  //               if($voltage) {
  //                   return $wpdb->get_results($wpdb->prepare("SELECT count(*) as count, MIN(output_speed) as speed_min, MAX(output_speed) as speed_max, MIN(torqk) as torqk_min, MAX(torqk) as torqk_max, MIN(system_hp) as power_min, MAX(system_hp) as power_max FROM product WHERE type_id = %d AND voltage = %d AND status = 'A' ORDER BY $order", $v, $voltage));
  //               } else {
  //                   return $wpdb->get_results($wpdb->prepare("SELECT count(*) as count, MIN(output_speed) as speed_min, MAX(output_speed) as speed_max, MIN(torqk) as torqk_min, MAX(torqk) as torqk_max, MIN(system_hp) as power_min, MAX(system_hp) as power_max FROM product WHERE type_id = %d AND status = 'A' ORDER BY $order", $v));
  //               }
  //           } else {
  //               if($voltage) {
  //                   return $wpdb->get_results($wpdb->prepare("SELECT count(*) as count, MIN(output_speed) as speed_min, MAX(output_speed) as speed_max, MIN(torqk) as torqk_min, MAX(torqk) as torqk_max, MIN(system_hp) as power_min, MAX(system_hp) as power_max FROM product WHERE FIND_IN_SET(cast(product.type_id as char), %s) AND voltage = %d AND status = 'A' ORDER BY $order", $v, $voltage));
  //               } else {
  //                   return $wpdb->get_results($wpdb->prepare("SELECT count(*) as count, MIN(output_speed) as speed_min, MAX(output_speed) as speed_max, MIN(torqk) as torqk_min, MAX(torqk) as torqk_max, MIN(system_hp) as power_min, MAX(system_hp) as power_max FROM product WHERE FIND_IN_SET(cast(product.type_id as char), %s) AND status = 'A' ORDER BY $order", $v));
  //               }
  //           }
		// } else {
		// 	return $wpdb->get_results("SELECT count(*) as count FROM product WHERE status = 'A'");
		// }
	}

	//function get_products($v = false, $voltage = false, $order = 'voltage', $ppp = 100, $offset = 0) {
	function get_groschopp_products($args, $limit = 100, $offset = 0) {
		global $wpdb;

		$sql = $wpdb->prepare("SELECT * FROM product WHERE 1 = 1 AND status = 'A' AND voltage != 0", array());

		if($args['ids']) {

			$ids = explode("|", $args['ids']);

			$sql .= $wpdb->prepare(" AND type_id IN(".implode(",", $ids).")", array());
		}

		if($args['voltage']) {

			$voltages = explode("|", $args['voltage']);

			$sql .= $wpdb->prepare(" AND voltage IN (".implode(",", $voltages).")", array());
		}

		if($args['phase']) {
			$sql .= $wpdb->prepare(" AND phase = %s", $args['phase']);
		}

		if($args['speed_from'] || $args['speed_to']) {
			$sql .= $wpdb->prepare(" AND (output_speed >= %d AND output_speed <= %d)", $args['speed_from'], $args['speed_to']);
		}

		if($args['torque_from'] || $args['torque_to']) {
			$sql .= $wpdb->prepare(" AND (torqk >= %f AND torqk <= %f)", $args['torque_from'], $args['torque_to']);
		}

		if($args['power_from'] || $args['power_to']) {
			$sql .= $wpdb->prepare(" AND (system_hp >= %f AND system_hp <= %f)", $args['power_from'], $args['power_to']);
		}

		if($args['orderby']) {
			$sql .= " ORDER BY " . $args['orderby'] . " " . $args['order'];
		}

		$sql .= $wpdb->prepare(" LIMIT %d OFFSET %d", $limit, $offset);

		//echo $sql."<br/>";

		return $wpdb->get_results($sql);

        // if($v) {
        //     if(!strstr($v, ',')) {
        //         if($voltage) {
        //             return $wpdb->get_results($wpdb->prepare("SELECT * FROM product WHERE type_id = %d AND voltage = %d AND status = 'A' ORDER BY $order LIMIT %d OFFSET %d", $v, $voltage, $ppp, $offset));
        //         } else {
        //             return $wpdb->get_results($wpdb->prepare("SELECT * FROM product WHERE type_id = %d AND status = 'A' ORDER BY $order LIMIT %d OFFSET %d", $v, $ppp, $offset));
        //         }
        //     } else {
        //         if($voltage) {
        //             return $wpdb->get_results($wpdb->prepare("SELECT * FROM product WHERE FIND_IN_SET(cast(product.type_id as char), %s) AND voltage = %d AND status = 'A' ORDER BY %s LIMIT %d OFFSET %d", $v, $voltage, $order, $ppp, $offset ));
        //         } else {
        //             return $wpdb->get_results($wpdb->prepare("SELECT * FROM product WHERE FIND_IN_SET(cast(product.type_id as char), %s) AND status = 'A' ORDER BY %s LIMIT %d OFFSET %d", $v, $order, $ppp, $offset ));
        //         }
        //     }
        // } else {
        //     return $wpdb->get_results($wpdb->prepare("SELECT * FROM product WHERE status = 'A' LIMIT %d OFFSET %d", $ppp, $offset));
        // }
	}

	function get_products_by_model($search, $order = 'voltage') {
		global $wpdb;

		$sql = $wpdb->prepare("SELECT * FROM product WHERE model = '%s' OR ordering_number = '%s' AND status = 'A' ORDER BY %s", $search, $search, $order);

		//echo $sql; exit;

		return $wpdb->get_results($sql);
	}

	function get_groschopp_product($v) {
		global $wpdb;

		return $wpdb->get_row($wpdb->prepare("SELECT * FROM product WHERE id = %d LIMIT 1", $v));
	}

	function set_product($v) {
		// if($_COOKIE['quote']) {
		// 	$count = count($_COOKIE['quote']) + 1;
		// 	setcookie("quote[$count]", $v, time()+259200, "/", get_bloginfo('url'));
		// } else {
		// 	setcookie("quote[1]", $v, time()+259200, "/", get_bloginfo('url'));
		// }

		print_r($_SESSION);

		$count = count($_SESSION['quote']) + 1;

		$_SESSION["quote[$count]"] = $v; exit;
	}

	function remove_product($product) {

		unset($_SESSION["quote"]['product'][$product]);
	}

	function get_product_headers($product_id) {
		global $wpdb;

		return $wpdb->get_results($wpdb->prepare("SELECT ph.id, ph.label, ph.custom_image, ph.description, pc.value FROM product_customizations pc LEFT JOIN product_headings ph ON pc.header_id = ph.id WHERE product_id = {$product_id} GROUP BY label ORDER BY ph.list_order", array()));
	}

	function get_product_options($header_id, $product_id) {
		global $wpdb;

		return $wpdb->get_results($wpdb->prepare("SELECT po.id, po.label, pc.value, po.form_element FROM product_customizations pc LEFT JOIN product_options po ON pc.option_id = po.id WHERE pc.header_id = {$header_id} AND pc.product_id = {$product_id} GROUP BY po.id ORDER BY display_order DESC", array()));
	}

	function motor_match($v) {
		global $wpdb;

		$result = UpdateSorTorW($v['performance'], $v);

		$rank = $wpdb->query("SET @rank=0;");

		$results = 'SELECT product.id, type_id, product_type.name as motor_type, ordering_number, voltage, product.phase, horse_power, ratio, watts, output_speed, torqk, efficiency, system_hp, model, 
		@rank:=@rank+1 AS rank, 
		(%d - output_speed) / %d AS errSpeed, 
		(%d - torqk) / %d AS errTorque, 
		(SELECT 100.0 * SQRT(errSpeed * errSpeed + errTorque * errTorque)) AS errTotal,
		(SELECT IF(output_speed * torqk < %d * %d, -errTotal, errTotal)) AS errTotal2,
		(SELECT IF(errTotal2 > 0, errTotal2 - 3.0, errTotal2)) AS errTotalMod,
		(SELECT IF(errTotalMod < 0, 0.0, errTotalMod)) as errTotalMod2,
		(SELECT SQRT(errTotalMod / 100 * errTotalMod / 100 + (1 - efficiency / 100) * (1 - efficiency / 100) / 25) * 100) AS errFitness
		FROM product LEFT JOIN product_type ON product.type_id = product_type.id WHERE product.status = "A"';

		if($v['voltage'] != 'All') {
			$results .= sprintf(" AND voltage = %d", $v['voltage']);
		}

		/// AC
		if($v['motor_type'] == 1) {

			// ALL
			if($v['gearbox'] == 'All') {
				$results .= " AND type_id IN (1,6,11,12,13)";

			/// Parrell Shaft
			} elseif($v['gearbox'] == 8) {
				$results .= " AND type_id IN (18)";

			// Right Angle Planetary
			} elseif($v['gearbox'] == 11) {
				$results .= " AND type_id IN (11)";

			// Right Angle
			} elseif($v['gearbox'] == 12) {
				$results .= " AND type_id IN (12)";

			// Planetary
			} elseif($v['gearbox'] == 18) {
				$results .= " AND type_id IN (6)";

			// NONE
			} else {
				$results .= " AND type_id IN (1)";
			}

		/// DC
		} elseif($v['motor_type'] == 2) {

			// ALL
			if($v['gearbox'] == 'All') {
				$results .= " AND type_id IN (2,3,7,8,14,16)";

			/// Parrell Shaft
			} elseif($v['gearbox'] == 8) {
				$results .= " AND type_id IN (8)";

			// Right Angle Planetary
			} elseif($v['gearbox'] == 11) {
				$results .= " AND type_id IN (14)";

			// Right Angle
			} elseif($v['gearbox'] == 12) {
				$results .= " AND type_id IN (3)";

			// Planetary
			} elseif($v['gearbox'] == 18) {
				$results .= " AND type_id IN (7)";

			// NONE
			} else {
				$results .= " AND type_id IN (2)";
			}

		/// BRUSHLESS DC
		} elseif($v['motor_type'] == 23) {

			//$results .= " AND type_id IN (23)";

			// ALL
			if($v['gearbox'] == 'All') {
				$results .= " AND type_id IN (23,24,25,26,27)";

			/// Parrell Shaft
			} elseif($v['gearbox'] == 8) {
				$results .= " AND type_id IN (25)";

			// Right Angle Planetary
			} elseif($v['gearbox'] == 11) {
				$results .= " AND type_id IN (27)";

			// Right Angle
			} elseif($v['gearbox'] == 12) {
				$results .= " AND type_id IN (26)";

			// Planetary
			} elseif($v['gearbox'] == 18) {
				$results .= " AND type_id IN (24)";

			// NONE
			} else {
				$results .= " AND type_id IN (23)";
			}

		/// ALL
		} else {

			if($v['gearbox'] == 'All') {

			} elseif($v['gearbox'] == 8) {
				$results .= " AND type_id IN (8,18)";
			} elseif($v['gearbox'] == 11) {
				$results .= " AND type_id IN (11,14)";
			} elseif($v['gearbox'] == 12) {
				$results .= " AND type_id IN (3,12)";
			} elseif($v['gearbox'] == 18) {
				$results .= " AND type_id IN (6,7)";
			} else {
				$results .= " AND type_id NOT IN (6,7,8,18,3,12,3,14,16,11)";
			}
		}


		$orderby = (isset($v['orderby']))? $v['orderby'] : "rank" ;

		$results .= " GROUP BY ordering_number HAVING errFitness < 50 ORDER BY errFitness LIMIT 10";

		//echo $results;
		switch($v['torque_type']) {
			case 0:
				$torque_type = "oz-in";
				break;
			case 1:
				$torque_type = "in-lb";
				break;
			case 2:
				$torque_type = "lb-ft";
				break;
			case 3:
				$torque_type = "g-cm";
				break;
			case 4:
				$torque_type = "kg-cm";
				break;
			case 5:
				$torque_type = "dyn-cm";
				break;
			case 6:
				$torque_type = "mN-m";
				break;
			case 7:
				$torque_type = "N-cm";
				break;
			case 8:
				$torque_type = "N-m";
				break;
		}

		$speed = $result['speed'];
		$torque = $result['torque'];

		$results = $wpdb->get_results($wpdb->prepare($results, $speed, $speed, $torque, $torque, $speed, $torque));

		$result['search_hash'] = uniqid();

		$has_results = (count($results))? true : false ;

		$insert = "INSERT INTO motor_match_log VALUES(null, '%s', '%s', '%d', 0, '%s',  NOW())";
		$wpdb->query($wpdb->prepare($insert, $_SERVER['REMOTE_ADDR'], $torque_type, $has_results, $result['search_hash']));

		return array('data' => $result, 'results' => $results);
	}

	add_action('admin_menu', 'menu_item');

	function setSearchClick($hash) {
		global $wpdb;

		$sql = "SELECT id FROM motor_match_log WHERE hash = '%s' LIMIT 1";

		if($wpdb->get_row($wpdb->prepare($sql, $hash))) {
			$sql = "UPDATE motor_match_log SET clicked_results = 1 WHERE hash = '%s'";
			$wpdb->query($wpdb->prepare($sql, $hash));
		}
	}
