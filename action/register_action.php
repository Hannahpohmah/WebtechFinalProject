<?php
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $address = $_POST["street_adddress"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $category = $_POST["category"];

    $query = "SELECT category_id FROM servicecategories WHERE category_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $category_id = $row['category_id'];

    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    $questionIds = $_POST['question_id'];
    $answers = $_POST['security_answer'];
    
    if (count($questionIds) !== count($answers)) {
        die("Error: Mismatch between the number of questions and answers.");
    }
    // Check if there is already a user with the same email
    $checkEmailQuery = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // User with the same email already exists
        echo "A user with this email already exists.";
        error_log("User with the same email already exists");
        header("Location: ../g_view/home_register.php");
        exit();
    }

    if ($role == "Housekeeper") {
        $roleID = 2;
    } else {
        $roleID = 3;
    }
        
    // If no user with the same email exists, proceed to insert new user
    $insertUserQuery = "INSERT INTO users (fname, lname, gender, email, password, roleID, address, phone_number, category_id) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertUserQuery);
    $stmt->bind_param("sssssissi", $fname, $lname, $gender, $email, $password, $roleID, $address, $phone_number, $category_id);
    if ($stmt->execute()) {
        $UserID = $stmt->insert_id;

        // Insert answers and relations
        foreach ($answers as $index => $answer) {
            $sanitizedAnswer = htmlspecialchars(strip_tags($answer));
            $q_id = $questionIds[$index];

            // Insert the answer
            $stmt = $conn->prepare("INSERT INTO answers (answer) VALUES (?)");
            $stmt->bind_param("s", $sanitizedAnswer);

            if ($stmt->execute()) {
                $answerId = $conn->insert_id;

                // Insert the relation
                $stmt = $conn->prepare("INSERT INTO q_arelation (UserID, q_id, ansid) VALUES (?, ?, ?)");
                $stmt->bind_param("iii", $UserID, $q_id, $answerId);
                if (!$stmt->execute()) {
                    echo "Failed to insert relation: " . $stmt->error;
                }
            } else {
                echo "Failed to insert answer: " . $stmt->error;
            }
        }

        header("Location: ../g_view/home.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        header("Location: ../g_view/home_register.php");
        exit();
    }
}

$conn->close();
?>
