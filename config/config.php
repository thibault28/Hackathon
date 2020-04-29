<?php

/**
 * This file define config constants .
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */


define('APP_DEV', true);

//Model (for connexion data, see unversionned db.php)
//VIew
define('APP_VIEW_PATH', __DIR__ . '/../src/View/');
define('APP_CACHE_PATH', __DIR__ . '/../temp/cache/');

define('HOME_PAGE', 'home/index');


//Swiftmailer(Email)

define('MAILER_HOST', 'smtp.office365.com');
define('MAILER_PORT', 587);
define('MAILER_ENCRYPTION', 'tls');
define('MAILER_USERNAME', 'localhost.website@outlook.fr');
define('MAILER_PASSWORD', 'localhost28');
