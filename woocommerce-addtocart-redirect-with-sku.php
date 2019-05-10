add_action('woocommerce_after_add_to_cart_button', 'woocommerce_after_add_to_cart_button_updated', 10);
function woocommerce_after_add_to_cart_button_updated()
{
	global $product;

	$css = '
	<style>
		.single_add_to_cart_button:not(.single_add_to_cart_button_custom) { display: none !important; }
	</style>
	';

	//	$link = esc_url('https://custom-url-' . $product->get_id() . '/' . $quantity);
	$link = esc_url('https://custom-url-' . $product->get_sku() . '/');

	$button = '
	<button data-link-incomplete="'.$link.'" onclick="woocommerce_after_add_to_cart_button_updated_function(\''.$link.'\')" type="button" name="add-to-cart" value="' . esc_attr( $product->get_sku() ) . '" class="single_add_to_cart_button single_add_to_cart_button_custom  button alt">' . esc_html( $product->single_add_to_cart_text() ) . '</button>';

	echo $css;
	echo $button;
}

add_action('wp_footer', 'woocommerce_after_add_to_cart_button_updated_js');
function woocommerce_after_add_to_cart_button_updated_js(){
	if(!is_admin()){
		$js = '
		<script>
			function woocommerce_after_add_to_cart_button_updated_function(link){
				link = link + document.getElementsByClassName("qty")[0].value;
				window.location.href = link;
			} 
		</script>
		';
		echo $js;
	}
}
