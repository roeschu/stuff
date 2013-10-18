<?
		
	session_start();
	$error_gleiches_atelier = "<div class='validation-advice'>FEHLER: Kein Ersatz-Atelier darf mit einem Wunsch-Atelier übereinstimmen!</div>";
	$error_mehrere_atelier = "<div class='validation-advice'>FEHLER: Es können nicht gleichzeitig stattfindende Ateliers besucht werden!</div>";
	$error_wunsch_vormittag = "<div class='validation-advice'>FEHLER: Bitte ein Wunschatelier am Vormittag auswählen!</div>";
	$error_ersatz_vormittag = "<div class='validation-advice'>FEHLER: Bitte ein Ersatzatelier am Vormittag auswählen!</div>";
	$error_wunsch_nachmittag = "<div class='validation-advice'>FEHLER: Bitte ein Wunschatelier am Nachmittag auswählen!</div>";
	$error_ersatz_nachmittag = "<div class='validation-advice'>FEHLER: Bitte ein Ersatzatelier am Nachmittag auswählen!</div>";


	$success = "success";
	unset($_SESSION['atelier1']);
	unset($_SESSION['atelier2']);
	unset($_SESSION['atelier3']);
	unset($_SESSION['atelier4']);

	$stackwann = array();
	$stackid = array();
	foreach ($_POST as $value1)	{
		
		$parts = explode("-", $value1);
		$id = $parts[0];
		$art = $parts[1];
		$zeit = $parts[2];
		$wann	= $art . "-" . $zeit;

		array_push($stackid, $id);
		array_push($stackwann,$wann);
		

	}
	

	
	#Ersatz und Wunschatelier dürfen nicht übereinstimmen...
	$gleichateliers = "no";
	$clickedcount = array_count_values($stackid);
	$clickedcount_keys = array_keys($clickedcount);
	foreach ($clickedcount_keys as $elementa)
	{
		if ($clickedcount[$elementa] < '3' AND $clickedcount[$elementa] > '1')
		{
			$gleiches_atelier = "yes";
		}

			
	}


	#Nicht mehr als ein vormittags oder ein nachmittags Atelier...
	$mehrereateliers = "no";
	$wanncount = array_count_values($stackwann);
	$wanncount_keys = array_keys($wanncount);
	$vormittag_wunsch_check = "n";
	$vormittag_ersatz_check = "n";
	$nachmittag_wunsch_check = "n";
	$nachmittag_ersatz_check = "n";
	
	foreach ($wanncount_keys as $elementb)
	{
		if ($elementb != "-" AND $wanncount[$elementb] > '1')
		{
			$mehrere_atelier = "yes";
		}

		
		if ($elementb == "ersatz-vormittag")	{	$vormittag_ersatz_check = "y";	}
		if ($elementb == "ersatz-nachmittag")	{	$nachmittag_ersatz_check = "y";	}
		if ($elementb == "wunsch-vormittag")	{	$vormittag_wunsch_check = "y";	}
		if ($elementb == "wunsch-nachmittag")	{	$nachmittag_wunsch_check = "y";	}	
	}


	if ($vormittag_wunsch_check == "n")	{	$kein_vormittag_wunsch = "yes";	}
	if ($vormittag_ersatz_check == "n")	{	$kein_vormittag_ersatz = "yes";	}
	if ($nachmittag_wunsch_check == "n")	{	$kein_nachmittag_wunsch = "yes";	}
	if ($nachmittag_ersatz_check == "n")	{	$kein_nachmittag_ersatz = "yes";	}



	if ($gleiches_atelier == "yes" OR $mehrere_atelier == "yes" OR $kein_vormittag_wunsch == "yes" OR $kein_vormittag_ersatz == "yes" OR $kein_nachmittag_wunsch == "yes" OR $kein_nachmittag_ersatz == "yes") 
	{
		if ($mehrere_atelier == "yes")			{	print $error_mehrere_atelier;	}
		if ($gleiches_atelier == "yes")			{	print $error_gleiches_atelier;	}
		if ($kein_vormittag_wunsch == "yes")		{	print $error_wunsch_vormittag; 	}
		if ($kein_vormittag_ersatz == "yes")		{	print $error_ersatz_vormittag; 	}
		if ($kein_nachmittag_wunsch == "yes")		{	print $error_wunsch_nachmittag;	}
		if ($kein_nachmittag_ersatz == "yes")		{	print $error_ersatz_nachmittag; 	}

		
		

	}
	else
	{
		print $success;
		$i = 0;
		foreach ($_POST as $value2)	
		{
			if (!empty($value2))
			{ 
				$i++;
				$atelierwahl = "atelier" . $i;
				$_SESSION[$atelierwahl] = $value2; 
				
				
			}		
		}
		
		
	}


?>
