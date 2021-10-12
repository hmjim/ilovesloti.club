				</div>
			</div>

			<footer class="footer">
				<div class="nav-line">
					<div class="container">
						<div class="row">

							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
								<div class="logo">
									<div class="logo-img-wr">
										<a href="/"><img class="logo-image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="ilovesloti - Игровые автоматы онлайн"></a>
									</div>
									<div class="logo-text">Автоматы и казино Рунета</div>
								</div>
							</div>

							<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
								<nav class="menu">
									<?php wp_nav_menu( array(
										'theme_location' => 'bottom',
										'walker' => new Nav_Walker_Nav_Menu() )
										);
									?>
								</nav>
							</div>

						</div>
					</div>
				</div>

				<div class="container"><div class="divider"></div></div>

				<div class="footer-bottom">
					<div class="container">
						<div class="row">
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
								<div class="footer-text">Все права защищены &copy; <?= date('Y') ?> <?= str_replace('https://', '/', $_SERVER['HTTP_HOST'])?></div>
							</div>
							
						</div>
					</div>
				</div>
			</footer>

		</div>
	</div>
	<?php wp_footer(); ?>

</body>
</html>