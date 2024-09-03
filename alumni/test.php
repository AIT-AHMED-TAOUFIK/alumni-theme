<?php
/* Template Name: Actualités Template */
get_header();
?>

<section class="actualites">
    <h2>Actualités</h2>
    <div class="actualites-categories">
        <button class="category-button selected" onclick="showCategory('toutes')">Toutes les actualités</button>
        <?php
        // Fetch all categories
        $categories = get_terms(array(
            'taxonomy' => 'actualites_category',
            'hide_empty' => false,
        ));

        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                if ($category->slug !== 'toutes') { // Skip 'toutes' since it's handled separately
                    echo '<button class="category-button" onclick="showCategory(\'' . esc_js($category->slug) . '\')">' . esc_html($category->name) . '</button>';
                }
            }
        }
        ?>
    </div>

    <?php
    // Define a default category for "Toutes les actualités"
    $default_category_slug = 'toutes';

    // Fetch all categories
    $categories = get_terms(array(
        'taxonomy' => 'actualites_category',
        'hide_empty' => false,
    ));

    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            // Query for posts in the current category
            $args = array(
                'post_type' => 'actualites',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'actualites_category',
                        'field' => 'slug',
                        'terms' => $category->slug,
                    ),
                ),
            );
            $query = new WP_Query($args);

            if ($query->have_posts()):
                ?>
                <div class="actualites-swiper swiper <?php echo esc_attr($category->slug); ?>"
                    style="display: <?php echo ($category->slug === $default_category_slug) ? 'block' : 'none'; ?>;">
                    <div class="actualites-swiper-wrapper swiper-wrapper">
                        <?php
                        while ($query->have_posts()):
                            $query->the_post();
                            ?>
                            <div class="actualite-card swiper-slide">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-image.png"
                                        alt="Default Image">
                                <?php endif; ?>
                                <div class="actualite-content">
                                    <span class="date"><?php echo get_the_date('Published in Insight M d, Y'); ?></span>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="swiper-actualites-controls">
                        <div class="swiper-actualites-prev <?php echo esc_attr($category->slug); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prev-icon.svg" alt="Previous">
                        </div>
                        <div class="swiper-actualites-next <?php echo esc_attr($category->slug); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/next-icon.svg" alt="Next">
                        </div>
                    </div>
                </div>
                <?php
            endif;
        }
    }
    ?>
</section>

<?php get_footer(); ?>





































