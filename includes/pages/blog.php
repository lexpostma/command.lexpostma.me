            <ul class="firstList">
                <li><a href="#">Manage tags</a></li>
                <li><a href="#">Manage authors</a></li>
                <li><a href="/feedbuilder">Update RSS feeds</a></li>
            </ul>
            <ul class="firstList">
                <li>Total word count: <b><? echo wordCount()?> words</b></li>
                <li>Total post count: <b><? echo postCount()?> blog posts</b></li>
            </ul>

            <table>
                <col class="status">
                <col class="flex">
                <col class="icon">
                <col class="icon">

<?
	$blogListQuery = "SELECT *, blog.id AS postID FROM blog 
        JOIN authors_creators ON blog.author_id=authors_creators.id 
        JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id
        JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id 
        WHERE published != '2' 
        GROUP BY shortname
        ORDER BY datePublished DESC ;";

    $blogListResult = mysqli_query($con,$blogListQuery);
    while($row = mysqli_fetch_array($blogListResult)){

        include "$pathToLP/includes/blogVariables.php";
		
        $pubStatusLabel = '<span class="status ';
        if($pubStatus == '1') {
           $pubStatusLabel .= 'live"><a href="http://blog.lexpostma.me/'.$shortname.'">Live <i class="fa fa-external-link" aria-hidden="true"></i></a>';
        } else if($pubStatus == '0'){
           $pubStatusLabel .= 'draft">Draft';
        }
        $pubStatusLabel .= '</span>';

        
        echo '
        <tr onclick="toggle(\'info-'.$shortname.'\')">
            <td class="status">'.$pubStatusLabel.'</td>
            <td class="flex"><span class="rowContents">'.$plainTitle.'
            	<ul id="info-'.$shortname.'" class="postInfo">
                    <hr>
            	    <li><span>Summary</span> '.$summary.'</li>
            	    <li><span>Author</span> '.$author.'</li>
            	    <li><span>Tags</span> '.$tagKeywords.'</li>';
        if($pubStatus == '1'){    echo '<li><span>Date published</span> '.$datePublishedRead.'</li>'; };
        if($dateUpdated != NULL){ echo '<li><span>Date updated</span> '.$dateUpdatedRead.'</li>'; };
        if($source != NULL){      echo '<li><span>Source</span> <a href="'.$source.'">'.$sourcetitle.'</a></li>'; };

            	    echo '
                    <hr>
            	    <li class="elements"><span>Elements</span> ';
            	    
if(strpos($addLibraries,'f') !== false){ echo '<i class="fa fa-check-square"></i>&nbsp;'; } else { echo '<i class="fa fa-square"></i>&nbsp;'; }; echo 'footnotes';
if(strpos($addLibraries,'c') !== false){ echo '<i class="fa fa-check-square"></i>&nbsp;'; } else { echo '<i class="fa fa-square"></i>&nbsp;'; }; echo 'code';
if(strpos($addLibraries,'m') !== false){ echo '<i class="fa fa-check-square"></i>&nbsp;'; } else { echo '<i class="fa fa-square"></i>&nbsp;'; }; echo 'math';
if(strpos($addLibraries,'t') !== false){ echo '<i class="fa fa-check-square"></i>&nbsp;'; } else { echo '<i class="fa fa-square"></i>&nbsp;'; }; echo 'tweets';
if($quoteOn == 1) {                      echo '<i class="fa fa-check-square"></i>&nbsp;'; } else { echo '<i class="fa fa-square"></i>&nbsp;'; }; echo 'quote';

            	    echo'
            	    </li>
            	    <li><span>URL</span> <a href="http://blog.lexpostma.me/'.$shortname.'">blog.lexpostma.me/'.$shortname.'</a></li>
            	    <li><span>ID</span> '.$postID.'</li>
            	</ul></span>
            </td>

            <td class="icon"><a href="preview/&type=blog&id='.$postID.'"><i class="fa fa-fw fa-eye"     aria-hidden="true"></i></a></td>
            <td class="icon"><a href="edit/&type=blog&id='.$postID.'"   ><i class="fa fa-fw fa-pencil"  aria-hidden="true"></i></a></td>


        </tr>';
    }
?>



            </table>