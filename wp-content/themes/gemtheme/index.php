<?php get_header(); ?>
    <div class="content col-lg-push-3 col-lg-9 col-md-push-3 col-md-9 ">

        <h1>Играть в онлайн в казино на деньги</h1>
        <div class="text-descr">Подборка самых популярных слотов России</div>

        <div class="casino-items">
            <div class="row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="casino-item">
                            <div class="casino-icon">
								<?php
								$output_html_curr_link_img = get_the_post_thumbnail_url();
								$output_html_curr_link_img = str_replace( 'https://ilovezlotizz.nw.r.appspot.com/wp-content/uploads/', '//2ilovesloti.com/wp-content/uploads/', $output_html_curr_link_img );
								?>
                                <img src="<?php echo $output_html_curr_link_img; ?>"
                                     title="Игровой автомат <?php the_title(); ?>">
                                <div class="casino-btns">
                                    <a href="<?php the_field( 'home_link' ) ?>"
                                       title="Играть в <?php the_title(); ?> на деньги">Играть на деньги</a>
                                    <a href="<?php the_permalink(); ?>" title="Играть в <?php the_title(); ?>">Играть
                                        бесплатно</a>
                                </div>
                            </div>
                            <div class="casino-rate">
                                <span class="text-descr">Рейтинг</span>
                                <div class="stars clearfix">
									<?php if ( function_exists( "kk_star_ratings" ) ) : echo kk_star_ratings( $pid ); endif; ?>
                                </div>
                            </div>
                            <div class="casino-name"><?php the_title(); ?></div>
                        </div>
                    </div>
				<?php endwhile;
				else: echo '<div class="h2">Нет записей.</div>'; endif; ?>

            </div>
        </div>

        <div class="pagination">
			<?php pagination(); ?>
        </div>

        <div class="bg-purple block">
			<?php the_field( 'main_text', 'option' ) ?>
        </div>

    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>