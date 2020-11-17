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
// /clientes-com-mais-de/{quant}/{seletor}/{ano?} itens
// /recomenda-para/{cliente}
$dados = [];
$clienteId = null;
if(isset($_GET['clienteId'])) {
	$clienteId = $_GET['clienteId'];
	$dados = json_decode(file_get_contents("http://loja-acert-sis.test/api/recomenda-para/$clienteId"), true);
}
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
							<form action="" name="selectCliente" method="get">
								<select name="clienteId" onchange="document.selectCliente.submit()">
									<option>Selecione</option>
									<option value="1" <?= $clienteId == '1' ? 'selected' : ''?>>Renato</option>
									<option value="2" <?= $clienteId == '2' ? 'selected' : ''?>>Moacir</option>
									<option value="3" <?= $clienteId == '3' ? 'selected' : ''?>>Lucas</option>
									<option value="4" <?= $clienteId == '4' ? 'selected' : ''?>>Gustavo</option>
									<option value="5" <?= $clienteId == '5' ? 'selected' : ''?>>Steff</option>
									<option value="6" <?= $clienteId == '6' ? 'selected' : ''?>>Nathalia</option>
									<option value="7" <?= $clienteId == '7' ? 'selected' : ''?>>Lívia</option>
									<option value="8" <?= $clienteId == '8' ? 'selected' : ''?>>Leonardo</option>
									<option value="9" <?= $clienteId == '9' ? 'selected' : ''?>>Cristopher</option>
									<option value="10" <?= $clienteId == '10' ? 'selected' : ''?>>Gabriel</option>
								</select>
							</form>

							<h2 class="hndle"></h2>
						</div>
						<div class="inside">
							<table style="width: 80%;">
								<thead>
									<tr>
										<td>Nome</td>
										<td>Marca</td>
										<td>Tamanho</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach($dados as $roupa) { ?>
										<tr>
											<td><?= $roupa['nome']?></td>
											<td><?= $roupa['marca']?></td>
											<td><?= $roupa['tamanho']?></td>
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
