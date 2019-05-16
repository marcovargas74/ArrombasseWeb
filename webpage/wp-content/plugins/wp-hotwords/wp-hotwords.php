<?php
/*
Plugin Name: WP-HOTWords
Plugin URI: http://www.bernabauer.com/wp-plugins
Description: Inclui o código para monetização do sistema <a href="http://www.HOTWords.com.br">HOTWords</a> e permite personalizá-lo sem mexer no tema do blog.
Author: Bernardo Bauer
Version: 4.6.2
Author URI: http://www.bernabauer.com/
*/
global $wpdb;
global $hw4wp_options;
global $domain;
global $HWversion;

$HWversion = "4.6.2";
$domain = "wp-hotwords";
$hw4wp_options = get_option('hw4wp_options');
	
register_activation_hook(__FILE__, 'hw4wp_activate');
register_deactivation_hook(__FILE__, 'hw4wp_deactivate');

add_action('admin_notices', 'hw4wp_alerta');
add_action('admin_head', 'hw4wp_admin_head');
add_action('admin_menu', 'hw4wp_add_pages');
add_action('admin_menu', 'hw4wp_create_meta_box');
add_action('wp_head', 'hw4wp_footer_css');
add_action('wp_footer', 'hw4wp_footer');

add_action('hw4wp_cron', 'wphw_relatorio' );

add_action('wp_dashboard_setup', 'hw4wp_dashboard_setup');

add_action('edit_post', 'HW_code_exclusionUpdate');
add_action('publish_post', 'HW_code_exclusionUpdate');
add_action('save_post', 'HW_code_exclusionUpdate');

add_action('edit_post', 'HW_custom_colorUpdate');
add_action('publish_post', 'HW_custom_colorUpdate');
add_action('save_post', 'HW_custom_colorUpdate');

$hw4wp_options = get_option('hw4wp_options');

	if ($hw4wp_options['show_post'] == 'checked') 
		add_filter('the_content', 'hw4wp_core', 5);

	if ($hw4wp_options['show_com'] == 'checked') 
		add_filter('comment_text','hw4wp_core', 5);

load_plugin_textdomain("wp-hotwords", null,'/wp-hotwords');
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'hw4wp_plugin_actions' );

/**************************************************************************************************
 * Link para configuração do plugin na página de administração de plugins
 */
function hw4wp_plugin_actions($links){

	$settings_link = '<a href="options-general.php?page=wp-hotwords.php">' . __('Settings') . '</a>';
	array_unshift( $links, $settings_link );
 
	return $links;
}

/**************************************************************************************************
 *  Metabox
 */
function hw4wp_create_meta_box() {

	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'hw4wp_write_post_sidebar', 'WP-HOTWords', 'hw4wp_write_post_sidebar', 'post', 'normal', 'high' );
	}
}

/**************************************************************************************************
 *  Coisas para serem feitas na instalacao do plugin
 */
function hw4wp_activate() {

	global $wpdb;
	global $HWversion;
	
	$hw4wp_options = get_option('hw4wp_options');

	if ($hw4wp_options == FALSE) {
		$hw4wp_options = array(
		'uninstall'=>'', 
		'id'=>'', 
		'colour'=>'', 
		'username'=>'',
		'password'=>'', 
		'footer_align'=>'center', 
		'footer_line'=>'inline', 
		'show_com'=>'', 
		'show_post'=>'checked', 
		'show_index'=>'', 
		'show_page'=>'', 
		'earnings'=>'', 
		'eCPM'=>'',
		'vis'=>'',
		'pal'=>'',
		'lastrun'=>'', 
		'HorS'=>'HWbr',
		'version'=>$HWversion);
		
		add_option('hw4wp_options', $hw4wp_options);
	} else {
		$hw4wp_options['version'] = $HWversion;
		$hw4wp_options['eCPM'] = '';
		$hw4wp_options['vis'] = '';
		$hw4wp_options['pal'] = '';
		update_option('hw4wp_options', $hw4wp_options);
	}

	if (!wp_next_scheduled('hw4wp_cron')) {
		wp_schedule_event( time(), 'daily', 'hw4wp_cron' );
	}
}

/**************************************************************************************************
 *  Antes de desativar a funcao abaixo eh executada
 */
 function hw4wp_deactivate() {

	global $hw4wp_options;
	global $wpdb;
	
#	if ($hw4wp_options['uninstall'] == "checked") {
#		delete_option('hw4wp_options');
#	}

	if (wp_next_scheduled('hw4wp_cron')) {
		wp_clear_scheduled_hook('hw4wp_cron' );
	}
}

/************************************************************************************************** 
 *  Alerta sobre problemas com a configuracao do plugin
 */
