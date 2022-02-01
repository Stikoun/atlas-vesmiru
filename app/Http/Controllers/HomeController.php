<?php

namespace App\Http\Controllers;

use Timber\Timber;

class HomeController
{
    /**
     * Display the page
     * 
     * @return Timber\Timber
     */
    public static function index() 
    {
        $context = Timber::context_global();
        $context['acf'] = get_fields();
        
        bdump($context);

        Timber::render('pages/home.twig', $context);
    }   

}
