<?php
/**
 * SKT Startup About Theme
 *
 * @package SKT Startup
 */
?>

<?php
//about theme info
add_action( 'admin_menu', 'skt_startup_abouttheme' );
function skt_startup_abouttheme() {    	
	add_theme_page( __('About Theme', 'skt-startup'), __('About Theme', 'skt-startup'), 'edit_theme_options', 'skt_startup_guide', 'skt_startup_mostrar_guide');   
} 

//guidline for about theme
function skt_startup_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'skt-startup'); ?>
		   </div>
          <p><?php esc_attr_e('SKT Startup is a multipurpose responsive WordPress theme which is simple to use and flexible in functionality and scalable as well. It can be used for car repair, service industry, business, corporate, portfolio, consulting and is compatible with major plugins like WooCommerce, SEO plugins and translation ready. ','skt-startup'); ?></p>
		  <a href="<?php echo SKT_PRO_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo SKT_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'skt-startup'); ?></a> | 
				<a href="<?php echo SKT_PRO_THEME_URL; ?>"><?php esc_attr_e('Buy Pro', 'skt-startup'); ?></a> | 
				<a href="<?php echo SKT_THEME_DOC; ?>" target="_blank"><?php esc_attr_e('Documentation', 'skt-startup'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo SKT_THEMES; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>