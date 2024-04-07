<?php
// Start or resume the session
session_set_cookie_params(3600);
session_start();

// Check if the user is already logged in
if(isset($_SESSION['UserName']) && !empty($_SESSION['UserName'])) {
    // Redirect the logged-in user to the home page or any other appropriate page
    header("Location: index.php");
    exit;
}

// Function to validate input (e.g., check if the username already exists)
function validateInput($username, $password) {
    // Implement your validation logic here
    // For example, check if the username already exists in the database
    // Return true if validation succeeds, false otherwise
    return true;
}

// Check if the sign-up form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['SignUp'])) {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (validateInput($username, $password)) {
        // Store the user's credentials (e.g., in a database)
        // Here, you should hash the password before storing it for security
        // Example: $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Save $username and $hashedPassword to your database

        // Redirect the user to the sign-in page after successful sign-up
        header("Location: signin.php");
        exit;
    } else {
        // Display an error message if validation fails
        $errorMessage = "Invalid username or password.";
    }
}

// Display the sign-up form
?>

<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="./P1.css">
</head>
<body>   
    <!-- Your HTML code for the sign-up form -->
    <div style="position: absolute; width: 50%; height: 50%; text-align: center; justify-content: center; align-items: center; top: 20%; left: 25%; display: flex; flex-direction: column;">
        <h2>Sign Up</h2>
        <?php if(isset($errorMessage)) { echo '<p style="color: red;">' . $errorMessage . '</p>'; } ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit" name="SignUp">Sign Up</button>
        </form>
        <p>Already have an account? <a href="./signin.php">Sign In</a></p>
    </div>
</body>
</html>
