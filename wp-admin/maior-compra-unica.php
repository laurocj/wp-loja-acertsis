<?php

/**
 * New Post Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Administration Bootstrap */
require_once __DIR__ . '/admin.php';

/**
 * @global string  $post_type
 * @global object  $post_type_object
 * @global WP_Post $post             Global post object.
 */
global $post_type, $post_type_object, $post;

/**
 * Post ID global
 *
 * @name $post_ID
 * @var int
 */
$post_ID = isset($post_ID) ? (int) $post_ID : 0;
$user_ID = isset($user_ID) ? (int) $user_ID : 0;
$action  = isset($action) ? $action : '';

// All meta boxes should be defined and added before the first do_meta_boxes() call (or potentially during the do_meta_boxes action).
require_once ABSPATH . 'wp-admin/includes/meta-boxes.php';

register_and_do_post_meta_boxes($post);

require_once ABSPATH . 'wp-admin/admin-header.php';

// /clientes
// /clientes-maior-compra-unica/{ano?}
// /clientes-com-mais-de/{quant}/{seletor}/{ano?}
// /recomenda-para/{cliente}
$ano = $_GET['ano'] ?? '2019';
$dados = json_decode(file_get_contents("http://loja-acert-sis.test/api/clientes-maior-compra-unica/$ano"), true);

?>

<div class="wrap">
	<h1 class="wp-heading-inline">
		<?php
		echo esc_html($title);
		?>
	</h1>

	<hr class="wp-header-end">

	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-1">
			<div id="postbox-container-1" class="postbox-container">
				<div id="normal-sortables" class="meta-box-sortables">
					<div id="slugdiv" class="postbox ">
						<div class="postbox-header">
							<form action="" name="selectAno" method="get">
								<select name="ano" onchange="document.selectAno.submit()">
									<option value="2018" <?= $ano == '2018' ? 'selected' : ''?>>2018</option>
									<option value="2019" <?= $ano == '2019' ? 'selected' : ''?>>2019</option>
									<option value="2020" <?= $ano == '2020' ? 'selected' : ''?>>2020</option>
								</select>
							</form>

							<h2 class="hndle"></h2>
						</div>
						<div class="inside">
							<table style="width: 80%;">
								<thead>
									<tr>
										<td>Nome</td>
										<td>CPF</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach($dados as $cliente) { ?>
										<tr>
											<td><?= $cliente['nome']?></td>
											<td><?= $cliente['cpf']?></td>
										</tr>
									<?php }?>
								</tbody>
							</table>							
						</div>
					</div>
				</div>
			</div>
		</div><!-- /post-body -->
		<br class="clear" />
	</div><!-- /poststuff -->
</div>

<?php

require_once ABSPATH . 'wp-admin/admin-footer.php';
