<section class="<?php echo get_row_layout(); ?>">

    <!-- Portfolio container -->
    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-2">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light"><?php the_sub_field( 'portfolio_headline' ); ?></h1>
                    <p class="lead text-muted"><?php the_sub_field( 'portfolio_subheading' ); ?></p>
                    <p>
                        <a href="<?php echo site_url( ) . '/contact'; ?>" class="btn btn-primary my-2">Contact me</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-3 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
                <?php
                    // Get the repeating field values for the current post
                    $repeating_fields = get_sub_field('portfolio_projects');

                    // Check if the repeating fields exist
                    if ($repeating_fields) {
                    // Loop through each field value
                    foreach ($repeating_fields as $field) {
                        // Retrieve the subfield values
                        $project_title = $field['project_title'];
                        $project_subtitle = $field['project_subtitle'];
                        $project_image = $field['project_image'];
                        $project_description = $field['project_description'];
                        $project_view_url = $field['project_view_url'];
                        $project_edit_url = $field['project_edit_url'];
                        $project_date = $field['project_date'];

                        // Output the portfolio item using the retrieved values
                        echo '<div class="col">
                                <div class="card shadow-sm">
                                    <img src="' . $project_image . '" class="bd-placeholder-img card-img-top border" width="100%" height="225" role="img" aria-label="Portfolio Image" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <div class="card-body">
                                        <h3 class="card-title">' . $project_title . '</h3>
                                        <h4 class="card-subtitle mb-2 text-muted">' . $project_subtitle . '</h4>
                                        <p class="card-text">' . $project_description . '</p>
                                        <div class="d-flex justify-content-between align-items-center border-top">
                                            
                                            <small class="text-muted">Launched: ' . $project_date . '</small>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                ?>
                </div>
            </div>
        </div>

    </main>
</section>