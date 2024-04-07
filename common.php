<!DOCTYPE html>
<html lang="en">

<head>
	<title>Common PHP Resources</title>
    <link rel="stylesheet" href="./common.css">
</head>

<body>
    <?php
    //Functions and variables for the level pages
    //global functions and variables
    $moves = array("Rock", "Paper", "Scissors");

    //function for running the rock, paper, scissors game
    function playGame($background, $enemy, $next, $intro, $outro, $begin, $ends) {
        global $moves;
        setBackground($background);      
        print "<form method = \"post\"><fieldset class = \"dialogue\">";
        if (isset($_POST['action']) && ($_SESSION["playerHP"] > 0) && ($_SESSION["monsterHP"] > 0)) {
            setOutcome($_POST['action'], $moves[(rand() % 3)], $moves);
            setMoves();
        } else if (($_SESSION["playerHP"] == 0 || $_SESSION["monsterHP"] == 0) && isset($_POST['action'])) {
            if ($_SESSION["playerHP"] == 0) {
                $temp = $_SESSION["monsterHP"];
                setDefeat();
            } else {
                $temp = $_SESSION["playerHP"];
                setVictory($ends, $next);
            }
        }  else {
            setGame();
            print $begin;
            setMoves();
        }
        displayHealth($enemy);
        setOverlay($intro, $outro, $next);
        $_SESSION["round"]++;
    } 

    //sets the game's overlay text
    function setOverlay($in , $out, $follow) {
        if ($_SESSION["playerHP"] == 0 && $_SESSION["lose"]) {
            resetGame();
            print "<div class = \"defeat\"><p>Defeat!?!</p></div>";
        } else if ($_SESSION["monsterHP"] == 0 && $_SESSION["win"]) {
            resetGame();
            print "<div class = \"overlay out\"><div class = \"intro\">" . $out . "<br><button class = \"end\"><a href = " . $follow . ">Rest and Continue Your Journey...</a></button></div></div>";
        } else {
            if ($_SESSION["round"] == 0) {
                print "<div class = \"overlay in\"><div class = \"intro\">" . $in . "</div></div>";
            }
        } 
    }

    //sets the game's background
    function setBackground($setting) {
        print "<img src = " . $setting . " class = \"background\">";
    }

    //sets the game's move bar
    function setMoves() {
        if (($_SESSION["playerHP"] > 0) && ($_SESSION["monsterHP"] > 0)) { 
            print "<hr><input type = \"submit\" name = \"action\" value = \"Rock\" class = \"move\"><input type = \"submit\" name = \"action\" value = \"Paper\" class = \"move\"><input type = \"submit\" name = \"action\" value = \"Scissors\" class = \"move\">";
        } else {
            print "<hr><input type = \"submit\" name = \"action\" value = \"Continue...\" class = \"next\">";
        }
    }

    //health display function
    function displayHealth($opponent) {
        if ($_SESSION["win"]) {
            print "<legend>Health: " . setHealth($_SESSION["playerHP"]) . "</legend></fieldset></form>";
            print "<div class = \"enemy disappear\"><legend>Health: " . setHealth($_SESSION["monsterHP"]) . "</legend><img src = " . $opponent . "></div>";
        } else if ($_SESSION["lose"]) {
            print "<legend>Health: " . setHealth($_SESSION["playerHP"]) . "</legend></fieldset></form>";
            print "<div class = \"enemy disappear\"><legend>Health: " . setHealth($_SESSION["monsterHP"])  . "</legend><img src = " . $opponent . "></div>";
        } else if ($_SESSION["round"] == 0) {
            print "<legend>Health: " . setHealth($_SESSION["playerHP"]) . "</legend></fieldset></form>";
            print "<div class = \"enemy appear\"><legend>Health: " . setHealth($_SESSION["monsterHP"]) . "</legend><img src = " . $opponent . "></div>";
        } else {
            print "<legend>Health: " . setHealth($_SESSION["playerHP"]) . "</legend></fieldset></form>";
            print "<div class = \"enemy regular\"><legend>Health: " . setHealth($_SESSION["monsterHP"]) . "</legend><img src = " . $opponent . "></div>";
        }
    }  

    //health bar function
    function setHealth($hp) {
        $str = "";
        for ($i = $hp; $i > 0; $i--) {
            $str = $str . "❤️";
        }
        for ($j = 3 - $hp; $j > 0; $j--) {
            $str = $str . "💔";
        }
        return $str;
    }  
    //determines the outcome of each round
    function setOutcome($actI, $actII, $options) {
        if ((array_search($actII, $options) + 1) % (sizeof($options)) == array_search($actI, $options)) {
            print "Your opponent have choosen " . $actII . ". However, you counterattack with " . $actI . " which result you delivering a successful blow. Thus, Round #" . $_SESSION["round"] . " concludes in a victory. As you and your oppoent once again chant \"Rock, Paper, Scissors, Shoot\", ...";
            setRecover();
            $_SESSION["monsterHP"]--;
            $_SESSION["Score"]++;
        } else if ((array_search($actI, $options) + 1) % (sizeof($options)) == array_search($actII, $options)) {
            print "You have choosen " . $actI . ". However, your opponent counters you with " . $actII . " which result you getting struck. Thus, Round #" . $_SESSION["round"] . " resulting in a lose. As you and your oppoent once again chant \"Rock, Paper, Scissors, Shoot\", ...";
            $_SESSION["playerHP"]--;
            $_SESSION["Score"]--;
        }  else {
            print "You have choosen " . $actI . ". However, your opponent quickly counters with " . $actII . ". Thus, round #" . $_SESSION["round"] . " results in a tied with no damage dealt to either side. As you and your oppoent once again chant \"Rock, Paper, Scissors, Shoot\", ...";
        }
    } 

    //a game mechanic for the boss fight
    function setRecover() {
        if (($_SESSION["monsterHP"] < 2) && ($_SESSION["playerHP"] < 3)) {
            $_SESSION["playerHP"]++;
        } 
    } 

    //displays the player has won the match
    function setVictory($str, $page) {
        $_SESSION["win"] = true; 
        print $str;
    } 

    //displays the player has lose the match
    function setDefeat() {
        $_SESSION["lose"] = true; 
        print "You were overwelmed by the flying fists of your opponent. Therefore, you were defeat by your opponent in \"Rock, Paper, Scissors\". Do you wish to take on the odds again? <hr><button class = \"next\">Try Again...</button>";
    }  

    //sets the game's global variable
    function setGame() {
        $_SESSION["playerHP"] = 3;
        $_SESSION["monsterHP"] = 3;
        $_SESSION["round"] = 0;
        $_SESSION["win"] = false;
        $_SESSION["lose"] = false;
    }

    //resets the game's global variable
    function resetGame() {
        $_SESSION["playerHP"] = 3;
        $_SESSION["monsterHP"] = 3;
        $_SESSION["round"] = 0;
        $_SESSION["win"] = false;
        $_SESSION["lose"] = false;
    }

    //functions for the conclusion page
    //sets the conclusion page up
    function setConclusionPage($path) {
        setBackground($path);
        print "<div class = \"conclusion\"><h1>Congradulations!!</h1><img src = \"./Images/Common/favicon.png\"><div class = \"msg\">Congradulation, you have over came the odds and defeat Fáfnir through rock, paper, scissors. Through these trials, you have overcame each obstacle either through luck, skill, or just pure determination. if you have logged in, the leader board may have update. And thank you for playing another of our game by the Web Enchantment Devs.</p><button class = \"return\"><a href = \"./index.php\">Return to Menu</a></button></div></div>";
    }

    //Yikai's leaderboard function
    function setLeaderBoard() {
        $file = "./Save_Data/Data.txt";
        $content = explode("\n", file_get_contents($file)); 
        for ($h = 0; $h < count($content); $h++) {
            $seperated = explode(',', $content[$h]);
            if (($seperated[0] == $_SESSION['UserName']) && ($seperated[2] < $_SESSION['Score'])) {
                $seperated[2] = $_SESSION['Score'];
                $content[$h] = implode(",", $seperated);
                break;
            }
        }
        for ($i = 0; $i < count($content); $i++) {
            $data1 = explode(',', $content[$i]);
            for ($j = $i + 1; $j < count($content); $j++) {
                $data2 = explode(',', $content[$j]);
                if ($data1[2] < $data2[2]) {
                    // Swap $content[$i] and $content[$j]
                    $temp = $content[$i];
                    $content[$i] = $content[$j];
                    $content[$j] = $temp;
                    // Update $data1 to reflect the new highest value
                    $data1 = $data2;
                }
            }   
        }
        $updated = implode("\n", $content);
        file_put_contents($file, $updated);
    }
    ?>
</body>

</html>