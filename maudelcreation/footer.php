<?php wp_footer(); ?>

<footer class="footer">
        <div class="footer__navigation">
            <p class ="footer__navigation_text">Navigation</p>
            <nav class="footer__navigation_navbar">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_class'     => 'footer__navigation_navbar_footer-menu',
                            'container'      => 'nav',
                        )
                    );
                ?>
            </nav>
        </div>


    <div class="footer_social">
        <?php
        $reseau_social_1 = get_field('Footer_reseau_social_1', 'option');
        $reseau_social_2 = get_field('Footer_reseau_social_2', 'option');
        
        if ($reseau_social_1) {
            echo '<a href="https://www.facebook.com/">' . $reseau_social_1 . '</a>';
        }
        if ($reseau_social_2) {
            echo '<a href="https://www.instagram.com/">' . $reseau_social_2 . '</a>';
        }
        ?>
    </div>
    <div class="footer_privacy_policy">
        <?php
        $privacy_policy_link = get_field('Footer_politique', 'option');
        if ($privacy_policy_link) {
            echo '<a href="' . esc_url($privacy_policy_link['url']) . '">' . esc_html($privacy_policy_link['title']) . '</a>';
        }
        ?>
    </div>
</footer>

</body>
</html>