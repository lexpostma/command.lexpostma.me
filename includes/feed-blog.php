<?
    $blogFile = fopen("$pathToLP/public_html/raw-feeds/blog.xml","w+");
	$blogContent = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<rss version=\"2.0\">
    <channel>
        <title>Lex’ blog</title>
        <description>Personal blog, by Lex Postma. I blog about Apple, tech, apps, design and sometimes sports.</description>
		<link href=\"http://blog.lexpostma.me/\"/>
		<base href=\"http://blog.lexpostma.me/\"/>
		<image>
            <title>Lex’ blog</title>
            <link href=\"http://blog.lexpostma.me/\"/>
            <url>http://lexpostma.me/img/lex-logo-purple.png</url>
        </image>
        <language>en</language>
		<copyright>Copyright © ".date('Y').", Lex Postma</copyright>
        <updated>".date('r')."</updated>
        <lastBuildDate>".date('r')."</lastBuildDate>";

    $feedBlogItems = mysqli_query ($con,"
        SELECT *, blog.id AS postID FROM blog 
        JOIN authors_creators ON blog.author_id=authors_creators.id 
        JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id
        JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id 
        WHERE published = '1' 
        GROUP BY shortname 
        ORDER BY datePublished
        DESC LIMIT 30;");
    while($row = mysqli_fetch_array($feedBlogItems)) { // $datePublished
        $baseURL = $blogURL;
        include "$pathToLP/includes/blogVariables.php";
        $blogContent .= "
			<item>
				<title>".$plainTitle."</title>
				<author>".$author."</author>
				<link>http://blog.lexpostma.me/".$shortname."</link>
				<guid isPermaLink=\"false\">http://blog.lexpostma.me/".$shortname."</guid>
				<pubDate>".$datePublishedFull."</pubDate>  
				<description><![CDATA[".$body."<hr>".$blogHeaderByline."]]></description>
			</item>";
    };

	$blogContent .= "
    </channel>
</rss>";
	
	fwrite($blogFile,$blogContent);
	fclose($blogFile);
?>