function hw4wp_alerta() {

	global $hw4wp_options;
	global $domain;
	global $HWversion;
	$msg = '';

	if (  !isset($_POST['info_update']) ) {
	
		if ($hw4wp_options['version'] != $HWversion) {
			$msg = __('* Parece que você atualizou a versão nova sem desativar o plugin!! Por favor desative e re-ative.',$domain);
		} else {
	
			if ( $hw4wp_options['id'] == '') {
				$msg = '* '.__('Você ainda não informou seu código de afiliados HOTWords!!!',$domain).'<br />'.sprintf(__('Se você já tem uma conta informe <a href="%1$s">aqui</a>, caso contrário <a href="%2$s">crie uma agora</a>.',$domain), "options-general.php?page=wp-hotwords.php","http://site.hotwords.com.br/parceiro6.jsp").'<br />'; 
			}
		}
		
		if (phpversion() < 5) {
			$msg = __('* Você precisa da versão 5 do PHP para este plugin funcionar corretamente. Sua versão : ',$domain). phpversion();
		}	
		
		if ($msg) {
			echo "<div class='updated fade-ff0000'><p><strong>".__('WP-HOTWords Alerta!', $domain)."</strong><br /> ".$msg."</p></div>";
		}
		return;
	}
}

/**************************************************************************************************
 *  Inclui um menu de administracao
 */
function hw4wp_add_pages() {

    if ( function_exists('add_options_page') ) {
        add_options_page('WP-HOTWords', 'WP-HOTWords', 'manage_options', 'wp-hotwords.php', 'hw4wp_options_page');
    }
}

/**************************************************************************************************
 *  Codigos a serem inseridos no HEAD do admin.
 */
function hw4wp_admin_head() {

if (strstr($_SERVER['REQUEST_URI'], "wp-hotwords.php")) {
	echo "	<script type=\"text/javascript\" src=\"".WP_PLUGIN_URL."/wp-hotwords/jscolor/jscolor.js\"></script>";
}
}

/**************************************************************************************************
 *  Inclui o codigo do HOTWords 
 */
function hw4wp_core( $content ) {

	global $thePostID;
	global $wp_query;
	global $hw4wp_options;

	$thePostID = $wp_query->post->ID;
	$EmbedHWTag = get_post_custom_values('wp-hotwords');
	
    if (!is_singular() AND ($hw4wp_options['show_index'] != 'checked'))
		return ($content);

    if (is_page() AND ($hw4wp_options['show_page'] != 'checked'))
		return ($content);

	if ( (!is_feed()) AND (!$EmbedHWTag[0])) 
	{
		if ($hw4wp_options['HorS'] != 'SWbr')
			$content = '<div id="HOTWordsTxt" name="HOTWordsTxt">'.$content.'</div>';
		else
			$content = '<div id="SeXyWordsTxt" name="SeXyWordsTxt">'.$content.'</div>';
	}
	return $content;

}

/**************************************************************************************************
 *  Mostra rodape de creditos da monetizacao e desenvolvedor do plugin
 */
function hw4wp_footer() {

	global $hw4wp_options;	
	global $wp_query;
	global $thePostID;
	global $domain;
	
	switch ($hw4wp_options['footer_line']) {
	case "br_before":
		$br_before = "<br />";
		break;
	case "br_after":
		$br_after = "<br />";
		break;
	case "p":
		$p_before = "<p>";
		$p_after = "</p>";
		break;
	case "inline":
		break;
	}

	$corpadrao = $hw4wp_options['colour'];
	
	$corpersonalizada = get_post_meta($thePostID, 'wp-hotwords_custom_color',true);	
	
	if (is_single())
	{
		if ($corpersonalizada != '')
		{
			$HWcor = $corpersonalizada;
		}
		else
		{
			$HWcor = $corpadrao;
		}
	}
	else
	{
		$HWcor = $corpadrao;
	}
	
	$HWcor = str_replace('#','',$corpadrao);
	if ($HWcor != "")
		$HWcolour = "&amp;cor=".$HWcor;
	else
		$HWcolour = '';

	switch ($hw4wp_options['HorS']) {
	
		case "HWmx":
			echo "<script type='text/javascript' src='http://ads".$hw4wp_options['id'].".hotwords.com.mx/show.jsp?id=".$hw4wp_options['id'].$HWcolour."'></script>";
			echo $br_before.$p_before.'<div class="hw4wp_footer">Monetizado con <a href="http://www.bernabauer.com/wp-hotwords">WP-HOTWords</a>.</div>'.$p_after.$br_after;
			echo "<!-- WP-HOTWords versão: ".$hw4wp_options['version']."-->";
			break;

		case "HWar":
			echo "<script type='text/javascript' src='http://ads".$hw4wp_options['id'].".hotwords.com.ar/show.jsp?id=".$hw4wp_options['id'].$HWcolour."'></script>";
			echo $br_before.$p_before.'<div class="hw4wp_footer">Monetizado con <a href="http://www.bernabauer.com/wp-hotwords">WP-HOTWords</a>.</div>'.$p_after.$br_after;
			echo "<!-- WP-HOTWords versão: ".$hw4wp_options['version']."-->";
			break;

		case "HWbr":
			echo "<script type='text/javascript' src='http://ads".$hw4wp_options['id'].".hotwords.com.br/show.jsp?id=".$hw4wp_options['id'].$HWcolour."'></script>";
			echo $br_before.$p_before.'<div class="hw4wp_footer">Monetizado com <a href="http://www.bernabauer.com/wp-hotwords">WP-HOTWords</a>.</div>'.$p_after.$br_after;
			echo "<!-- WP-HOTWords versão: ".$hw4wp_options['version']."-->";
			break;

		case "SWbr":
			echo "<script type='text/javascript' src='http://ads".$hw4wp_options['id'].".sexywords.com.br/show.jsp?id=".$hw4wp_options['id'].$HWcolour."'></script>";
			echo $br_before.$p_before.'<div class="hw4wp_footer">Monetizado com <a href="http://www.bernabauer.com/wp-hotwords">WP-HOTWords</a>.</div>'.$p_after.$br_after;
			echo "<!-- WP-HOTWords versão: ".$hw4wp_options['version']."-->";
			break;
	}
}


