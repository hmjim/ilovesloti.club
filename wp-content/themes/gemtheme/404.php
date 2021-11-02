<?php
/**
 * Страница 404 ошибки (404.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // Подключаем header.php ?>
<section>
<h1>Ой, это 404!</h1>
<p>Ничего страшного! </br> Скорее всего вы ввели неверный адрес страницы. Перейдите на <a href="/">главную</a> и попробуйте снова!</p>
</section>
<?php get_sidebar(); // подключаем sidebar.php ?> 
<?php get_footer(); // подключаем footer.php ?>