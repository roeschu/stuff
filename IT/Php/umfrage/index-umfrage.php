<?php
###########################################
#SESSION initial + include
###########################################
session_start();
include("config.inc.php");
###########################################
?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
	<title>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II</title>
	<!-- Kein Javascript Aktiviert, Umleitung		 -->
	<noscript><meta http-equiv="Refresh" content="0; URL=nojavascript.html"></noscript>
    	<!-- Prototype und eigene Funktionen Include -->
	<link rel="SHORTCUT ICON" href="http://www.xxxx.ch/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" href="http://www.xxxx.ch/fileadmin/css/base.css" type="text/css" media="all" charset="iso-8859-1" />
	<link rel="stylesheet" href="http://www.xxxx.ch/fileadmin/css/basexxxxOnly.css" type="text/css" media="all" charset="iso-8859-1" />
	<script src="lib/prototype.js" type="text/javascript"></script>
	<script src="lib/ajaxcalls.js" type="text/javascript"></script>
	<script src="lib/scriptaculous.js" type="text/javascript"></script>
       <script src="lib/effects.js" type="text/javascript"></script>
       <script type="text/javascript" src="lib/validation.js"></script>

</head >



<body>
<div class="outer">
<div class="logo">
<a href="http://www.xxxx.ch"><img src="http://www.xxxx.ch/fileadmin/templates/logo_xxxx.gif" width="579" height="107" style="border: 0px;" alt="Logo PH Bern" /></a>
</div>
<div class="metanavigation">
	<div style="margin-bottom: 60px;">
	</div>
		
	</div>
	<div class="navigation color-xxxx-color1">
		<div id="placeholder"></div>
    	</div>
    	<div class="content">
		<div class="content-bar navi-color1">
	</div>  
            
	<div class="content-normal">
	<div class="breadcrump-navigation"><a href="http://www.xxxx.ch" class="linkInRootLineCurrent">xxxx</a></div>
	
<p>&nbsp;</p><table cellspacing="0" cellpadding="1" width="98%" border="0" class="contenttable">
	<tbody><tr>
		<td valign="top"><p><b><b></b></b> 


<table>

<tr><td>

<?php

###########################################
#MENU Steuerung
###########################################	
if (isset($_GET[$urlvariable]))
	{
       	$register = $_GET[$urlvariable];
              switch ($register)
       	{

			case 'welcome':
				questionwelcome();
		
			break;


			case 'entry':
                 		questionentry();
                   	break;


			case 100:
			  if(isset($_POST['submit_entry']))
			 {
				$_SESSION['schultyp_genau']=$_POST['schultypgenau'];	
				$_SESSION['schultyp']=$_POST['schultyp'];  
				$_SESSION['schulname']=$_POST['schulname'];
			
			 }

                    question100();
                   break;

			
			case 101:
			  if(isset($_POST['submit_100']))
			 {
				$_SESSION['faecherkanon']=$_POST['faecherkanon']; 
				$_SESSION['faecher']=$_POST['faecher'];			
			 }

                    question101();
                   break;			


			case 102:
			  if(isset($_POST['submit_101']))
			 {
				$_SESSION['anstellungsprozent']=$_POST['anstellungsprozent'];	
			 }

                    question102();
                   break;	




                   	case 1:
			  if(isset($_POST['submit_102']))
			 {
				$_SESSION['geschlecht']=$_POST['geschlecht'];
			
			 }

                    question1();
                   break;


		     case 2:
			if(isset($_POST['submit_1']))	

			{
				$_SESSION['berufsjahre']=$_POST['berufsjahre'];	
			}

                    question2();
                   break;
		     
		     case 3:

			if(isset($_POST['submit_2']))	
			{
					$_SESSION['pastkurse']=$_POST['pastkurse'];
					$_SESSION['pastkurse_anzahl']=$_POST['pastkurse_anzahl'];
					if ($_SESSION['pastkurse'] == "nein")
					{
						$_SESSION['merker'] = "NO";
						question5();					
					}
					
					if ($_SESSION['pastkurse'] == "ja")
					{
						question3();
						$_SESSION['merker'] = "YES";
					}

					

			}		
			else					
			{		
			 	question3();
                  	}
                 	 break;
			
		     case 4:
			if(isset($_POST['submit_3']))	
			{
				$_SESSION['memo_pastkurse']=$_POST['memo_pastkurse'];
			}

                    	question4();
                   break;
	
		     case 5:
			if(isset($_POST['submit_4']))	
			{
				$_SESSION['memo_verbesserungen']=$_POST['memo_verbesserungen'];
			}
			
			if ($_SESSION['merker'] == "YES")
			{
				question6();
			}
                    	else
			{
				question5();
			}
                   break;

		     case 6:
			if(isset($_POST['submit_5']))	
			{
				$_SESSION['grundnichtnutzung']=$_POST['grundnichtnutzung'];
				$_SESSION['sonstige']=$_POST['sonstige'];
				$_SESSION['grundnichtnutzung_andere']=$_POST['grundnichtnutzung_andere'];
				$_SESSION['memo_grundnichtnutzung']=$_POST['memo_grundnichtnutzung'];
				$_SESSION['memo_grundnichtnutzung_anderes']=$_POST['memo_grundnichtnutzung_anderes'];                  	
			}
			question6();
                   
			break;
		    
		     case 7:
			if(isset($_POST['submit_6']))	
			{
				$_SESSION['unterstuetzung']=$_POST['unterstuetzung'];
				$_SESSION['memo_unterstuetzung_anderes']=$_POST['memo_unterstuetzung_anderes'];

			}

                    	question7();
                   break;			
			

		     case 8:
			if(isset($_POST['submit_7']))	
			{
				$_SESSION['schwerpunkte_future']=$_POST['schwerpunkte_future'];
				$_SESSION['schwerpunkt_future_zlg']=$_POST['schwerpunkt_future_zlg'];
				$_SESSION['memo_schwerpunkte_anderes']=$_POST['memo_schwerpunkte_anderes'];

			}

                    	question8();
                   break;


		       case 9:
			if(isset($_POST['submit_8']))	
			{
				$_SESSION['kriterien']=$_POST['kriterien'];
				$_SESSION['memo_kriterien']=$_POST['memo_kriterien'];

			}

                    	question9();
                   break;

		       case 10:
			if(isset($_POST['submit_9']))	
			{
				$_SESSION['kursformen']=$_POST['kursformen'];
			}

                    	question10();
                   break;

		       
			case 11:
			if(isset($_POST['submit_10']))	
			{
				$_SESSION['zeiten']=$_POST['zeiten'];
			}

                    	question11();
                   break;

		      case 12:
			if(isset($_POST['submit_11']))	
			{
				$_SESSION['memo_allgemein']=$_POST['memo_allgemein'];
			}

                    	question12();
                   break;


			default:
				questionwelcome();
			

                 }

        }
        else
{
	questionwelcome();
}

?>
		


</td></tr>
</table>

</body>


</html>



<?php
###########################################




###########################################################################################

function questionwelcome()
{
	global $urlvariable, $sitename; 
	
	?>
	<h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    	<form name="test" id="test" action="<?php echo $sitename . "?" . $urlvariable . "=entry"; ?>"  method="post">
    	<fieldset>
    	<legend>Begr&uuml;ssung</legend>
    	<div class="form-row">
		
	<b>Liebe Kollegin<br> 
	Lieber Kollege</b><br>
	<br>
	xxxxxxxxx
	xxxxxxx <br><br> 

	Freundliche Grüsse <br><br><br>

	xxx <br>
	xxxx<br>
	xxxx@xxxx.ch

   		

    	</fieldset>
    	<input type="submit" name="submit_welcome" value="Weiter" /> 
    	</form>

<?php

}

###########################################################################################




###########################################################################################

function questionentry()
{
	global $urlvariable, $sitename; 
	
	?>
	<h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    	<form name="test" id="test" action="<?php echo $sitename . "?" . $urlvariable . "=100"; ?>"  method="post">
    	<fieldset>
    	<legend>Angaben zur Person und zur Anstellung</legend>
    	<div class="form-row">
    	<div class="field-label"><label for="schultyp">Schultyp ausw&auml;hlen</label></div><br>
	<div class="field-widget">

	<select name="schultyp"  id="schultyp" class="validate-selection"  onchange="getschultyp()">
 		<option  value="no">Bitte Schultyp auswählen....</option>
		<option  value="Berufsfachschule">Berufsfachschule</option>
		<option  value="Gymnasium">Gymnasium</option>
  		<option   value="Fachmittelschule">Fachmittelschule&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
	</select>
	<div id="schulname_field" name="schulname_field"></div>
	</div>

	   	<?php


	#Fortschritsbalken output
    	$pixel = "40px";
    	$prozent = "7 %";
    	progressbar($pixel,$prozent);

    	?>	

    	</fieldset>
    	<input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=welcome'" /><input type="submit" name="submit_entry" value="Weiter" /> 
    	</form>
	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "validation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});

    	</script>
   
<?php

}