/**************************************************************************************************
 *  Inclui o CSS para o footer
 */
function hw4wp_footer_css() {

	global $hw4wp_options;	
	$HW_align_footer = $hw4wp_options['footer_align'];
	
	echo '<style type="text/css"> <!-- div.hw4wp_footer {';
	
	if ($HW_align_footer == 'center')
		echo "text-align: center;";
	
	if ($HW_align_footer == 'left')
		echo "text-align: left;";
	
	if ($HW_align_footer == 'right')
		echo "text-align: right;";

	echo " } --> </style>";
}

/**************************************************************************************************
 *  Barra Lateral para edicao opcoes WP-HOTWords por artigo.
 */
function hw4wp_write_post_sidebar() {

	global $post;
	global $domain;
	
	$checked='';	
	$showHW = get_post_meta($post->ID, 'wp-hotwords', true);
	$ccHW = get_post_meta($post->ID, 'wp-hotwords_custom_color', true);
	
	if ($showHW == "nao")
		$checked = "checked";

	echo "<div class=\"inside\">";
	echo '<input type="checkbox" id="HWcodEX" name="HWcodeExclusion" value="nao"'.$checked.'> <label for="HWcodEX">'.__('Sem anúncios', $domain).'</label><br />';
	echo '<input type="hidden" name="HWcodeExclusion-key" id="HWcodeExclusion-key" value="' . wp_create_nonce('HWcodeExclusion') . '" />';

	echo '<br /><label for="cordif">'.__('Cor diferenciada:',$domain).'</label><br />';
	echo '<input type="hidden" name="HW_custom_color-key" id="HW_custom_color-key" value="' . wp_create_nonce('rgb2') . '" />';
	echo '<input type="text" id="cordif" size="7" maxlength="7" class="color" name="rgb2" value="'.$ccHW.'">';

	echo '<br />'.__('Para usar a cor padrão, deixe a caixa de texto acima em branco.',$domain).'</div>';

}

/**************************************************************************************************
 *  Painel de opcoes do plugin
 */
