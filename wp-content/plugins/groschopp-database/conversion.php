<?php 
 
function SetSpeedMultiplier($OldUnits, $NewUnits = 0) { 
 
	if($NewUnits == 0) { 
		if($OldUnits == 1) { 
			$mult = (2.0 * pi()) / 60.0; 
		} else { 
			$mult = 1.0; 
		} 
	} elseif($NewUnits == 1) { 
		if($OldUnits == 0) { 
			$mult = 60.0 / ( 2.0 * PI); 
		} else { 
			$mult = 1.0; 
		} 
	} else { 
		$mult = 0.0; 
	} 

	return $mult; 
} 
 
function SetTorqueMultiplier($OldUnits, $NewUnits = 0) { 

	if($OldUnits == 0) { 
		$mult = 0.0625; 
	} elseif($OldUnits == 2) { 
		$mult = 12.0; 
	} elseif($OldUnits == 3) { 
		$mult = 9.80665 * 0.2248089431 / (2.54 * 1000.0); 
	} elseif($OldUnits == 4) { 
		$mult = 9.80665 * 0.2248089431 / (2.54); 
	} elseif($OldUnits == 5) { 
		$mult = 0.2248089431/(2.54 * 100000.0); 
	} elseif($OldUnits == 6) { 
		$mult = 0.2248089431 * 100.0 / (2.54 * 1000.0); 
	} elseif($OldUnits == 7) { 
		$mult = 0.2248089431/2.54; 
	} elseif($OldUnits == 8) { 
		$mult = 0.2248089431 * 100.0/2.54; 
	} else { 
		$mult = 1.0; 
	} 
	
	return $mult; 
} 
 
function SetPowerMultiplier($OldUnits, $NewUnits = 0) { 
 
	if($NewUnits == 0) { 
		if($OldUnits == 1) { 
			$mult = 1000.0; 
		} elseif($OldUnits == 2) { 
			$mult = 745.69987158227022; 
		} else { 
			$mult = 1.0; 
		} 
	} elseif($NewUnits == 1) { 
		if($OldUnits == 0) { 
			$mult = 1.0/1000.0; 
		} elseif($OldUnits == 2) { 
			$mult = 745.69987158227022/1000.0; 
		} else { 
			$mult = 1.0; 
		} 
	} elseif($NewUnits == 2) { 
		if($OldUnits == 0) { 
			$mult = 1.0/745.69987158227022; 
		} elseif($OldUnits == 1) { 
			$mult = 1000.0/745.69987158227022; 
		} else { 
			$mult = 1.0; 
		} 
	} else { 
		$mult = 0.0; 
	} 

	return $mult; 
} 
 
function UpdateSorTorW($update, $vars) { 
 
	//echo "<pre>".print_r($vars, true)."</pre>"; 

	$multSpeed = SetSpeedMultiplier(0, 0); 
	$multTorque = SetTorqueMultiplier($vars['torque_type'], 2); 
	$multPower = SetPowerMultiplier($vars['power_type'], 2); 
	
	//echo "SPEED Multiplier: ".$multSpeed."<br/>TORQUE Multiplier: ".$multTorque."<br/>POWER Multiplier: ".$multPower; 

	$hpConstant = 33000.0 / (2 * pi()); 

	$speed  = $vars['speed']; 
	$torque = $vars['torque']; 
	$power = $vars['power'];  
 
	if($update == 2): 
		// Calc Speed
		$tspeed	 = $power * $multPower * $multSpeed * $hpConstant / ($torque * $multTorque) * 12;
		$ispeed = round($tspeed, 3); 

		// Calc Torque
		$tpower  = $power * $multPower;
		$itorque = $tpower * $multSpeed * $hpConstant / ($ispeed * $multTorque) * 12; 
		$itorque = round($itorque, 3);

		$test = $itorque * $multTorque;

		// Calc Power
		$ttorque = $torque * $multTorque;
		$ipower  = $ttorque * $ispeed / ($hpConstant * $multSpeed * $multPower) / 12; 
		$ipower  = round($ipower, 6);
	
		return array('speed' => $ispeed, 'torque' => $test, 'power' => $ipower, 'ispeed' => $ispeed, 'itorque' => $torque, 'ipower' => $power); 
	endif; 
 
	if($update == 1): 	
		// Calc Torque
		$tpower  = $power * $multPower;
		$itorque = $tpower * $multSpeed * $hpConstant / ($speed * $multTorque) * 12; 
		$itorque = round($itorque, 3);

		$test = $itorque * $multTorque;

		// Calc Power
		$ttorque = $torque * $multTorque;
		$ipower  = $ttorque * $speed / ($hpConstant * $multSpeed * $multPower) / 12; 
		$ipower  = round($ipower, 6);
		
		return array('speed' => $speed, 'torque' => $test, 'power' => $power, 'ispeed' => $speed, 'itorque' => $itorque, 'ipower' => $power); 
	endif; 
 
	if($update == 0): // SPEED & TORQUE
		
		// Calc Torque
		$tpower  = $power * $multPower; 
		$itorque = $tpower * $multSpeed * $hpConstant / ($speed * $multTorque * 745.69987158227022); 
		$itorque = round($itorque, 3); 

		// Calc Power
		$ttorque = $torque * $multTorque;
		$ipower  = $ttorque * $speed / ($hpConstant * $multSpeed * $multPower) / 12; 
		$ipower  = round($ipower, 6);
	
		return array('speed' => $speed, 'torque' => $ttorque, 'power' => $ipower, 'ispeed' => $speed, 'itorque' => $torque, 'ipower' => $ipower); 
	endif; 
}