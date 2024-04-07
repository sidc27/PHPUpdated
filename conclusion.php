<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Conclusion: You Won!</title>
    <link rel="icon" href="./Images/Common/favicon.png">
</head>

<body>
	<?php 
    //conclusion page
    include 'common.php';
    setConclusionPage("./Images/Backgrounds/menu.png");
    setLeaderBoard();
    ?>
</body>

</html>