function hw4wp_options_page() {

	//pega dados da base
	global $hw4wp_options;	
	global $domain;
	$center='';
	$left='';
	$right='';
	$br_before='';
	$br_after='';
	$p='';
	$inline='';
	

	//processa novos dados para atualizacao
    if ( isset($_POST['info_update']) ) {

		$hw4wp_options['id'] = $_POST['id'];

        if (isset($_POST['HorS'])) 
            $hw4wp_options['HorS'] = $_POST['HorS'];

        if (isset($_POST['footer_align'])) 
            $hw4wp_options['footer_align'] = $_POST['footer_align'];
            
        if (isset($_POST['footer_line'])) 
            $hw4wp_options['footer_line'] = $_POST['footer_line'];

         if (isset($_POST['rgb2'])) 
            $hw4wp_options['colour'] = $_POST['rgb2'];

        if (isset($_POST['show_post'])) 
			$hw4wp_options['show_post'] = $_POST['show_post'];
		else
			$hw4wp_options['show_post'] = "";
        if (isset($_POST['show_com'])) 
			$hw4wp_options['show_com'] = $_POST['show_com'];
		else
			$hw4wp_options['show_com'] = "";
        if (isset($_POST['show_index'])) 
			$hw4wp_options['show_index'] = $_POST['show_index'];
		else
			$hw4wp_options['show_index'] = "";
        if (isset($_POST['show_page'])) 
			$hw4wp_options['show_page'] = $_POST['show_page'];
		else
			$hw4wp_options['show_page'] = "";

		$hw4wp_options['username'] = $_POST['username'];
		$hw4wp_options['password'] = $_POST['password'];
		
		if ($hw4wp_options['username'] != '' AND $hw4wp_options['password'] != '') {
			wphw_pegadados();
		}

		//atualiza base de dados com informacaoes do formulario		
		update_option('hw4wp_options',$hw4wp_options);
    }

	$paisesHW = array(
	array("HWmx", "HOTWords México", "http://www.hotwords.com.mx/"),
	array("HWar", "HOTWords Argentina", "http://www.hotwords.com.ar/"),
	array("HWbr", "HOTWords Brasil", "http://www.hotwords.com.br/"),
	array("HWpt", "HOTWords Portugal", "http://www.hotwords.pt/"),
	array("HWes", "HOTWords Espanha", "http://www.hotwords.es/"),
	array("SWbr", "SexyWords Brasil", "http://www.sexywords.com.br/")
	);


	switch ($hw4wp_options['footer_align']) {
		case "center":
			$center = "checked";
			break;
		case "left":
			$left = "checked";
			break;
		case "right":
			$right = "checked";
			break;
		default:
			$left = "checked";
	}

	switch ($hw4wp_options['footer_line']) {
		case "br_before":
			$br_before = "checked";
			break;
		case "br_after":
			$br_after = "checked";
			break;
		case "p":
			$p = "checked";
			break;
		case "inline":
			$inline = "checked";
			break;
		default:
			$p = "checked";
	}

	$cor = $hw4wp_options['colour'];
	if ($hw4wp_options['colour'] == '') {
		$cor = '';
		$msg = 'Cor padrão do HOTWords.';
	} else 
		$msg = '';
    ?>
    <div class="wrap">

	<form method="post">

    <h2><?php _e('Configuração WP-HOTWords', $domain); ?> <?php echo $hw4wp_options['version']; ?></h2>

    <table class="form-table">
	 <tr>
		<th scope="row" valign="top"><?php _e('Código de Afiliado', $domain); ?></th>
		<td>
			 <label for="id"><?php _e('Código :', $domain); ?></label> <input name="id" type="text" id="id" value="<?php echo $hw4wp_options['id']; ?>" size=8  /><br />
			<?php _e('O seu código de afiliado pode ser encontrado na página "Configurar HOTWords". A última caixa informa o "scriptHOTWords". Seu código de afiliado é o número após o texto \'show.jsp?id=\'.', $domain); ?><br />

			<?php foreach ($paisesHW as $paisHW) {
					if ($hw4wp_options['HorS'] == $paisHW[0])
						$HWPais_selected = "checked";
					else
						$HWPais_selected = "";
					echo "<input type=\"radio\" id=\"".$paisHW[0]."\" name=\"HorS\" value=\"".$paisHW[0]."\" ".$HWPais_selected." /> <label for=\"".$paisHW[0]."\">".$paisHW[1]."</label> <small><a href=\"".$paisHW[2]."\">(site)</a></small><br />";
			 } ?>
		</td>
	 </tr>
	</table>
	<br />

    <table class="form-table">
	 <tr>
		<th scope="row" valign="top"><?php _e('Defina onde os anúncios deverão ser mostrados', $domain); ?></th>
		<td>
			<input type="checkbox" id="show_post" name="show_post" value="checked" <?php if (array_key_exists('show_post', $hw4wp_options)) { echo $hw4wp_options['show_post'];} ?>> <label for="show_post"><?php _e('No texto do artigo', $domain); ?></label><br />
			<input type="checkbox" id="show_com" name="show_com" value="checked" <?php if (array_key_exists('show_com', $hw4wp_options)) { echo $hw4wp_options['show_com'];} ?>> <label for="show_com"><?php _e('No texto dos comentários (*)', $domain); ?></label><br />
			<input type="checkbox" id="show_index" name="show_index" value="checked" <?php if (array_key_exists('show_index', $hw4wp_options)) { echo $hw4wp_options['show_index'];} ?>> <label for="show_index"><?php _e('Na página com mais de um artigo (*)', $domain); ?></label><br />
			<input type="checkbox" id="show_page" name="show_page" value="checked" <?php if (array_key_exists('show_page', $hw4wp_options)) { echo $hw4wp_options['show_page'];} ?>> <label for="show_page"><?php _e('Em páginas estáticas', $domain); ?></label><br />
			<br /><strong>(*) <?php _e('Atenção', $domain); ?> : </strong> <?php echo sprintf(__('Se você quer seu blog validado no padrão <a href="%1$">XHTML</a> você não deve habilitar a opção para mostrar anúncios nos comentários e em páginas com mais de um artigo. Páginas com mais de um artigo detectadas pelo WP-HOTWords são: Página principal, página de categoria, arquivo, resultado de pesquisa ou página de arquivo por minuto, hora, dia, mês ou ano.', $domain), "http://en.wikipedia.org/wiki/XHTML"); ?><br />
			<?php _e('Para validar seu blog, utilize o <a href="http://validator.w3.org/">XHTML Validator</a>.', $domain); ?>
		</td>
	 </tr>
	</table>
	<br />

    <table class="form-table">
	 <tr>
		<th scope="row" valign="top"><?php _e('Personalização do link HOTwords', $domain); ?></th>
		<td>
			<table>
				<tr>
					<td><strong><?php _e('Cor atual', $domain); ?> : </strong></td><td WIDTH="20" BGCOLOR="<?php echo $cor;?>"><?php echo $cor;?></td><td><?php echo $msg; ?></td><td><strong><?php _e('Nova cor', $domain); ?> : </strong><input type="text" id="cor" size="10" class="color" maxlength="7" name="rgb2" value="<?php echo $cor;?>">
					</td>
				</tr>
			</table>
			<br /><?php _e('Você pode selecionar a cor padrão para os links de anúncios HOTWords aqui. Se você quiser, pode ainda trocar a cor dos links em um determinado artigo. Para fazê-lo, basta selecionar a cor na página de edição do artigo.<br /><br />Para usar cor padrão do HOTWords deixe a caixa abaixo vazia.', $domain); ?>
		</td>
	 </tr>
	</table>
	<br />

    <table class="form-table">
	 <tr>
		<th scope="row" valign="top"><?php _e('Aparência do Rodapé', $domain); ?></th>
		<td>
			<?php _e('Você pode configurar como o rodapé irá aparecer no seu blog.', $domain); ?><br />
			<br />
			Alinhamento horizontal: 
			<input type="radio" id="fac" name="footer_align" value="center" <?php echo $center;?> /> <label for="fac"><?php _e('Centralizado', $domain); ?></label>
			<input type="radio" id="fal" name="footer_align" value="left" <?php echo $left;?>/> <label for="fal"><?php _e('Esquerda', $domain); ?></label>
			<input type="radio" id="far" name="footer_align" value="right" <?php echo $right;?>/> <label for="far"><?php _e('Direita', $domain); ?></label>
			<br />
			<?php _e('Alinhamento vertical', $domain); ?>:
			<input type="radio" id="flb" name="footer_line" value="br_before" <?php echo $br_before;?>/> <label for="flb"><?php _e('Nova linha antes do rodapé', $domain); ?></label>
			<input type="radio" id="fla" name="footer_line" value="br_after" <?php echo $br_after;?>/> <label for="fla"><?php _e('Nova linha após o rodapé', $domain); ?></label>
			<input type="radio" id="flp" name="footer_line" value="p" <?php echo $p;?>/> <label for="flp"><?php _e('Novo parágrafo', $domain); ?></label>
			<input type="radio" id="fli" name="footer_line" value="inline" <?php echo $inline;?>/> <label for="fli"><?php _e('Mesma linha', $domain); ?></label>
		
		</td>
	 </tr>
	</table>
	<br />

    <table class="form-table">
	 <tr>
		<th scope="row" valign="top"><?php _e('Relatórios por email', $domain); ?><br /><?php _e('(experimental)', $domain); ?></th>
			<td>
			<label for="hwl"><?php _e('Informe o seu login no HOTWords', $domain); ?></label>: <input name="username" id="hwl" type="text" id="username" value="<?php echo $hw4wp_options['username']; ?>" size=50  />
			<br /> 
			<label for="hwp"><?php _e('Informe a sua senha no HOTWords', $domain); ?></label>: <input name="password" id="hwp" type="password" id="password" value="<?php echo $hw4wp_options['password']; ?>" size=10  />		
			<br /><?php _e('Se você quiser ser avisado de seus ganhos diariamente por email, preencha os campos de login e senha.', $domain); ?><br /><br />		<?php
		
			if ( $hw4wp_options['username'] != '' AND $hw4wp_options['password'] != '') {

				//GET Difference between Server TZ and desired TZ
				$sec_diff = date('Z') - (get_option('gmt_offset') * 3600);
				$sec_diff = (($sec_diff <= 0) ? '+' : '-') . abs($sec_diff);			
									
				echo "<br /> ";
				_e('Próximo envio de relatório : ', $domain); 
				echo date('d/m/Y H:i:s', wp_next_scheduled('hw4wp_cron') + $sec_diff); 
				echo " (".__('Seu fuso', $domain)." : ".$sec_diff / 3600;
				echo ")";
			}
		?>
			</td>
	 </tr>
	</table>
	<br />

		<span class="submit">
			<input type="submit" name="info_update" value="<?php _e('Atualizar Opções', $domain); ?> &raquo;" />
		</span>

</p>		
    <h2><?php _e('Sobre', $domain); ?></h2>
		<p><?php echo sprintf(__('O sistema <a href="%1$s">HOTWords</a> publica anúncios contextuais dentro de textos de uma grande e qualificada rede de sites parceiros, o que possibilita ao anunciante comunicar-se com seu público-alvo de maneira inovadora, direta e segmentada.', $domain), "http://www.HOTWords.com.br"); ?></p>
		<p><?php echo sprintf(__('Este plugin foi desenvolvido por <a href="%1$s">Bernardo Bauer</a> para facilitar a vida do blogueiro que utiliza <a href="%2$s">Wordpress</a>. Com ele os artigos recebem automaticamente os Divs necessários para que o programa funcione no seu blog e também inclui o script no rodapé. Com este plugin você não precisa mais editar o seu tema para que o HOTWords funcione.', $domain), "http://www.bernabauer.com/", "http://wordpress.org/"); ?></p>
		<p><?php _e('Ultra-pequeno FAQ:', $domain); ?></p>
		<ul>
		<li><strong><?php _e('Não aparecem anúncios nos meus artigos. Verifiquei o código da página do artigo e os códigos do HOTwords não estão sendo incluídos. O que eu faço?', $domain); ?></strong><br />
		<?php _e('O problema pode estar no tema do seu blog, garanta que existe a chamada "wp_footer()" no arquivo de tema "Rodapé" (ou footer, caso seu wordpress esteja em inglês) do seu tema ativo.', $domain); ?></li>
		<li><strong><?php _e('Preciso me cadastrar em algum lugar para usar este plugin?', $domain); ?></strong><br />
		<?php _e('Sim! é necessário ter uma conta ativa no sistema HOTWords para que o plugin funcione como esperado.', $domain); ?></li>
		<li><strong><?php _e('Posso determinar que não sejam mostrados anúncios do HOTwords em alguns artigos?', $domain); ?></strong><br />
		<?php _e('Se você quiser que algum artigo não receba anúncios do HOTwords, basta escolher a opção "Não mostrar anúncios do HOTWords neste artigo" na página de edição de artigos.', $domain); ?></li>
		<li><strong><?php _e('Como posso otimizar meus ganhos com o HOTWords?', $domain); ?></strong><br />
		<?php echo sprintf(__('O primeiro passo é ter conteúdo relevante. O segundo é personalizar as cores de links do HOTWords para serem mais atraentes para o seu tema. Veja mais <a href="%1$s">aqui</a>.', $domain), "http://site.hotwords.com.br/relatorios/info/duvidas_6.jsp"); ?></li>
	
		</ul>


		<p><?php echo sprintf(__('Acesse regularmente a <a href="%1$s">página do plugin</a> para verificar se novas versões foram liberadas e instruções de como atualizar seu plugin.', $domain), "http://www.bernabauer.com/wp-hotwords/"); ?></p>
    </form>
		<p><?php _e('O autor deste plugin aceita sua doação para manter este plugin. É uma ótima maneira de você demonstrar seu reconhecimento pelo trabalho realizado!', $domain); ?></p>
		<center>
			<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
			<form target="pagseguro" action="https://pagseguro.uol.com.br/security/webpagamentos/webdoacao.aspx" method="post">
			<input type="hidden" name="email_cobranca" value="bernabauer@bernabauer.com">
			<input type="hidden" name="moeda" value="BRL">
			<input type="image" src="https://pagseguro.uol.com.br/Security/Imagens/FacaSuaDoacao.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!">
			</form>
			<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
		</center>

    </div>
<?php
}