###########################################################################################




###########################################################################################

function question100()
{
	global $urlvariable, $sitename; 
	
	?>
	<h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    	<form id="frage2" name="test" id="test" action="<?php echo $sitename . "?" . $urlvariable . "=101"; ?>"  method="post">
    	<fieldset>
    	<legend>Angaben zur Person und zur Anstellung</legend>
    	<div class="form-row">
    	<div class="field-label">	
	<label for="faecher">F&auml;cher ausw&auml;hlen</label></div><br>
 	<div class="field-widget">	

	<?php
	##############################################################
	#xxxxxxxxx
	##############################################################
	if ($_SESSION['schultyp'] == "Berufsfachschule" AND $_SESSION['schultyp_genau'] == "Berufliche Grundbildung") 
	{
	
	?>
	<select name="faecher[]" size="10" class="required" id="faecher" multiple   >
		<option  value="Allgemeinbildung">Allgemeinbildung</option>
		<option  value="Berufskunde">Berufskunde</option>
		<option value="Deutsch">Deutsch</option>
		<option  value="Englisch">Englisch</option>
		<option  value="Franzoesisch">Französisch</option>
		<option  value="Information/Kommunikation/Administration">Information/Kommunikation/Administration&nbsp;</option>
		<option  value="Sport">Sport</option>
		<option  value="Wirtschaft und Gesellschaft">Wirtschaft und Gesellschaft</option>
		<option  value="Andere">Andere</option>
	</select>
		<br><br>
	<?php
	}
	##############################################################
	

	##############################################################
	#xxxx
	##############################################################
	if ($_SESSION['schultyp'] == "Berufsfachschule" AND $_SESSION['schultyp_genau'] == "Berufsmaturitaetsschule") 
	{
	
	?>
	<select name="faecher[]" size="10" class="required" id="faecher" multiple   >
		<option  value="Betriebswirtschaft">Betriebswirtschaft</option>
		<option  value="Chemie">Chemie</option>
		<option  value="Deutsch">Deutsch</option>
		<option value="Englisch">Englisch</option>
		<option  value="Französisch">Französisch</option>
		<option  value="Geschichte/Staatslehre">Geschichte/Staatslehre</option>
		<option  value="Gestaltung">Gestaltung</option>
		<option  value="Information und Kommunikation">Information und Kommunikation</option>
		<option  value="Italienisch">Italienisch</option>
		<option  value="Kultur und Kunst">Kultur und Kunst</option>
		<option  value="Mathematik">Mathematik</option>
		<option  value="Physik">Physik</option>
		<option  value="Rechnungswesen">Rechnungswesen</option>
		<option  value="Recht">Recht</option>
		<option  value="Sport">Sport</option>
		<option  value="Volkswirtschaft">Volkswirtschaft</option>
		<option  value="Andere">Andere</option>
	</select>
		<br><br>
	<?php
	}
	##############################################################
	



	##############################################################
	#xxxxxxxxx
	##############################################################
	if ($_SESSION['schultyp'] == "Berufsfachschule" AND $_SESSION['schultyp_genau'] == "BVS / Vorlehre") 
	{
	
	?>
	<select name="faecher[]" size="10" class="required" id="faecher" multiple   >
		<option  value="Biologie/Physik/Chemie">Biologie/Physik/Chemie</option>
		<option value="Deutsch">Deutsch</option>
		<option  value="Englisch">Englisch</option>
		<option  value="Französisch">Französisch</option>
		<option  value="Gesellschaft und Politik">Gesellschaft und Politik</option>
		<option  value="Informatik">Informatik</option>
		<option  value="Integration">Integration</option>
		<option  value="Italienisch">Italienisch</option>
		<option  value="Mathematik">Mathematik</option>
		<option  value="Musik">Musik</option>
		<option  value="Praktischer Unterricht">Praktischer Unterricht</option>
		<option  value="Sport">Sport</option>
		<option  value="Tastaturschreiben">Tastaturschreiben</option>
		<option  value="Themenunterricht">Themenunterricht</option>
		<option  value="Andere">Andere</option>
	</select>
		<br><br>
	<?php
	}
	##############################################################
	


	##############################################################
	#xxxxxxxxx
	##############################################################
	if ($_SESSION['schultyp'] == "Berufsfachschule" AND $_SESSION['schultyp_genau'] == "Handelsmittelschule") 
	{
	
	?>
	<select name="faecher[]" size="10" class="required" id="faecher" multiple   >
		<option  value="Betriebswirtschaft">Betriebswirtschaft</option>
		<option  value="Bürokommunikation">Bürokommunikation</option>
		<option  value="Deutsch">Deutsch</option>
		<option value="Englisch">Englisch</option>
		<option  value="Französisch">Französisch</option>
		<option  value="Geographie">Geographie</option>
		<option  value="Geschichte">Geschichte</option>
		<option  value="Informatik">Informatik</option>
		<option  value="Italienisch">Italienisch</option>
		<option  value="Naturwissenschaften">Naturwissenschaften</option>
		<option  value="Mathematik">Mathematik</option>
		<option  value="Rechnungswesen">Rechnungswesen</option>
		<option  value="Recht">Recht</option>
		<option  value="Spanisch">Spanisch</option>
		<option  value="Sport">Sport</option>		
		<option  value="Volkswirtschaft">Volkswirtschaft</option>
		<option  value="Andere">Andere</option>
	</select>
		<br><br>
	<?php
	}
	##############################################################
	


	##############################################################
	#xxxxxxxxxxx
	##############################################################
	if ($_SESSION['schultyp'] == "Gymnasium") 
	{
	
	?>
	<select name="faecher[]" size="10" class="required" id="faecher" multiple   >
		<option  value="Bildnerisches Gestalten">Bildnerisches Gestalten</option>
		<option  value="Biologie">Biologie</option>
		<option  value="Chemie">Chemie</option>
		<option  value="Deutsch">Deutsch</option>
		<option value="Englisch">Englisch</option>
		<option  value="Französisch">Französisch</option>
		<option  value="Geografie">Geografie</option>
		<option  value="Geschichte">Geschichte</option>
		<option  value="Griechisch">Griechisch</option>
		<option  value="Informatik">Informatik</option>
		<option  value="Italienisch">Italienisch</option>
		<option  value="Latein">Latein</option>
		<option  value="Mathematik">Mathematik</option>
		<option  value="Musik">Musik</option>
		<option  value="Pädagogik">Pädagogik</option>
		<option  value="Philosophie">Philosophie</option>
		<option  value="Physik">Physik</option>
		<option  value="Psychologie">Psychologie</option>
		<option  value="Religion">Religion</option>
		<option  value="Russisch">Russisch</option>
		<option  value="Spanisch">Spanisch</option>Spanisch</option>
		<option  value="Sport">Sport</option>		
		<option  value="Wirtschaft und Recht">Wirtschaft und Recht</option>
		<option  value="Andere">Andere</option>
	</select>
		<br><br>
	<?php
	}
	##############################################################
	


	##############################################################
	#xxxxxxx
	##############################################################
	if ($_SESSION['schultyp'] == "Fachmittelschule") 
	{
	
	?>
	<select name="faecher[]" size="10" class="required" id="faecher" multiple   >
		<option  value="Betriebs- und Volkswirtschaft/Recht">Betriebs- und Volkswirtschaft/Recht</option>
		<option  value="Biologie">Biologie</option>
		<option  value="Chemie">Chemie</option>
		<option  value="Deutsch">Deutsch</option>
		<option value="Englisch">Englisch</option>
		<option  value="Ethik/Philosophie und allg. Psychologie">Ethik/Philosophie und allg. Psychologie</option>
		<option  value="Französisch">Französisch</option>
		<option  value="Geschichte/Geographie/Staatskunde">Geschichte/Geographie/Staatskunde</option>
		<option  value="Gestalten">Gestalten</option>
		<option  value="Humanbiologie">Humanbiologie</option>
		<option  value="Mathematik">Mathematik</option>
		<option  value="Musik">Musik</option>
		<option  value="Pädagogik/Entwicklungspsychologie">Pädagogik/Entwicklungspsychologie</option>
		<option  value="Physik">Physik</option>
		<option  value="Soziologie">Soziologie</option>
		<option  value="Sport und Gesundheitsförderung">Sport und Gesundheitsförderung</option>
		<option  value="Andere">Andere</option>
		</select>
		<br><br>
	<?php
	}
	##############################################################
	?>



	</div>
	
	</div>

	<?php


	#Fortschritsbalken output
    	$pixel = "80px";
    	$prozent = "14 %";
    	progressbar($pixel,$prozent);

    	?>	


    	</fieldset>
    	<input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=entry'" /><input type="submit" name="submit_100" value="Weiter" /> 
    	</form>
	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "validation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('frage2', {immediate : true, onFormValidate : formCallback});

    	</script>
   
<?php

}

