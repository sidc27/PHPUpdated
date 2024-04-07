<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Level 1: The Ambush</title>
    <link rel="icon" href="./Images/Common/favicon.png">
</head>

<body>
	<?php 
    //level-1b
    include 'common.php';
    $prologue = "Finally, after weeks of traveling in darkness, you are greeted by the warm 
                embrace of the sun’s light upon your body. The lush forest captivates you into 
                wanting to explore the environment. So, you decide to look around the area. 
                Then, you discover a camp most likely set up by previous adventurers with tents 
                and gear scattered about on the ground. 
                <br><br>
                However, you feel fear rather joy at the discovery because the camp was deserted 
                and abandoned. Your fears were confirmed as you heard something approaching from 
                deeper inside the forest, along with the distinct smell of death and decay getting 
                stronger with every second...";
    $start = "Before your eyes, a ginormous slime slowly oozes towards you from beyond the 
              tree line. You ready yourself by take up a fighting position with it following 
              suit. You ready your hands for what is to come. What is your first move?";
    $end = "You land the finishing blow upon the slime. Upon its defeat, the slime slowing 
            falls apart until it was nothing more than dew upon the grass. Therefore, you 
            decide to press forward deeper into the mystic forest with renewed determination.";
    $epilogue = "After the battle subsides, you decide to scavenge through the ruins of the camp 
                for any gear or items to assist in your quest. You go through the camp from tent 
                to tent moving possibly viable items to the center of the encampment. In the end, 
                you find some medical items along with some weapons and armor. 
                <br><br>
                As you continue restocking, you notice that it has become midday. Therefore, you
                decided to use the medical supplies to heal your wounds and replace your damage 
                gear. Finally, you march off into the forest at a quick pace, not wanting to waste 
                any daylight. As your journey continues...";
    playGame("./Images/Backgrounds/level1b.jpg", "./Images/Monsters/slime.png", "./level2.php", $prologue, $epilogue, $start, $end);
    ?>
</body>

</html>