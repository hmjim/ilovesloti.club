<?php get_header(); ?>

<div class="content col-lg-push-3 col-lg-9 col-md-push-3 col-md-9 ">

    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		<?php if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		} ?>
    </div>

    <h1>Игровой автомат <?php the_title(); ?></h1>
    <div class="casino-rate">
        <!-- <span class="text-descr">Рейтинг </span> -->
        <div class="stars clearfix">
			<?php if ( function_exists( "kk_star_ratings" ) ) : echo kk_star_ratings( $pid ); endif; ?>
        </div>
    </div>

    <div class="content-block">
        <div class="row">

            <div class="col-lg-9">
                <div class="main-game">
                    <div class="main-game-frame">
                        <iframe src="<?php the_field( 'iframe' ) ?>" width="100%" height="477"></iframe>
                    </div>
                    <a href="<?php the_field( 'home_link' ) ?>" class="btn btn-green btn-fullwidth"><i class="fa fa-usd"
                                                                                                       aria-hidden="true"></i>
                        Играть на деньги</a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="similar-games">

                    <div class="similar-text">Похожие игры</div>

                    <div class="owl-carousel similar-carousel">

						<?php
						$counter   = 0;
						$exclude   = array();
						$exclude[] = get_the_id();
						$posts     = get_posts( array(
							'numberposts'  => 9,
							'post_type'    => 'post',
							'post__not_in' => $exclude
						) );
						foreach ( $posts as $post ) {
							setup_postdata( $post ); ?>

							<?php if ( $counter == 0 OR $counter % 3 == 0 ): ?>
                                <div class="item">
							<?php endif; ?>

                            <div class="casino-item">
                                <div class="casino-icon">
									<?php
									$output_html_curr_link_img2 = get_the_post_thumbnail_url( $post->ID );
									$output_html_curr_link_img2 = str_replace( 'https://ilovezlotizz.nw.r.appspot.com/wp-content/uploads/', '//2ilovesloti.com/wp-content/uploads/', $output_html_curr_link_img2 );
									?>
                                    <img src="<?php echo $output_html_curr_link_img2; ?>">
                                    <div class="casino-btns">
                                        <a href="<?php the_field( 'home_link' ); ?>">Играть на деньги</a>
                                        <a href="<?php the_permalink(); ?>">Играть бесплатно</a>
                                    </div>
                                </div>
                                <div class="casino-name"><?php the_title(); ?></div>
                            </div>

							<?php $counter ++;
							if ( $counter == 3 OR $counter % 3 == 0 ): ?>
                                </div><!-- итем -->
							<?php endif; ?>

						<?php }
						wp_reset_postdata(); ?>
						<?php if ( ! ( count( $posts ) % 3 == 0 ) ): ?>
                    </div>
					<?php endif; ?>

                </div> <!-- каруселья -->

            </div><!-- похожие игры -->
        </div>

    </div>
</div>

<div class="bg-purple block">
	<?php the_content(); ?>
    <script type="text/javascript">(
			function() {
				if ( window.pluso ) {
					if ( typeof window.pluso.start == 'function' ) {
						return;
					}
				}
				if ( window.ifpluso == undefined ) {
					window.ifpluso = 1;
					var d = document, s = d.createElement( 'script' ), g = 'getElementsByTagName';
					s.type = 'text/javascript';
					s.charset = 'UTF-8';
					s.async = true;
					s.src = (
						        'https:' == window.location.protocol ? 'https' : 'http'
					        ) + '://share.pluso.ru/pluso-like.js';
					var h = d[g]( 'body' )[0];
					h.appendChild( s );
				}
			}
		)();</script>
    <div class="pluso" data-background="transparent" data-options="small,square,line,horizontal,counter,theme=01"
         data-services="vkontakte,odnoklassniki,facebook,twitter"></div>
</div>
</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
