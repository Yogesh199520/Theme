<?php
/*==============================*/
// @package Paradise
// @author SLICEmyPAGE
/*==============================*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lancaster AV Rock Supply petscape deco ground decomposed granite paradise landscape pebbles sand contractors architects home owners">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();
$logo = get_field('logo','option');
?>
<div id="wrapper">
    <header id="header">
        <div class="container">
            <div class="logo">
                <?php echo '<a href="'.home_url('/').'"><img width="248" height="110" src="'.$logo.'" alt="'.get_bloginfo('name').'" /></a>'; ?>
            </div>
        </div>
    </header>
    
