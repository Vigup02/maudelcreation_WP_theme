<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>    
</head>
<body <?php body_class('body'); ?>>
    <header class="header">
        <div class="header_logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/images/default-logo.png" alt="' . esc_attr(get_bloginfo('name')) . '">';
                }
                ?>
            </a>
        </div>
        
        <?php wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container' => 'nav',
            'container_class' => 'header_menu',
            'menu_class' => 'listemenu'
        ));
        ?>
    </header>