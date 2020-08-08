<?php
    session_start();
    $_SESSION['lang'] = 'pl'; // default language

    if (isset($_GET['lang'])) {
        $lang = $_GET['lang'];
        if ($lang === 'pl' || $lang === 'en' || $lang === 'zh' || $lang === 'vi' ) {
            $_SESSION['lang'] = $lang;
        }
    }

?>

<!DOCTYPE html>
<html>
<head lang="pl-PL">
    <?php 
        $title = 'Panel administracyjny';
        require(__DIR__ . '/templates/head-admin.php');
    ?>
</head>
<body>
    <?php require(__DIR__ . '/templates/menu-admin.php'); ?>
</body>
</html>