###########################################################################################




###########################################################################################

function question101()
{
	global $urlvariable, $sitename; 
	
	
	if (isset($_SESSION['anstellungsprozent']))	
	{
		$checked25 = '';
		$checked50 = '';
		$checked75 = '';
		$checked100 = '';
		if ($_SESSION['anstellungsprozent'] == "1-25") { $checked25 = "checked"; }
		if ($_SESSION['anstellungsprozent'] == "26-50") { $checked50 = "checked"; }
		if ($_SESSION['anstellungsprozent'] == "51-75") { $checked75 = "checked"; }
		if ($_SESSION['anstellungsprozent'] == "76-100") { $checked100 = "checked"; }
	}
	



	?>
	<h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    	<form id="frage2" name="test" id="test" action="<?php echo $sitename . "?" . $urlvariable . "=102"; ?>"  method="post">
    	<fieldset>
    	<legend>Angaben zur Person und zur Anstellung</legend>
    	
    	<div class="form-row">
    	<div class="field-label"><label for="anstellungsprozent">Anstellungsgrad</label></div><br>
	 <div class="field-widget">
		<input type="radio" name="anstellungsprozent" id="anstellungsprozent" value="1-25" <?php echo $checked25; ?> />&nbsp;1 - 25%<br />
		<input type="radio" name="anstellungsprozent" id="anstellungsprozent" value="26-50" <?php echo $checked50; ?>   />&nbsp;26 - 50%<br />
		<input type="radio" name="anstellungsprozent" id="anstellungsprozent" value="51-75" <?php echo $checked75; ?>  />&nbsp;51 - 75%<br />
    		<input type="radio" name="anstellungsprozent" id="anstellungsprozent" value="76-100"  class="validate-one-required"  <?php echo $checked100; ?>    />&nbsp;76 - 100%

	</div>

	 <?php


	#Fortschritsbalken output
    	$pixel = "120px";
    	$prozent = "21 %";
    	progressbar($pixel,$prozent);

    	?>	

    	</fieldset>
    	<input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=100'" /><input type="submit" name="submit_101" value="Weiter" /> 
    	</form>
	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "validation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('frage2', {immediate : true, onFormValidate : formCallback});

    	</script>
   
<?php

}

###########################################################################################



###########################################################################################

function question102()
{
	global $urlvariable, $sitename; 
	
	if (isset($_SESSION['geschlecht']))	
	{
		$checkedM = '';
		$checkedW = '';
		if ($_SESSION['geschlecht'] == "frau") { $checkedW = "checked"; }
		if ($_SESSION['geschlecht'] == "mann") { $checkedM = "checked"; }
		
	}


	?>
	<h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    	<form id="frage2" name="test" id="test" action="<?php echo $sitename . "?" . $urlvariable . "=1"; ?>"  method="post">
    	<fieldset>
    	<legend>Angaben zur Person und zur Anstellung</legend>
    	<div class="form-row">
      	<div class="field-label"><label for="field2">Geschlecht</label></div><br>
    	<input type="radio" name="geschlecht" id="geschlecht" value="frau" <?php echo $checkedW; ?> />&nbsp;Weiblich<br />
    	<input type="radio" name="geschlecht" id="geschlecht" value="mann" <?php echo $checkedM; ?> class="validate-one-required"   />&nbsp;M&auml;nnlich
	
	</div>

	<?php


	#Fortschritsbalken output
    	$pixel = "160px";
    	$prozent = "28 %";
    	progressbar($pixel,$prozent);

    	?>	

    	</fieldset>
    	<input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=101'" /><input type="submit" name="submit_102" value="Weiter" /> 
    	</form>
	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "validation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('frage2', {immediate : true, onFormValidate : formCallback});

    	</script>
   
<?php

}

###########################################################################################



###########################################################################################
function question1()
{

	global $urlvariable, $sitename; 


	if (isset($_SESSION['berufsjahre']))	
	{
		$checked10 = '';
		$checked20 = '';
		$checked30 = '';
		$checked40 = '';
		if ($_SESSION['berufsjahre'] == "1-10") { $checked10 = "checked"; }
		if ($_SESSION['berufsjahre'] == "11-20") { $checked20 = "checked"; }
		if ($_SESSION['berufsjahre'] == "21-30") { $checked30 = "checked"; }
		if ($_SESSION['berufsjahre'] == "31-40") { $checked40 = "checked"; }
	}
	
	?>

	<h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    	<form id="frage2" action="<?php echo $sitename . "?" . $urlvariable . "=2"; ?>"  method="post">
    	<fieldset>
    	<legend>Angaben zur Person und zur Anstellung</legend>
	<div class="form-row">
    	 <div class="field-label"><label for="berufsjahre">Wie viele Jahre unterrichten sie schon auf der xxxx II?</label></div><br>
	 <div class="field-widget">
		<input type="radio" name="berufsjahre" id="berufsjahre" value="1-10" <?php echo $checked10; ?>  />&nbsp;1 - 10 Jahre<br />
		<input type="radio" name="berufsjahre" id="berufsjahre" value="11-20" <?php echo $checked20; ?>  />&nbsp;11 - 20 Jahre<br />
		<input type="radio" name="berufsjahre" id="berufsjahre" value="21-30" <?php echo $checked30; ?> />&nbsp;21 - 30 Jahre<br />
    		<input type="radio" name="berufsjahre" id="berufsjahre" value="31-40" <?php echo $checked40; ?> class="validate-one-required"   />&nbsp;31 - 40 Jahre
	<br><br>
  	</div>
    	<?php


	#Fortschritsbalken output
    	$pixel = "200px";
    	$prozent = "35 %";
    	progressbar($pixel,$prozent);

    	?>	

    	</fieldset>
   	
    	<input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=102'" /><input type="submit" name="submit_1" value="Weiter" /> 
    	</form>

	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "validation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('frage2', {immediate : true, onFormValidate : formCallback});

    	</script>

<?php

}

################################################################################################


################################################################################################
function question2()
{

       global $urlvariable, $sitename;

	if (isset($_SESSION['pastkurse']))	
	{
		$checkedja = '';
		$checkednein = '';
		if ($_SESSION['pastkurse'] == "ja") { $checkedja = "checked"; }
		if ($_SESSION['pastkurse'] == "nein") { $checkednein = "checked"; }
		
	}

	if (isset($_SESSION['pastkurse_anzahl']))	
	{
		$checkedM = '';
		$checkedW = '';
		if ($_SESSION['geschlecht'] == "frau") { $checkedW = "checked"; }
		if ($_SESSION['geschlecht'] == "mann") { $checkedM = "checked"; }
		
	}

?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=3"; ?>"  method="post">
    <fieldset>
    <legend>Nutzung des kursorischen Weiterbildungsangebots im Jahr 2006</legend>
    <div class="form-row">
    <div class="field-label"><label for="pastkurse">Haben Sie im vergangenen Jahr Weiterbildungskurse oder -tagungen (beispielsweise die Impulstagung oder den Info-Markt) des Instituts für Weiterbildung (IWB) besucht?</label></div><br>
    <input type="radio" name="pastkurse" id="pastkurse" value="ja" <?php echo $checkedja; ?> />&nbsp;Ja<br /><br>
    <input type="radio" name="pastkurse" id="pastkurse" value="nein" <?php echo $checkednein; ?> class="validate-one-required" />&nbsp;Nein<br><br><br></div>
    <div class="hinweis">&nbsp;&nbsp;falls ja: Wie viele Kurse / Tagungen insgesamt?&nbsp;&nbsp;<input name="pastkurse_anzahl" id="pastkurse_anzahl" value="<?php echo $_SESSION['pastkurse_anzahl']; ?>" class="validate-digits"  size="5"/></div>
    </div>


    <?php

    $pixel = "240px";
    $prozent = "42 %";
    progressbar($pixel,$prozent);

    ?>



    </fieldset>

   <input type="button" value="Zur&uuml;ck"  onClick="parent.location='index.php?question=1'" /> <input type="submit" name="submit_2" value="Weiter" /> 
    </form>

    	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "valiation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});

    	</script>

<?php


}
################################################################################################



