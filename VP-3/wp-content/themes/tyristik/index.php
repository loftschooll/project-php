<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tyristik
 */

get_header(); ?>

<div class="main-content">
    <div class="content-wrapper">
        <div class="content">
            <h1 class="title-page">Последние новости и акции из мира туризма</h1>
            <div class="posts-list">
                <?php if (have_posts()) { while(have_posts()) { the_post(); ?>
                <div class="post-wrap">
                    <div class="post-thumbnail">
                        <div class="post-thumbnail__image"><?php the_post_thumbnail('post_thumb'); ?></div>
                    </div>
                    <div class="post-content">
                        <div class="post-content__post-info">
                            <div class="post-date"><?php echo the_time('F jS, Y'); ?></div>
                            <div class="post-date"><?php the_category( $separator = '/', ''); ?></div>
                            <span class="categories"><?php the_tags('', '/'); ?></span>
                        </div>
                        <div class="post-content__post-text">
                            <div class="post-title">
                                <a class="post_title-text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                        <div class="post-content__post-control">
                            <a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_next' => true,
                        'prev_text' => __('<<'),
                        'next_text' => __('>>'),
                    )); ?>
                <?php } ?>
            </div>
        </div>
        <!-- sidebar-->
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
