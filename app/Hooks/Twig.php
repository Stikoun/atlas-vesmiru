<?php

/*
|--------------------------------------------------------------------------
| Extending Timber Twig
|--------------------------------------------------------------------------
|
| You can extend Twig by adding custom functionality like functions or filters.
| Timber provides its own classes (Timber\Twig_Function and Timber\Twig_Filter)
| to provide better compatibility with different versions of Twig.
|
 */

use Twig\TwigFunction;

/**
 * Extends functions
 */
add_filter('timber/twig', function (\Twig\Environment $twig) {
    $twig->addFunction(new TwigFunction('asset', 'dh_get_asset'));
    $twig->addFunction(new TwigFunction('svg', 'dh_svg'));
    $twig->addFunction(new TwigFunction('bdump', 'bdump'));

    return $twig;
});

/**
 * Adds custom information for Timber context access
 */
add_filter('timber/context', function($data) {
    $data['is_home'] = is_home();
    $data['is_single'] = is_single();
    $data['is_404'] = is_404();
    $data['navigation'] = [
        'primary' => Timber::get_menu('primary'),
        'footer' => Timber::get_menu('footer')
    ];
    
    return $data;
});


