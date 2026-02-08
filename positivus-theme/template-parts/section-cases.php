<?php

$cases = array(
    'For a local restaurant, we implemented a targeted PPC campaign that resulted in a 50% increase in website traffic and a 25% increase in sales.',
    'For a B2B software company, we developed an SEO strategy that resulted in a first page ranking for key keywords and a 200% increase in organic traffic.',
    'For a national retail chain, we created a social media marketing campaign that increased followers by 25% and generated a 20% increase in online sales.',
);
?>

<section class="case-section">
    <div class="container">

        <div class="row">
            <div class="col-small-12 col-giant-8">
                <div class="section-header-holder d-flex align-items-center">
                    <h2><?php esc_html_e( 'Case Studies', 'positivus' ); ?></h2>
                    <p><?php esc_html_e( 'Explore Real-Life Examples of Our Proven Digital Marketing Success through Our Case Studies', 'positivus' ); ?></p>
                </div>
            </div>
        </div>

        <div class="cases-box">
            <?php foreach ( $cases as $case ) : ?>
                <div class="case">
                    <p><?php echo esc_html( $case ); ?></p>
                    <a href="#" class="link" title="<?php esc_attr_e( 'Learn more', 'positivus' ); ?>">
                        <?php esc_html_e( 'Learn more', 'positivus' ); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
