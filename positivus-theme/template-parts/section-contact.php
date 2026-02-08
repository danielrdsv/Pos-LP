<?php

?>

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-small-12 col-giant-8">
                <div class="section-header-holder d-flex align-items-center">
                    <h2><?php esc_html_e( 'Contact Us', 'positivus' ); ?></h2>
                    <p><?php esc_html_e( "Connect with Us: Let's Discuss Your Digital Marketing Needs", 'positivus' ); ?></p>
                </div>
            </div>
        </div>

        <div class="main-holder">
            <div class="row">
                <div class="col-medium-8 col-large-6">
                    <form action="" method="post">
                        <div class="form-radio-group">
                            <label class="radio-label">
                                <input type="radio" name="contact-type" value="say-hi" checked>
                                <span class="radio-custom"></span>
                                <span class="radio-text"><?php esc_html_e( 'Say Hi', 'positivus' ); ?></span>
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="contact-type" value="get-quote">
                                <span class="radio-custom"></span>
                                <span class="radio-text"><?php esc_html_e( 'Get a Quote', 'positivus' ); ?></span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="name"><?php esc_html_e( 'Name', 'positivus' ); ?></label>
                            <input type="text" id="name" name="name" placeholder="<?php esc_attr_e( 'Name', 'positivus' ); ?>">
                        </div>

                        <div class="form-group">
                            <label for="email"><?php esc_html_e( 'Email*', 'positivus' ); ?></label>
                            <input type="email" id="email" name="email" placeholder="<?php esc_attr_e( 'Email', 'positivus' ); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="message"><?php esc_html_e( 'Message*', 'positivus' ); ?></label>
                            <textarea id="message" name="message" placeholder="<?php esc_attr_e( 'Message', 'positivus' ); ?>" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-submit"><?php esc_html_e( 'Send Message', 'positivus' ); ?></button>
                    </form>
                </div>
            </div>
            <div class="contact-illustration">
                <img src="<?php echo esc_url( POSITIVUS_URI . '/assets/contact-illustration.png' ); ?>" alt="<?php esc_attr_e( 'Contact illustration', 'positivus' ); ?>">
            </div>
        </div>
    </div>
</section>