/**************************************************************************************************
 *  Atualiza a opcao de personalizacao do codigo HOTWords para artigo/pagina
 */
 
function HW_code_exclusionUpdate($id)
{

$meta_exists = '';
$setting = '';

  // authorization
	if ( !current_user_can('edit_post', $id) )
		return $id;
	// atualiza a exclusao de anuncios por artigo
	if ( !wp_verify_nonce($_POST['HWcodeExclusion-key'], 'HWcodeExclusion') )
		return $id;

	// atualiza a exclusao de anuncios por artigo
	if (isset($_POST['HWcodeExclusion'])) 
		$setting = $_POST['HWcodeExclusion'];

	// apaga o metadado se for conteudo vazio
	if (!$setting)
		delete_post_meta($id, 'wp-hotwords');
	else
		$meta_exists = update_post_meta($id, 'wp-hotwords', $setting);
	if((!$meta_exists) AND ($setting != ''))
	{
		add_post_meta($id, 'wp-hotwords', $setting);	
	}
	return $id;
}

/**************************************************************************************************
 * Atualiza a opcao de cor diferenciada do codigo HOTWords de artigo/pagina
 */
function HW_custom_colorUpdate($id)
{
$meta_exists = '';

  // authorization
	if ( !current_user_can('edit_post', $id) )
		return $id;
	// atualizacao da cor personalizada de artigos para artigos
	if ( !wp_verify_nonce($_POST['HW_custom_color-key'], 'rgb2') )
		return $id;

	// apaga o metadado se for conteudo vazio
	$setting = $_POST['rgb2'];
	if (!$setting)
		delete_post_meta($id, 'wp-hotwords_custom_color');
	else
		$meta_exists = update_post_meta($id, 'wp-hotwords_custom_color', $setting);
	if((!$meta_exists) AND ($setting != ''))
	{
		add_post_meta($id, 'wp-hotwords_custom_color', $setting);	
	}
	return $id;
}