<section class="services">
    <h2>Nos services</h2>
    <div class="service-cards">
      <?php
      // Query for the custom post type 'service'
      $args = array(
        'post_type' => 'service',
        'posts_per_page' => -1 // Show all services
      );
      $query = new WP_Query($args);

      if ($query->have_posts()):
        while ($query->have_posts()):
          $query->the_post();
          // Determine the class based on the service title
          $title = get_the_title();
          $class = '';

          if (strpos($title, 'Formations') !== false) {
            $class = 'service-formations';
          } elseif (strpos($title, 'Ma Bourse') !== false) {
            $class = 'service-bourse';
          } elseif (strpos($title, 'Demande') !== false) {
            $class = 'service-hebergement';
          }

          // Get the featured image (icon) and description
          $icon = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Gets URL of the featured image
          $description = get_the_content(); // Gets the post content (description)
          ?>
          <div class="<?php echo esc_attr($class); ?>">
            <img class="service-icone" src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>">
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($description); ?></p>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      else:
        echo '<p>No services found</p>';
      endif;
      ?>
    </div>
  </section>




























  <section class="actualites">
    <h2>Actualités</h2>
    <div class="actualites-categories">
      <button class="category-button selected" onclick="showAllActualites()">Toutes les actualités</button>
      <button class="category-button" onclick="showDivers()">Divers</button>
      <button class="category-button" onclick="showEvenements()">Evénements</button>
      <button class="category-button" onclick="showMonde()">Monde</button>
    </div>


    <?php
      // Query for the custom post type 'service'
      $args = array(
        'post_type' => 'actualites',
        'posts_per_page' => -1 // Show all services
      );
      $query = new WP_Query($args);

      $categories = get_terms(array(
        'taxonomy' => 'actualites_category',
        'hide_empty' => false,
    ));

      if ($query->have_posts()):
        while ($query->have_posts()):
          $query->the_post();
          // Determine the class based on the service title
          $title = get_the_title();
          $class = '';

          if (strpos($categories, 'Toutes les actualites') !== false) {
            $class = 'toutes-actualites';
          } elseif (strpos($title, 'Divers') !== false) {
            $class = 'divers';
          } elseif (strpos($title, 'Evénements') !== false) {
            $class = 'evenements';
          } elseif (strpos($title, 'Monde') !== false) {
            $class = 'monde';
          }

          // Get the featured image (icon) and description
          $icon = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Gets URL of the featured image
          $description = get_the_content(); // Gets the post content (description)
          ?>


    <!--  Slider Toutes Actualite-->
    <!-- Slider JS main container -->
    <div class="actualites-swiper <?php echo esc_attr($class); ?> swiper">
      <!-- Additional required wrapper -->
      <div class="actualites-swiper-wrapper swiper-wrapper">
        <!-- Slides -->
        <div class="actualite-card swiper-slide">
          <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>">
          <div class="actualite-content">
            <span class="date"><?php echo get_the_date('Published in Insight M d, Y'); ?></span>
            <h3><?php echo esc_html($title); ?></h3>
            <p><?php echo esc_html($description); ?></p>
          </div>
        </div>
    </div>
    <?php
        endwhile;
        wp_reset_postdata();
      else:
        echo '<p>No services found</p>';
      endif;
      ?>
  </section>




























  <section class="actualites">
    <h2>Actualités</h2>
    <div class="actualites-categories">
        <button class="category-button selected" onclick="showCategory('toutes-actualites')">Toutes les actualités</button>
        <button class="category-button" onclick="showCategory('divers')">Divers</button>
        <button class="category-button" onclick="showCategory('evenements')">Evénements</button>
        <button class="category-button" onclick="showCategory('monde')">Monde</button>
    </div>

    <?php
    // Get categories
    $categories = get_terms(array(
        'taxonomy' => 'actualites_category',
        'hide_empty' => false,
    ));

    // Ensure categories are retrieved correctly
    if (!empty($categories) && !is_wp_error($categories)) {
        // Iterate through each category
        foreach ($categories as $category) {
            $category_slug = esc_attr($category->slug);

            // Query for posts in the current category
            $args = array(
                'post_type' => 'actualites',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'actualites_category',
                        'field'    => 'slug',
                        'terms'    => $category_slug,
                    ),
                ),
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                ?>
                <div class="actualites-swiper <?php echo $category_slug; ?> swiper" style="display: <?php echo ($category_slug === 'toutes-actualites') ? 'block' : 'none'; ?>;">
                    <div class="actualites-swiper-wrapper swiper-wrapper">
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            $title = get_the_title();
                            $icon = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            $description = get_the_excerpt(); // Use excerpt instead of content for brevity
                            ?>
                            <div class="actualite-card swiper-slide">
                                <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>">
                                <div class="actualite-content">
                                    <span class="date"><?php echo get_the_date('Published in Insight M d, Y'); ?></span>
                                    <h3><?php echo esc_html($title); ?></h3>
                                    <p><?php echo esc_html($description); ?></p>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
                    <div class="swiper-actualites-controls">
                        <div class="swiper-actualites-prev <?php echo $category_slug; ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prev-icon.svg" alt="Previous">
                        </div>
                        <div class="swiper-actualites-next <?php echo $category_slug; ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/next-icon.svg" alt="Next">
                        </div>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
            endif;
        }
    } else {
        echo '<p>No categories found</p>';
    }
    ?>
</section>




















YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY


<section class="actualites">
    <h2>Actualités</h2>
    <div class="actualites-categories">
        <button class="category-button selected" onclick="showCategory('toutes-actualites')">Toutes les actualités</button>
        <button class="category-button" onclick="showCategory('divers')">Divers</button>
        <button class="category-button" onclick="showCategory('evenements')">Evénements</button>
        <button class="category-button" onclick="showCategory('monde')">Monde</button>
    </div>

    <?php
    // Define categories
    $category_slugs = array('toutes-actualites', 'divers', 'evenements', 'monde');

    // Loop through each category slug to generate slider HTML
    foreach ($category_slugs as $category_slug) {
        // Query for posts in the current category
        $args = array(
            'post_type' => 'actualites',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'actualites_category',
                    'field'    => 'slug',
                    'terms'    => $category_slug,
                ),
            ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            ?>
            <div class="actualites-swiper <?php echo esc_attr($category_slug); ?> swiper" style="display: <?php echo ($category_slug === 'toutes-actualites') ? 'block' : 'none'; ?>;">
                <div class="actualites-swiper-wrapper swiper-wrapper">
                    <?php
                    while ($query->have_posts()) : $query->the_post();
                        $title = get_the_title();
                        $icon = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description = get_the_excerpt(); // Use excerpt instead of content for brevity
                        ?>
                        <div class="actualite-card swiper-slide">
                            <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>">
                            <div class="actualite-content">
                                <span class="date"><?php echo get_the_date('Published in Insight M d, Y'); ?></span>
                                <h3><?php echo esc_html($title); ?></h3>
                                <p><?php echo esc_html($description); ?></p>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>
                <div class="swiper-actualites-controls">
                    <div class="swiper-actualites-prev <?php echo esc_attr($category_slug); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prev-icon.svg" alt="Previous">
                    </div>
                    <div class="swiper-actualites-next <?php echo esc_attr($category_slug); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/next-icon.svg" alt="Next">
                    </div>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endif;
    }
    ?>
