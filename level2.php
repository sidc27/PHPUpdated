<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="./Images/Common/favicon.png">
<title>Level 2: Labyrinth Guardian</title>
<style>
    
</style>
</head>
<body>
    <?php
    //level-2
    include 'common.php';
    $prologue = "As you emerge from the depths of the abandoned camp, victorious but
                weary, you find yourself standing on the edge of an enchanted forest.
                The air is thick with magic, and the trees seem to whisper secrets as
                you step into their realm. But your respite is short-lived, for
                lurking within the shadows of this mystical woodland lies a new
                challenge: Asterron the Minotaur. With your sword at the ready and
                your wits sharpened by your recent triumph, you steel yourself for the
                next stage of your adventure. The path ahead is fraught with danger,
                but with courage and cunning, you are determined to emerge victorious
                once more.";
    $start = "You have run into a ferocious minotaur...Asterron the Labyrinth
              Guardian! You must now defeat the monster in a round of rock, paper and scissors!";
    $end = "You have defeated Asterron the Labyrinth Guardian proving your strength in the art of 
            rock, paper, scissors!";
    $epilogue = "After the defeat of the mighty minotaur, you are left alone and finally able to take in 
                mystic quality of this great forest. Before you depart, you contemple the the challenges 
                that you have over come, in addition to what lies in store for you around the next part 
                of you journey. You were exhausted. However, your mood is lifted by the dazzling presence of 
                magic all around you within nature. The lights twinkling above you like star in the night sky
                with you wondering if you are truely ready continue again...";
    playGame("./background4.png", "./Minotaur.png", "./P2-D.php", $prologue, $epilogue, $start, $end);
    ?>

</div>
</section>
</body>
</html>
