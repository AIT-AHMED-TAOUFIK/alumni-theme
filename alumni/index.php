<?php get_header(); ?>
<?php include('inc/nav.php'); ?>


<main>
  <!-- ################################ -->
  <!-- hero section -->
  <!-- ################################ -->
  <section class="hero">
    <div class="hero-content">
      <h1>Le point de rencontre <br> des leaders</h1>
      <p>Morocco Alumni est une plateforme créée par l'Agence Marocaine de
        Coopération Internationale qui a pour vocation de rassembler les anciens
        étudiants de la coopération du Royaume du Maroc autour d'un réseau
        mondial de lauréats de notre pays.
      </p>
      <a href="#" class="btn rejoindre">Rejoindre la communauté</a>
    </div>
    <div class="hero-image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Aivatar.png" alt="Aivatar">
    </div>
  </section>

  <!-- ################################ -->
  <!-- services section -->
  <!-- ################################ -->
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

  <!-- ################################ -->
  <!-- actualities section -->
  <!-- ################################ -->
  <section class="actualites">
    <h2>Actualités</h2>
    <div class="actualites-categories">
      <button class="category-button selected" onclick="showAllActualites()">Toutes les actualités</button>
      <button class="category-button" onclick="showDivers()">Divers</button>
      <button class="category-button" onclick="showEvenements()">Evénements</button>
      <button class="category-button" onclick="showMonde()">Monde</button>
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
            'field' => 'slug',
            'terms' => $category_slug,
          ),
        ),
      );
      $query = new WP_Query($args);

      if ($query->have_posts()):
        ?>
        <div class="actualites-swiper <?php echo esc_attr($category_slug); ?> swiper"
          style="display: <?php echo ($category_slug === 'toutes-actualites') ? 'block' : 'none'; ?>;">
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



  <!-- ################################ -->
  <!-- offres d'emploi section -->
  <!-- ################################ -->
  <section class="offres-emploi">
    <h2>Offres d'emploi</h2>
    <div class="offres-swiper swiper">
      <div class="swiper-wrapper">
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

        // Get the offer types
        $types = get_offer_types();

        // Begin Swiper wrapper
        

        // Loop through each offer type
        foreach ($types as $term) {
          // Query for the custom post type 'offers' with the current offer type
          $args = array(
            'post_type' => 'offers',
            'posts_per_page' => -1, // Show all offers
            'tax_query' => array(
              array(
                'taxonomy' => 'offer_type',
                'field' => 'term_id',
                'terms' => $term->term_id,
              ),
            ),
          );
          $query = new WP_Query($args);

          if ($query->have_posts()):
            while ($query->have_posts()):
              $query->the_post();
              // Determine the title and description
              $title = get_the_title();
              $description = get_the_content(); // Gets the post content (description)
              ?>


              <div class="offre-card swiper-slide">
                <div class="offre-type"><?php echo esc_html($term->name); ?></div>
                <div class="offre-details">
                  <span class="offre-title"><?php echo esc_html($title); ?></span>
                  <span class="offre-description"><?php echo esc_html($description); ?></span>
                </div>
              </div>


              <?php
            endwhile;
            wp_reset_postdata();
          else:
            echo '<p>No offers found for ' . esc_html($term->name) . '</p>';
          endif;
        }

        // End Swiper wrapper
        ?>
      </div>
    </div>
    <a href="#" class="btn voir-offres">Voir toutes les offres</a>
  </section>



  <!-- ################################ -->
  <!-- chiffres cles section -->
  <!-- ################################ -->
  <section class="chiffres-cles">
    <h2>Chiffres clès</h2>
    <div class="chiffre-content">
      <div class="case-chiffre">
        <span class="chiffre">8,640</span>
        <br>
        <span class="description-chiffre">Etudiants</span>
      </div>
      <div class="case-chiffre">
        <span class="chiffre">40</span>
        <br>
        <span class="description-chiffre">Lauréats inscrits</span>
      </div>
      <div class="case-chiffre">
        <span class="chiffre">40</span>
        <br>
        <span class="description-chiffre">Associations inscrites</span>
      </div>
      <div class="case-chiffre">
        <span class="chiffre">4</span>
        <br>
        <span class="description-chiffre">Partenaires inscrits</span>
      </div>
    </div>
  </section>

  <!-- ################################ -->
  <!-- leaders section -->
  <!-- ################################ -->
  <section class="leaders">
    <div class="leaders-menu">
      <h2>Leaders autour <br> du monde</h2>
      <p>Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</p>
      <div class="swiper-controls">
        <div class="leaders-swiper-btn prev">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prev-icon.svg" alt="Previous">
        </div>
        <div class="leaders-swiper-btn next">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/next-icon.svg" alt="Next">
        </div>
      </div>
    </div>
    <div class="leaders-content">
      <!-- Leader Slider -->
      <div class="swiper leaders-swiper">
        <div class="swiper-wrapper">
          <?php
          // Function to get leaders types and assign them to a variable
          function get_leaders_types()
          {
            // Fetch all terms from the 'leaders_type' taxonomy
            $terms = get_terms(array(
              'taxonomy' => 'leaders_type', // The taxonomy name
              'hide_empty' => false,        // Show all terms including those not assigned to any posts
            ));

            // Check if there is no error and return the terms, otherwise return an empty array
            if (!is_wp_error($terms)) {
              return $terms;
            } else {
              return array();
            }
          }

          // Get the leaders types
          $types = get_leaders_types();


          // Loop through each leaders type
          foreach ($types as $term) {
            // Query for the custom post type 'leaders' with the current leaders type
            $args = array(
              'post_type' => 'leaders',
              'posts_per_page' => -1, // Show all leaders
              'tax_query' => array(
                array(
                  'taxonomy' => 'leaders_type',
                  'field' => 'term_id',
                  'terms' => $term->term_id,
                ),
              ),
            );
            $query = new WP_Query($args);

            if ($query->have_posts()):
              while ($query->have_posts()):
                $query->the_post();
                // Determine the title and image
                $title = get_the_title();
                $icon = get_the_post_thumbnail_url(); // Gets the post image 
                ?>

                <div class="leader-card swiper-slide">
                  <img src="<?php echo esc_html($icon); ?>">
                  <div class="leader-info">
                    <span class="leader-name"><?php echo esc_html($title); ?></span>
                    <span class="leader-position"><?php echo esc_html($term->name); ?></span>
                  </div>
                </div>

                <?php
              endwhile;
              wp_reset_postdata();
            else:
              echo '<p>No leaders found for ' . esc_html($term->name) . '</p>';
            endif;
          }

          ?>
        </div>
      </div>
      <a href="#" class="btn voir-leaders">Voir tous les leaders</a>
    </div>
  </section>

  <!-- ################################ -->
  <!-- Temoignages section -->
  <!-- ################################ -->
  <section class="temoignages">
    <div class="temoignages-menu">
      <h2>Témoignages</h2>
      <div class="swiper-controls">
        <button class="temoignages-swiper-btn prev">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/left-arrow.svg" alt="Previous">
        </button>
        <button class="temoignages-swiper-btn next">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/right-arrow.svg" alt="Next">
        </button>
      </div>
    </div>
    <!-- Temoignages Slider-->
    <div class="swiper temoignages-swiper">
      <div class="swiper-wrapper">


        <?php
        // Function to get temoignages types and assign them to a variable
        function get_temoignages_types()
        {
          // Fetch all terms from the 'temoignages_type' taxonomy
          $terms = get_terms(array(
            'taxonomy' => 'temoignages_type', // The taxonomy name
            'hide_empty' => false,        // Show all terms including those not assigned to any posts
          ));

          // Check if there is no error and return the terms, otherwise return an empty array
          if (!is_wp_error($terms)) {
            return $terms;
          } else {
            return array();
          }
        }

        // Get the leaders types
        $types = get_temoignages_types();


        // Loop through each temoignages type
        foreach ($types as $term) {
          // Query for the custom post type 'temoignages' with the current temoignages type
          $args = array(
            'post_type' => 'temoignages',
            'posts_per_page' => -1, // Show all temoignages
            'tax_query' => array(
              array(
                'taxonomy' => 'temoignages_type',
                'field' => 'term_id',
                'terms' => $term->term_id,
              ),
            ),
          );
          $query = new WP_Query($args);

          if ($query->have_posts()):
            while ($query->have_posts()):
              $query->the_post();
              // Determine the title, image & message
              $title = get_the_title();
              $icon = get_the_post_thumbnail_url(); // Gets the post image 
              $message = get_the_content_feed();
              ?>

              <div class="temoignage-card swiper-slide">
                <blockquote class="author-quote"><?php echo esc_html($message); ?></blockquote>
                <div class="author">
                  <img src="<?php echo esc_html($icon); ?>">
                  <div class="author-info">
                    <span class="author-name"><?php echo esc_html($title); ?></span>
                    <span class="author-position"><?php echo esc_html($term->name); ?></span>
                  </div>
                </div>
              </div>

              <?php
            endwhile;
            wp_reset_postdata();
          else:
            echo '<p>No leaders found for ' . esc_html($term->name) . '</p>';
          endif;
        }

        ?>
      </div>
    </div>
  </section>

  <!-- ################################ -->
  <!-- mediatheque section -->
  <!-- ################################ -->
  <section class="mediatheque">
    <h2>Médiathèque</h2>
    <div class="mediatheque-swiper swiper">
      <div class="swiper-wrapper">

        <?php
        // Query for the custom post type 'mediatheque'
        $args = array(
          'post_type' => 'mediatheque',
          'posts_per_page' => -1 // Show all mediatheque
        );
        $query = new WP_Query($args);

        if ($query->have_posts()):
          while ($query->have_posts()):
            $query->the_post();
            // Determine the class based on the mediatheque title // Get the featured image (icon) and description
            $title = get_the_title();

            $icon = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Gets URL of the featured image
            $content = get_the_content(); // Gets the post content (description)
            // Get the view count for a specific post ID
            $post_id = get_the_ID(); // Get the current post ID in the loop or use a specific post ID
            $views = get_post_meta($post_id, '_post_views_count', true);
            $video_url = get_post_meta($post_id, '_video_url', true);
            ?>

            <div class="video-card swiper-slide">
              <video controls>
                <source src="<?php echo esc_html($video_url); ?>">
                Your browser does not support the video tag.
              </video>
              <div class="video-info">
                <img src="<?php echo esc_html($icon); ?>" class="video-channel-icon">
                <div class="video-meta">
                  <span class="video-title"><?php echo esc_html($title); ?></span>
                  <br>
                  <span class="video-channel"><?php echo esc_html($content); ?></span>
                  <br>
                  <span class="video-stat"><?php echo esc_html($views); ?> views • <?php echo date("H"); ?> hours ago</span>
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
      </div>
    </div>
    <a href="#" class="btn voir-mediatheque">Voir toute la médiathèque</a>
  </section>

</main>
<?php get_footer(); ?>