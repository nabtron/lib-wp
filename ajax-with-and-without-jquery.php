<?php

// add this code for ajax for both with and without jquery:

/* frontpage contact form begins */

add_action('wp_ajax_nabtron_frontpage_ajax_contactform', 'nabtron_frontpage_ajax_contactform');
add_action('wp_ajax_nopriv_nabtron_frontpage_ajax_contactform', 'nabtron_frontpage_ajax_contactform');
function nabtron_frontpage_ajax_contactform()
{
	echo "hi";
	$name	= isset($_POST['name']) ? trim($_POST['name']) : "";
	$response	= array();
	$response['message']	= "Successfull Request";
	echo json_encode($response);
	exit;
}
add_action('wp_footer', 'nabtron_frontpage_ajax_contactform_jquery');
function nabtron_frontpage_ajax_contactform_jquery()
{
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		function frontpage_contact_form() {

			var formData = new FormData(),
				//file = document.getElementById('test-input').files[0],
				xhr = new XMLHttpRequest();

			formData.append('action', 'nabtron_frontpage_ajax_contactform');
			formData.append('post_type', 'POST');
			formData.append('name', 'first');
			xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>');
			xhr.send(formData);

			xhr.onload = function() {
				if (xhr.status === 200 && xhr.responseText !== 'success') {
					alert('Something went wrong.  Name is now ' + xhr.responseText);
				} else if (xhr.status !== 200) {
					alert('Request failed.  Returned status of ' + xhr.status);
				}
			};

		}
		frontpage_contact_form();

		jQuery(document).ready(function() {
			console.log("here");
			var data = {
				'action': 'nabtron_frontpage_ajax_contactform',
				'post_type': 'POST',
				'name': 'My First AJAX Request'
			};

			jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {
				console.log(response);
			}, 'json');
		});
	</script>
<?php
}
/* frontpage contact form ends */
