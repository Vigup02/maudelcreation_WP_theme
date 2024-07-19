<?php get_header(); ?>

<div class="typedeco-container">
    <?php 
    $term = get_queried_object(); // Récupérer l'objet de la taxonomie courante
    ?>
    <h1><?php single_term_title(); ?></h1>  

    <?php if (have_rows('type_galerie', $term)) : ?>
        <?php while (have_rows('type_galerie', $term)) : the_row(); ?>
            <div class="typedeco-item">
                <?php
                $image = get_sub_field('type_galerie_img');
                $title = get_sub_field('type_galerie_intitule');
                $price = get_sub_field('type_galerie_prix');
                ?>
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="typedeco-image">
                <?php endif; ?>
                <div class="typedeco-details">
                    <?php if ($title) : ?>
                        <h2 class="typedeco-title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                    <?php if ($price) : ?>
                        <p class="typedeco-price"><?php echo esc_html($price); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e('Aucun élément trouvé dans cette catégorie.', 'text-domain'); ?></p>
    <?php endif; ?>
</div>


<?php get_footer(); ?>