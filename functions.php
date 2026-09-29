<?php

if (!defined('ABSPATH')) {
    exit;
}

function glenmark_enqueue_site_specific_assets()
{
    $font_css_path = get_stylesheet_directory() . '/site-specific/assets/css/fonts.css';
    $site_specific_dependencies = ['webrev-theme'];

    if (file_exists($font_css_path)) {
        wp_enqueue_style(
            'glenmark-site-specific-fonts',
            get_stylesheet_directory_uri() . '/site-specific/assets/css/fonts.css',
            ['webrev-theme'],
            (string) filemtime($font_css_path)
        );

        $site_specific_dependencies[] = 'glenmark-site-specific-fonts';
    }

    $css_path = get_stylesheet_directory() . '/site-specific/assets/css/site.css';

    if (!file_exists($css_path)) {
        return;
    }

    wp_enqueue_style(
        'glenmark-site-specific',
        get_stylesheet_directory_uri() . '/site-specific/assets/css/site.css',
        $site_specific_dependencies,
        (string) filemtime($css_path)
    );
}
add_action('wp_enqueue_scripts', 'glenmark_enqueue_site_specific_assets', PHP_INT_MAX);
add_action('elementor/frontend/after_enqueue_styles', 'glenmark_enqueue_site_specific_assets');
add_action('elementor/preview/enqueue_styles', 'glenmark_enqueue_site_specific_assets');

function cetalgen_remove_current_classes_from_anchor_menu_items($classes, $menu_item)
{
    $url = isset($menu_item->url) ? (string) $menu_item->url : '';
    $fragment = parse_url($url, PHP_URL_FRAGMENT);

    if (empty($fragment)) {
        return $classes;
    }

    $current_classes = [
        'current-menu-item',
        'current-menu-ancestor',
        'current-menu-parent',
        'current_page_item',
        'current_page_ancestor',
        'current_page_parent',
    ];

    return array_values(array_diff($classes, $current_classes));
}
add_filter('nav_menu_css_class', 'cetalgen_remove_current_classes_from_anchor_menu_items', 20, 2);

function cetalgen_remove_aria_current_from_anchor_menu_items($atts, $menu_item)
{
    $url = isset($menu_item->url) ? (string) $menu_item->url : '';
    $fragment = parse_url($url, PHP_URL_FRAGMENT);

    if (!empty($fragment)) {
        unset($atts['aria-current']);
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'cetalgen_remove_aria_current_from_anchor_menu_items', 20, 2);

function cetalgen_elementor_theme_style_scope()
{
    return '';
}
add_filter('wr-pharma-product/elementor/theme_style_scope', 'cetalgen_elementor_theme_style_scope');

function cetalgen_button_background_inherits_theme_style($element)
{
    $element->update_control('background_color', [
        'default' => '',
        'global' => [
            'default' => '',
        ],
    ], [
        'recursive' => true,
    ]);
}
add_action('elementor/element/button/section_style/before_section_end', 'cetalgen_button_background_inherits_theme_style');
