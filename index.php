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

    // Check eligibility against criteria
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

    // Output eligibility message
    if ($eligibility == 4) {
        // Redirect to a different page
        header("Location: pages/success.html");
        exit;

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Job Application Form</h1>
    </header>
    <main>
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="diploma">Diploma:</label>
                    <input type="text" id="diploma" name="diploma" required>
                </div>
                <div class="form-group">
                    <label for="experience">Years of Experience:</label>
                    <input type="number" id="experience" name="experience" required>
                </div>
                <div class="form-group">
                    <label for="graduation">Graduation Date:</label>
                    <input type="number" id="graduation" name="graduation" value="2022" required>
                </div>
                <div class="form-group">
                    <label for="skill">Important Skill:</label>
                    <input type="text" id="skill" name="skill" required>
                </div>
                <div class = "submit">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <div>
            <p>&copy; 2024 Sebastian Bruce. All rights reserved.</p>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>
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
