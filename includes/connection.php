<?
    # CONNECTION
	define("HOST", getenv('LEXPOSTMA_CMD_HOST'));
	define("USER", getenv('LEXPOSTMA_CMD_USER'));
	define("PASSWORD", getenv('LEXPOSTMA_CMD_PASSWORD'));
	define("DATABASE", getenv('LEXPOSTMA_CMD_DATABASE'));


	$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    
    mysqli_set_charset($con, "utf8");

	define("CAN_REGISTER", "any");
	define("DEFAULT_ROLE", "member");
	 
	define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
?>