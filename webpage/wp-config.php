<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configuraçções de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'arrombasse');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'arrombasse');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'arro2510');

/** nome do host do MySQL */
define('DB_HOST', 'mysql.arrombasse.com.br');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 			'dbb820f7efbedea17daa51e90e67b6c0e608c5cce246f415c1acec610e53b8af');
define('SECURE_AUTH_KEY', 	'71a19555afdd108a76c29a578e04cacdc64c22ca5dbbad88ca57c7af044054a9');
define('LOGGED_IN_KEY', 	'01d529723c35888eb5ffb0cfe1ae2dfa8a6e38be540a7b069ec1dc6bdcaa8d44');
define('NONCE_KEY', 		'08cdc2bb59b8ab56a297ebe45225d5ea646f55fa0d7b0a86595d07ce970b130b');
define('AUTH_SALT',			'fc9aaffd06cc9203f65b867bc78af6b6d2853d1ed7ee1e7322c331dfbd17ba36');
define('SECURE_AUTH_SALT',	'a9284f3a0bce5498796da8ec8848f4b57530726156e37795e69de277964bdbd8');
define('LOGGED_IN_SALT',	'c54e46de1d9c9c6a17dd3fb6074bfe8f7119b7333f99646eae5401f6940b050e');
define('NONCE_SALT',		'7277ded20178520c2d4cb0886ca852b354c93ddb9716fa947e2afafebb64782b');
/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente a
 * língua escolhida deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define ('WPLANG', 'pt_BR');

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto do WordPress para o diretório Wordpress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
?>
