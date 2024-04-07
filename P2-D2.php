<?php
session_start();
$username = $_SESSION['UserName'];
$DH = $_SESSION['DH'];
$PH = $_SESSION['PH'];
$DC = $_SESSION['DC'];
$C1 = $_SESSION['C1'];
$C2 = $_SESSION['C2'];
$C3 = $_SESSION['C3'];
$A = $_SESSION['A'];
$D = $_SESSION['D'];
$P = $_SESSION['P'];
$MP = $_SESSION['MP'];
$Score = $_SESSION['Score']; // Added initialization for $Score
$_SESSION['Score'] = $Score;
// Handling POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processing choice C1
    if (isset($_POST['C1'])) {
        if ($_POST['C1'] == 'Accept') {
            $A = 1;
            $_SESSION['A'] = $A;
            $DC += 1;
            $_SESSION['DC'] = $DC;
            $Score -= 2;
            $_SESSION['Score'] = $Score;
        }
    }
    // Processing choice C2
    if (isset($_POST['C2'])) {
        if ($_POST['C2'] == 'Accept') {
            $P = 2;
            $PH += 2; // Increasing player health by 2
            $_SESSION['PH'] = $PH;
            $_SESSION['P'] = $P;
            $DC += 1;
            $_SESSION['DC'] = $DC;
            $Score -= 2;
            $_SESSION['Score'] = $Score;
        }
    }
    // Processing choice C3
    if (isset($_POST['C3'])) {
        if ($_POST['C3'] == 'Accept') {
            $D = 1;
            $_SESSION['D'] = $D;
            $DC += 1;
            $_SESSION['DC'] = $DC;
            $Score -= 2;
            $_SESSION['Score'] = $Score;
        }
    }
    // Processing attack
    if (isset($_POST["attack"])) {
        $_SESSION['PH'] = 3 + $P;
        $DH = 10;
        $_SESSION['DH'] = $DH;
    } elseif (isset($_POST["choice"])) {
        // Choice form processing
        $playerChoice = $_POST['choice'];
        $options = array('rock', 'paper', 'scissors');
        $FáfnirChoice = $options[array_rand($options)];

        if ($playerChoice == $FáfnirChoice) {
        } elseif (($playerChoice == 'rock' && $FáfnirChoice == 'scissors') ||
            ($playerChoice == 'paper' && $FáfnirChoice == 'rock') ||
            ($playerChoice == 'scissors' && $FáfnirChoice == 'paper')) {
            $DH -= 1 + $D; // Decrease dragon's HP
            $PH += $A;
            $_SESSION['DH'] = $DH;
            $_SESSION['PH'] = $PH;
            $Score += 1;
            $_SESSION['Score'] = $Score;
        } else {
            $PH -= 1; // Decrease player's HP
            $_SESSION['PH'] = $PH;
            $Score -= 1;
            $_SESSION['Score'] = $Score;
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Final Level</title>
    <link rel="stylesheet" type="text/css" href="./P1.css">
    <link rel="icon" href="./Images/Common/Icon.png">
    <style>
        .choice {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>
    <div style="width:100%; height:100%; overflow: hidden; position:absolute; min-width:1500px;">
        <?php
        if ($PH <= 0) {
            echo '
            <div class="overlay" style="animation:fadeIn 3s forwards; z-index:20;display:flex;flex-direction:column;">
                <div class="intro">
                    In the haunting aftermath of the battle,<br> our valiant hero\'s fate takes a tragic turn. Despite their fearless charge and heroic effort,<br> they succumb to the relentless onslaught of Fáfnir\'s fiery breath.<br><br> As life ebbs away, a somber realization dawns - their name will fade into obscurity,<br> their deeds forgotten by all.<br> No songs will be sung in their honor,<br> no monuments raised in their memory. <br>Their tale ends not with triumph and glory, <br>but with a silent lament, <br>a solitary echo lost in the winds of time.
                </div>
            
            <div>
                <button class="Next" onclick="location.href = \'./P2-D.php\'" style="animation:fadeOut 0s forwards, fadeIn 2s forwards 5s;">Try again</button>
                <button class="Next" onclick="location.href = \'./index.php\'" style="animation:fadeOut 0s forwards, fadeIn 2s forwards 5s;">Give Up</button>
            </div></div>';
			$Score=0;
		$_SESSION['Score']=0;
        } else if ($DH <= 0 && $DC == 0) {
            echo '
            <div class="overlay" style="animation:fadeIn 3s forwards; z-index:20;display:flex;flex-direction:column;" >
                <div class="intro">
                    In the hushed whispers of the forest, long after the hero\'s footsteps had faded and the echoes of battle had dissolved into memory, the tale endured. It became a beacon of inspiration, passed down through generations like a treasured heirloom. The hero, once a solitary figure amidst the shadows, became a symbol of courage and resilience for all who called the cursed forest home.<br>
                    With each passing season, the forest flourished anew, its once-dreaded reputation transformed into one of hope and renewal. And though the hero\'s name may have been lost to time, their legacy lived on in the very fabric of the land they had saved.<br>
                    So let us remember, dear reader, that even in the darkest of times, there exists within each of us the power to defy the odds and overcome the greatest of challenges. For like a fallen leaf carried by the wind, the hero\'s journey serves as a reminder that within every tale, there lies the potential for redemption and transformation.
                </div>
            
            <div>
                <button class="Next" onclick="location.href = \'./conclusion.php\'" style="animation:fadeOut 0s forwards, fadeIn 2s forwards 5s;">Next</button>
            </div></div>';
        } else if ($DH <= 0 && $DC == 1) {
            echo '
            <div class="overlay" style="animation:fadeIn 3s forwards; z-index:20;display:flex;flex-direction:column;" >
                <div class="intro">
                    As the hero stood amidst the triumph of victory, crowned as the esteemed lord "Draco Venator," the weight of the title rested heavily upon their shoulders. The cheers of the people echoed through the land, celebrating the bravery and valor that had vanquished the mighty dragon. Yet, beneath the surface, a shadow lingered—a legacy tainted by the curse of the dragon.<br><br>
                    For deep within the hero\'s bloodline, the remnants of the ancient curse lay dormant, a silent reminder of the perilous path they had chosen. Though the hero had emerged victorious, the bond between dragon and dragon hunter ran deeper than mere steel and flame. It was a connection that transcended time and blood, a legacy that could not be easily cast aside.<br><br>
                    And so, as the hero gazed upon the horizon, they knew that the tale of dragons and dragon hunters would endure, destined to be woven into the fabric of their lineage. Perhaps one day, another dragon would awaken within their bloodline, and the age-old struggle would be reignited once more. But until that fateful day, the hero vowed to bear the burden of their legacy with honor and resolve, knowing that the story of the dragon and the dragon hunter would echo through the ages, forever entwined in the tapestry of history.
                </div>
           
            <div>
                <button class="Next" onclick="location.href = \'./conclusion.php\'" style="animation:fadeOut 0s forwards, fadeIn 2s forwards 5s;">Next</button>
            </div> </div>';
        } else if ($DH <= 0 && $DC == 2) {
            echo '
            <div class="overlay" style="animation:fadeIn 3s forwards; z-index:20;display:flex;flex-direction:column;" >
                <div class="intro">
                    In the aftermath of the heroic battle, the once-celebrated hero bore the scars of sacrifice, accepting a burden too heavy for mortal shoulders to bear. With each passing day, the curse that had been unwittingly embraced took root within, transforming the noble figure into something beyond recognition. Scales encased their form, and horns pierced through flesh, marking the transition from hero to something altogether different—a creature both feared and misunderstood.<br><br>
                    As whispers of the monster in human guise spread, the hero found solace only within the depths of a secluded forest, where the shadows masked their altered visage. Cast out by a world that had once hailed them as savior, they roamed alone, haunted by memories of their former glory.<br><br>
                    But as time unfurled its relentless march, the world knew peace, lulled into a false sense of security by the fading memory of the dragon\'s roar. Yet, deep within the recesses of the earth, the ancient echo stirred once more, awakening the primal fear that lay dormant within all creatures.<br><br>
                    And so, as the world teetered on the brink of upheaval, the hero-turned-monster emerged from the shadows, their gaze fixed upon the horizon. For though their visage may have been marred by the curse they had willingly embraced, the fire of determination still burned within. And as the dragon\'s roar shattered the tranquility of the world, the hero knew that their journey was far from over, for destiny had called upon them once more to confront the darkness that threatened to engulf the land.
               
            </div>
            <div>
                <button class="Next" onclick="location.href = \'./conclusion.php\'" style="animation:fadeOut 0s forwards, fadeIn 2s forwards 5s;">Next</button>
            </div> </div>';
        } else if ($DH <= 0 && $DC == 3) {
            echo '
            <div class="overlay" style="animation:fadeIn 3s forwards; z-index:20;display:flex;flex-direction:column;" >
                <div class="intro">
                    In the aftermath of the epic battle, a shroud of uncertainty descended upon the land. Whispers filled the air, weaving tales of a hero vanished without a trace, their fate a mystery lost to the annals of time. Yet, as the people grappled with the uncertainty of their savior\'s fate, a new threat emerged from the shadows—an entity of darkness and despair known only as Nidhoggur.<br><br>
                    With each beat of its mighty wings, Nidhoggur cast a pall of dread over the land, its presence a harbinger of doom. Consuming everything in its path with insatiable hunger, it spared no corner of the realm from its relentless onslaught.<br><br>
                    As the people watched in horror, their once-peaceful world crumbled before their very eyes, swallowed by the encroaching darkness. Desperation hung heavy in the air as they searched for a glimmer of hope amidst the chaos.<br><br>
                    But amid the despair, a flicker of determination ignited within the hearts of the courageous few. For though the hero may have vanished, their spirit lived on in the hearts of those who refused to surrender to the encroaching darkness.<br><br>
                    And so, as the shadow of Nidhoggur loomed large over the land, the people rallied together, united in their resolve to stand against the tide of destruction. For even in the face of the darkest night, they knew that as long as there remained a single ember of hope, the light would never truly be extinguished.
                </div>
            
            <div>
                <button class="Next" onclick="location.href = \'./conclusion.php\'" style="animation:fadeOut 0s forwards, fadeIn 2s forwards 5s;">Next</button>
            </div>
            </div>';
        }
        ?>
        <div style="width:1550px;">
            <div style="position: relative; z-index:-10;">
                <img src="./Images/Backgrounds/Forest.png" style="width: 100%; position: absolute; z-index: -1; max-height:95%; min-width:1300px">
                <img src="./Images/Backgrounds/Grassland.png" style="width: 100%; position: relative; z-index:-2; min-width:1300px">
            </div>
            <img class="monster2" src="./Images/Dragon.png">
            <div class="hp" style="height:150px; overflow:hidden; top: 310px; left: 630px; position: absolute; width: 310px; animation:none;">
                <?php
                $max_health_D = 10;

                for ($i = 0; $i < $DH; $i++) {
                    echo '<img src="./Images/Common/Heart.png" class="hearts" alt="Heart" style="width:10%">';
                }

                for ($i = $DH; $i < $max_health_D; $i++) {
                    echo '<img src="./Images/Common/Empty_Heart.png" class="hearts" alt="Empty Heart" style="width:10%">';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="dialoge" style="animation: fadeIn 0s forwards;">
        <div style="flex: 1">
            <span style="font-size: 25px; color: red;">
                <center> You</center>
            </span><br>
            <div class="hp" style=" height:150px; left: 250px; animation: none;">
                <?php
                $MP = 3 + $P;
                if ($PH > $MP) {
                    $PH = $MP;
                    $_SESSION['PH'] = $PH;
                }
                for ($i = 0; $i < $PH; $i++) {
                    echo '<img src="./Images/Common/Heart.png" class="hearts" alt="Heart" style="width:33%">';
                }

                for ($i = $PH; $i < $MP; $i++) {
                    echo '<img src="./Images/Common/Empty_Heart.png" class="hearts" alt="Empty Heart" style="width:33%">';
                }
                ?>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; flex: 7;">
            <div class="text">
                <?php
                if ($DH <= 8 && $C1) {
                    echo 'Brave warrior, you have fought well. You blade is drowned by the cursed blood, and if you are willing to wield this cursed power you shall be grant with power to drain life from scars
                    <div class="choice">
                        <form method="post">
                            <button type="submit" name="C1" value="Accept">Accept</button>
                        </form>
                        <form method="post">
                            <button type="submit" name="C1" value="Decline">Decline</button>
                        </form>
                    </div>';
                    $_SESSION['C1'] = false;
                } elseif ($DH <= 6 && $C2) {
                    echo 'Brave warrior, you have fought well. You Body is drowned by the cursed blood, and if you are willing to behold this cursed power you shall be grant with power of dragon\'s heart
                    <div class="choice">
                        <form method="post">
                            <button type="submit" name="C2" value="Accept">Accept</button>
                        </form>
                        <form method="post">
                            <button type="submit" name="C2" value="Decline">Decline</button>
                        </form>
                    </div>';
                    $_SESSION['C2'] = false;
                } elseif ($DH <= 4 && $C3) {
                    echo 'Brave warrior, you have fought well. You blade is drowned with more cursed blood, and if you are willing to wield this cursed power you shall be grant with power to cause unhealable wounds
                    <div class="choice">
                        <form method="post">
                            <button type="submit" name="C3" value="Accept">Accept</button>
                        </form>
                        <form method="post">
                            <button type="submit" name="C3" value="Decline">Decline</button>
                        </form>
                    </div>';
                    $_SESSION['C3'] = false;
                } else {
                    if (isset($playerChoice)) {
                        if ($playerChoice == $FáfnirChoice) {
                            echo "You valiantly chose $playerChoice, and Fáfnir, the mighty dragon, also opted for $FáfnirChoice.<br>";
                            echo "A clash of titans, yet neither sustains harm.";
                        } elseif (($playerChoice == 'rock' && $FáfnirChoice == 'scissors') ||
                            ($playerChoice == 'paper' && $FáfnirChoice == 'rock') ||
                            ($playerChoice == 'scissors' && $FáfnirChoice == 'paper')) {
                            echo "With courage, you wielded $playerChoice, and Fáfnir, in his might, fell to $FáfnirChoice.<br>";
                            echo "Your blows land upon the dragon, dealing damage to his formidable scales!";
                        } else {
                            echo "Alas, you chose $playerChoice, but Fáfnir, with his cunning, unleashed $FáfnirChoice.<br>";
                            echo "You find yourself at the mercy of the dragon's wrath, as his fury engulfs you!";
                        }
                    } else {
                        echo "Behold, brave warrior, as you stand face-to-face with the mighty dragon, poised at the precipice of destiny. To vanquish this formidable foe, you must engage in the ancient game of rock, paper, and scissors. ";
                    }
                }
                ?>
            </div>
            <?php
            if (!($DH <= 8 && $C1) && !($DH <= 6 && $C2) && !($DH <= 4 && $C3)) {
                echo '
                <div class="choice">
                    <form method="post">
                        <button type="submit" name="choice" value="rock">Rock</button>
                    </form>
                    <form method="post">
                        <button type="submit" name="choice" value="paper">Paper</button>
                    </form>
                    <form method="post">
                        <button type="submit" name="choice" value="scissors">Scissors</button>
                    </form>
                </div>';
            }
            ?>
        </div>
    </div>
</body>

</html>
