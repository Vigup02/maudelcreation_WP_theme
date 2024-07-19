<?php get_header(); ?>

<div class="category">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="category__img">
            <?php 
            $category_img_url = get_field('category_img'); 
            if ($category_img_url) {
                echo '<img src="' . esc_url($category_img_url) . '" alt="' . esc_attr(get_field('category_title')) . '">';
            } else {
                echo '<p>Image not found.</p>';
            }
            ?>
        </div>
        <div class="category__content">
            <h2>
                <?php the_title(); ?>
            </h2>
            <ul class="category__content_list">
                <?php 
                $fields = [
                    'category_theme' => 'Thème : ',
                    'category_couleur' => 'Couleur : ',
                    'category_taille' => 'Taille : ',
                    'category_prix' => 'Prix : '
                ];

                foreach ($fields as $field => $label) {
                    $value = get_field($field);
                    if ($value) {
                        echo '<li><span class="label">' . esc_html($label) . '</span><span class="value">' . esc_html($value) . '</span></li>';
                    } else {
                        echo '<li><span class="label">' . esc_html($label) . '</span><span class="value">non trouvé.</span></li>';
                    }
                }
                ?>
            </ul>
        </div>
    <?php endwhile; else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>