################################################################################################
function question3()
{

        global $urlvariable, $sitename;

?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=4"; ?>"  method="post">
    <fieldset>
    <legend>Nutzung des kursorischen Weiterbildungsangebots im Jahr 2006</legend>
    <div class="form-row">
    <div class="field-label"><label for="memo_pastkurse">Was hat Ihnen an den besuchten Weiterbildungsangeboten gefallen?</label></div><br>
    <div class="field-widget"><textarea name="memo_pastkurse"   cols="60" rows="6"><?php echo $_SESSION['memo_pastkurse']; ?></textarea>
    <br><br>
    </div>
   
    <?php

    $pixel = "280px";
    $prozent = "49 %";
    progressbar($pixel,$prozent);

    ?>

    </fieldset>

    <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=2'"/><input type="submit" name="submit_3" value="Weiter" /> 
    </form>


<?php

}
################################################################################################




################################################################################################
function question4()
{

    global $urlvariable, $sitename;

    ?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=5"; ?>"  method="post">
    <fieldset>
    <legend>Nutzung des kursorischen Weiterbildungsangebots im Jahr 2006</legend>
   <div class="form-row">
    <div class="field-label"><label for="memo_verbesserungen">Was könnte man an den von Ihnen besuchten Weiterbildungsangeboten verbessern?</label></div><br>
    <div class="field-widget"><textarea name="memo_verbesserungen" cols="60" rows="6"><?php echo $_SESSION['memo_verbesserungen']; ?></textarea>
   <br><br>
   
    </div>


    <?php

    $pixel = "320px";
    $prozent = "56 %";
    progressbar($pixel,$prozent);

  


    ?>


    </fieldset>

    <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=3'"  /><input type="submit" name="submit_4" value="Weiter" /> 
    </form>

<?php
	

}
################################################################################################


################################################################################################
function question5()
{

        global $urlvariable, $sitename;
	
	 if (isset($_SESSION['grundnichtnutzung']))	
	 {
		$checkedselbst = '';
		$checkedandereanbieter = '';
		$checkedschulintern = '';
		$checkedzuwenigzeit = '';
		$checkedkeinekenntnisse = '';
		$checkednichtspassendes = '';
		$checkedandere = '';
	


		if (in_array("selbstaendig_weitergebildet", $_SESSION['grundnichtnutzung'])) { $checkedselbst = "checked"; }
		if (in_array("angebote_andere_anbieter", $_SESSION['grundnichtnutzung'])) { $checkedandereanbieter = "checked"; }
		if (in_array("schulinterne_veranstaltungen", $_SESSION['grundnichtnutzung'])) { $checkedschulintern = "checked"; }
		if (in_array("keine_zeit_fuer_weiterbildung", $_SESSION['grundnichtnutzung'])) { $checkedzuwenigzeit = "checked"; }
		if (in_array("keine_kenntnisse_angebote_iwb", $_SESSION['grundnichtnutzung'])) { $checkedkeinekenntnisse = "checked"; }
		if (in_array("nichts_passendes_dabei", $_SESSION['grundnichtnutzung'])) { $checkednichtspassendes = "checked"; }
	      if (in_array("andere_gruende", $_SESSION['grundnichtnutzung'])) { $checkedandere = "checked"; }
	
	 }

	
	 if (isset($_SESSION['grundnichtnutzung_andere']))	
	 {

		$checkedsibp = '';
		$checkedwbz = '';
		$checkedweg = '';

		if (in_array("sibp", $_SESSION['grundnichtnutzung_andere'])) { $checkedsibp = "checked"; }
		if (in_array("wbz", $_SESSION['grundnichtnutzung_andere'])) { $checkedwbz = "checked"; }
		if (in_array("we'g", $_SESSION['grundnichtnutzung_andere'])) { $checkedweg = "checked"; }
		if (in_array("andere_anbieter", $_SESSION['grundnichtnutzung_andere'])) { $checkedanderetoo = "checked"; }

	 }
	
?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II </h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=6"; ?>"  method="post">
    <fieldset>
    <legend>Nutzung des kursorischen Weiterbildungsangebots im Jahr 2006</legend>
    
   <div class="form-row">
    <div class="field-label"><label for="grundnichtnutzung">Aus welchen Gr&uuml;nden haben Sie das Weiterbildungsangebot des IWB im Jahr 2006 nicht genutzt? (Mehrfachantworten m&ouml;glich)</label></div><br>
    <div class="field-label">
    <input type="checkbox" name="grundnichtnutzung[]" id="grundnichtnutzung[]" value="selbstaendig_weitergebildet" <?php echo $checkedselbst; ?> />&nbsp;Ich habe mich selbst&auml;ndig weitergebildet<br />
    <input type="checkbox" name="grundnichtnutzung[]" id="grundnichtnutzung[]" value="angebote_andere_anbieter" <?php echo $checkedandereanbieter; ?> />&nbsp;Ich habe Angebote eines anderen Anbieters besucht.<br />
    <table align="left" width="500px" cellspacing="0" border="0" class="hinweis" >
    <tr>
    <td align="left"  width="200" >Bei welchem Anbieter?</td>
     <td align="left"  width="300"><input type="checkbox" name="grundnichtnutzung_andere[]" id="grundnichtnutzung_andere" value="sibp" <?php echo $checkedsibp; ?> />&nbsp;SIBP (heute EHB)</td>
    </tr>
    <tr>
	  <td align="left"  width="200" ></td>
	  <td align="left"  width="300"><input type="checkbox" name="grundnichtnutzung_andere[]" id="grundnichtnutzung_andere" value="wbz" <?php echo $checkedwbz; ?> />&nbsp;WBZ</td>
     </tr>	
    <tr>
	  <td align="left"  width="200" ></td>
	  <td align="left"  width="300"> <input type="checkbox" name="grundnichtnutzung_andere[]" id="grundnichtnutzung_andere" value="we'g" <?php echo $checkedweg; ?> />&nbsp;WE'G</td>
     </tr>
    <tr>
	  <td align="left"  width="200" ></td>
	  <td align="left"  width="300"><input type="checkbox" name="grundnichtnutzung_andere[]" id="grundnichtnutzung_andere" value="andere_anbieter" <?php echo $checkedanderetoo; ?> />&nbsp;Andere Anbieter, n&auml;mlich:&nbsp;<input name="sonstige" id="sonstige" value="<?php echo $_SESSION['sonstige']; ?>" size="10"  /></td>
     </tr>
		
     </table>
    
	<br><br>
      <br>
      <br>
      <br>
      <br>
      <br>
    <input type="checkbox" name="grundnichtnutzung[]" id="grundnichtnutzung[]" value="schulinterne_veranstaltungen" <?php echo $checkedschulintern; ?> />&nbsp;Ich habe mich auf schulinterne Veranstaltungen konzentriert.<br />
    <input type="checkbox" name="grundnichtnutzung[]" id="grundnichtnutzung[]" value="keine_zeit_fuer_weiterbildung" <?php echo $checkedzuwenigzeit; ?> />&nbsp;Ich hatte zu wenig Zeit für Weiterbildung.<br />
    <input type="checkbox" name="grundnichtnutzung[]" id="grundnichtnutzung[]" value="keine_kenntnisse_angebote_iwb" <?php echo $checkedkeinekenntnisse; ?>  />&nbsp;Ich hatte keine Kenntnis über Angebot des IWB.<br />
    <input type="checkbox" name="grundnichtnutzung[]" id="grundnichtnutzung[]" value="nichts_passendes_dabei" <?php echo $checkednichtspassendes; ?>  />&nbsp;Ich habe kein passendes Angebot gefunden.<br><br>
    Was war für Sie unpassend (z.B. Kursort, -zeit, -dauer, -leitung)?
    <div class="field-widget"><textarea name="memo_grundnichtnutzung"   cols="60" rows="6"><?php echo $_SESSION['memo_grundnichtnutzung']; ?></textarea></div><br>
 
    <input type="checkbox" name="grundnichtnutzung[]" id="grundnichtnutzung" value="andere_gruende" class="validate-one-required" <?php echo $checkedandere; ?>  />&nbsp;Anderes, n&auml;mlich:
    <div class="field-label"><label for="memo_grundnichtnutzung_anderes"></label></div>
    <div class="field-widget"><textarea name="memo_grundnichtnutzung_anderes"  cols="60" rows="6"><?php echo $_SESSION['memo_grundnichtnutzung_anderes']; ?></textarea></div>
    </div>

	

    <?php

    $pixel = "360px";
    $prozent = "63 %";
    progressbar($pixel,$prozent);


    if ($_SESSION['merker'] == "YES")
    {
	
	$backbutton = "4";
    }
    else
    {
	$backbutton = "2";
    }
	

    ?>


    </fieldset>

     <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=<?php echo $backbutton; ?>'" /><input type="submit" name="submit_5" value="Weiter" />
    </form>


	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "valiation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});

    	</script>


<?php



}
################################################################################################




