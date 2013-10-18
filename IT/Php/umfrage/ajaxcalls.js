function getschultyp()
{
				
 	 			var idschultyp = 'schultyp';
				var url = 'getschule.php';
				//var pars = 'code=getName&schultyp=' + idschultyp;

				var wertaa = document.forms.test.schultyp;
				var werta = wertaa.options[wertaa.selectedIndex].value;

				if(document.forms.test.schultypgenau) {
					var wertb = document.forms.test.schultypgenau.options[document.forms.test.schultypgenau.selectedIndex].value;
					
				}
				else {
					var wertb = 'leer_typgenau';
				
				}


				if(document.forms.test.schulname) {
					var wertc = document.forms.test.schulname.options[document.forms.test.schulname.selectedIndex].value;
					
				}
				else {
					var wertc = 'leer_schulname';
				
				}

				
 				var pars = 'schultyp=' + werta + '&schultypgenau=' + wertb + '&schulname=' + wertc;
				var meinAjaxReq = new Ajax.Request(
						url,
						{
							method: 'post',
							//requestHeaders: ['Content-Type', 'text/html', 'Cache-Control', 'no-chache', 'must-revalidate'],
							postBody: pars,
							//parameters: parsc,
							onComplete: showResponseSchulname  					
						});

				
				

}


function showResponseSchulname(originalRequest)
{	
				//put returned XML in the textarea
				$('schulname_field').innerHTML = originalRequest.responseText;
				//DEBUG
				//$('error').value = originalRequest.responseText;
}



function getfaecher()
{
				var url = 'getfaecher.php';
				//var pars = 'code=getFach&fachkanon=';

				var wertaa = document.forms.frage2.faecherkanon;
				var werta = wertaa.options[wertaa.selectedIndex].value;


				
 				var pars = 'fachkanon=' + werta;
				var meinAjaxReq = new Ajax.Request(
						url,
						{
							method: 'post',
							//requestHeaders: ['Content-Type', 'text/html', 'Cache-Control', 'no-chache', 'must-revalidate'],
							postBody: pars,
							//parameters: parsc,
							onComplete: showResponseFach  					
						});
			

}



function showResponseFach(originalRequest)
{	
				//put returned XML in the textarea
				$('faecher_field').innerHTML = originalRequest.responseText;
				//DEBUG
				//$('error').value = originalRequest.responseText;

}
	





