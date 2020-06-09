<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tyristik
 */

get_header();
?>

    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <?php if (have_posts()) { while(have_posts()) { the_post(); ?>
                    <div class="article-title title-page"><?php the_title(); ?></div>
                    <div class="article-image"><?php the_post_thumbnail('post_thumb-single'); ?></div>
                    <div class="article-info">
                        <div class="post-date"><?php echo the_time('F jS, Y'); ?></div>
                        <span class="categories">
                        <?php the_tags('', ' /'); ?>
                    </span>
                    </div>
                    <div class="article-text">
                        <p><?php the_content(); ?></p>
                    </div>
                <?php } ?>
                <?php } ?>
                <?php $prev = get_previous_post(); ?>
                <?php $next = get_next_post(); ?>
                <div class="article-pagination">
                    <div class="article-pagination__block pagination-prev-left">
                        <?php if ($prev): ?>
                            <a href="<?php the_permalink($prev->ID); ?>" class="article-pagination__link">
                                <i class="icon icon-angle-double-left"></i>Предыдущая статья
                            </a>
                            <div class="wrap-pagination-preview pagination-prev-left">
                                <div class="preview-article__img">
                                    <img src="<?php echo get_the_post_thumbnail_url($prev->ID) ?>" class="preview-article__image">
                                </div>
                                <div class="preview-article__content">
                                    <div class="preview-article__info">
                                        <a href="<?php the_permalink($prev->ID); ?>" class="post-date"><?php echo date('d.m.Y', strtotime($prev->post_date)); ?></a>
                                    </div>
                                    <div class="preview-article__text"><?php echo $prev->post_title; ?></div>
                                </div>
                            </div>
                        <? endif ?>
                    </div>
                    <div class="article-pagination__block pagination-prev-right">
                        <?php if ($next): ?>
                            <a href="<?php the_permalink($next->ID); ?>" class="article-pagination__link">Сдедующая статья
                                <i class="icon icon-angle-double-right"></i>
                            </a>
                            <div class="wrap-pagination-preview pagination-prev-right">
                                <div class="preview-article__img">
                                    <img src="<?php echo get_the_post_thumbnail_url($next->ID) ?>" class="preview-article__image">
                                </div>
                                <div class="preview-article__content">
                                    <div class="preview-article__info">
                                        <a href="<?php the_permalink($next->ID); ?>" class="post-date"><?php echo date('d.m.Y', strtotime($prev->post_date)); ?></a></div>
                                    <div class="preview-article__text"><?php echo $next->post_title; ?></div>
                                </div>
                            </div>
                        <? endif ?>
                    </div>
                </div>
            </div>
            <!-- sidebar-->
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php
get_sidebar();
get_footer();
