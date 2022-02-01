<?php

namespace App\Http\Controllers;

use Timber\Timber;

class PageController
{
    /**
     * Display the page
     * 
     * @return Timber\Timber
     */
    public static function index() 
    {
        $context = Timber::context_global();
        $context['page'] = Timber::get_post();
        $context['acf'] = get_fields();

        bdump($context);

        if ($context["page"]->post_name == "knihy")
            Timber::render('pages/books.twig', $context);
        elseif ($context["page"]->post_name == "kolekce")
            Timber::render('pages/collection.twig', $context);
        elseif ($context["page"]->post_name == "casto-kladene-otazky")
            Timber::render('pages/faq.twig', $context);
        elseif ($context["is_404"])
            Timber::render('404.twig', $context);
        else {
            Timber::render('page.twig', $context);
        }
    }   

}