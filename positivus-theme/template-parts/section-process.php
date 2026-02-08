<?php

$processes = array(
    array(
        'title' => 'Consultation',
        'text'  => 'During the initial consultation, we will discuss your business goals and objectives, target audience, and current marketing efforts. This will allow us to understand your needs and tailor our services to best fit your requirements.',
    ),
    array(
        'title' => 'Research and Strategy Development',
        'text'  => 'During the initial consultation, we will discuss your business goals and objectives, target audience, and current marketing efforts. This will allow us to understand your needs and tailor our services to best fit your requirements.',
    ),
    array(
        'title' => 'Implementation',
        'text'  => 'During the initial consultation, we will discuss your business goals and objectives, target audience, and current marketing efforts. This will allow us to understand your needs and tailor our services to best fit your requirements.',
    ),
    array(
        'title' => 'Monitoring and Optimization',
        'text'  => 'During the initial consultation, we will discuss your business goals and objectives, target audience, and current marketing efforts. This will allow us to understand your needs and tailor our services to best fit your requirements.',
    ),
    array(
        'title' => 'Reporting and Communication',
        'text'  => 'During the initial consultation, we will discuss your business goals and objectives, target audience, and current marketing efforts. This will allow us to understand your needs and tailor our services to best fit your requirements.',
    ),
    array(
        'title' => 'Continual Improvement',
        'text'  => 'During the initial consultation, we will discuss your business goals and objectives, target audience, and current marketing efforts. This will allow us to understand your needs and tailor our services to best fit your requirements.',
    ),
);
?>

<section class="process-section">
    <div class="container">
        <div class="row">
            <div class="col-small-12 col-giant-8">
                <div class="section-header-holder d-flex align-items-center">
                    <h2><?php esc_html_e( 'Our Working Process', 'positivus' ); ?></h2>
                    <p><?php esc_html_e( 'Step-by-Step Guide to Achieving Your Business Goals', 'positivus' ); ?></p>
                </div>
            </div>
        </div>

        <?php foreach ( $processes as $index => $process ) : ?>
            <div class="process-card<?php echo $index === 0 ? ' active' : ''; ?>">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="title h3">
                        <?php echo esc_html( $process['title'] ); ?>
                    </span>
                    <div class="icon"></div>
                </div>

                <div class="text">
                    <?php echo esc_html( $process['text'] ); ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>
