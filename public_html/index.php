<?
    require_once '../includes/connection.php';
    include_once '../includes/variables.php';
    include_once "$pathToLP/includes/domains.php";
    include_once '../includes/functions.php';

    sec_session_start();
    
    if (login_check($mysqli) == true) {

        $logged = 'in';

        $username = htmlentities($_SESSION['username']);
        $currentUser = mysqli_fetch_array(mysqli_query($con, "SELECT permissions,firstname FROM authors_creators WHERE username = '$username' ;"));
        $firstname = $currentUser['firstname'];
        $userPermission = $currentUser['permissions'];        
        
        if(isset($_GET['p'])){
    
            $p = strtolower(mysqli_real_escape_string($con,$_GET['p']));
    
        } else {
    
            $p = 'home';    
        };
        
    } else {

        $logged = 'out';
        $p = 'login';

    }

    $homepage = explode( "-", $p)[0];

	if(empty($userPermission)) {
		$userPermission = 'new';
	}

    if($userPermission != 'admin' && !in_array($homepage, $permissions[$userPermission])) {
        $p = "not-allowed";
    }

    require_once "$pathToLP/includes/Michelf/MarkdownExtra.inc.php";
    include "$pathToLP/includes/text-scripts.php";
    include '../includes/header.php';
    include '../includes/pages/'.$p.'.php';
    include '../includes/footer.php';
	
?>