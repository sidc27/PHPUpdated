<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Level 1: The Crypt</title>
    <link rel="icon" href="./Images/Common/favicon.png">
</head>

<body>
	<?php 
    //level-1a
    include 'common.php';
    $prologue = "You had embarked on a quest to save the realm from the great beast known 
                as Fáfnir. Throughout your travels, you had heard rumors that Fáfnir had 
                taken an enchanted forest beyond a treacherous mountain range. However, you 
                been guided towards an abandoned dwarven keep, which was regarded as Fáfnir’s 
                ancient home, that led through the mountain range. As your will begins to waver, 
                you finally find the hidden passageway to allow you to reach the enchanted forest.
                <br><br>
                For weeks, you travel through the winding rooms and passageways of these 
                once great halls. The keep was so desolate that you could hear the rhythmic 
                sound of your feet hitting the stone floor. However, the silence is broken as 
                you hear a sinister cackle coming from beyond the next doorway. As your journey 
                begins...";
    $start = "Suddenly, an imp bursts out form from behind a corridor. You ready yourself 
              by take up a fighting position with the imp following suit. You ready your
              hands for what is to come. What is your first move?";
    $end = "You land the finishing blow upon the imp. Upon its defeat, the imp's essence 
            dispensary into the air. Once again, you were alone within the solum keep which 
            you have traversing through with only your throughts to guide you.";
    $epilogue = "After your battle, you decide to set up camp in order to regain your strength. 
                You begin making a fire to cook your food over. Additionally, you build a makeshift 
                tent to protect you in your sleep. After preparing your campsite, you drift off to 
                sleep.
                <br><br> 
                After you wake from your slumber, you begin pressing forward deep into the ancient 
                dwarven stronghold. However, you precautious continue after your experience with the imp. 
                You are also praying that you will exit this crypt before it becomes your tomb. As your 
                journey continues...";
    playGame("./Images/Backgrounds/level1a.png", "./Images/Monsters/imp.png", "./level1b.php", $prologue, $epilogue, $start, $end);
    ?>
</body>

</html>