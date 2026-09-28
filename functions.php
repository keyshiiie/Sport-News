<?php
// functions.php

if ( ! function_exists( 'my_sport_theme_setup' ) ) :
    function my_sport_theme_setup() {
        // Добавляем поддержку <title>
        add_theme_support( 'title-tag' );
        
        // Добавляем поддержку миниатюр
        add_theme_support( 'post-thumbnails' );

        // Регистрируем меню
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'my-sport-theme' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'my_sport_theme_setup' );

// Подключение стилей и скриптов
function my_sport_theme_scripts() {
    // 1. Шрифты (загружаются первыми)
    wp_enqueue_style(
        'my-sport-fonts',
        get_template_directory_uri() . '/assets/css/fonts.css',
        array(),
        '1.0'
    );

    // 2. Мета-информация темы
    wp_enqueue_style(
        'my-sport-style',
        get_stylesheet_uri(),
        array('my-sport-fonts'),
        '1.0'
    );

    // 3. Общие стили
    wp_enqueue_style(
        'my-sport-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('my-sport-fonts'),
        '1.0'
    );

    // 4. Стили хедера (зависит от main.css)
    wp_enqueue_style(
        'my-sport-header',
        get_template_directory_uri() . '/assets/css/header.css',
        array('my-sport-main'),
        '1.0'
    );

    // Стили Hero
    wp_enqueue_style(
        'my-sport-hero',
        get_template_directory_uri() . '/assets/css/hero.css',
        array('my-sport-main'),
        '1.0'
    );

    // 5. JS
    wp_enqueue_script(
        'my-sport-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'my_sport_theme_scripts' );
