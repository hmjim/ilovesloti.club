<?php get_header(); ?>
					<div class="content col-lg-push-3 col-lg-9 col-md-push-3 col-md-9 ">


						<div class="bg-purple block">
							<h1 class="mb20">Новости</h1>

							<ul class="widget-news">
								<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
								<li>
									<div class="widget-date"><?php the_time( 'j F Y' ); ?></div>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li>
								<?php wp_reset_postdata() ?>
								<?php endwhile;
								else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>
							</ul>

						</div>

						<div class="pagination">
							<?php pagination(); ?>
						</div>

					</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>