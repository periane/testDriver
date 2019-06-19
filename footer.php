<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Startup
 */
?>

<div id="socialwrap" xmlns="http://www.w3.org/1999/html">
    <!--      <div class="container">-->
    <!--       --><?php //if ( get_theme_mod('followus_title') !== "") { ?>
    <!--              <h2 class="section_title">-->
    <?php //echo esc_attr_e( get_theme_mod( 'followus_title', __('Follow Us','skt-startup'))); ?><!--</h2>             -->
    <!--		 --><?php //} ?><!-- -->
    <!--         <div class="social-icons">-->
    <!--					--><?php //if ( get_theme_mod('fb_link') !== "") { ?>
    <!--                    <a title="facebook" class="fb" target="_blank" href="-->
    <?php //echo esc_url(get_theme_mod('fb_link','#facebook')); ?><!--"></a> -->
    <!--                    --><?php //} ?><!--                   -->
    <!--                    -->
    <!--                    --><?php //if ( get_theme_mod('twitt_link') !== "") { ?>
    <!--                    <a title="twitter" class="tw" target="_blank" href="-->
    <?php //echo esc_url(get_theme_mod('twitt_link','#twitter')); ?><!--"></a>-->
    <!--                    --><?php //} ?><!--                 -->
    <!--                    -->
    <!--                    --><?php //if ( get_theme_mod('gplus_link') !== "") { ?>
    <!--                    <a title="google-plus" class="gp" target="_blank" href="-->
    <?php //echo esc_url(get_theme_mod('gplus_link','#gplus')); ?><!--"></a>-->
    <!--                    --><?php //} ?><!--                    -->
    <!--                    -->
    <!--                    --><?php //if ( get_theme_mod('linked_link') !== "") { ?><!-- -->
    <!--                    <a title="linkedin" class="in" target="_blank" href="-->
    <?php //echo esc_url(get_theme_mod('linked_link','#linkedin')); ?><!--"></a>-->
    <!--                    --><?php //} ?><!--                   -->
    <!--               </div>  -->
    <!--       -->
    <!--       <div class="clear"></div>-->
    <!--    </div> <--end container-->
</div><!--end #socialwrap-->
<div id="footer-wrapper">
    <div class="container footer">
        <!--       --><?php //
        // wp_nav_menu ( array (
        // 'theme_location' => 'subr_menu' ,
        // 'menu_class' => 'subr_menu',
        // ) ); ?>
        <div id="footer">
            <a href="/wordpress/accueil"/>Accueil</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/wordpress/Qui sommes-nous"/>Qui sommes-nous</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/wordpress/forfaits/">forfaits</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/wordpress/temoignages"/>Témoignages</a>&nbsp;&nbsp;&nbsp;
            <a href="/wordpress/contact"/>Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/wordpress/reservation"/>Reservation</a>
            <br/> <br/>
            <a> &copy; <?php echo date("Y"); ?>
                <?php bloginfo('name'); ?>
                - Service de chauffeur privé à la demande
                <br/> <br/>
                <a href="/wordpress/plan du site"/>Plan du site</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/wordpress/mentions legales"/>mentions légales</a><p/>
        </div>
        <div class="clear"></div>
    </div><!--end .container-->
</div><!--end .footer-wrapper-->
<?php wp_footer(); ?>

</body>
</html>