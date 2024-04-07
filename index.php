<?php
SESSION_set_cookie_params(3600);
SESSION_start();
$_SESSION['Score'] = 0;
?>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="./P1.css">
<link rel="icon" href="./Images/Common/Icon.png">
<style>
#credit {
    position: absolute;
    width: 50%;
    height: 70%;
    left:25%;
    top: 20%;
    color:gold;
    background-color: rgba(128, 128, 128, 0.7);
    border: 1px solid black;
    z-index:20;
}
form {
    display: block;
    margin-top: 0em;
    unicode-bidi: isolate;
    margin-block-end: 0em;
}
#LB{
    position: absolute;
    width: 50%;
    left:25%;
    top: 20%;
    color:gold;
    background-color: rgba(128, 128, 128, 0.7);
    border: 1px solid black;
    z-index:20;
}
button {
    font-size: 14px;
    max-width: 100px;
    max-height: 50px;
    border: none;
    opacity: 0.85;
}
</style>
</head>
<body>   
    <img src="./Images/Backgrounds/Canyon.png" style="width:100%; height:100%; position: absolute; z-index: -1; min-width:1300px;">

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Home'])) {
        echo '
            <div style="position: absolute; width: 50%; height: 50%; text-align: center; justify-content: center; align-items: center; top: 20%; left: 25%; display: flex; flex-direction: column;">
            <img src="./Images/Common/Title.png" style="width: 50%;">
               <button onclick="location.href = \'./level1a.php \'" style="width:auto;font-size: 14px;">Start Game</button>

			 <form method="POST" > 
                <button type="submit" name="Login" style="width:auto;font-size: 14px;">Login</button>
            </form>
            <form method="POST" > 
                <button type="submit" name="Credit" style="width:auto;font-size: 14px;">Credit</button>
            </form>
            <form method="POST">
                <button type="submit" name="LB" style="width:auto;font-size: 14px;">Leader Broad</button>
            </form>
        </div>';
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Credit'])) {
        echo '
        <div id="credit">
            <form method="POST">
                <button type="submit" name="Home" style="width:auto;font-size: 10px;">Back</button>
            </form><br>
            <center>Project name: Legend\'s tale</center>
            <center>Kaleb Evory---Leader</center>
            <center>Sidratul Chowdhury---Coder/Programmer</center>
            <center>Yikai---Designer</center><br>
            <center>Description:This is a story of how a hero travel thought the most Danger forest in this land</center>
        </div>';
    } elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Login']) || isset($_POST['Signin']) || isset($_POST['Signup']) || isset($_POST['Sign-up-submit'])) {
        echo '<div id="credit">
            <form method="POST">
                <button type="submit" name="Home" style="width:auto;font-size: 10px;">Back</button>
            </form><br><center>';

        if(isset($_POST['Login'])) {
            echo '<form method="POST" >
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <button type="submit" name="Signin">Login</button><br>
            </form><form method="POST">
					Don\'t have an account? <button type="submit" name="Signup" style="border: none; color: red;">Sign-up</button> 
					</form>';
        } elseif(isset($_POST['Signin'])) {
            $file = "./Save_Data/Data.txt";
            $content = explode("\n", file_get_contents($file));
            $loggedin = false;
            $counter = 1; // Initialize counter outside the loop
        
            foreach($content as $line) {
                $Data = explode(',', $line);
                if(trim($_POST['username']) == trim($Data[0]) && trim($_POST['password']) == trim($Data[1])) {
                    $_SESSION['UserName'] = $Data[0];
                    $loggedin = true;
                    echo "You are logged in";
                    break;
                } elseif(trim($_POST['username']) == trim($Data[0]) && trim($_POST['password']) != trim($Data[1])) {
                    echo 'Invalid password. Please try again<br>
                        <form method="POST" >
                            <input type="text" name="username" placeholder="Username" required><br><br>
                            <input type="password" name="password" placeholder="Password" required><br><br>
                            <button type="submit" name="Signin">Login</button><br>
                        </form>
                        <form method="POST">
                            Don\'t have an account? <button type="submit" name="Signup" style="border: none; color: red;">Sign-up</button> 
                        </form>';
                    break;
                } elseif($counter == count($content)) {
                    echo 'No account found. Please check your username<br>
                        <form method="POST" >
                            <input type="text" name="username" placeholder="Username" required><br><br>
                            <input type="password" name="password" placeholder="Password" required><br><br>
                            <button type="submit" name="Signin">Login</button><br>
                        </form>
                        <form method="POST">
                            Don\'t have an account? <button type="submit" name="Signup" style="border: none; color: red;">Sign-up</button> 
                        </form>';
                }
                $counter++;
            }   
        } elseif(isset($_POST['Signup'])) {
            echo '<form method="POST" >
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <button type="submit" name="Sign-up-submit">Sign Up</button><br>
            </form>
			<form method="POST">
			Already have an account? <button type="submit" name="Login" style="border: none; color: red;">Login here</button>
			</form>';
        } elseif(isset($_POST['Sign-up-submit'])) {
    $file = "./Save_Data/Data.txt";
    $content = file_get_contents($file);
    $user = $_POST["username"] . "," . $_POST['password'] . "," . "0";

    // Check if the username already exists
    if (strpos($content, $_POST["username"]) !== false) {
        echo 'Username already exists. Please choose a different one.';
    } else {
        // Append the new user to the file
        file_put_contents($file, $user . "\n", FILE_APPEND);
        echo 'You have been signed-up.';
    }
}

        echo '</center></div>';
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['LB'])) {
        echo '
    <div id="LB">
        <form method="POST">
            <button type="submit" name="Home" style="width:auto;font-size: 10px;">Back</button>
            <center>Leader Broad</center>
        </form>';

        $file = "./Save_Data/Data.txt";
        $content = explode("\n", file_get_contents($file));

        echo '<table style="width:70%;height:90%;color:gold; margin: auto;margin-bottom:20">';
        echo '<tr><th>Username</th><th>Score</th></tr>';
        // Display only the top 10 users
        $counter = 0;
        foreach($content as $line) {
            if ($counter >= 10) {
                break;
            }

            $data = explode(',', $line);
            echo '<tr>';
            echo '<td style="text-align: center;">' . $data[0] . '</td>';
            echo '<td style="text-align: center;">' . $data[2] . '</td>';
            echo '</tr>';

            $counter++;
        }
        echo '</table>';
        echo '</div>';

    } else {
        echo '
        <div style="position: absolute; width: 50%; height: 50%; text-align: center; justify-content: center; align-items: center; top: 20%; left: 25%; display: flex; flex-direction: column;z-index:10;">
            <img src="./Images/Common/Title.png" style="width: 50%;">
               <button onclick="location.href = \'./level1a.php \'" style="width:auto;font-size: 14px;">Start Game</button>
             <form method="POST" > 
                <button type="submit" name="Login" style="width:auto;font-size: 14px;">Login</button>
            </form>
            <form method="POST" > 
                <button type="submit" name="Credit" style="width:auto;font-size: 14px;">Credit</button>
            </form>
            <form method="POST">
                <button type="submit" name="LB" style="width:auto;font-size: 14px;">Leader Broad</button>
            </form>
        </div>';
    }
    ?>
</body>
</html>
