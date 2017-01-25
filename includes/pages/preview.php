<?
    $noPreview = 'Select something to preview';

    if(isset($_GET['id'])){
        $postID = mysqli_real_escape_string($con,$_GET['id']);

        if(isset($_GET['type'])){
            $postType = mysqli_real_escape_string($con,$_GET['type']);
    
            echo "<p style='text-align: center; font-style: italic; '>Previewing $postType post with id $postID</p>";
    
            if($postType == 'portfolio'){
                $portfolioPreviewSQLquery = "SELECT *, portfolio.id AS postID FROM portfolio
                    JOIN portfolio_client_relations ON portfolio.id=portfolio_client_relations.project_id
                    JOIN portfolio_clients ON portfolio_client_relations.client_id=portfolio_clients.id
                    JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id
                    WHERE portfolio.id = $postID 
                    GROUP BY shortname;";

                $portfolioPreviewResult = mysqli_query($con,$portfolioPreviewSQLquery);
                $row = mysqli_fetch_array($portfolioPreviewResult);

                include "$pathToLP/includes/portfolioVariables.php";
                include "$pathToLP/includes/portfolioProject.php";

            } else if($postType == 'blog'){
                $blogPreviewSQLquery = "SELECT *, blog.id AS postID FROM blog 
                    JOIN authors_creators ON blog.author_id=authors_creators.id 
                    JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id
                    JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id 
                    WHERE blog.id = $postID 
                    GROUP BY shortname;";

                $blogPreviewResult = mysqli_query($con,$blogPreviewSQLquery);
                $row = mysqli_fetch_array($blogPreviewResult);

                include "$pathToLP/includes/blogVariables.php";
                include "$pathToLP/includes/blogPost.php";
                
            }
        } else { 
            echo($noPreview); 
        }
    } else {
        echo($noPreview);       
    }
?>
