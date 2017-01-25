            <ul class="firstList">
                <li><a href="#">Manage categories</a></li>
                <li><a href="#">Manage references</a></li>
            </ul>

            <table>
                <col class="status">
                <col class="flex">
                <col class="icon">

<?
	$resumeCategoryQuery = "SELECT * FROM resume_categories ORDER BY cat_volgorde ASC ";

    $resumeCategoryResult = mysqli_query($con,$resumeCategoryQuery);
    while($row = mysqli_fetch_array($resumeCategoryResult)){

//         require_once "$pathToLP/lpdotme/Michelf/MarkdownExtra.inc.php";
//         include "$pathToLP/lpdotme/portfolioVariables.php";
		
		$catPublished = $row['cat_publish'];
    	$catGeneral = $row['category'];
    	$catIcon = $row['cat_fa'];
        $category = $row['category'];
		
		
        $catPubStatusLabel = '<span class="status ';
        if($catPublished == '1') {
           $catPubStatusLabel .= 'live">Live';
        } else if($catPublished == '0'){
           $catPubStatusLabel .= 'draft">Draft';
        };
        $catPubStatusLabel .= '</span>';

        echo '<tr>
            <th class="status">'.$catPubStatusLabel.'</th>
            <th class="flex">'.$catGeneral.'</th>
            <th class="icon"><i class="fa fa-fw '.$catIcon.'"></i></th>
        </tr>';
        
    	$resumeItemsQuery = "SELECT *, resume.id AS postID FROM resume 
    	    JOIN resume_categories on resume.category_id=resume_categories.id
    	    JOIN portfolio_clients on resume.company_id=portfolio_clients.id 
    	    WHERE category = '$catGeneral' 
    	    ORDER BY volgorde ASC ";
    	
        $resumeItemsResult = mysqli_query($con,$resumeItemsQuery);
        while($row = mysqli_fetch_array($resumeItemsResult)){

            $date = $row['date'];
            $subject = $row['subject'];
            $description = $row['description'];
            $pubStatus = $row['published'];
            $postID = $row['postID'];

            $pubStatusLabel = '<span class="status ';
            if($pubStatus == '1' && $catPublished == '0'){
                $pubStatusLabel .= 'semilive">Hidden';

            } else if($pubStatus == '1' && $catPublished == '1'){
                $pubStatusLabel .= 'live">Live';

            } else if($pubStatus == '0'){
                $pubStatusLabel .= 'draft">Draft';
            };
            $pubStatusLabel .= '</span>';


            echo '
                <tr>
                    <td class="status">'.$pubStatusLabel.'</td>
                    <td class="flex"><span class="rowContents">';
            
            if($description == 'graph'){ echo '<i class="fa fa-bar-chart" aria-hidden="true"></i>'; };
            if($subject != ''){ echo $subject; }
            else {              echo $date;    };



            echo '
                    </span></td>
                    <td class="icon"><a href="edit/&type=resume&id='.$postID.'"   ><i class="fa fa-fw fa-pencil"  aria-hidden="true"></i></a></td>

                </tr>';
        }

/*
        echo '
        <tr onclick="toggle(\'info-'.$shortname.'\')">
            <td>'.$pubStatusLabel.'</td>
            <td class="icon">'.$frontStatusLabel.'</td>
            <td class="icon">'.$extenStatusLabel.'</td>
            <td class="icon">'.$videoStatusLabel.'</td>
            <td>'.$plainTitle.'
            	<ul id="info-'.$shortname.'" class="postInfo">
                    <hr>
            	    <li><span>Summary</span> '.$summary.'</li>
                    <hr>
            	    <li><span>Year</span> '.$year.'</li>
            	    <li><span>Category</span> '.$category.'</li>';

        if($course != ''){            echo '<li><span>Course</span> '.$course.'</li>'; };
        if($assignment != ''){        echo '<li><span>Assignment</span> '.$assignment.'</li>'; };
        if($acknowledgments != ''){   echo '<li><span>Acknowledgements</span> '.$acknowledgments.'</li>'; };
        if($roleFocus != ''){         echo '<li><span>Role</span> '.$roleFocus.'</li>'; };
        if(isset($creatorsComplete)){ echo '<li><span>Team</span> '.$creatorsComplete.'</li>'; };

            	    echo '
            	    <li><span>Clients</span> '.$clientsKeywords.'</li>';
        if($extendedPostPublished == '1'){ echo '<li><span>Date published</span> '.$extendedPubDate.'</li>'; };
        if($extendedUpdateDate == '1'){    echo '<li><span>Date updated</span> '.$extendedUpdateDateRead.'</li>'; };
            	    echo '<hr>';
        if($videoid != NULL){              echo '<li><span>Video URL</span> <a href="http://vimeo.com/'.$videoid.'">vimeo.com/'.$videoid.'</a></li>'; };
                    echo '
            	    <li><span>URL</span> <a href="http://portfolio.lexpostma.me/'.$shortname.'">portfolio.lexpostma.me/'.$shortname.'</a></li>
            	    <li><span>ID</span> '.$postID.'</li>
            	</ul>
            </td>

            <td class="action"><a href="preview"><i class="fa fa-fw fa-eye"     aria-hidden="true"></i></a></td>
            <td class="action"><a href="edit"   ><i class="fa fa-fw fa-pencil"  aria-hidden="true"></i></a></td>

        </tr>';
*/
    }
?>
            </table>