<?php
error_reporting(0);
ini_set("display_errors", 0 );

/** O nome do banco de dados*/
define('DB_NAME', 'ecommerce');
/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');
/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');
/** nome do host do MySQL */
define('DB_HOST', 'localhost');

define('IMAGE_PATCH', '../images/produtos/');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/');

/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'database.php');

/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'footer.php');

$config['site']['shopName'] = "Sekay Shop";
?>
