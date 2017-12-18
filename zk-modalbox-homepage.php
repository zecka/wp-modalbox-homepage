<?php
/*
Plugin Name: ZK WP MODALBOX HOMEPAGE
Version: 0.0.2.2
Description: Display a modal box on the homepage
Author: Robin Ferrari
GitHub Plugin URI: zecka/zk-wp-modalbox-homepage
GitHub Plugin URI: https://github.com/zecka/zk-wp-modalbox-homepage
*/
define( 'ZKWPM_URL', substr(plugin_dir_url( __FILE__ ), 0, -1) );
define( 'ZKWPM_PATH', substr(plugin_dir_path( __FILE__ ), 0, -1) );
define( 'ZKWPM_VERSION', '0.0.2.2' );

add_action('wp_enqueue_scripts', 'zkwpm_enqueue_scripts');
function zkwpm_enqueue_scripts(){
	wp_enqueue_script("jquery-cookie", ZKWPM_URL.'/assets/js/jquery.cookie.js', array( 'jquery' ), '0');
	wp_enqueue_script('zkmodal-script',ZKWPM_URL.'/assets/js/modal.js', array('jquery'), ZKWPM_URL.'/assets/js/modal.js',ZKWPM_VERSION, true);
	wp_enqueue_style('zkmodal-style', ZKWPM_URL.'/assets/css/modal.css','', ZKWPM_VERSION);
}

add_action('wp_footer', 'zkwpm_add_modal_to_footer');
function zkwpm_add_modal_to_footer(){
	
	$modal_header=false;
	$modal_footer=false;
	$modal_body='<img src="'.ZKWPM_URL.'/assets/img/voeux-2018.jpg">';
	
	if(is_front_page() || is_home()){
	?>
	<div class="zk-modal" id="modal-welcome">
		<div class="zk-modal-vcenter">

			<div class="zk-modal-box">
				<div class="zk-close-modal">
						<a>
							<span class="closeIcon"></span>
						</a>
				</div>	
				
				<?php if($modal_header){ ?>
					<div class="zk-modal-header">
						<?php echo $modal_header; ?>
					</div>
				<?php } ?>
				
				
				<?php if($modal_body){ ?>
					<div class="zk-modal-body">
						<?php echo $modal_body; ?>
					</div>
				<?php } ?>
				
				
				
				<?php if($modal_footer){ ?>
					<div class="zk-modal-footer">
						<?php echo $modal_footer; ?>
					</div>
				<?php }?>
				
				
				
			</div>
			<div class="zk-hidepopup">
				<label><input type="checkbox"> Ne plus afficher ce pop-up</label>
			</div>
		</div>
	</div>
	<?php
	}
	
}