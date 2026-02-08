<?php

$team_members = array(
    array(
        'name'     => 'John Smith',
        'position' => 'CEO and Founder',
        'image'    => 'john-smith.jpg',
        'text'     => '10+ years of experience in digital marketing. Expertise in SEO, PPC, and content strategy',
        'linkedin' => '#',
    ),
    array(
        'name'     => 'Jane Doe',
        'position' => 'Director of Operations',
        'image'    => 'jane-doe.jpg',
        'text'     => '7+ years of experience in project management and team leadership. Strong organizational and communication skills',
        'linkedin' => '#',
    ),
    array(
        'name'     => 'Michael Brown',
        'position' => 'Senior SEO Specialist',
        'image'    => 'michael-brown.jpg',
        'text'     => '5+ years of experience in SEO and content creation. Proficient in keyword research and on-page optimization',
        'linkedin' => '#',
    ),
    array(
        'name'     => 'Emily Johnson',
        'position' => 'PPC Manager',
        'image'    => 'emily-johnson.jpg',
        'text'     => '3+ years of experience in paid search advertising. Skilled in campaign management and performance analysis',
        'linkedin' => '#',
    ),
    array(
        'name'     => 'Brian Williams',
        'position' => 'Social Media Specialist',
        'image'    => 'brian-williams.jpg',
        'text'     => '4+ years of experience in social media marketing. Proficient in creating and scheduling content, analyzing metrics, and building engagement',
        'linkedin' => '#',
    ),
    array(
        'name'     => 'Sarah Kim',
        'position' => 'Content Creator',
        'image'    => 'sarah-kim.jpg',
        'text'     => '2+ years of experience in writing and editing. Skilled in creating compelling, SEO-optimized content for various industries',
        'linkedin' => '#',
    ),
);
?>

<section class="team-section">
    <div class="container">

        <div class="row">
            <div class="col-small-12 col-giant-8">
                <div class="section-header-holder d-flex align-items-center">
                    <h2><?php esc_html_e( 'Team', 'positivus' ); ?></h2>
                    <p><?php esc_html_e( 'Meet the skilled and experienced team behind our successful digital marketing strategies', 'positivus' ); ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ( $team_members as $member ) : ?>
                <div class="col-medium-6 col-giant-4">
                    <div class="box-team">
                        <div class="name-holder">
                            <div class="image">
                                <img src="<?php echo esc_url( POSITIVUS_URI . '/assets/team/' . $member['image'] ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>">
                            </div>

                            <div class="name">
                                <span class="h4"><?php echo esc_html( $member['name'] ); ?></span>
                                <span class="position"><?php echo esc_html( $member['position'] ); ?></span>
                            </div>
                            <a href="<?php echo esc_url( $member['linkedin'] ); ?>" class="icon" title="LinkedIn"></a>
                        </div>

                        <div class="text">
                            <p><?php echo esc_html( $member['text'] ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
