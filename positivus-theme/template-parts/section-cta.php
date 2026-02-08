<?php
?>

<section class="cta-section">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-large-7 col-giant-5">
                    <h3><?php esc_html_e( "Let's make things happen", 'positivus' ); ?></h3>
                    <p><?php esc_html_e( 'Contact us today to learn more about how our digital marketing services can help your business grow and succeed online.', 'positivus' ); ?></p>

                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn" title="<?php esc_attr_e( 'Get your free proposal', 'positivus' ); ?>">
                        <?php esc_html_e( 'Get your free proposal', 'positivus' ); ?>
                    </a>
                </div>

                <div class="col-large-5 col-giant-7 img-col">
                    <div class="img-holder cta-parallax" data-speed="0.15">
                        <img src="<?php echo esc_url( POSITIVUS_URI . '/assets/cta-illustration.png' ); ?>" alt="<?php esc_attr_e( 'Call to action illustration', 'positivus' ); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
