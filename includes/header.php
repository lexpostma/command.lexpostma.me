<html>
    <head>
        <meta charset="utf-8">
        <title>Lex’ &#8984; • <?=$homepage?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
        <meta name="robots" content="noindex" />

<!--         <link rel="mask-icon" href="/img/icons/Safari-pinnedtab.svg" color="#4B0082"> -->
<!--         <link rel="shortcut icon" type="image/ico" href="/img/icons/favicon.png" /> -->

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />

        <meta name="apple-mobile-web-app-title"   content="Lex’ &#8984;" />
        <meta name="apple-mobile-web-app-capable" content="no" />
        <link rel="apple-touch-icon-precomposed" 	sizes="60x60"		href="/img/Icon-60.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="120x120"		href="/img/Icon-60@2x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="180x180"		href="/img/Icon-60@3x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="76x76"		href="/img/Icon-76.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="152x152"		href="/img/Icon-76@2x.png" />


        <link rel="stylesheet" href="/styles/normalize.css">
        <link rel="stylesheet" href="/styles/command.css">
        <link rel="stylesheet" href="/styles/hamburgers.css">

        <script type="text/JavaScript" src="scripts/sha512.js"></script> 
        <script type="text/JavaScript" src="scripts/forms.js"></script> 


        <link rel="stylesheet" href="/fonts/font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="/scripts/jquery-1.12.0.min.js"></script>
        <script>
            function toggle(id)  { $('#'+id).toggleClass('show'); }
        </script>
    </head>
    
    <body>
        <header id="header" class="okayNav-header">
            <a id="logo" href="/">Lex’ &#8984;</a>
            <nav role="navigation" id="nav-main" class="okayNav">
                <ul>
<?
    include '../includes/navigation-items.php';
?>


                </ul>
            </nav>
        </header>
        <main class="<?=$homepage?>">