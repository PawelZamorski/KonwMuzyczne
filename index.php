        <?php
        // session_start();

        // // set up language
        // $_SESSION['lang'] = 'pl'; // default language

        // if (isset($_GET['lang'])) {
        //     $lang = $_GET['lang'];
        //     if ($lang === 'pl' || $lang === 'en' || $lang === 'zh' || $lang === 'vi' ) { // use language code
        //         $_SESSION['lang'] = $lang;
        //     }
        // }

        ?>




<?php

    use Konwersatorium\Core\Router;
    use Konwersatorium\Core\Request;

    // Include the file that handles all the autoloading from the Composer code
    require_once(__DIR__ . '/vendor/autoload.php');

    // Specify the location of templates
    // Use Twig liberary to generate views
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
    $twig = new Twig_Environment($loader);

    $router = new Router();
    $response = $router->route(new Request());
    echo $response;

?>





<?php
    // use Konwersatorium\Models\MenuModel;
    // use Konwersatorium\Core\Db;

    // $menu_model = new MenuModel(Db::getConnection());
    // $menu_data = $menu_model->getAll('pl');
    // $params = ['menus' => $menu_data];

    // $params = ['menus' => [['code'=> 'oneTest', 'nav_link' => 'oneTestLink'], ['code' => 'towTest', 'nav_link' => 'twoTestLink']]];

    // var_dump($params);
    // echo $twig->loadTemplate('templates/menu.twig')->render($params);


//    echo $twig->loadTemplate('layout.twig')->render($params);
?>

<?php
//     use Konwersatorium\Models\CourseModel;

//     $cm = new CourseModel(Db::getConnection());
//     $course = $cm->getById(1);

//    $params = ['course' => $course];

//     var_dump($params);
//     echo $twig->loadTemplate('courses/courseDetails.twig')->render($params);

?>

<?php
?>
