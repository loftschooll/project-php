<?php
/*
 * Template name: Акции
 */
get_header();

$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$article_args = array('post_type' => 'post', 'category_name'=>'stocks', 'posts_per_page' => 5, 'order'=>'DESC', 'paged' => $current_page); // 10 записей
query_posts( $article_args );
$myposts = get_posts( $article_args ); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(array('class'=>'article-block')); ?>>
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title-page">Акции из мира туризма</h1>
                <div class="posts-list">
                    <?php foreach( $myposts as $post ){ setup_postdata($post); ?>
                        <div class="post-wrap">
                            <div class="post-thumbnail">
                                <div class="post-thumbnail__image">
                                    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'post_thumb'); ?>" alt="">
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="post-content__post-info">
                                    <div class="post-date"><?php echo the_time('F jS, Y'); ?></div>
                                    <div class="post-date"><?php the_category( $separator = '/', ''); ?></div>
                                    <span class="categories"><?php the_tags('', '/'); ?></span>
                                </div>
                                <div class="post-content__post-text">
                                    <div class="post-title">
                                        <a class="post_title-text" href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                                <div class="post-content__post-control">
                                    <a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a>
                                </div>
                            </div>
                            <?php the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_next' => true,
                                'prev_text' => __('<<'),
                                'next_text' => __('>>'),
                            )); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- sidebar-->
            <?php get_sidebar(); ?>
        </div>
    </div>
    <?php
    get_footer(); ?>

