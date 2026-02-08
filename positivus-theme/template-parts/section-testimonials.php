<?php

$testimonials = array(
    array(
        'text' => '"We have been working with Positivus for the past year and have seen a significant increase in website traffic and leads as a result of their efforts. The team is professional, responsive, and truly cares about the success of our business. We highly recommend Positivus to any company looking to grow their online presence."',
        'name' => 'John Smith',
        'position' => 'Marketing Director at XYZ Corp',
    ),
    array(
        'text' => '"We have been working with Positivus for the past year and have seen a significant increase in website traffic and leads as a result of their efforts. The team is professional, responsive, and truly cares about the success of our business. We highly recommend Positivus to any company looking to grow their online presence."',
        'name' => 'John Smith',
        'position' => 'Marketing Director at XYZ Corp',
    ),
    array(
        'text' => '"We have been working with Positivus for the past year and have seen a significant increase in website traffic and leads as a result of their efforts. The team is professional, responsive, and truly cares about the success of our business. We highly recommend Positivus to any company looking to grow their online presence."',
        'name' => 'John Smith',
        'position' => 'Marketing Director at XYZ Corp',
    ),
);
?>

<section class="testimonials-section">
    <div class="container">
        <div class="row">
            <div class="col-small-12 col-giant-8">
                <div class="section-header-holder d-flex align-items-center">
                    <h2><?php esc_html_e('Testimonials', 'positivus'); ?></h2>
                    <p><?php esc_html_e('Hear from Our Satisfied Clients: Read Our Testimonials to Learn More about Our Digital Marketing Services', 'positivus'); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="main-holder">
            <div class="swiper testimonials-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="swiper-slide">
                            <div class="reviews-holder">
                                <?php echo esc_html($testimonial['text']); ?>
                            </div>

                            <div class="name-holder">
                                <span><?php echo esc_html($testimonial['name']); ?></span>
                                <span><?php echo esc_html($testimonial['position']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-pagination"></div>

                <div class="d-flex arrows-holder">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>