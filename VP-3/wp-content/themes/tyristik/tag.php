<?php
/*
 *
 */
get_header();
?>

<div class="main-content">
    <div class="content-wrapper">
        <div class="content">
            <h1 class="title-page">Тег: <?php the_tags('', ' /'); ?></h1>
            <div class="posts-list">
                <?php if (have_posts()) { while(have_posts()) { the_post(); ?>
                    <div class="post-wrap">
                        <div class="post-thumbnail">
                            <div class="post-thumbnail__image"><?php the_post_thumbnail('post_thumb'); ?></div>
                        </div>
                        <div class="post-content">
                            <div class="post-content__post-info">
                                <div class="post-date"><?php echo the_time('F jS, Y'); ?></div>
                                <span class="categories">
                                        <?php the_tags('', ' /'); ?>
                                    </span>
                            </div>
                            <div class="post-content__post-text">
                                <div class="post-title">
                                    <a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <p><?php the_content(); ?></p>
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