</section>












<section class="offres-emploi">
    <h2>Offres d'emploi</h2>
    <div class="offres-swiper swiper">
      <?php


      // Function to get offer types and assign them to a variable
      function get_offer_types()
      {
        // Fetch all terms from the 'offer_type' taxonomy
        $terms = get_terms(array(
          'taxonomy' => 'offer_type', // The taxonomy name
          'hide_empty' => false,        // Show all terms including those not assigned to any posts
        ));

        // Check if there is no error and return the terms, otherwise return an empty array
        if (!is_wp_error($terms)) {
          return $terms;
        } else {
          return array();
        }
      }

      if (!empty($type)) {
        foreach ($type as $term) {
            
        
      



      // Query for the custom post type 'service'
      $args = array(
        'post_type' => 'offers',
        'posts_per_page' => -1 // Show all services
      );
      $query = new WP_Query($args);

      if ($query->have_posts()):
        while ($query->have_posts()):
          $query->the_post();
          // Determine the title
          $title = get_the_title();
          $description = get_the_content(); // Gets the post content (description)
          ?>
          <div class="swiper-wrapper"></div>
          <div class="offre-card swiper-slide">
            <div class="offre-type"><?php esc_html($term->name) ?></div>
            <div class="offre-details">
              <span class="offre-title"><?php echo esc_html($title); ?></span>
              <span class="offre-description"><?php echo esc_html($description); ?></span>
            </div>
          </div>
        </div>
        <?php
        endwhile;
        wp_reset_postdata();
      else:
        echo '<p>No services found</p>';
      endif;
    }
  }
      ?>
    </div>
    <a href="#" class="btn voir-offres">Voir toutes les offres</a>
  </section>






















  <?php
    function get_actualities_types()
    {
      // Fetch all terms from the 'actualites_category' taxonomy
      $terms = get_terms(array(
        'taxonomy' => 'actualites_category', // The taxonomy name
        'hide_empty' => false,        // Show all terms including those not assigned to any posts
      ));

      // Check if there is no error and return the terms, otherwise return an empty array
      if (!is_wp_error($terms)) {
        return $terms;
      } else {
        return array();
      }
    }

    // Get the actualites category
    $types = get_actualities_types();

    foreach ($types as $term) {
      // Query for the custom post type 'offers' with the current offer type
      $args = array(
        'post_type' => 'actualites',
        'posts_per_page' => -1, // Show all offers
        'tax_query' => array(
          array(
            'taxonomy' => 'actualites_category',
            'field' => 'term_id',
            'terms' => $term->term_id,
          ),
        ),
      );
    }

    $query = new WP_Query($args);
    ?>

    <div class="actualites-swiper <?php echo esc_attr($term->name); ?> swiper">

      <div class="actualites-swiper-wrapper swiper-wrapper">
        <?php

        while ($query->have_posts()):
          $query->the_post();
          $title = get_the_title();
          $icon = get_the_post_thumbnail_url(get_the_ID(), 'full');
          $description = get_the_excerpt(); // Use excerpt instead of content for brevity
          ?>

          <div class="actualite-card swiper-slide">
            <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>">
            <div class="actualite-content">
              <span class="date">Published in Insight<?php echo get_the_date(' M d, Y'); ?></span>
              <h3><?php echo esc_html($title); ?></h3>
              <p><?php echo esc_html($description); ?></p>
            </div>
          </div>
          
          <?php
        endwhile;
        ?>
      </div>

      <div class="swiper-actualites-controls">
        <div class="swiper-actualites-prev <?php echo esc_attr($term->slug); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prev-icon.svg" alt="Previous">
        </div>
        <div class="swiper-actualites-next <?php echo esc_attr($term->slug); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/next-icon.svg" alt="Next">
        </div>
      </div>

      <?php
      wp_reset_postdata();

      ?>
    </div>

  </section>
