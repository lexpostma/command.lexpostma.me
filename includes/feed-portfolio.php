<?
	$portfolioFile = fopen("$pathToLP/public_html/raw-feeds/portfolio.xml","w+");
	$portfolioContent = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<rss version=\"2.0\">
    <channel>
        <title>Lex’ portfolio</title>
        <description>Portfolio by Lex Postma. I design things.</description>
		<link href=\"http://portfolio.lexpostma.me/\"></link>
		<base href=\"http://portfolio.lexpostma.me/\"/>
		<image>
            <title>Lex’ portfolio</title>
            <link href=\"http://portfolio.lexpostma.me/\"/>
            <url>http://lexpostma.me/img/lex-logo-purple.png</url>
        </image>
        <language>en</language>
		<copyright>Copyright © ".date('Y').", Lex Postma</copyright>
        <updated>".date('r')."</updated>
        <lastBuildDate>".date('r')."</lastBuildDate>";


//     remove schiphol-nest exception when you know how to fix 'invalid feed' issue
    $feedPortfolioItems = mysqli_query ($con,"
        SELECT *, portfolio.id AS postID FROM portfolio 
        JOIN portfolio_client_relations ON portfolio.id=portfolio_client_relations.project_id
        JOIN portfolio_clients ON portfolio_client_relations.client_id=portfolio_clients.id
        JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id
        WHERE onlineVisible = '1'
        AND extendedPostPublished = '1'
        AND shortname != 'schiphol-nest'
        GROUP BY shortname 
        ORDER BY extendedPubDate
        DESC LIMIT 30;");
    while($row = mysqli_fetch_array($feedPortfolioItems)) { // $extendedPubDate
        $baseURL = $portURL;
        include "$pathToLP/includes/portfolioVariables.php";
        $portfolioContent .= "
			<item>
				<title>".$plainTitle."</title>
				<author>Lex Postma</author>
				<link>http://portfolio.lexpostma.me/".$shortname."</link>
				<guid>http://portfolio.lexpostma.me/".$shortname."</guid>
				<pubDate>".$extendedPubDateFull."</pubDate>
				<description><![CDATA[".$body.'<hr><ul>'.$portfolioFooter."</ul>]]></description>
			</item>";
    };

    $portfolioContent .= "
    </channel>
</rss>";
	
	fwrite($portfolioFile,$portfolioContent);
	fclose($portfolioFile);
?>