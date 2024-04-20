<!-- PHP from assignment 2 -->

<?php

// Function to sanitize form inputs
function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Define eligibility criteria
$diplomaCriteria = array("cs", "cmpg", "cp", "programming", "coding", "computer science");
$skillCriteria = array("php", "java", "python", "c#", "c++", "javascript", "html", "css");

// Initialize eligibility counter
$eligibility = 0;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and store form inputs
    $diploma = sanitizeInput($_POST["diploma"]);
    $experience = sanitizeInput($_POST["experience"]);
    $graduation = sanitizeInput($_POST["graduation"]);
    $skill = sanitizeInput($_POST["skill"]);

    // Check eligibility against criteria, each criteria matched, up eligibility number
    if (in_array(strtolower($diploma), $diplomaCriteria)) {
        $eligibility++;
    }
    if ($experience >= 2) {
        $eligibility++;
    }
    if ($graduation <= 2022) {
        $eligibility++;
    }
    if (in_array(strtolower($skill), $skillCriteria)) {
        $eligibility++;
    }

    // If eligible
    if ($eligibility == 4) {
        // Redirect to a different page
        header("Location: pages/success.html");
        exit;

    // If ineligible
    } else {
        // Redirect to a different page
        header("Location: pages/fail.html");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Better formatting for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <!-- Link style sheets -->
    <!-- https://necolas.github.io/normalize.css/ -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Job Application Form</h1>
    </header>
    <main>
        <!-- Form that contains each input element -->
        <!-- Sends information to the php that allows it to switch pages  -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Inputs -->
            <div class="form-group">
                <label for="diploma">Diploma:</label>
                <input type="text" id="diploma" name="diploma" required>
            </div>
            <!-- Number input -->
            <div class="form-group">
                <label for="experience">Years of Experience:</label>
                <input type="number" id="experience" name="experience" required>
            </div>
            <!-- Number input set to 2022 by default -->
            <div class="form-group">
                <label for="graduation">Graduation Date:</label>
                <input type="number" id="graduation" name="graduation" value="2022" required>
            </div>
            <div class="form-group">
                <label for="skill">Important Skill:</label>
                <input type="text" id="skill" name="skill" required>
            </div>
            <!-- Button that when clicked triggers the information to be posted to the php -->
            <div class = "submit">
                <button type="submit">Submit</button>
            </div>
        </form>
    </main>
    <footer>
        <!-- Key information -->
        <div>
            <p>&copy; 2024 Sebastian Bruce. All rights reserved.</p>
            <ul>
                <li>Privacy Policy</li>
                <li>Terms of Service</li>
                <li>FAQs</li>
            </ul>
        </div>
        <!-- Fake contact info -->
        <div>
            <p>Contact Us</p>
            <ul>
                <li>Email: fake@email.com</li>
                <li>Phone: 123-456-7890</li>
                <li>Address: 123 Fake Street, City</li>
            </ul>
        </div>
    </footer>
</body>
</html>
