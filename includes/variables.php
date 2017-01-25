<?
    if (strpos($_SERVER['HTTP_HOST'], 'lex.test') !== false) {
        $pathToLP = '../../local-lexpostma.me';
    }
    else {
        $pathToLP = '../../lexpostma.me';
    }

    $permissions = array(
        "admin"    => array("all"),
        "writer"   => array("home","logout","login","profile","blog","preview","edit","new","feedbuilder"),
        "reviewer" => array("home","logout","login","profile","blog","preview","portfolio"),
        "display"  => array("home","logout","login"),
        "new"      => array(       "logout","login")
    );

?>