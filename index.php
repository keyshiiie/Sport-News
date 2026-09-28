<?php
get_header();
?>

<div class="container">
    <h1>Latest News</h1>
    <?php if ( have_posts() ) : ?>
        <div class="posts-grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="post-item">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-excerpt"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<?php
get_footer();
?>