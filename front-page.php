<?php
/*
Template Name: Front Page
*/
get_header();

// Запрос записей с галочкой "Today"
$today_query = new WP_Query( array(
    'posts_per_page'      => 2,
    'meta_query'          => array(
        array(
            'key'     => 'today',
            'value'   => 'yes',
            'compare' => '=',
        ),
    ),
    'ignore_sticky_posts' => 1,
) );

// Если ничего не нашлось — fallback на свежие записи
if ( ! $today_query->have_posts() ) {
    $today_query = new WP_Query( array(
        'posts_per_page'      => 2,
        'date_query'          => array(
            array( 'after' => '7 days ago' ),
        ),
        'ignore_sticky_posts' => 1,
    ) );
}
?>

<section id="home" class="hero-section">
    <div class="container hero-grid">

        <!-- ЛЕВАЯ КОЛОНКА: Главный баннер (статика) -->
        <div class="hero-main">
            <div class="hero-banner">

                <div class="hero-ball" aria-hidden="true">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-basketball.svg" alt="">
                </div>

                <div class="hero-player" aria-hidden="true">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/basketball-player.svg" alt="">
                </div>

                <div class="hero-content">
                    <h1 class="hero-title">Top scorer to the final match</h1>
                    <div class="hero-cta">
                        <p class="hero-excerpt">
                            The EuroLeague Finals Top Scorer is the individual award
                            for the player that gained the highest points in the EuroLeague Finals
                        </p>
                        <a href="#" class="btn-continue">Continue Reading</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- ПРАВАЯ КОЛОНКА: Today (из админки) -->
        <aside class="hero-sidebar">
            <div class="section-title">Today</div>

            <?php if ( $today_query->have_posts() ) : ?>
                <?php while ( $today_query->have_posts() ) : $today_query->the_post(); ?>
                    <?php get_template_part( 'template-parts/card', 'today' ); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="today-empty">Пока нет записей на сегодня</p>
            <?php endif; ?>
        </aside>

    </div>
</section>

<section id="сategories" class="category-section">
    
</section>

<?php get_footer(); ?>