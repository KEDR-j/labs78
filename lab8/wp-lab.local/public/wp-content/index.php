<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/mobile-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
    <header>
        <img src="<?php echo get_template_directory_uri(); ?>/horizontal-logo.png" alt="Old Gamers" style="width: 20%; height: auto;">
    </header>
    <nav>
        <?php wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container' => 'ul',
            'menu_class' => 'nav-links'
        )); ?>
    </nav>
    <div class="content">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <article>
                        <h2><?php the_title(); ?></h2>
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        } ?>
                        <p><?php the_excerpt(); ?></p>
                    </article>
                </a>
            <?php endwhile;
        endif;
        ?>
    </div>
    <footer>
        <div class="icon">FB</div>
        <div class="icon">TW</div>
        <div class="icon">IG</div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
