<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Startup
 */
?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <div class="header <?php if (!is_front_page() && !is_home()) { ?>innerheader<?php } ?>" <?php if (get_theme_mod('hide_slides')) {
        echo 'style="position:relative"';
    } ?>>
        <div class="container">
            <div class="logo">
                <?php skt_startup_the_custom_logo(); ?>
                <a href="<?php echo home_url('/'); ?>">
                    <h1><?php bloginfo('name'); ?></h1>
                    <p><?php bloginfo('description'); ?></p>
                </a>
            </div><!-- logo -->


            <div class="widget-right">

                <?php if (get_theme_mod('contact_no') !== "" || get_theme_mod('contact_mail') !== "") { ?>
                    <div class="headphoneemail">
                        <?php if (get_theme_mod('contact_no') !== "") { ?>
                            <img style="margin-bottom:-2px;"
                                 src="<?php echo esc_url(get_template_directory_uri()); ?>/images/footer-icon-phone.png"
                                 alt=""/> <?php echo esc_attr_e(get_theme_mod('contact_no', __('+91 987 654 3210', 'skt-startup'))); ?>
                        <?php } ?>

                        <?php if (get_theme_mod('contact_mail') !== "") { ?>
                            <span><img style="margin-bottom:-2px;"
                                       src="<?php echo esc_url(get_template_directory_uri()); ?>/images/footer-icon-email.png"
                                       alt=""/><a
                                        href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail', 'contact@company.com')); ?>"><?php echo get_theme_mod('contact_mail', 'contact@company.com'); ?></a></span>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="toggle"><a class="toggleMenu" href="#"><?php esc_attr_e('Menu', 'skt-startup'); ?></a></div>
                <div class="sitenav">
                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                </div><!-- .sitenav-->
                <div class="clear"></div>
            </div><!--.widget-right-->
            <div class="clear"></div>

        </div> <!-- container -->
    </div><!--.header -->
<?php if (is_front_page() || is_home()) { ?>
    <?php if (get_theme_mod('hide_slides') == '') { ?>
        <!-- Slider Section -->
        <?php for ($sld = 7; $sld < 10; $sld++) { ?>
            <?php if (get_theme_mod('page-setting' . $sld)) { ?>
                <?php $slidequery = new WP_query('page_id=' . get_theme_mod('page-setting' . $sld, true)); ?>
                <?php while ($slidequery->have_posts()) : $slidequery->the_post();
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    $img_arr[] = $image;
                    $id_arr[] = $post->ID;
                endwhile;
            }
        }
        ?>
        <?php if (!empty($id_arr)) { ?>
            <section id="home_slider">
                <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
                        <?php
                        $i = 1;
                        foreach ($img_arr as $url) { ?>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>"
                                                                     title="#slidecaption<?php echo $i; ?>"/></a>
                            <?php $i++;
                        } ?>
                    </div>
                    <?php
                    $i = 1;
                    foreach ($id_arr as $id) {
                        $title = get_the_title($id);
                        $post = get_post($id);
                        $content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 100));
                        ?>
                        <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">

                        </div>
                        <?php $i++;
                    } ?>
                </div>
                <div class="clear"></div>

                <?php if (!dynamic_sidebar('header-contact-form')) : ?>
                <?php endif; ?>

            </section>
        <?php } else { ?>
            <section id="home_slider">
                <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider"><img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider1.jpg"
                                alt="" title="#slidecaption1"/>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider2.jpg" alt=""
                             title="#slidecaption2"/>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider3.jpg" alt=""
                             title="#slidecaption3"/>
                    </div>
                    <div id="slidecaption1" class="nivo-html-caption">
                        <div class="slide_info">
                        </div>
                    </div>
                    <div id="slidecaption2" class="nivo-html-caption">
                        <div class="slide_info">

                        </div>
                    </div>
                    <div id="slidecaption3" class="nivo-html-caption">
                        <div class="slide_info">

                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <?php if (!dynamic_sidebar('header-contact-form')) : ?>
                <?php endif; ?>
            </section><!-- Slider Section -->
        <?php }
    }
} ?>

<?php if (is_front_page() || is_home()) { ?>
    <?php if (get_theme_mod('hide_pagefourboxes') == '') { ?>
        <section id="pagearea">
            <div class="container">
                <?php if (get_theme_mod('services_title') !== "") { ?>
                    <h2 class="section_title"><?php echo esc_attr_e(get_theme_mod('services_title', __('Our Services', 'skt-startup'))); ?></h2>
                <?php } ?>

                <?php for ($p = 1; $p < 5; $p++) { ?>
                    <?php if (get_theme_mod('page-column' . $p, false)) { ?>
                        <?php $queryxxx = new WP_query('page_id=' . get_theme_mod('page-column' . $p, true)); ?>
                        <?php while ($queryxxx->have_posts()) : $queryxxx->the_post(); ?>
                            <div class="fourbox <?php if ($p % 4 == 0) {
                                echo "last_column";
                            } ?>">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="thumbbx"><a
                                                href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
                                    </div>
                                <?php } ?>
                                <div class="pagebx-dec">
                                    <img src="https://source.unsplash.com/user/erondu/1x1">
                                    <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
                                    <?php echo skt_startup_content(15); ?>
                                    <a class="ReadMore"
                                       href="<?php echo esc_url(get_permalink()); ?>"><?php esc_attr_e('En savoir +', 'skt-startup'); ?></a>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    <?php } else { ?>
                        <div class="fourbox <?php if ($p % 4 == 0) {
                            echo "last_column";
                        } ?>">
                            <div class="thumbbx"><a href="#"><img
                                            src="<?php echo esc_url(get_template_directory_uri()); ?>/images/services-icon<?php echo $p; ?>.png"
                                            alt=""/></a></div>
                            <div class="pagebx-dec">
                                <h3><a href="#"><?php esc_attr_e('Services', 'skt-startup'); ?><?php echo $p; ?></a>
                                </h3>
                                <p><?php esc_attr_e('Cras aliquet, tellus a dignissim aliquam, nibh erat vulputate justo, in posuere tortor mi a nisi. Quisque orci dolor.', 'skt-startup'); ?></p>
                                <a class="ReadMore" href="#"><?php esc_attr_e('En savoir +', 'skt-startup'); ?></a>
                            </div>
                        </div>
                    <?php }
                } ?>
                <div class="clear"></div>

                <div class="clear"></div>
            </div><!-- container -->
        </section><!-- #pagearea -->
    <?php }
} ?>