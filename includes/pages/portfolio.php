            <ul class="firstList">
                <li><a href="#">Manage categories</a></li>
                <li><a href="#">Manage creators</a></li>
                <li><a href="#">Manage clients</a></li>
                <li><a href="/feedbuilder">Update RSS feeds</a></li>
            </ul>
            <table>
                <col class="status">
                <col class="icon">
                <col class="icon">
                <col class="icon">
                <col class="flex">
                <col class="icon">
                <col class="icon">
<?
	$portfolioListQuery = "SELECT *, portfolio.id AS postID FROM portfolio
        JOIN portfolio_client_relations ON portfolio.id=portfolio_client_relations.project_id
        JOIN portfolio_clients ON portfolio_client_relations.client_id=portfolio_clients.id
        JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id
        GROUP BY shortname
        ORDER BY volgorde ASC ";

    $portfolioListResult = mysqli_query($con,$portfolioListQuery);
    while($row = mysqli_fetch_array($portfolioListResult)){

        include "$pathToLP/includes/portfolioVariables.php";
		
        $pubStatusLabel = '<span class="status ';
        if($onlineVisible == '1') {
           $pubStatusLabel .= 'live"><a href="http://portfolio.lexpostma.me/'.$shortname.'">Live <i class="fa fa-external-link" aria-hidden="true"></i></a>';
        } else if($onlineVisible == '0'){
           $pubStatusLabel .= 'draft">Draft';
        };
        $pubStatusLabel .= '</span>';

        if($partOfFrontpageSelection == '1') { $frontStatusLabel = '<i class="fa fa-home" aria-hidden="true"></i>'; }         else { $frontStatusLabel = ''; };
        if($extendedPostPublished == '1') {    $extenStatusLabel = '<i class="fa fa-plus-circle" aria-hidden="true"></i>'; }  else { $extenStatusLabel = ''; };
        if($videoid != NULL) {                 $videoStatusLabel = '<a href="http://vimeo.com/'.$videoid.'"><i class="fa fa-video-camera" aria-hidden="true"></i></a>'; } else { $videoStatusLabel = ''; };


        
        echo '
        <tr onclick="toggle(\'info-'.$shortname.'\')">
            <td class="status">'.$pubStatusLabel.'</td>
            <td class="icon">'.$frontStatusLabel.'</td>
            <td class="icon">'.$extenStatusLabel.'</td>
            <td class="icon">'.$videoStatusLabel.'</td>
            <td class="flex"><span class="rowContents">'.$plainTitle.'
            	<ul id="info-'.$shortname.'" class="postInfo portfolio">
                    <hr>
            	    <li><span>Summary</span> '.$summary.'</li>
                    <hr>
            	    <li><span>Year</span> '.$year.'</li>
            	    <li><span>Category</span> '.$category.'</li>';

        if($course != ''){            echo '<li><span>Course</span> '.$course.'</li>'; };
        if($assignment != ''){        echo '<li><span>Assignment</span> '.$assignment.'</li>'; };
        if($acknowledgments != ''){   echo '<li><span>Acknowledgements</span> '.$acknowledgments.'</li>'; };
        if(isset($creatorsComplete)){ echo '<li><span>Role</span> '.$creatorsComplete.'</li>'; };

            	    echo '
            	    <li><span>Clients</span> '.$clientsKeywords.'</li>';
        if($extendedPostPublished == '1'){ echo '<li><span>Date published</span> '.$extendedPubDate.'</li>'; };
        if($extendedUpdateDate == '1'){    echo '<li><span>Date updated</span> '.$extendedUpdateDateRead.'</li>'; };
            	    echo '<hr>';
        if($videoid != NULL){              echo '<li><span>Video URL</span> <a href="http://vimeo.com/'.$videoid.'">vimeo.com/'.$videoid.'</a></li>'; };
                    echo '
            	    <li><span>URL</span> <a href="http://portfolio.lexpostma.me/'.$shortname.'">portfolio.lexpostma.me/'.$shortname.'</a></li>
            	    <li><span>ID</span> '.$postID.'</li>
            	</ul></span>
            </td>

            <td class="icon"><a href="preview/&type=portfolio&id='.$postID.'"><i class="fa fa-fw fa-eye"     aria-hidden="true"></i></a></td>
            <td class="icon"><a href="edit/&type=portfolio&id='.$postID.'"   ><i class="fa fa-fw fa-pencil"  aria-hidden="true"></i></a></td>

        </tr>';
    }
?>



            </table>