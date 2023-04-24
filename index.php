<!DOCTYPE html>
<html>
<head>
	<title>Template Generator</title>
	<link rel='stylesheet' href='style.css' />
</head>
<body>
	<?php
		$urlArr = [
			'SECRETS AKUMAL RIVIERA MAYA',
			'https://booking.secretsresorts.com/premium/index.html?id_albergo=13202&dc=7547&lingua_int=eng&id_stile=17409',
			'DREAMS RIVIERA CANCUN RESORT & SPA',
			'https://booking.dreamsresorts.com/premium/index.html?id_albergo=10577&dc=120&lingua_int=ita&id_stile=17493',
			'NOW AMBER PUERTO VALLARTA',
			'https://booking.nowresorts.com/premium/index.html?id_albergo=10342&dc=4353&lingua_int=fra&id_stile=17494'
		];
	?>

	<form class='form' method='POST' action='results.php'>
		<label class='form--label'>BE Type</label>
		<select name='be-type' class='form--select form--element'>
			<option class='form--option' value='advanced'>Advanced</option>
			<option class='form--option' value='smart'>Smart</option>
			<option selected class='form--option' value='premium'>Premium</option>
		</select>
		<label class='form--label' for='urls'>URL(s)</label>
		<textarea class='form--textarea form--element' name='urls' id='urls'><?php echo implode(PHP_EOL,$urlArr); ?></textarea>
		<input class='form--submit' type='submit'/>
	</form>
</body>
</html>



