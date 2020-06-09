<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package tyristik
 */

 get_header(); ?>

<div class="main-content">
    <div class="content-wrapper">
        <div class="content">
            <h1 class="title-page">Поиск по: "<?php echo $_GET['s'];?>"</h1>
            <div class="posts-list">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                <?php endwhile; else: ?>
                    <p>Поиск не дал результатов.</p>
                <?php endif;?>
            </div>
        </div>
        <!-- sidebar-->
        <?php get_sidebar(); ?>
    </div>
</div>

 <?php get_footer(); ?>