/**************************************************************************************************
 * Decode HTTP Request Header
 */
function decode_header ( $str )
{
    $part = preg_split ( "/\r?\n/", $str, -1, PREG_SPLIT_NO_EMPTY );
    $out = array ();
    for ( $h = 0; $h < sizeof ( $part ); $h++ )
    {
        if ( $h != 0 )
        {
            $pos = strpos ( $part[$h], ':' );
            $k = strtolower ( str_replace ( ' ', '', substr ( $part[$h], 0, $pos ) ) );
            $v = trim ( substr ( $part[$h], ( $pos + 1 ) ) );
        }
        else
        {
            $k = 'status';
            $v = explode ( ' ', $part[$h] );
            $v = $v[1];
        }

        if ( $k == 'set-cookie' )
        {
                $out['cookies'][] = $v;
        }
        else if ( $k == 'content-type' )
        {
            if ( ( $cs = strpos ( $v, ';' ) ) !== false )
            {
                $out[$k] = substr ( $v, 0, $cs );
            }
            else
            {
                $out[$k] = $v;
            }
        }
        else
        {
            $out[$k] = $v;
        }
    }
    return $out;
}

/***************************************************************************************************
* This function has been copyed from Akismet 
*  Returns array with headers in $response[0] and body in $response[1]
*/
function wphw_http_post($request, $host, $path, $port = 80) {

	global $wp_version;
	global $hw4wp_options;	

	$http_request  = "POST $path HTTP/1.0\r\n";
	$http_request .= "Host: $host\r\n";
	$http_request .= "Content-Type: application/x-www-form-urlencoded; charset=" . get_option('blog_charset') . "\r\n";
	$http_request .= "Content-Length: " . strlen($request) . "\r\n";
	$http_request .= "User-Agent: WordPress/$wp_version | wp-hotwords/".$hw4wp_options['version']."\r\n";
	$http_request .= "\r\n";
	$http_request .= $request;

	$response = '';
	if( false != ( $fs = @fsockopen($host, $port, $errno, $errstr, 10) ) ) {
		fwrite($fs, $http_request);

		while ( !feof($fs) )
			$response .= fgets($fs, 1160); // One TCP-IP packet
		fclose($fs);
		$response = explode("\r\n\r\n", $response, 2);
	}
	return $response;
}

