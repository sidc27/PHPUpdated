<?php
session_start();
$DH = 10;
$PH = 3;
$DC = 0;
$C1 = $C2 = $C3 = $C4 = true;
$A=0;
$D=0;
$P=0;
$MP=3;
$Score;
$_SESSION['DH'] = $DH;
$_SESSION['PH'] = $PH;
$_SESSION['DC'] = $DC;
$_SESSION['C1'] = $C1;
$_SESSION['C2'] = $C2;
$_SESSION['C3'] = $C3;
$_SESSION['C4'] = $C4;
$_SESSION['A'] = $A;
$_SESSION['D'] = $D;
$_SESSION['P'] = $P;
$MP= $_SESSION['MP'];
$_SESSION['Score'] = $Score;

?>
<html>
<head>
<title>Final Level</title>
<link rel="stylesheet" type="text/css" href="./P1.css">
<link rel="icon" href="./Images/Common/Icon.png">
</head>
<body>


<div style="width:100%;height:100%;  overflow: hidden; position:relative;min-width:1500px;">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Talk'])){
	 echo '
            <div class="overlay" style="animation:fadeIn 3s forwards; z-index:20;display:flex;flex-direction:column;">
                <div class="intro">
                   The fallen leaf tells a story, in the forest, far away from the kingdom. There, a fool sought power from an evil dragon. The dragon, amused by Jaster\'s audacity, granted him power under one condition — each time Jaster used the power, the dragon would claim something that belonged to him when they met again the dragon would take it from the fool.<br><br>

Jaster, blinded by his desires, used the power to obtain wealth, status, and everything he desired. He believed he could outsmart the dragon and keep the power forever. However, his arrogance led to his downfall.<br><br>

When a warrior arrived to slay the dragon, Jaster realized the truth — he had become the very thing he sought to control. The mirror revealed his transformation into a dragon, symbolizing the corruption and greed that consumed him.<br><br>

In the end, Jaster lost everything he had gained, including his humanity, as he saw the reflection of the dragon within himself. 
                </div>
            
            <div>
                <button class="Next" onclick="location.href = \'./P2-D.php\'" style="animation:fadeOut 0s forwards, fadeIn 2s forwards 5s;">Try again</button>
                <button class="Next" onclick="location.href = \'./index.php\'" style="animation:fadeOut 0s forwards, fadeIn 2s forwards 5s;">Give Up</button>
            </div></div>';
	}
}
?>
<div class="overlay">
  <div class="intro">
    As you venture deeper into the enchanted forest,<br>
    a thunderous roar shatters the serene air.<br>
    Behold, the majestic dragon Fáfnir,<br>
    once a dwarf, now cursed by the gods for its insatiable greed.<br>
    It looms as a colossal threat to all inhabitants of this realm,<br>
    delighting in the agony and despair of its victims.<br><br>

    To vanquish Fáfnir is to etch your name into the annals of legend,<br>
    your tale echoing across the ages,<br>
    your valor celebrated for eternity.<br>
    For in the defeat of this ancient beast,<br>
    your glory shall endure as long as time itself.<br>
  </div>
</div>
<div style="width:1550px;">
  <div style="position: relative; z-index:-10;">
    <img src="./Images/Backgrounds/Forest.png" style="width: 100%; position: absolute; z-index: -1; max-height:95%; min-width:1300px">
    <img src="./Images/Backgrounds/Grassland.png" style="width: 100%;position: relative; z-index:-2; min-width:1300px">
  </div>
  <img class="monster" src="./Images/Dragon.png">
  <img src="Slash.png" style="position:absolute;z-index:15;width:300px; left: 600px; top: 30px;  animation: fadeOut 0s forwards"> 
 <div>
  <div class="hp" style="  height:150px;overflow:hidden;  top: 310px;  left: 630px; position: absolute; 
    width: 310px;">
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
<div class="dialoge">
<div style="flex: 1">
 <span style="font-size: 25px; color: red;"><center> You</center></span><br>
<div class="hp" style=" height:150px;left: 250px; animation: none;">
    <?php
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
                You have encountered the final battle with the mighty dragon Fáfnir. You know it\'s the end of the journey, and by defeating it, you would become a living legend. Now, choose your action.
            </div>
            <div class="choice">
   <form method="post" action="P2-D2.php">
    <button type="submit" name="attack">Attack Fáfnir</button>
</form>
<form method="POST" action="P2-D.php">
<button type="submit" name="Talk">Sought power from the dragon</button>
</form>
  </div>
  </div>
</div>

</body>
</html>