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
    <style>
        body {
            margin: 0;
            background-color: #FFF;
            font-family: "Noto Sans", serif;
        }
        header {
            background-color: #333; /* цвет заголовка */
            text-align: center;
            color: #FFF;
            margin-right: auto;
        }
        nav {
            background-color: #333; /* цвет навигации */
            padding: 1px;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }
        .content a {
            text-decoration: none;
            color: rgb(24, 22, 22);
            flex: 1 1 calc(50% - 40px); /* Делаем блоки одинаковой ширины с учетом промежутка */
            box-sizing: border-box;
        }
        .single-post a {
            flex: 1 1 100%; /* Если один пост, он занимает всю ширину */
        }
        .box, article {
            background-color: #EEE; /* светло-серый для контента */
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%; /* Делаем блоки одинаковой высоты */
        }
        article img {
            max-width: 100%;
            height: auto; /* Сохраняет пропорции изображения */
            display: block; /* Убедимся, что изображение отображается как блок */
            margin-left: auto; /* Центрирование изображения */
            margin-right: auto; /* Центрирование изображения */
        }
        @media (max-width: 768px) {
            .content a {
                flex: 1 1 100%; /* Один столбец на маленьких экранах */
            }
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            clear: both;
            width: 100%;
            position: relative;
            bottom: 0;
        }
        footer .icon {
    display: inline-block;
    background-color: #FF7F00;
    padding: 10px; /* Увеличивает размер иконки в зависимости от текста */
    border-radius: 50%;
    margin: 0 10px;
    font-size: 20px;
    color: white;
    text-align: center; /* Центрирует текст внутри иконки */
    vertical-align: middle; /* Центрирует иконки по вертикали с текстом */
}

    </style>
</head>
<body>
    <header>
        <a href="/public"> 
            <img src="<?php echo get_template_directory_uri(); ?>/horizontal-logo.png" alt="Old Gamers" style="width: 20%; height: auto;">
        </a>
    </header>
    <nav>
        <?php wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container' => 'ul',
            'menu_class' => 'nav-links'
        )); ?>
    </nav>
    <div class="content <?php echo (have_posts() && $wp_query->post_count == 1) ? 'single-post' : ''; ?>">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <article>
                        <h2><?php the_title(); ?></h2>
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('full', array('style' => 'width: 100%; height: auto;'));
                        } ?>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </a>
            <?php endwhile;
        endif;
        ?>
    </div>
    <footer>
        <a href="#" class="icon">FB</a>
        <a href="#" class="icon">TW</a>
        <a href="#" class="icon">IG</a>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