/**************************************************************************************************
 * Coleta dados do site HOTWords
 */

function wphw_pegadados() {

	global $hw4wp_options;
	global $wp_version;

	switch ($hw4wp_options['HorS']) {
		case "HWmx":
			$HW_cc = 'central.hotwords.com.mx';
			$idPais = '2';
			break;
		case "HWar":
			$HW_cc = 'central.hotwords.com.ar';
			$idPais = '1';
			break;
		case "HWbr":
			$HW_cc = 'central.hotwords.com.br';
			$idPais = '0';
			break;
		case "HWpt":
			$HW_cc = 'central.hotwords.com.pt';
			$idPais = '6';
			break;
		case "HWes":
			$HW_cc = 'central.hotwords.es';
			$idPais = '5';
			break;
		case "SWbr":
			$HW_cc = 'central.hotwords.com.br';
			$idPais = '2';
			break;
		default:
			$HW_cc = 'central.hotwords.com.br';
			$idPais = '0';
	}


		//send data
		$response = wphw_http_post("login=".$hw4wp_options['username']."&senha=".$hw4wp_options['password']."&idPais=".$idPais, 'central.hotwords.com.br', '/login.jsp');

		$info =  decode_header($response[0]);

		$pos = strpos($info['location'], "errolg");
		
		if($pos === false) {
			// Script did not step on shit
		} else {
			// Crap. There is something wrong... I can't live like this. Goodbye cruel world...
			die(__("*** Houve um erro coletando os dados.", $domain));
		}

		$cookie1 = "Cookie: ".$info['cookies'][0]."\r\n";
		$cookie1 .= "Cookie: ".$info['cookies'][1]."\r\n";
		$cookie1 .= "Cookie: ".$info['cookies'][2]."\r\n";
	
		$http_request  = "GET /relatorios/redir.jsp HTTP/1.1\r\n";
		$http_request .= "Host: ".$HW_cc."\r\n";
		$http_request .= "Content-Type: application/x-www-form-urlencoded; charset=" . get_option('blog_charset') . "\r\n";
		$http_request .= "User-Agent: WordPress/$wp_version | wp-hotwords/".$hw4wp_options['version']."\r\n";
		$http_request .= "Cookie: ".$info['cookies'][0]."\r\n";
		$http_request .= "Cookie: ".$info['cookies'][1]."\r\n";
		$http_request .= "Cookie: ".$info['cookies'][2]."\r\n";
		$http_request .= "\r\n";
	
		$response = '';
		if( false != ( $fs = @fsockopen('central.hotwords.com.br', 80, $errno, $errstr, 10) ) ) {
			fwrite($fs, $http_request);
	
			while ( !feof($fs) )
				$response .= fgets($fs, 1160); // One TCP-IP packet
			fclose($fs);
			$response = explode("\r\n\r\n", $response, 2);
		}
	
		$info =  decode_header($response[0]);
	
		$http_request  = "GET /relatorios/detalhado.jsp?idSite=".$hw4wp_options['id']." HTTP/1.1\r\n";
		$http_request .= "Host: ".$HW_cc."\r\n";
		$http_request .= "Content-Type: application/x-www-form-urlencoded; charset=" . get_option('blog_charset') . "\r\n";
		$http_request .= "User-Agent: WordPress/$wp_version | wp-hotwords/".$hw4wp_options['version']."\r\n";
		$http_request .= "Cookie: ".$info['cookies'][0]."\r\n";
		$http_request .= $cookie1;
		$http_request .= "\r\n";
	
		$response = '';
		if( false != ( $fs = @fsockopen($HW_cc, 80, $errno, $errstr, 10) ) ) {
			fwrite($fs, $http_request);
	
			while ( !feof($fs) )
				$response .= fgets($fs, 1160); // One TCP-IP packet
			fclose($fs);
			$response = explode("\r\n\r\n", $response, 2);
		}
	
		$info =  decode_header($response[0]);

	
	//parse response
		$pattern = '/((R\$ )?[0-9]*,?[0-9]{2}|0)/i';
		preg_match_all($pattern, substr($response[1], strpos($response[1], "*Total"), 600), $matches, PREG_PATTERN_ORDER);

		$ret = array();
		$ret['earn_accu'] = str_replace(",", ".", substr($matches[0][3],3));
		$ret['eCPM'] = $matches[0][2];
		$ret['vis'] = $matches[0][1];
		$ret['pal'] = $matches[0][0];

		$dif_ganhos = (float) $ret['earn_accu'] - (float) $hw4wp_options['earnings'];
		$dif_vis = (int) $ret['vis'] - (int) $hw4wp_options['vis'];
		$dif_pal = (int) $ret['pal'] - (int) $hw4wp_options['pal'];
	
		$hw4wp_options['earnings'] = $ret['earn_accu'];
		$hw4wp_options['eCPM'] = $ret['eCPM'];
		$hw4wp_options['vis'] = $ret['vis'];
		$hw4wp_options['pal'] = $ret['pal'];

		update_option('hw4wp_options',$hw4wp_options);

		$ret['earn_diff'] = $dif_ganhos;
		$ret['vis_diff'] = $dif_vis;
		$ret['pal_diff'] = $dif_pal;
		
		return $ret;
}


