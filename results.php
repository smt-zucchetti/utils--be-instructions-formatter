<!DOCTYPE html>
<html>
<head>
	<title>Template Generator</title>
	<link rel='stylesheet' href='style.css' />
</head>
<body>



	<?php

		//$propName = isset($_POST['property-name']) ? trim($_POST['property-name']) : '';

		if(isset($_POST['urls']) && isset($_POST['be-type']))
		{
			$lineArr = explode(PHP_EOL, $_POST['urls']);

			$urls = array_filter($lineArr, function($key){
				return $key % 2 !== 0;
			}, ARRAY_FILTER_USE_KEY);
			
			$propNames = array_filter($lineArr, function($key){
				return $key % 2 === 0;
			}, ARRAY_FILTER_USE_KEY);

			for($i=0,$x=0,$y=1; $i<count($propNames); $i++,$x+=2,$y+=2)
			{
				printTemplate($propNames[$x], $urls[$y], $_POST['be-type']);
			}
		}

		function printTemplate($propName, $url, $beType)
		{
			$url = str_replace('&tst_prntz=si', '', $url);
			$getParams = str_replace('&', '<br>', substr($url, strpos($url, '?')+1));

			switch($beType)
			{
				case 'advanced':
					$actionUrlUri = '/reservations/risultato.html';
					break;

				case 'smart':
					$actionUrlUri = '/reservation_hotel.htm';
					break;

				case 'premium':
					$actionUrlUri = '/premium/index2.html';
					break;

				default:
					$actionUrlUri = '/error';
					break;
			}

			$actionUrl = substr($url, 0, strpos($url, '.com') + 4).$actionUrlUri;

			$propName = ucwords(strtolower($propName));

			$tpl = <<<EOT
				${propName}<br>
				${url}<br>
				URL ACTION FORM ${actionUrl}<br>
				${getParams}<br>
				At the following link you can download the API document with the instructions on how to include Vertical Booking in the website.<br>
				http://www.verticalbookingusa.com/assets/docs/Webmaster_API_eng_v3.0.pdf
				<br><br>
			EOT;

			echo $tpl;
		}
	?>
</body>
</html>