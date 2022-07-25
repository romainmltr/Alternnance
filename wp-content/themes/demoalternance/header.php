<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DemoAlternance
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <div id="page" class="site">
        <div class="AccueilNav">
            <img class="logoAccueil" src="http://localhost/AlternancePage/wp-content/uploads/2022/07/Logo-1.png">
                <nav class="wp-Alternance">
                    <a><li>À propos</li></a>
                    <a><li>Notre approche</li></a>
                    <a><li>Notre offre</li></a>
                    <a><li>Nos réalisations</li></a>
                    <a><li>Contact</li></a>
                </nav>
        </div>
    </div>

</div>