/**************************************************************************************************
 * Relatório de ganhos (atualiza informações para o email e widget
 */
function wphw_relatorio() {
	
	global $hw4wp_options;	
	global $domain;

	if ( $hw4wp_options['username'] != '' AND $hw4wp_options['password'] != '') {

		if ( $hw4wp_options['lastrun'] != date("d.m.y")) {

			$hw4wp_options['lastrun'] = date("d.m.y");
			
			$ret = wphw_pegadados();
	
			update_option('hw4wp_options',$hw4wp_options);
		
			$message = __('Você está recebendo o relatório de ganhos que o plugin WP-HOTWords gera diariamente. Os dados deste relatório são extraídos da página de administração do sistema HOTWords. Se você tiver sugestões, por favor, entre em contato com o autor através do formulário de contato', $domain) ." http://www.bernabauer.com/contato. \n\n";
			$message.= __('Ganhos acumulados: R$', $domain)." ".$ret['earn_accu']."*\n";
			$message.= __('Diferença em relação à ontem: R$', $domain)." ".$ret['earn_diff']."*\n";
			$message.= __('Palavras mostradas acumulado:', $domain)." ".$ret['pal']."\n";
			$message.= __('Diferença em relação à ontem:', $domain)." ".$ret['pal_diff']."\n";
			$message.= __('Visualização de anuncios acumulado:', $domain)." ".$ret['vis']."\n";
			$message.= __('Diferença em relação à ontem:', $domain)." ".$ret['vis_diff']."\n";
			$message.= __('eCPM:', $domain)." ".$ret['eCPM']."\n";
			$message.= "\n\n* ".__('Valores podem sofrer alteração no fechamento do mês.', $domain)."\n";
			$message.= "\n----\n";
			$message.= __('Mensagem gerada automaticamente pelo plugin WP-HOTWords', $domain)." - http://www.bernabauer.com/wp-hotwords\n";
	
			wp_mail(get_option('admin_email'), __('Relatório WP-HOTWords para', $domain)." ".get_option('blogname'), $message);
		
			//if all gets lost, pray for the gods!
			if ( !is_array($response) || !isset($response[1]) || $response[1] != 'ok' && $response[1] != 'nok' ) {
				return 'failed';
			}
			//urray! this stuff really works!
			return $response[1];
		}
	}
}

/**************************************************************************************************
 * Configura Widget para aparecer no Dashboard
 */
function hw4wp_dashboard_setup() {

	global $hw4wp_options;	
	
	if (current_user_can('activate_plugins')) 
		wp_add_dashboard_widget( 'hw4wp_dashboard_setup', 'WP-HOTWords '.$hw4wp_options['version'].': Rendimentos', 'hw4wp_dashboard' );
}

/**************************************************************************************************
 * Código do Widget para o Dashboard
 */

function hw4wp_dashboard() {

	global $hw4wp_options;	

	$message.= __('Ganhos acumulados: R$', $domain)." ".$hw4wp_options['earnings']."<br />";
	$message.= __('Cliques acumulados:', $domain)." ".$hw4wp_options['clicks']."<br />";
	$message.= "<br />* ".__('Valores podem sofrer alteração no fechamento do mês.', $domain)."<br />";
	
	echo $message;
			
	if ($hw4wp_options['lastrun'] == '')
		$hw_quando = __('nunca');
	else {
		$hw_quando = $hw4wp_options['lastrun'];
	}

	echo "<br />Dados coletados em ".$hw_quando;

	echo "<br /><br />Você pode alterar as configurações do plugin <a href=\"options-general.php?page=wp-hotwords.php\">aqui</a>.";
}


?>