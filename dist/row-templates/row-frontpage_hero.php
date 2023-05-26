<section class="<?php echo get_row_layout(); ?>">

    <!-- Hero container -->
    <div class="container-fluid position-relative">

        <div class="row">

            <!-- ****** The Hero Area ****** -->
            <!-- Background image -->
            <img src="<?php the_sub_field('hero_background'); ?>" id="frontpage-hero-img" class="mx-md-auto p-0" alt="TruWeb Website Design & Development" loading="lazy";>

            <div class="container col-md-10 offset-md-1 px-5 py-5 position-absolute text-light">
                <div class="row flex-lg-row align-items-center g-3 py-sm-5 mt-lg-5 mx-3">
                    <div class="col-10 col-sm-8 col-lg-6">
                    </div>
                    <div class="col-sm-10 ps-sm-4 ms-sm-3">
                        <h1 class="lh-md-1 mb-md-1"><?php the_sub_field('hero_heading'); ?></h1>
                        <div class="py-1" id="hero-content">
                            <?php the_sub_field('hero_content'); ?>
                        </div>

                        <div class="d-grid gap-2 d-sm-flex justify-content-md-start">
                            
                            <a class="btn btn-secondary px-4 me-md-2" href="<?php echo site_url( ) . '/contact'; ?>" role="button"><?php the_sub_field('hero_button'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #wrapper-static-hero -->
    </div>
            
</div>

</section>