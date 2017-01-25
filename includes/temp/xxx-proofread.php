<!DOCTYPE html>
<html>
	<head>
		<title>Proofreading Lex’ article</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

        <link rel="stylesheet" href="/styles/normalize.css">
        <link rel="stylesheet" href="/styles/global.css">
        <link rel="stylesheet" href="/styles/blog.css">
        <link rel="stylesheet" href="/fonts/font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="/scripts/jquery-1.12.0.min.js"></script>
    	<link rel="stylesheet" href="/styles/prism.css">
    	<script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
    	<script type="text/javascript" src="/scripts/bigfoot.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="/styles/bigfoot-number.css" />
    	<script type="text/javascript">
    	    var bigfoot = $.bigfoot(
    	        {
                    positionContent		: "true",
    		        actionOriginalFN    : "ignore", // "delete", "hide", or "ignore"
                    preventPageScroll   : false,
                    numberResetSelector : "article",
    	        }
    	    );
    	</script>
	</head>
	<body>
        <main id="contents" class="blog">
            <article class="contentBlock">
            	<? include '../../text/proofread.html';?>
            </article>
        </main>
 		<script type="text/javascript" src="/scripts/responsive-videos.js"></script>
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script><script>$(".twitter-tweet").attr({"align":"center"});</script>
        <script src="/scripts/prism.js"></script>
	</body>
</html>