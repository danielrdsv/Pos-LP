<?php

$service_query = new WP_Query( array(
    'post_type'      => 'service',
    'posts_per_page' => 6,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

if ( $service_query->have_posts() ) {
    $services = array();
    while ( $service_query->have_posts() ) {
        $service_query->the_post();
        $id = get_the_ID();
        $title = get_the_title();
        $parts = preg_split( '/\s+/', $title, 2 );
        $title_1 = isset( $parts[0] ) ? $parts[0] : $title;
        $title_2 = isset( $parts[1] ) ? $parts[1] : '';
        $image = get_the_post_thumbnail_url( $id, 'full' );
        $variant = get_post_meta( $id, 'service_variant', true );
        $services[] = array(
            'title_1' => $title_1,
            'title_2' => $title_2,
            'image'   => $image,
            'variant' => $variant ? $variant : 'light',
            'link'    => get_permalink( $id ),
        );
    }
    wp_reset_postdata();
} else {
    // Fallback static services (existing default)
    $services = array(
        array(
            'title_1' => 'Search engine',
            'title_2' => 'optimization',
            'image'   => 'service1.png',
            'variant' => 'light',
            'link'    => '#',
        ),
        array(
            'title_1' => 'Pay‑per‑click',
            'title_2' => 'advertising',
            'image'   => 'service2.png',
            'variant' => 'green',
            'link'    => '#',
        ),
        array(
            'title_1' => 'Social Media',
            'title_2' => 'Marketing',
            'image'   => 'service3.png',
            'variant' => 'dark',
            'link'    => '#',
        ),
        array(
            'title_1' => 'Email',
            'title_2' => 'Marketing',
            'image'   => 'service4.png',
            'variant' => 'light',
            'link'    => '#',
        ),
        array(
            'title_1' => 'Content',
            'title_2' => 'Creation',
            'image'   => 'service5.png',
            'variant' => 'green',
            'link'    => '#',
        ),
        array(
            'title_1' => 'Analytics and',
            'title_2' => 'Tracking',
            'image'   => 'service6.png',
            'variant' => 'dark',
            'link'    => '#',
        ),
    );
}
?>

<section class="services-section">
    <div class="container">

        <div class="row">
            <div class="col-small-12 col-giant-8">
                <div class="section-header-holder d-flex align-items-center">
                    <h2><?php esc_html_e( 'Services', 'positivus' ); ?></h2>
                    <p><?php esc_html_e( 'At our digital marketing agency, we offer a range of services to help businesses grow and succeed online.', 'positivus' ); ?></p>
                </div>
            </div>
        </div>

        <div class="row services-row justify-content-center">
            <?php foreach ( $services as $service ) : ?>
                <div class="col-12 col-small-10 col-medium-8 col-large-6">
                    <article class="service-card service-card--<?php echo esc_attr( $service['variant'] ); ?>">
                        <div class="text-holder">
                            <h3><span><?php echo esc_html( $service['title_1'] ); ?></span><span><?php echo esc_html( $service['title_2'] ); ?></span></h3>
                            <a href="<?php echo esc_url( $service['link'] ); ?>" class="service-link" title="<?php esc_attr_e( 'Learn more', 'positivus' ); ?>">
                                <svg class="service-icon" xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 1024 1024">
                                    <path class="circle" d="M1024 512c0 282.77-229.23 512-512 512s-512-229.23-512-512c0-282.77 229.23-512 512-512s512 229.23 512 512z"></path>
                                    <path class="arrow" d="M280.978 616.92c-17.92 10.345-24.059 33.258-13.714 51.178 10.345 17.918 33.258 24.057 51.178 13.712l-37.463-64.889zM768.485 409.305c5.357-19.985-6.504-40.528-26.489-45.883l-325.682-87.267c-19.985-5.355-40.528 6.506-45.883 26.492s6.504 40.528 26.489 45.883l289.495 77.569-77.569 289.495c-5.355 19.985 6.506 40.528 26.492 45.883 19.985 5.357 40.528-6.504 45.883-26.489l87.265-325.682zM318.442 681.809l432.59-249.756-37.463-64.889-432.59 249.756 37.463 64.889z"></path>
                                </svg>
                                <span><?php esc_html_e( 'Learn more', 'positivus' ); ?></span>
                            </a>
                        </div>

                        <div class="service-illustration" aria-hidden="true">
                            <?php
                            $img_src = '';
                            if ( ! empty( $service['image'] ) ) {
                                if ( strpos( $service['image'], '://' ) !== false ) {
                                    $img_src = $service['image'];
                                } else {
                                    $img_src = POSITIVUS_URI . '/assets/services/' . ltrim( $service['image'], '/\\' );
                                }
                            }
                            if ( ! $img_src ) {
                                $img_src = POSITIVUS_URI . '/assets/services/service1.png';
                            }
                            ?>
                            <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $service['title_1'] . ' ' . $service['title_2'] ); ?>">
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
