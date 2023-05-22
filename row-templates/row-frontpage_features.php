<section class="container col-sm-8 px-0 py-5" id="frontpage-features">
    <h2 class="pb-2 border-bottom">We solve people’s problems and make them happy</h2>

    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

            <?php

                // Check row exists
                if( have_rows('features') ):
                    
                    // loop through rows
                    while( have_rows('features') ) : the_row();

                        // load sub field value
                        $feature_title = get_sub_field('feature_title');
                        $feature_body = get_sub_field('feature_body');
                        $feature_icon = get_sub_field('featured_icon_xlink');
                        $feature_button = get_sub_field('feature_button');
                        



                    echo '<div class="col d-flex align-items-start">
                        <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            ' . $feature_icon .  // ensure full svg code is entered in WP page
                        '</div>
                        <div>
                            <h3 class="fs-2">' . $feature_title . '</h3>
                            <p>' . $feature_body . '</p>
                            
                        </div>
                    </div>';
                endwhile;

                // No value.
                else :
                    // Do something...
                endif;
            ?>


    </div>
</section>
