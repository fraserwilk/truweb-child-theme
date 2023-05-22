<!--  uses ACF Frontpage field group. Frontpage CTA is the one to look at here. -->

<?php

echo '<section class="bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5">

      <h1 class="display-5 fw-bold text-white">' . get_sub_field('cta_title') . '</h1>
      <div class="col-lg-6 mx-auto">
        <div class="fs-5 mb-4">' . get_sub_field('cta_body') . '</div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <a type="button" href="' . get_sub_field('cta_button_one_link') . '" class="btn btn-outline-primary btn-lg px-4 me-sm-3 fw-bold">' . get_sub_field('cta_button_one') . '</a>
          <a type="button" href="' . get_sub_field('cta_button_two_link') . '" class="btn btn-outline-light btn-lg px-4">' . get_sub_field('cta_button_two') . '</a>
        </div>
      </div>
    </div>
  </section>';
                
  ?>

