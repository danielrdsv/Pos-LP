<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>


    <header>
        <div class="fixed-container">
            <div class="navigation-container container d-flex align-items-center justify-content-between">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-holder">
                    <?php if (has_custom_logo()): ?>
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                        ?>
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" class="logo">
                    <?php else: ?>
                        <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/logo-light.png'); ?>"
                            alt="<?php bloginfo('name'); ?>" class="logo">
                    <?php endif; ?>
                </a>

                <button class="hamburger" aria-label="<?php esc_attr_e('Toggle navigation', 'positivus'); ?>"
                    aria-expanded="false">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>

                <div class="header-navi-holder d-large-flex align-items-center">
                    <nav>
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'navi-main d-flex align-items-center',
                                'walker' => new Positivus_Nav_Walker(),
                            ));
                        } else {
                            // Fallback menu
                            echo '<ul class="navi-main d-flex align-items-center">';
                            echo '<li><a href="' . esc_url(home_url('/about')) . '" class="nav-link" title="' . esc_attr__('About us', 'positivus') . '">' . esc_html__('About us', 'positivus') . '</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/services')) . '" class="nav-link" title="' . esc_attr__('Services', 'positivus') . '">' . esc_html__('Services', 'positivus') . '</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/cases')) . '" class="nav-link" title="' . esc_attr__('Use Cases', 'positivus') . '">' . esc_html__('Use Cases', 'positivus') . '</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/pricing')) . '" class="nav-link" title="' . esc_attr__('Pricing', 'positivus') . '">' . esc_html__('Pricing', 'positivus') . '</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/blog')) . '" class="nav-link" title="' . esc_attr__('Blog', 'positivus') . '">' . esc_html__('Blog', 'positivus') . '</a></li>';
                            echo '</ul>';
                        }
                        ?>
                    </nav>

                    <div class="btn-holder">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn secondary"
                            title="<?php esc_attr_e('Request a quote', 'positivus'); ?>">
                            <?php esc_html_e('Request a quote', 'positivus'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="cta-container">
                <div class="row align-items-center justify-content-center">
                    <div class="col col-small-10 col-medium-8 col-large-6 col-giant-6">
                        <blockquote class="h1">
                            <?php if (get_field('header_title_1')): ?>
                                <span><?php the_field('header_title_1'); ?></span>
                            <?php endif; ?>
                            <?php if (get_field('header_title_2')): ?>
                                <span><?php the_field('header_title_2'); ?></span>
                            <?php endif; ?>
                            <?php if (get_field('header_title_3')): ?>
                                <span><?php the_field('header_title_3'); ?></span>
                            <?php endif; ?>
                        </blockquote>

                        <p>
                            <?php the_field('header_subtitle'); ?>
                        </p>

                        <?php $header_btn = get_field('header_button'); ?>
                        <?php if ($header_btn): ?>
                            <a href="<?php echo esc_url($header_btn['url']); ?>" class="btn"
                                title="<?php echo esc_attr($header_btn['title']); ?>">
                                <?php echo esc_html($header_btn['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="col-small-10 col-medium-8 col-large-6">
                        <div class="illustration-holder">
                            <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/header-illustration/background.png'); ?>"
                                alt="<?php esc_attr_e('Header Illustration', 'positivus'); ?>">

                            <div class="main-part parallax-element" data-speed="0.05" data-direction="up">
                                <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/header-illustration/main-part.png'); ?>"
                                    alt="<?php esc_attr_e('Header Illustration', 'positivus'); ?>">
                            </div>

                            <div class="heart floating-element">
                                <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/header-illustration/hearth.png'); ?>"
                                    alt="<?php esc_attr_e('Header Illustration', 'positivus'); ?>">
                            </div>

                            <div class="socials floating-element parallax-element" data-speed="0.08"
                                data-direction="down">
                                <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/header-illustration/socials.png'); ?>"
                                    alt="<?php esc_attr_e('Header Illustration', 'positivus'); ?>">
                            </div>

                            <div class="video floating-element parallax-element" data-speed="0.06" data-direction="up">
                                <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/header-illustration/video.png'); ?>"
                                    alt="<?php esc_attr_e('Header Illustration', 'positivus'); ?>">
                            </div>

                            <div class="location floating-element parallax-element" data-speed="0.04"
                                data-direction="down">
                                <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/header-illustration/location.png'); ?>"
                                    alt="<?php esc_attr_e('Header Illustration', 'positivus'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="brandings-holder d-large-flex align-items-center justify-content-between">
                <div class="branding-item">
                    <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/amazon.png'); ?>" alt="Amazon">
                </div>
                <div class="branding-item">
                    <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/dribble.png'); ?>" alt="Dribble">
                </div>
                <div class="branding-item">
                    <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/hubspot.png'); ?>" alt="Hubspot">
                </div>
                <div class="branding-item">
                    <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/notion.png'); ?>" alt="Notion">
                </div>
                <div class="branding-item">
                    <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/netflix.png'); ?>" alt="Netflix">
                </div>
                <div class="branding-item">
                    <img src="<?php echo esc_url(POSITIVUS_URI . '/assets/header/zoom.png'); ?>" alt="Zoom">
                </div>
            </div>
        </div>