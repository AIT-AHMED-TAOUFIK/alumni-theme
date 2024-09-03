<!-- ################################ -->
<!-- partenaires section & footer-->
<!-- ################################ -->
<footer>
    <section class="partenaires">
        <h2>Partenaires</h2>
        <div class="partners-logos">
            <img class="attijari" src="<?php echo get_template_directory_uri(); ?>/assets/images/attijari.png" alt="Attijari">
            <img class="fm6e" src="<?php echo get_template_directory_uri(); ?>/assets/images/fm6e.png" alt="fm6e">
        </div>
    </section>
    <hr>

    <section class="footer-content">
        <div class="navbar">
            <div class="nav-left">
                <nav>
                    <ul>
                        <li><a href="#">Qui sommes-nous</a></li>
                        <li><a href="#">Actualités</a></li>
                        <li><a href="#">Evénements</a></li>
                        <li><a href="#">Nos leaders</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="nav-center">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/LOGO.png" alt="Logo" width="193" height="63">
                </a>
            </div>

            <div class="nav-right">
                <a href="#" class="contact-link">Restez en contact</a>
                <form role="search">
                    <input class="form-control" type="search" placeholder="Adresse Email" aria-label="Adresse Email">
                    <button class="btn footer-btn" type="submit">S’inscrire</button>
                </form>
            </div>
        </div>
    </section>


    <section class="footer-bottom">
        <div class="social-media">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/x.png" alt="Twitter"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="Instagram"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" alt="LinkedIn"></a>
        </div>
        <div>
            <p>© <?php echo date("Y"); ?> AIT AHMED TAOUFIK. Tous droits réservés.</p>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>
</body>

</html>