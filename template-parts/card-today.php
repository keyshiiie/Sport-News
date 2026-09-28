<?php
/**
 * Шаблон карточки "Today"
 * Используется в Hero-секции
 */
?>

<article class="today-card">
    <a href="<?php the_permalink(); ?>" class="today-link">
        <div class="today-thumb">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'medium_large' ); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="">
            <?php endif; ?>
        </div>
        <div class="today-info">
            <span class="today-meta">
                <?php
                $cat = get_the_category();
                if ( $cat ) {
                    echo esc_html( $cat[0]->name ) . ' - ';
                }
                echo get_the_date( 'd M Y' );
                ?>
            </span>
            <h3 class="today-title"><?php the_title(); ?></h3>
        </div>
    </a>
</article>