################################################################################################
function question6()
{

        global $urlvariable, $sitename;


	 if (isset($_SESSION['unterstuetzung']))	
	 {
		$checkedinformiert = '';
		$checkedermuntert = '';
		$checkedverpflichtet = '';
		$checkedfreigestellt = '';
		$checkedfinanziell = '';
		$checkedkeine = '';
		$checkedmag = '';
		$checkedschilf = '';
		$checkedanderes = '';

		if (in_array("von_schulleitung_informiert", $_SESSION['unterstuetzung'])) { $checkedinformiert = "checked"; }
		if (in_array("von_schulleitung_ermuntert", $_SESSION['unterstuetzung'])) { $checkedermuntert = "checked"; }
		if (in_array("von_schulleitung_verpflichtet", $_SESSION['unterstuetzung'])) { $checkedverpflichtet = "checked"; }
		if (in_array("werde_freigestellt", $_SESSION['unterstuetzung'])) { $checkedfreigestellt = "checked"; }
		if (in_array("erhalte_finanzielle_unterstuetzung", $_SESSION['unterstuetzung'])) { $checkedfinanziell = "checked"; }
		if (in_array("erhalte_keine_unterstuetzung", $_SESSION['unterstuetzung'])) { $checkedkeine = "checked"; }
		if (in_array("in_MAG_geplant", $_SESSION['unterstuetzung'])) { $checkedmag = "checked"; }
		if (in_array("von_SchiLF_informiert", $_SESSION['unterstuetzung'])) { $checkedschilf = "checked"; }
		if (in_array("anderes", $_SESSION['unterstuetzung'])) { $checkedanderes = "checked"; }
	 }

?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II</h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=7"; ?>"  method="post">
    <fieldset>
    <legend>Nutzung des kursorischen Weiterbildungsangebots im Jahr 2006</legend>
    
   <div class="form-row">
    <div class="field-label"><label for="unterstuetzung">Wie wird die kursorische Weiterbildung der Lehrpersonen an Ihrer Schule unterst&uuml;tzt? (Mehrfachantworten m&ouml;glich)</label></div><br>
    <div class="field-label">
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="von_schulleitung_informiert" <?php echo $checkedinformiert; ?> />&nbsp;Ich werde von der Schulleitung über Angebote informiert.<br />
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="in_MAG_geplant" <?php echo $checkedmag; ?> />&nbsp;Die Planung der Weiterbildung ist fester Bestandteil des Mitarbeitergespr&auml;chs.<br />
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="von_schulleitung_ermuntert" <?php echo $checkedermuntert; ?> />&nbsp;Ich werde von der Schulleitung zur Teilnahme an Kursen/Tagungen ermuntert.<br />
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="von_schulleitung_verpflichtet" <?php echo $checkedverpflichtet; ?> />&nbsp;Ich werde von der Schulleitung zur Teilnahme an Kursen/Tagungen verpflichtet.<br />
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="von_SchiLf_informiert" <?php echo $checkedschilf; ?> />&nbsp;Ich werde von der f&uuml;r SchiLf verantwortlichen Person informiert.<br />
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="werde_freigestellt" <?php echo $checkedfreigestellt; ?> />&nbsp;Ich werde für die Dauer der Weiterbildung vom Unterricht freigestellt.<br />
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="erhalte_finanzielle_unterstuetzung" <?php echo $checkedfinanziell; ?>  />&nbsp;Ich erhalte finanzielle Unterst&uuml;tzung für den Kursbesuch.<br />
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="erhalte_keine_unterstuetzung" <?php echo $checkedkeine; ?> />&nbsp;Ich erhalte keine Unterst&uuml;tzung.<br>
   
    <input type="checkbox" name="unterstuetzung[]" id="unterstuetzung" value="anderes" class="validate-one-required" <?php echo $checkedanderes; ?>  />&nbsp;Anderes, n&auml;mlich:
     <div class="field-widget"><textarea name="memo_unterstuetzung_anderes"  cols="60" rows="6"><?php echo $_SESSION['memo_unterstuetzung_anderes']; ?></textarea></div>
    </div>

     </div>
    </div> 


    <?php

    $pixel = "400px";
    $prozent = "70 %";
    progressbar($pixel,$prozent);


    if ($_SESSION['merker'] == "YES")
    {
	$backbutton = "4";
    }
    else
    {
	$backbutton = "5";
    }

    ?>


    </fieldset>

     <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=<?php echo $backbutton; ?>'"/><input type="submit" name="submit_6" value="Weiter" />
    </form>

    	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "valiation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});

    	</script>


<?php



}
################################################################################################


