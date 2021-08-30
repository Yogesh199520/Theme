<?php 
$heading = get_field('page_title');
if(!empty($heading)):
    $title = $heading;
else:
    $title = get_the_title();
endif; 
?>
<div class="inner-hero-container d-flex align-items-center justify-content-center">
    <div class="inner-hero-content d-flex flex-column align-items-center">
        <div class="inner-hero-icon"><img src="<?php echo IMG.'inner-hero-graphics.svg'; ?>" alt="inner-hero-graphics" /></div>
        <h1><?php echo $title; ?></h1>
    </div>
</div>