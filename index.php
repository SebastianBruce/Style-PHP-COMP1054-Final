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
$skillCriteria = array("php", "java", "python", "c#", "c++", "javascript");

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
        $message = "Congratulations! You are eligible for the job. Your interview is in 1 week!";
        
        // Redirect to a different page
        header("Location: success.php");
        exit;

    } else {
        $message = "We are sorry, we have moved on with other candidates.";

        // Redirect to a different page
        header("Location: fail.php");
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
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Job Application Form</h1>
    </header>
    <main>
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
            <button type="submit">Submit</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Job Application Form</p>
    </footer>
</body>
</html>
