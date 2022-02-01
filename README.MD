# WP Starter Theme

## Prvotní instalace

    composer install
    npm install

## Minifikace CSS/JS
Používá se knihovna [Laravel Mix](https://laravel-mix.com/docs/6.0/installation).

Dostupné npm příkazy

    npm run dev/prod/watch
- dev – vytvoří všechny CSS styly pro TailwindCSS (nepoužívat na produkci)
- prod – vyexportuje pouze CSS styly použíté v .twig šablonách. JS minifikuje
- watch – browsersync nastavitelný ve webpack.mix.js

## Úprava CSS
Je použitý framework [TailwindCSS](https://tailwindcss.com/). Tím pádem lze rovnou používat předvytvořené CSS třídy [knihovny TailwindCSS](https://tailwindcss.com/docs) do HTML. 

Šablona má nadefinované vlastní Tailwind Config v souboru [tailwind.config.js](https://github.com/digihive-prague/danfis-hk-site/blob/master/tailwind.config.js). Styly, které případně neexistují, lze definovat v /assets/sass/.

## Úprava JS
Poprosím akorát dodržet strukturu, že se řadí skripta podle použitých knihoven. Preferovat co nejméně jQuery.

## Struktura PHP, MVC
Web je stavěný do MVC struktury, kdy je logika oddělená od vykreslovacích šablon.

### app/Config/
Definované konstanty pro šablonu. V základu obsahuje informace o šabloně, lokalizaci jazyka pro DateScript a podpora pro Nette Tracy.

### app/Extensions/
Různé rozšíření šablony. Převážně Custom Post Types, Taxonomies.. možnost přidat i custom rožšíření.

### app/Http/Controllers/
Logika každé stránky je oddělené podle typu CPT, stránky, tak jak definuje WordPress. V těchto souborech se nastavují všechny PHP funkce tak, aby bylo vše předefinované pro [Timber/Twig](https://github.com/timber/timber), aby se to mohlo už pouze zobrazit.

### app/Http/RestApi/
Logika pro rozšíření šablony o custom Rest API. Je zde vytvořený RestApiController, který lze použít jako extended class. Třídy je poté zapotřebí definovat do functions.php, aby se zavolala při spuštění webu/šablony.

### app/Hooks/
Filtry, action hooks pro WordPress. Zde lze najít i hooks pro Twig.

### app/Support/
Obsahuje dodatečné vlastní knihovny, facades a vše, co může zjednodušit práci. V základu je tu knihovna Image, která vytváří SVG inline soubory nebo podporu SVG v administraci.

### app/Vendor/
Dodatečné knihovny mimo Composer. Je potřeba je doupravit, aby se správně volali ve WordPressu.

### app/Views/
Obsahuje soubory [Timber/Twig](https://github.com/timber/timber). 

## ACF Templating
Je tu vytvořený vlastní jednoduchý modulární systém postavený na [Advanced Custom Fields (ACF)](https://www.advancedcustomfields.com/).

ACF pole se definuje v administraci [(je potřeba si případně zapnout ACF nastavení)](https://github.com/digihive-prague/danfis-hk-site/blob/master/app/Hooks/Admin.php#L273) a je nutné dodržet název komponenty ve formátu **nazevKomponenty**, kde první písmeno je malé a další slovo začíná už velkým. 

Controller/Řadič Komponent pak podle názvu komponentu volá samotnou komponentu ze složky app/Views/components/**nazevKomponenty.twig**.

Pro případ, že by komponenta potřebovala ještě informace mimo ACF pole. Například články, tak se vytvoří nový controller/řadič ve složce app/Http/Controllers/Components/**nazevKomponenty.twig** a dodají se potřebné informace do funkce *prepareTwigData*. Stačí zkopírovat již nějaký existující controller a přepsat data. Příklad [zde](https://github.com/digihive-prague/danfis-hk-site/blob/master/app/Controllers/Components/Blog.php).

## Úprava rovnou na DEV prostředí
V projektu je již přiložený SFTP config soubor pro VSCode [plugin vscode-sftp](https://github.com/liximomo/vscode-sftp). Tím pádem pokud je použitý VSCode, tak lze rovnou nahrávat na DEV, a není zapotřebí si vytvářet vlastní local prostředí. 
