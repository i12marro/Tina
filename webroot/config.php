<?php
/**
 * Config-file for Tina. Change settings here to affect installation.
 *
 */
 
/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
 
 
/**
 * Define Tina paths.
 *
 */
define('TINA_INSTALL_PATH', __DIR__ . '/..');
define('TINA_THEME_PATH', TINA_INSTALL_PATH . '/theme/render.php');



define('IMG_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR);
define('CACHE_PATH', __DIR__ . '/cache/');
define('GALLERY_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img');
define('GALLERY_BASEURL', '');
 
 
/**
 * Include bootstrapping functions.
 *
 */
include(TINA_INSTALL_PATH . '/src/bootstrap.php');
 
 
/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();
 
 
/**
 * Create the Tina variable.
 *
 */
$tina = array();
 
 
/**
 * Site wide settings.
 *
 */
$tina['lang']         = 'sv';
$tina['title_append'] = ' | Books Rental';

if (isset($_SESSION['username'])) {
	$username = "Inloggad som:<strong> {$_SESSION['username']->uname}</strong>";
}
else
{
	$username = "";
}
 
$tina['header'] = <<<EOD
<form method='get' action='books.php' class='search'>
<input type='text' name='title'/>
<input type='submit' value='Sök' class='button'>
</form>
<a href='index.php'><img class='sitelogo' src='img/br.png' alt='Books Rental'/></a>
<img class='sitetitle' src='img/header.png' alt='Books Rental'/>
<span class='siteslogan'>Lägg inte onödigt mycket pengar på böcker du endast behöver en kort tid</span>
EOD;

 
$tina['nav'] = <<<EOD
<span class='inlogg'>$username</span>
<nav>
        <ul id="nav">
            <li class=""><a href='index.php' title='Hem'>Hem</a></li>
            <li class=""><a href='#' title='Böcker'>Våra böcker</a></li>
            <li class=""><a href='#' title='Nyheter'>Nyheter</a></li>
            <li class=""><a href='#' title='Information om oss'>Om oss</a></li>
            <li class=""><a href='#' title='Vinn böcker'>Tävling</a></li>
            <li class=""><a href='#' title='Logga in'>Logga in</a></li>
            <li class=""><a href='#' title='Logga ut'>Logga ut</a></li>
        </ul>
</nav>
EOD;

$tina['footer'] = <<<EOD
<footer><span>Copyright (c) Books Rental AB (webb@booksrental.com) | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Validator</a></span></footer>
EOD;

/**
 * Theme related settings.
 *
 */
$tina['stylesheet'] = array('css/style.css');
$tina['favicon']    = 'img/favicon.ico';