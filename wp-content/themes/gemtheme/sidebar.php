<div class="sidebar col-lg-pull-9 col-lg-3 col-md-pull-9 col-md-3">
    <div class="widget widget-pink">
        <div class="widget-title bg-title-pink">Разработчики</div>
        <div class="widget-content">
			<?php $terms                       = get_terms( 'developers' );
			if ( $terms && ! is_wp_error( $terms ) ) {
				echo '<ul class="widget-devs">';
				foreach ( $terms as $term ):
					$image = get_field( 'logo', 'developers_' . $term->term_id );
					$image_data                = get_post( $image );
					$output_html_curr_link_img = wp_get_attachment_image_url( $image, 'full' );
					$output_html_curr_link_img = str_replace( 'https://ilovezlotizz.nw.r.appspot.com/wp-content/uploads/', '//2ilovesloti.com/wp-content/uploads/', $output_html_curr_link_img );
					//print '<pre>';
					//var_dump($output_html_curr_link_img);
					//var_dump($image);
					//print '</pre>';
					?>

                    <li>
                        <a href="<?php echo get_term_link( $term->term_id ); ?>">
                            <img src="<?php echo $output_html_curr_link_img; ?>"
                                 title="<?php echo $image_data->post_title; ?>"
                                 alt="<?php echo get_post_meta( $image, '_wp_attachment_image_alt', true ); ?>">
                        </a>
                    </li>
				<?php endforeach; ?>
                </ul>
			<?php } ?>
        </div>
    </div>

    <div class="widget widget-green">
        <div class="widget-title bg-title-green">Выигрывают</div>
        <div class="widget-content">
            <ul class="widget-wins">
				<?php $args = array( 'posts_per_page' => 5, 'orderby' => 'rand' );
				$rand_posts = get_posts( $args );
				foreach ( $rand_posts as $post ) {
					$output_html_curr_link_img2 = get_the_post_thumbnail_url( $post->ID );
					$output_html_curr_link_img2 = str_replace( 'https://ilovezlotizz.nw.r.appspot.com/wp-content/uploads/', '//2ilovesloti.com/wp-content/uploads/', $output_html_curr_link_img2 );
					//print '<pre>';
					//var_dump($output_html_curr_link_img2);
					//var_dump($post->ID);
					//print '</pre>';
					?>
                    <li>
                        <div class="wins-item">
                            <div class="wins-icon">
                                <a href="<?php the_permalink(); ?>"><img
                                            src="<?php echo $output_html_curr_link_img2; ?>"></a>
                            </div>
                            <div class="wins-descr">
                                <div><?php the_title(); ?></div>
                                <div><span>$ </span><?php echo $random_number = mt_rand( 200, 900 ); ?></div>
                            </div>
                        </div>
                    </li>
				<?php } ?>
				<?php wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>

    <div class="widget widget-blue">
        <div class="widget-title bg-title-blue">Новости</div>
        <div class="widget-content">
            <ul class="widget-news">
				<?php $args = array( 'posts_per_page' => 5, 'post_type' => 'game_news' );
				$rand_posts = get_posts( $args );
				foreach ( $rand_posts as $post ) : ?>
                    <li>
                        <div class="widget-date"><?php the_time( 'j F Y' ); ?></div>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
				<?php endforeach; ?>
				<?php wp_reset_postdata() ?>
                <li>
                    <a href="/game_news">Все новости</a>
                </li>
            </ul>
        </div>
    </div>

</div>