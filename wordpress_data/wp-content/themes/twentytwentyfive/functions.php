<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

// Adds theme support for post formats.
if (!function_exists('twentytwentyfive_post_format_setup')):
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup()
	{
		add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'));
	}
endif;
add_action('after_setup_theme', 'twentytwentyfive_post_format_setup');

// Enqueues editor-style.css in the editors.
if (!function_exists('twentytwentyfive_editor_style')):
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style()
	{
		add_editor_style(get_parent_theme_file_uri('assets/css/editor-style.css'));
	}
endif;
add_action('after_setup_theme', 'twentytwentyfive_editor_style');

// Enqueues style.css on the front.
if (!function_exists('twentytwentyfive_enqueue_styles')):
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles()
	{
		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri('style.css'),
			array(),
			wp_get_theme()->get('Version')
		);
	}
endif;
add_action('wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles');

// Registers custom block styles.
if (!function_exists('twentytwentyfive_block_styles')):
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles()
	{
		register_block_style(
			'core/list',
			array(
				'name' => 'checkmark-list',
				'label' => __('Checkmark', 'twentytwentyfive'),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action('init', 'twentytwentyfive_block_styles');

// Registers pattern categories.
if (!function_exists('twentytwentyfive_pattern_categories')):
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories()
	{

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label' => __('Pages', 'twentytwentyfive'),
				'description' => __('A collection of full page layouts.', 'twentytwentyfive'),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label' => __('Post formats', 'twentytwentyfive'),
				'description' => __('A collection of post format patterns.', 'twentytwentyfive'),
			)
		);
	}
endif;
add_action('init', 'twentytwentyfive_pattern_categories');

// Registers block binding sources.
if (!function_exists('twentytwentyfive_register_block_bindings')):
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings()
	{
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label' => _x('Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive'),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action('init', 'twentytwentyfive_register_block_bindings');

// Registers block binding callback function for the post format name.
if (!function_exists('twentytwentyfive_format_binding')):
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding()
	{
		$post_format_slug = get_post_format();

		if ($post_format_slug && 'standard' !== $post_format_slug) {
			return get_post_format_string($post_format_slug);
		}
	}
endif;



function meu_tema_scripts()
{
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'meu_tema_scripts');




function criar_tabela()
{
	global $wpdb;

	$tabela = $wpdb->prefix . 'sala_de_reuniao';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $tabela (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  nome varchar(100) NOT NULL,
	  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}
add_action('init', 'criar_tabela');

function criar_tabela_usuarios()
{
	global $wpdb;

	$tabela = $wpdb->prefix . 'usuarios';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $tabela (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		nome varchar(100) NOT NULL,
		email varchar(100) NOT NULL,
		senha varchar(255) NOT NULL,
		data_cadastro datetime DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (id)
	) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}

add_action('after_setup_theme', 'criar_tabela_usuarios');


function adm_sala_de_reuniao_fn()
{
	ob_start();
	include get_template_directory() . '/sala-de-reuniao.php';
	return ob_get_clean();
}
add_shortcode('adm_sala_de_reuniao', 'adm_sala_de_reuniao_fn');

function shortcode_apresentacao()
{
	ob_start();
	include get_template_directory() . '/apresentacao.php';
	return ob_get_clean();
}
add_shortcode('apresentacao', 'shortcode_apresentacao');

function meu_tema_estilos()
{
	wp_enqueue_style('meu-css-personalizado', get_template_directory_uri() . '/custom.css');
}
add_action('wp_enqueue_scripts', 'meu_tema_estilos');

function carregar_bootstrap_icons()
{
	wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css');
}
add_action('wp_enqueue_scripts', 'carregar_bootstrap_icons');

function formulario_cadastro_shortcode()
{
	global $wpdb;
	$mensagem = '';

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_cadastro'])) {
		$nome = sanitize_text_field($_POST['nome']);
		$email = sanitize_email($_POST['email']);
		$senha = $_POST['senha'];
		$confirmar = $_POST['confirmar_senha'];

		if (empty($nome) || empty($email) || empty($senha)) {
			$mensagem = '<div class="alert alert-warning">Todos os campos são obrigatórios.</div>';
		} elseif ($senha !== $confirmar) {
			$mensagem = '<div class="alert alert-danger">As senhas não coincidem.</div>';
		} else {
			$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

			$tabela = $wpdb->prefix . 'usuarios';
			$inserido = $wpdb->insert($tabela, [
				'nome' => $nome,
				'email' => $email,
				'senha' => $senha_hash
			]);

			if ($inserido) {
				$mensagem = '<div class="alert alert-success">Usuário cadastrado com sucesso!</div>';
			} else {
				$mensagem = '<div class="alert alert-danger">Erro ao cadastrar usuário.</div>';
			}
		}
	}

	ob_start();

	include get_template_directory() . '/header-cadastro.php';
	?>

	<div class="container mt-5 d-flex justify-content-center">
		<div class="card shadow p-4" style="max-width: 600px; width: 100%;">
			<h3 class="mb-4 text-center">
				<i class="bi bi-person-plus-fill me-2"></i>Cadastro de Usuário
			</h3>
			<?php echo $mensagem; ?>
			<form method="POST" class="row g-3">
				<input type="hidden" name="form_cadastro" value="1">

				<div class="col-12">
					<label for="nome" class="form-label">Nome</label>
					<div class="input-group">
						<span class="input-group-text"><i class="bi bi-person"></i></span>
						<input type="text" class="form-control" id="nome" name="nome" required>
					</div>
				</div>

				<div class="col-12">
					<label for="email" class="form-label">E-mail</label>
					<div class="input-group">
						<span class="input-group-text"><i class="bi bi-envelope"></i></span>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
				</div>

				<div class="col-md-6">
					<label for="senha" class="form-label">Senha</label>
					<div class="input-group">
						<span class="input-group-text"><i class="bi bi-lock"></i></span>
						<input type="password" class="form-control" id="senha" name="senha" required>
					</div>
				</div>

				<div class="col-md-6">
					<label for="confirmar_senha" class="form-label">Confirmar Senha</label>
					<div class="input-group">
						<span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
						<input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required>
					</div>
				</div>

				<div class="col-12 text-center mt-3">
					<button type="submit" class="btn btn-primary w-100">
						<i class="bi bi-check-circle me-1"></i> Cadastrar
					</button>
				</div>
			</form>
		</div>
	</div>

	<?php
	include get_template_directory() . '/footer-cadastro.php';

	return ob_get_clean();
}
add_shortcode('formulario_cadastro', 'formulario_cadastro_shortcode');