################################################################################################
function question7()
{

        global $urlvariable, $sitename;


	 if (isset($_SESSION['schwerpunkte_future']))	
	 {
		$checkedmatura = '';
		$checkedschullehrplan = '';
		$checkedmaturaarbeit = '';
		$checkedfachbereich = '';
		$checkedpadabereich = '';
		$checkedmethodikbereich = '';
		$checkedfachlichueber = '';
		$checkedinformatik = '';
	       $checkedzlg = '';
		$checkedsonstiges = '';

		if (in_array("matura_klm", $_SESSION['schwerpunkte_future'])) { $checkedmatura = "checked"; }
		if (in_array("rahmenlehrplan_ABU", $_SESSION['schwerpunkte_future'])) { $checkedschullehrplan = "checked"; }
		if (in_array("bereich_maturaarbeit", $_SESSION['schwerpunkte_future'])) { $checkedmaturaarbeit = "checked"; }
		if (in_array("bereich_fachwissenschfat", $_SESSION['schwerpunkte_future'])) { $checkedfachbereich = "checked"; }
		if (in_array("bereich_methodik_didaktik", $_SESSION['schwerpunkte_future'])) { $checkedmethodikbereich = "checked"; }
		if (in_array("bereich_paedagogik", $_SESSION['schwerpunkte_future'])) { $checkedpadabereich= "checked"; }
		if (in_array("bereich_ueberfachlich", $_SESSION['schwerpunkte_future'])) { $checkedueberfachlich = "checked"; }
		if (in_array("bereich_faecheruebergreifend", $_SESSION['schwerpunkte_future'])) { $checkedfachlichueber = "checked"; }
		if (in_array("bereich_informatik", $_SESSION['schwerpunkte_future'])) { $checkedinformatik = "checked"; }
		if (in_array("zertifikatslehrgang", $_SESSION['schwerpunkte_future'])) { $checkedzlg = "checked"; }
		if (in_array("sonstiges", $_SESSION['schwerpunkte_future'])) { $checkedsonstiges = "checked"; }
	 }


?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II</h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=8"; ?>"  method="post">
    <fieldset>
    <legend>Anliegen und Bed&uuml;rfnisse für ein k&uuml;nftiges Weiterbildungsangebot</legend>
     <div class="form-row">
    <div class="field-label"><label for="field11">In welchen Bereichen setzen Sie in den n&auml;chsten zwei Jahren den Schwerpunkt Ihrer Weiterbildung? (Mehrfachantworten m&ouml;glich)</label></div><br>
    <div class="field-label">
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="matura_klm" <?php echo $checkedmatura; ?>   />&nbsp;Einf&uuml;hrung kant. Lehrplan Maturit&auml;tsausbildung KLM<br />
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="rahmenlehrplan_ABU" <?php echo $checkedschullehrplan; ?>   />&nbsp;Umsetzung Rahmenlehrplan ABU/Einf&uuml;hrung Schullehrplan<br />
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="bereich_maturaarbeit" <?php echo $checkedmaturaarbeit; ?>   />&nbsp;Bereich der Maturaarbeit<br />
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="bereich_fachwissenschaft" <?php echo $checkedfachbereich; ?>  />&nbsp;fachwissenschaftlicher Bereich<br />
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="bereich_methodik_didaktik" <?php echo $checkedmethodikbereich; ?>  />&nbsp;methodisch-didaktischer Bereich<br />
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="bereich_paedagogik" <?php echo $checkedpadabereich; ?>  />&nbsp;p&auml;dagogischer Bereich<br />
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="bereich_ueberfachlich" <?php echo $checkedueberfachlich; ?>  />&nbsp;&uuml;berfachlicher Bereich (z.B. F&ouml;rderung des selbst&auml;ndigen Lernens)<br />
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="bereich_faecheruebergreifend" <?php echo $checkedfachlichueber; ?>   />&nbsp;f&auml;cher&uuml;bergreifender Bereich (z.B interdisziplin&auml;re Projekte)<br />
    <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="bereich_informatik" <?php echo $checkedinformatik; ?>  />&nbsp;Bereich der Informatik und/oder der neuen Medien<br />
     <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="zertifikatslehrgang" <?php echo $checkedzlg; ?>  />&nbsp;Zertifikatslehrgang (ZLG; fr&uuml;her Nachdiplomkurs NDK) zum Thema:&nbsp;&nbsp;<input name="schwerpunkt_future_zlg" id="schwerpunkt_future_zlg" value="<?php echo $_SESSION['schwerpunkt_future_zlg']; ?>" size="30" /><br />
   
     <input type="checkbox" name="schwerpunkte_future[]" id="schwerpunkte_future" value="sonstiges" class="validate-one-required" <?php echo $checkedsonstiges; ?>  />&nbsp;Anderes, n&auml;mlich:
     <div class="field-widget"><textarea name="memo_schwerpunkte_anderes"  cols="60" rows="6"><?php echo $_SESSION['memo_schwerpunkte_anderes']; ?></textarea></div>
    </div>

      </div>
    </div> 

    <?php

    $pixel = "440px";
    $prozent = "77 %";
    progressbar($pixel,$prozent);

    ?>


    </fieldset>

    <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=6'"  /><input type="submit" name="submit_7" value="Weiter" /> 
    </form>

     	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "valiation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});

    	</script>

<?php

}
################################################################################################


################################################################################################
function question8()
{

        global $urlvariable, $sitename;

	 if (isset($_SESSION['kriterien']))	
	 {
		$checkedergaenzung = '';
		$checkedup2date = '';
		$checkedmethodisch = '';
		$checkedpadago = '';
		$checkedfaehigkeiten = '';
		$checkedanregung = '';
		$checkedkursort = '';
		$checkedkursdauer = '';
	       $checkedanbieter = '';
		$checkedleitung = '';
		$checkedextkursort = '';

		if (in_array("ergaenzende_inhalte", $_SESSION['kriterien'])) { $checkedergaenzung = "checked"; }
		if (in_array("auf_neuestem_stand_bleiben", $_SESSION['kriterien'])) { $checkedup2date = "checked"; }
		if (in_array("methodisches_repertoire_erweitern", $_SESSION['kriterien'])) { $checkedmethodisch = "checked"; }
		if (in_array("paedagogische_kompetenzen_erweitern", $_SESSION['kriterien'])) { $checkedpadago = "checked"; }
		if (in_array("persoenliche_kompetenzen_erweitern", $_SESSION['kriterien'])) { $checkedfaehigkeiten = "checked"; }
		if (in_array("anregung_dritter", $_SESSION['kriterien'])) { $checkedanregung = "checked"; }
		if (in_array("naher_kursort", $_SESSION['kriterien'])) { $checkedkursort = "checked"; }
		if (in_array("guenstige_kursdauer", $_SESSION['kriterien'])) { $checkedkursdauer = "checked"; }
		if (in_array("kursanbieter", $_SESSION['kriterien'])) { $checkedanbieter = "checked"; }
		if (in_array("kursleitung", $_SESSION['kriterien'])) { $checkedleitung = "checked"; }
		if (in_array("externer_kursort", $_SESSION['kriterien'])) { $checkedextkursort = "checked"; }
		if (in_array("sonstige_kriterien", $_SESSION['kriterien'])) { $checkedanderekriterien = "checked"; }

	 }


?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II</h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=9"; ?>"  method="post">
    <fieldset>
    <legend>Anliegen und Bed&uuml;rfnisse für ein k&uuml;nftiges Weiterbildungsangebot</legend>
     <div class="form-row">
    <div class="field-label"><label for="field11">Nach welchen Kriterien w&auml;hlen Sie Weiterbildungsveranstaltungen aus? (Mehrfachantworten m&ouml;glich)</label></div><br>
    <div class="field-label">
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="egaenzende_inhalte" <?php echo $checkedergaenzung; ?> />&nbsp;Im Studium wenig/nicht ber&uuml;cksichtigte Inhalte erg&auml;nzen <br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="auf_neuestem_stand_bleiben" <?php echo $checkedup2date; ?> />&nbsp;Neue Forschungsergebnisse kennen lernen/mich fachlich auf dem neusten Stand halten<br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="methodisches_repertoire_erweitern" <?php echo $checkedmethodisch; ?> />&nbsp;Das methodisch-didaktische Repertoire erweitern <br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="paedagogische_kompetenzen_erweitern" <?php echo $checkedpadago; ?> />&nbsp;Die p&auml;dagogischen Kompetenzen erweitern <br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="persoenliche_kompetenzen_erweitern" <?php echo $checkedfaehigkeiten; ?> />&nbsp;Meine pers&ouml;nlichen F&auml;higkeiten weiterentwickeln<br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="anregung_dritter" <?php echo $checkedanregung; ?> />&nbsp;Anregung Dritter (Kollegin/Kollege; Schulleitung)<br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="naher_kursort" <?php echo $checkedkursort; ?> />&nbsp;Nahe gelegener Kursort<br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="externer_kursort" <?php echo $checkedextkursort; ?> />&nbsp;Kursort ausserhalb des gewohnten Schulrahmens<br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="guenstige_kursdauer" <?php echo $checkedkursdauer; ?>  />&nbsp;G&uuml;nstige Kursdauer bzw. zeitlich g&uuml;nstig angesetzter Kurs<br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="kursanbieter" <?php echo $checkedanbieter; ?> />&nbsp;Kursanbieter/Veranstalter<br />
    <input type="checkbox" name="kriterien[]" id="kriterien[]" value="kursleitung" <?php echo $checkedleistung; ?> />&nbsp;Kursleitung<br />

     <input type="checkbox" name="kriterien[]" id="kriterien[]" value="sonstige_kriterien" class="validate-one-required" <?php echo $checkedanderekriterien; ?>  />&nbsp;andere Kriterien, n&auml;mlich:
     <div class="field-widget"><textarea name="memo_kriterien"  cols="60" rows="6"><?php echo $_SESSION['memo_kriterien']; ?></textarea></div>
    </div>

      </div>
    </div> 

    <?php

    $pixel = "480px";
    $prozent = "84 %";
    progressbar($pixel,$prozent);

    ?>


    </fieldset>

     <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=7'"/><input type="submit" name="submit_8" value="Weiter" />
    </form>

	  	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "valiation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});

    	</script>


<?php



}
################################################################################################



