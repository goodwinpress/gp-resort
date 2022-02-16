<?php
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://update.goodwinpress.ru/gpresort.json',
	get_template_directory() . '/functions.php',
	'gp-resort'
);