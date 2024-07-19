<?php get_header(); ?>

<div class="hero">
    <img class="imgback" src="<?php echo esc_url(get_field('home__hero_imgback')); ?>" alt="Hero Image">
    <div class="hero__content">
        <h1 class="hero__content_title"><?php echo wp_kses_post ( get_field('home__hero_titre')); ?></h1>
        <div class="hero__content_subtitles">
            <?php if (have_rows('home__hero_subtitle')) : ?>
                <?php while (have_rows('home__hero_subtitle')) : the_row(); ?>
                <div class="hero__content_subtitles_item">
                    <?php if ($caracteristique = get_sub_field('caracteristique')) : ?>
                        <p class="hero__content_subtitles_item_caracteristique"><?php echo esc_html($caracteristique); ?></p>
                    <?php endif; ?>
                    <?php if ($icon = get_sub_field('icon')) : ?>
                        <img class="hero__content_subtitles_item_icon" src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($caracteristique); ?>">
                    <?php endif; ?>
                    <?php if ($contenu = get_sub_field('contenu')) : ?>
                        <p class="hero__content_subtitles_item_contenu"><?php echo esc_html($contenu); ?></p>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="hero__content_subtitles">Aucune donnée disponible</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container-macrame">
    <div class="container-macrame__content">
        <div class="container-macrame__content_txt">
            <h2><?php echo wp_kses_post ( get_field('home__macrame_title')); ?></h2>
            <p><?php echo wp_kses_post ( get_field('home__macrame_txt')); ?></p>
            <?php $lien_bouton = get_field('home__macrame_bouton');
            if ($lien_bouton) {
                $titre_bouton = esc_html($lien_bouton['title']);
                $url_bouton = esc_url($lien_bouton['url']); 
                echo '<button class="container-macrame__content_txt_bouton1" onclick="window.location.href=\'' . $url_bouton . '\'">' . esc_html($titre_bouton) . '</button>';
            }
            ?>
        </div>        
        <img class="container-macrame__content_img" src="<?php echo esc_url(get_field('home__macrame_img')); ?>" alt="Macrame Image">
    </div>   
</div>

<div class="container-toile">
    <div class="container-toile__content">
        <img class="container-toile__content_img" src="<?php echo esc_url(get_field('home__toile_img')); ?>" alt="Toile Image">
        <div class="container-toile__content_txt">
            <h2><?php echo wp_kses_post ( get_field('home__toile_title')); ?></h2>
            <p><?php echo wp_kses_post ( get_field('home__toile_txt')); ?></p>
            <?php $lien_bouton = get_field('home__toile_bouton');
            if ($lien_bouton) {
                $titre_bouton = esc_html($lien_bouton['title']);
                $url_bouton = esc_url($lien_bouton['url']); 
                echo '<button class="container-toile__content_txt_bouton2" onclick="window.location.href=\'' . $url_bouton . '\'">' . esc_html($titre_bouton) . '</button>';
            }
            ?>
        </div>
    </div>   
</div>
<div class="container-articles">
    <h2>Découvrez nos articles à la une</h2>
    <div class="container-articles_list">
        <?php
        $recent_posts = new WP_Query(array(
            'posts_per_page' => 4,
            'post_type' => 'post',
            'post_status' => 'publish'
        ));
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="container-articles_list_item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="container-articles_list_item_thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('custom-thumb'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <h3 class="container-articles_list_item_title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="container-articles_list_item_excerpt">
                        <?php 
                        $excerpt = get_the_excerpt(); 
                        echo '<p>' . truncate_text($excerpt, 150) . '</p>'; // Tronquer le texte à 150 caractères
                        ?>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p>Aucun article trouvé.</p>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>