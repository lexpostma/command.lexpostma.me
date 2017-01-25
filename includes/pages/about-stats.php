            <ul>
                <lh>Random stats</lh>
<?

    // RUNKEEPER DATA
    echo '<li>Runkeeper kilometers: <b>';
    include '../includes/about-runkeeper.php';
    echo '</b>';
    
    if($rkContent == ''){
        echo "❗️";
    } else if(mysqli_query($con, "UPDATE about_stats SET value='$rkContent' WHERE name='runkeeper'; ")) {
        echo " ✅";
    } else {
        echo " 🚫";
    };
    echo '</li>';    


    // TWITTER DATA
    echo '<li>Twitter followers: <b>';
    include '../includes/about-twitter.php';
    echo '</b>';
    
    if($tw_followers == ''){
        echo "❗️";
    } else if(mysqli_query($con, "UPDATE about_stats SET value='$tw_followers' WHERE name='twitter'; ")) {
        echo " ✅";
    } else {
        echo " 🚫";
    };
    echo '</li>';
    
    
    // APP DATA
    echo '<li>Apps installed: ';

    if(isset($_GET['a']) && $_GET['a'] != ''){
        $appValue = $_GET['a'];
        echo '<b>'.$_GET['a'].'</b>';

        if(mysqli_query($con, "UPDATE about_stats SET value='$appValue' WHERE name='apps'; ")){
            echo " ✅";
        } else {
            echo " 🚫";
        };
        
    } else {
        $appValue = 'apps';
        echo '-';
    };
    echo '</li>';

?>
                <li>
                    <a href="prefs:root=General&path=About">Check Settings.app</a> for up-to-date apps data.
                    <br>
            		<form class="about-stats" action="about.php">
                		<input type="number" name="a" placeholder="<?echo mysqli_fetch_array(mysqli_query($con, "SELECT value FROM about_stats WHERE name = 'apps';"))[0];?>" style="width: 100px;">
                		<input type="submit" value="Update app data">
            		</form>
                </li>
            </ul>
