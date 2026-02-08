    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-navi-holder d-flex align-items-center justify-content-between">

                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
                        <?php if ( has_custom_logo() ) : ?>
                            <?php
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
                            ?>
                            <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        <?php else : ?>
                            <img src="<?php echo esc_url( POSITIVUS_URI . '/assets/Logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                    </a>

                    <div class="navi-holder">
                        <?php
                        if ( has_nav_menu( 'footer' ) ) {
                            wp_nav_menu( array(
                                'theme_location' => 'footer',
                                'container'      => false,
                                'menu_class'     => 'navi-add',
                                'walker'         => new Positivus_Footer_Nav_Walker(),
                            ) );
                        } else {
                            // Fallback menu
                            echo '<ul class="navi-add">';
                            echo '<li><a href="' . esc_url( home_url( '/about' ) ) . '" class="footer-link" title="' . esc_attr__( 'About us', 'positivus' ) . '">' . esc_html__( 'About us', 'positivus' ) . '</a></li>';
                            echo '<li><a href="' . esc_url( home_url( '/services' ) ) . '" class="footer-link" title="' . esc_attr__( 'Services', 'positivus' ) . '">' . esc_html__( 'Services', 'positivus' ) . '</a></li>';
                            echo '<li><a href="' . esc_url( home_url( '/cases' ) ) . '" class="footer-link" title="' . esc_attr__( 'Use Cases', 'positivus' ) . '">' . esc_html__( 'Use Cases', 'positivus' ) . '</a></li>';
                            echo '<li><a href="' . esc_url( home_url( '/pricing' ) ) . '" class="footer-link" title="' . esc_attr__( 'Pricing', 'positivus' ) . '">' . esc_html__( 'Pricing', 'positivus' ) . '</a></li>';
                            echo '<li><a href="' . esc_url( home_url( '/blog' ) ) . '" class="footer-link" title="' . esc_attr__( 'Blog', 'positivus' ) . '">' . esc_html__( 'Blog', 'positivus' ) . '</a></li>';
                            echo '</ul>';
                        }
                        ?>
                    </div>

                    <?php if ( is_active_sidebar( 'footer-social' ) ) : ?>
                        <div class="footer-social-icons d-flex align-items-center gap-20">
                            <?php dynamic_sidebar( 'footer-social' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="contact-container d-flex align-items-center justify-content-between">

                    <?php if ( is_active_sidebar( 'footer-contact' ) ) : ?>
                        <div class="contact-info">
                            <?php dynamic_sidebar( 'footer-contact' ); ?>
                        </div>
                    <?php else : ?>
                        <div class="contact-info">
                            <span class="headline"><?php esc_html_e( 'Contact us:', 'positivus' ); ?></span>
                            <span>Email: <a href="mailto:info@positivus.com" title="<?php esc_attr_e( 'Email us', 'positivus' ); ?>">info@positivus.com</a></span>
                            <span>Phone: <a href="tel:555-567-8901" title="<?php esc_attr_e( 'Call us', 'positivus' ); ?>">555-567-8901</a></span>
                            <span>Address: 1234 Main St <span>Moonstone City, Stardust State 12345</span></span>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-subscribe' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-subscribe' ); ?>
                    <?php else : ?>
                        <div class="subscribe-container">
                            <form action="#" method="post" class="subscribe-form d-flex align-items-center gap-10">
                                <input type="email" name="email" placeholder="<?php esc_attr_e( 'Email', 'positivus' ); ?>" class="lighter" required>
                                <button type="submit" class="subscribe-button btn primary" title="<?php esc_attr_e( 'Subscribe to news', 'positivus' ); ?>">
                                    <?php esc_html_e( 'Subscribe to news', 'positivus' ); ?>
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>

                </div>

                <div class="privacy-container d-flex align-items-center">
                    <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'positivus' ); ?></p>
                    <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( 'Privacy Policy', 'positivus' ); ?></a>
                </div>

            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
