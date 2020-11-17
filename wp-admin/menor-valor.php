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
$dados = json_decode(file_get_contents('http://loja-acert-sis.test/api/clientes'), true);

// echo '<pre>';
// print_r($dados);
// die;
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
			<div id="postbox-container-2" class="postbox-container">
				<div id="normal-sortables" class="meta-box-sortables">
					<div id="slugdiv" class="postbox ">
						<div class="postbox-header">
							<h2 class="hndle"></h2>
							
						</div>
						<div class="inside">
							<table style="width: 100%;">
								<thead>
									<tr>
										<td>Nome</td>
										<td>CPF</td>
										<td>VALOR</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach($dados as $cliente) { ?>
										<tr>
											<td><?= $cliente['nome']?></td>
											<td><?= $cliente['cpf']?></td>
											<td><?= $cliente['valorTotal']?></td>
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