################################################################################################
function question9()
{

        global $urlvariable, $sitename;
	
	 if (isset($_SESSION['kursformen']))	
	 {
		$checkedabend = '';
		$checkedvormittag = '';
		$checkednachmittags = '';
		$checkedtages = '';
		$checkedtagungen = '';
		$checkedkongresse = '';
		$checkedblockzuhause = '';
		$checkedblockauswaerts = '';
	       $checkedbloecke = '';
		$checkedmehrteilige= '';
		

		if (in_array("abendkurse", $_SESSION['kursformen'])) { $checkedabend = "checked"; }
		if (in_array("vormittagskurse", $_SESSION['kursformen'])) { $checkedvormittag = "checked"; }
		if (in_array("nachmittagskurse", $_SESSION['kursformen'])) { $checkednachmittags = "checked"; }
		if (in_array("tageskurse", $_SESSION['kursformen'])) { $checkedtages = "checked"; }
		if (in_array("tagungen", $_SESSION['kursformen'])) { $checkedtagungen= "checked"; }
		if (in_array("kongresse", $_SESSION['kursformen'])) { $checkedkongresse = "checked"; }
		if (in_array("blockkurse_uebernachtung_zuhause", $_SESSION['kursformen'])) { $checkedblockzuhause= "checked"; }
		if (in_array("blockkurse_uebernachtung_auswaerts", $_SESSION['kursformen'])) { $checkedblockauswaerts = "checked"; }
		if (in_array("blockkurse_mehrere_bloecke", $_SESSION['kursformen'])) { $checkedbloecke = "checked"; }
		if (in_array("mehrteilige_kurse", $_SESSION['kursformen'])) { $checkedmehrteilige = "checked"; }
	
	 }

?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II</h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=10"; ?>"  method="post">
    <fieldset>
    <legend>Anliegen und Bed&uuml;rfnisse für ein k&uuml;nftiges Weiterbildungsangebot</legend>
     <div class="form-row">
    <div class="field-label"><label for="kursformen">Welche Kursformen sagen Ihnen zu? (Mehrfachantworten m&ouml;glich)</label></div><br>
    <div class="field-label">
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="abendkurse" <?php echo $checkedabend ?> />&nbsp;Abendkurse (ab 17.30 Uhr)<br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="vormittagskurse" <?php echo $checkedvormittag; ?> />&nbsp;Vormittagskurse<br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="nachmittagskurse" <?php echo $checkednachmittags; ?> />&nbsp;Nachmittagskurse<br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="tageskurse" <?php echo $checkedtages; ?> />&nbsp;Tageskurse<br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="tagungen" <?php echo $checkedtagungen; ?>  />&nbsp;Tagungen mit Referaten und Workshops<br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="kongresse" <?php echo $checkedkongresse; ?> />&nbsp;Kongresse mit Referaten, Workshops usw.<br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="blockkurse_uebernachtung_zuhause" <?php echo $checkedblockzuhause; ?>  />&nbsp;Blockkurse mit &Uuml;bernachtung zu Hause <br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="blockkurse_uebernachtung_auswaerts" <?php echo $checkedblockauswaerts; ?> />&nbsp;Blockkurse mit ausw&auml;rtiger &Uuml;bernachtung<br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="blockkurse_mehrere_bloecke" <?php echo $checkedbloecke; ?> />&nbsp;Blockkurse mit mehreren Bl&ouml;cken<br />
    <input type="checkbox" name="kursformen[]" id="kursformen[]" value="mehrteilige_kurse" class="validate-one-required" <?php echo $checkedmehrteilige; ?> />&nbsp;Mehrteilige Kurse mit integrierter Umsetzung<br />
    </div>
    </div> 

    <?php

    $pixel = "520px";
    $prozent = "93 %";
    progressbar($pixel,$prozent);

    ?>


    </fieldset>

    <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=8'"/><input type="submit" name="submit_9" value="Weiter" /> 
    </form>


	  	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "valiation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});

    	</script>


<?php

}
################################################################################################



################################################################################################
function question10()
{

        global $urlvariable, $sitename;

	 if (isset($_SESSION['zeiten']))	
	 {
		$checkedsemester= '';
		$checkedsamstagen = '';
		$checkedfruehferien_erste = '';
		$checkedfruehferien_letzte = '';
		$checkedsommferien_erste = '';
		$checkedsommferien_letzte = '';
		$checkedherbferien_erste = '';
		$checkedherbferien_letzte = '';
		$checkedkeinpraefs= '';
		

		if (in_array("waehrend_semester", $_SESSION['zeiten'])) { $checkedsemester= "checked"; }
		if (in_array("samstagen", $_SESSION['zeiten'])) { $checkedsamstagen = "checked"; }
		if (in_array("erste_woche_fruehlingsferien", $_SESSION['zeiten'])) { $checkedfruehferien_erste = "checked"; }
		if (in_array("letzte_woche_fruehlingsferien", $_SESSION['zeiten'])) { $checkedfruehferien_letzte = "checked"; }
		if (in_array("erste_woche_sommerferien", $_SESSION['zeiten'])) { $checkedsommferien_erste = "checked"; }
		if (in_array("letzte_woche_sommerferien", $_SESSION['zeiten'])) { $checkedsommferien_letzte = "checked"; }
		if (in_array("erste_woche_herbstferien", $_SESSION['zeiten'])) { $checkedherbferien_erste = "checked"; }
		if (in_array("letzte_woche_herbstferien", $_SESSION['zeiten'])) { $checkedherbferien_letzte = "checked"; }
		if (in_array("keine_praeferenzen", $_SESSION['zeiten'])) { $checkedkeinpraefs = "checked"; }
	
	 }


?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II</h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=11"; ?>"  method="post">
    <fieldset>
    <legend>Anliegen und Bed&uuml;rfnisse für ein k&uuml;nftiges Weiterbildungsangebot</legend>
     <div class="form-row">
    <div class="field-label"><label for="zeiten">Zu welchen Zeiten besuchen Sie Weiterbildungsangebote am liebsten? (Mehrfachantworten m&ouml;glich)</label></div><br>
    <div class="field-label">
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="waehrend_semester" <?php echo $checkedsemester; ?> />&nbsp;W&auml;hrend des Semesters in der unterrichtsfreien Zeit<br />
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="samstagen" <?php echo $checkedsamstagen; ?>  />&nbsp;An Samstagen<br />
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="erste_woche_fruehlingsferien" <?php echo $checkedfruehferien_erste; ?> />&nbsp;Erste Woche in den Fr&uuml;hlingsferien<br />
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="letzte_woche_fruehlingsferien" <?php echo $checkedfruehferien_letzte; ?> />&nbsp;Letzte Woche in den Fr&uuml;hlingsferien<br />
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="erste_woche_sommerferien" <?php echo $checkedsommferien_erste; ?> />&nbsp;Erste Woche in den Sommerferien<br />
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="letzte_woche_sommerferien" <?php echo $checkedsommferien_letzte; ?> />&nbsp;Letzte Woche in den Sommerferien<br />
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="erste_woche_herbstferien" <?php echo $checkedherbferien_erste; ?>  />&nbsp;Erste Woche in den Herbstferien<br />
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="letzte_woche_herbstferien" <?php echo $checkedherbferien_letzte; ?>  />&nbsp;Letzte Woche in den Herbstferien<br />
    <input type="checkbox" name="zeiten[]" id="zeiten[]" value="kein_praeferenzen" class="validate-one-required" <?php echo $checkedkeinpraefs; ?> />&nbsp;Keine Pr&auml;ferenz<br />

      </div>
    </div> 

    <?php

    $pixel = "560px";
    $prozent = "100 %";
    progressbar($pixel,$prozent);

    ?>


    </fieldset>

     <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=9'" /><input type="submit" name="submit_10" value="Weiter" />
    </form>

	
	  	<script type="text/javascript">
    	function formCallback(result, form) {
    	window.status = "valiation callback for form '" + form.id + "': result = " + result;
    	}

    	var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});

    	</script>

<?php

}
################################################################################################




################################################################################################
function question11()
{

        global $urlvariable, $sitename;

?>

    <h1>Erhebung der Weiterbildungsbed&uuml;rfnisse der Lehrpersonen der xxxx II</h1>
    <form id="test" action="<?php echo $sitename . "?" . $urlvariable . "=12"; ?>"  method="post">
    <fieldset>
    <legend>Anliegen und Bed&uuml;rfnisse für ein k&uuml;nftiges Weiterbildungsangebot</legend>
 
     <div class="form-row">
    <div class="field-label"><label for="memo_allgemein">Bemerkungen zur Umfrage:</label></div><br>
    <div class="field-widget"><textarea name="memo_allgemein"  cols="60" rows="6"><?php echo $_SESSION['memo_allgemein']; ?></textarea></div>
    </div>

      </div>
    </div> 




    </fieldset>

    <input type="button" value="Zur&uuml;ck" onClick="parent.location='index.php?question=10'" /> <input type="submit" name="submit_11" value="Umfrage abschliessen und Eingaben speichern" /> 
    </form>


<?php


}
################################################################################################



