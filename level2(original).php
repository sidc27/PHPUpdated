<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="" href="style.css">
<title>Rock Paper Scissors</title>
<style>
    
</style>
</head>
<body>
<section>
      <div class="blackintro">
        <div class="intro">
          As you emerge from the depths of the abandoned camp, victorious but
          weary, you find yourself standing on the edge of an enchanted forest.
          The air is thick with magic, and the trees seem to whisper secrets as
          you step into their realm. But your respite is short-lived, for
          lurking within the shadows of this mystical woodland lies a new
          challenge: Asterron the Minotaur. With your sword at the ready and
          your wits sharpened by your recent triumph, you steel yourself for the
          next stage of your adventure. The path ahead is fraught with danger,
          but with courage and cunning, you are determined to emerge victorious
          once more.
        </div>
      </div>

      </section>
      <img class="Minotaur" src="Minotaur.png" alt="" />

      <section>
      
        <div id="container">
    <p>You have run into a ferocious minotaur...Asterron the Labyrinth
          Guardian! You must now defeat the monster in a round of rock, paper and scissors!</p>
    
    <a href="levelbutton.php"><button type="submit" name="player_move" value="rock">Rock</button></a>
       <a href="levelbutton.php"><button type="submit" name="player_move" value="paper">Paper</button></a> 
       <a href="levelbutton.php"> <button type="submit" name="player_move" value="scissors">Scissors</button></a>
    

    <?php
    if (!isset($_SESSION['player_lives']) || !isset($_SESSION['computer_lives'])) {
        $_SESSION['player_lives'] = 3;
        $_SESSION['computer_lives'] = 3;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $player_move = $_POST['player_move'];

        $moves = ['rock', 'paper', 'scissors'];
        $computer_move = $moves[array_rand($moves)]; // Random move for computer

        // Determine the winner and update lives
        if ($player_move == $computer_move) {
            $result = "It's a tie!";
        } elseif (($player_move == 'rock' && $computer_move == 'scissors') ||
                  ($player_move == 'paper' && $computer_move == 'rock') ||
                  ($player_move == 'scissors' && $computer_move == 'paper')) {
            $_SESSION['computer_lives']--;
            $result = "You win!";
        } else {
            $_SESSION['player_lives']--;
            $result = "Computer wins!";
        }

        echo "<div class='result'>";
        echo "<p>You played: $player_move. Computer played: $computer_move.</p>";
        echo "<p>$result</p>";
        echo "<p>Your Lives: {$_SESSION['player_lives']}. Computer's Lives: {$_SESSION['computer_lives']}.</p>";
        echo "</div>";

        // Check for game over conditions
        if ($_SESSION['player_lives'] == 0 || $_SESSION['computer_lives'] == 0) {
            echo "<div class='result'>";
            if ($_SESSION['player_lives'] == 0) {
                echo "<p>Game over. You lost!</p>";
                echo "<form method='post'><button type='submit' name='restart'>Try Again</button></form>";
            } elseif ($_SESSION['computer_lives'] == 0) {
                echo "<p>Congratulations! You won!</p>";
                echo "<form method='post'><button type='submit' name='next_level'><a href='./P2-D.php'>Next Level</a></button></form>";
            } else {
                echo "<p>Congratulations! You won!</p>";
                echo "<form method='post'><button type='submit' name='restart'>Play Again</button></form>";
            }
            session_destroy();
            echo "</div>";
        }
        
    }
    ?>

</div>
</section>
</body>
</html>