################################################################################################
function question12()
{

       global $urlvariable, $sitename, $dbuser,$dbpass,$db;


	#######################################################
	#DATENSAMMLUNG 
	#######################################################
	#Allgemeine Daten
	$sessionid = session_id();
	$ip = getenv('REMOTE_ADDR');
	
	#DATA von questionentry()
	$schultyp = $_SESSION['schultyp'];
	$schultyp_genau = $_SESSION['schultyp_genau'];
	$schulnamen = $_SESSION['schulname'];
	
	#DATA von question1()
	$anstellungsgrad = $_SESSION['anstellungsprozent'];
	$berufsjahre = $_SESSION['berufsjahre'];
       $geschlecht = $_SESSION['geschlecht'];

	$fachkanon = $_SESSION['faecherkanon'];
	foreach ($_SESSION['faecher'] as $elementh)
	{	
		$faecher .= $elementh . " / ";
	}
	
	#DATA von question2()

	$besuchteKurse2006 = $_SESSION['pastkurse'];
	$besuchteKurse2006_anzahl = $_SESSION['pastkurse_anzahl'];
	
	#DATA von question3()
	$besuchteKurse2006_washatgefallen = $_SESSION['memo_pastkurse'];
	
	#DATA von question4()
	$besuchteKurse2006_wasverbessern = $_SESSION['memo_verbesserungen'];
	
	#DATA von question5()
	$wiesokeinekurse2006 = "-";
	$wiesokeinekurse2006_anbieter = "-";
	$wiesokeinekurse2006_memo = "-";
	$wiesokeinekurse2006_anderes = "-";
	foreach ($_SESSION['grundnichtnutzung'] as $elementa)
	{	
		$wiesokeinekurse2006 .= $elementa . " / ";
	}
	
	foreach ($_SESSION['grundnichtnutzung_andere'] as $elementb)
	{
		$wiesokeinekurse2006_anbieter .= $elementb . " / ";		
	}
	$wiesokeinekurse2006_anbieter .= $_SESSION['sonstige'];
	$wiesokeinekurse2006_memo = $_SESSION['memo_grundnichtnutzung'];
	$wiesokeinekurse2006_anderes = $_SESSION['memo_grundnichtnutzung_anderes'];

	#DATA von question6()
	foreach ($_SESSION['unterstuetzung'] as  $elementc)
	{
		$unterstuetzungsinfo .= $elementc . " / ";	
	}
	$unterstuetzungsinfo_memo = $_SESSION['memo_unterstuetzung_anderes'];

	#DATA von question7()
	foreach ($_SESSION['schwerpunkte_future'] as  $elementd)
	{
		$schwerpunkte .= $elementd . " / ";	
	}
	$zlgthema = $_SESSION['schwerpunkt_future_zlg'];
	$schwerpunkte_memo = $_SESSION['memo_schwerpunkte_anderes'];
	
	#DATA von question8()
	foreach ($_SESSION['kriterien'] as  $elemente)
	{
		$wahlkriterien .= $elemente . " / ";	
	}
	$kriterien_memo = $_SESSION['memo_kriterien'];

	#DATA von question9()
	foreach ($_SESSION['kursformen'] as  $elementf)
	{
		$welchekursformen .= $elementf . " / ";	
	}

	#DATA von question10()
	foreach ($_SESSION['zeiten'] as  $elementg)
	{
		$kurszeiten .= $elementg . " / ";	
	}
	
	#DATA von question11()
	$umfragen_memo = $_SESSION['memo_allgemein'];
 	##################################################




	##################################################
	#SQL insert
	##################################################

	$dbconn = @mysql_connect($host,$dbuser,$dbpass);
	
	if($dbconn)
	{
		mysql_select_db($db,$dbconn);
		$sql = "INSERT INTO fragebogen (schultyp, schultyp_genau, schulname, frage1_anstellungsgrad, frage2_geschlecht, frage3_faecherkanon, frage3_faecher, frage4_berufserfahrung, frage5_kurse2006, frage5_kurse2006_wennja_wieviele, frage6_kurse2006_washatgefallen, 
			frage7_kurse2006_wasverbessern, frage8_wiesokeinekurse2006, frage8_wiesokeinekurse2006_memounpassend, frage8_wiesokeinekurse2006_memoanderes, frage8_wiesokeinekurse2006_andereanbieter,
			frage9_unterstuetzungvonschule, frage9_unterstuetzungvonschule_anderes, frage10_schwerpunkte_zukunft, frage10_schwerpunkte_zukunft_zlgthema, frage10_schwerpunkte_zukunft_memo,
			frage11_kriterien_weiterbildung, frage11_kriterien_weiterbildung_memo, frage12_kursformen, frage13_kurszeiten, frage14_memo, ip_adresse,session_id) ";
		
		$sql .= "VALUES ('$schultyp', '$schultyp_genau', '$schulnamen','$anstellungsgrad','$geschlecht', '$fachkanon','$faecher','$berufsjahre','$besuchteKurse2006','$besuchteKurse2006_anzahl','$besuchteKurse2006_washatgefallen','$besuchteKurse2006_wasverbessern','$wiesokeinekurse2006',
			'$wiesokeinekurse2006_memo','$wiesokeinekurse2006_anderes','$wiesokeinekurse2006_anbieter','$unterstuetzungsinfo','$unterstuetzungsinfo_memo','$schwerpunkte', '$zlgthema','$schwerpunkte_memo',
			'$wahlkriterien','$kriterien_memo','$welchekursformen','$kurszeiten', '$umfragen_memo', '$ip','$sessionid')";

		$result =  mysql_query($sql,$dbconn);

		if ($result)
		{
			#echo $sql . "<br>";
			#echo "ok...";
			
		}
		else
		{
			die("Ihre Angaben konnten nicht gespeichert werden...bitte wenden Sie sich an den Serveradministrator xxx@xxxx.ch");
			#echo "<P>".mysql_error($dbconn) . "<br>";
			#echo $sql . "<br>";

		}

	
	}
	else
	{
		die("Ihre Angaben konnten nicht gespeichert werden...bitte wenden Sie sich an den Serveradministrator xxx@xxxx.ch");
	}

	mysql_close($dbconn);
      ##################################################




##################################################
# Adieu Message
##################################################
?>

    <h1>xxxxxxxxx</h1>
    

    <fieldset>
    <legend>Besten Dank f&uuml;r Ihre Teilnahme</legend>
    <br>
    Sie haben die Umfrage erfolgreich abgeschlossen und Ihre Eingaben wurden gespeichert.<br><br>
    Herzlichen Dank für Ihre Teilnahme an dieser Umfrage!

    </fieldset>

<?php
##################################################


	##################################################
    	#Session debug
	##################################################
	#echo $anstellungsgrad . "<br>";
	#echo $berufsjahre . "<br>";
	#echo $geschlecht . "<br>";
	#echo $besuchteKurse2006 . "<br>";
	#echo $besuchteKurse2006_anzahl . "<br>";
	#echo $besuchteKurse2006_washatgefallen . "<br>";
	#echo $besuchteKurse2006_wasverbessern . "<br>";
	#echo $wiesokeinekurse2006 . "<br>";
	#echo $wiesokeinekurse2006_anbieter . "<br>";
	#echo $wiesokeinekurse2006_memo . "<br>";
	#echo $wiesokeinekurse2006_anderes . "<br>";
	#echo $unterstuetzungsinfo . "<br>";
	#echo $unterstuetzungsinfo_memo . "<br>";
	#echo $schwerpunkte . "<br>";
	#echo $zlgthema . "<br>";
	#echo $schwerpunkte_memo . "<br>";
	#echo $kriterien_memo . "<br>";
	#echo $wahlkriterien . "<br>";
	#echo $welchekursformen . "<br>";
	#echo $kurszeiten . "<br>";
	#echo $umfragen_memo . "<br>";
	##################################################

	session_destroy();



}
################################################################################################


##################################################
#Progressbar Funktion
##################################################
function progressbar($pix,$proz)
{
     global $bgcolor_green, $bgcolor_grey;

?>
    <br>
    <table align="left"  border="1" width="560px" cellspacing="0"  >
    <tr>
    <td align="center" bgcolor="<?php echo $bgcolor_green; ?>" width="<?php echo $pix; ?>"><b><?php echo $proz; ?></b></td>
    <td></td>
    </tr>
    </table>



<?php
}
##################################################



