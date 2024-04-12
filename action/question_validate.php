<?php
session_start();
require '../settings/connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $answer1 = mysqli_real_escape_string($conn, $_POST['security_answer_1']);
    $answer2 = mysqli_real_escape_string($conn, $_POST['security_answer_2']);
    $answer3 = mysqli_real_escape_string($conn, $_POST['security_answer_3']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $_SESSION['email'] = $email;
    

    // Fetch UserID using the email address
    $sqlUser = "SELECT user_id FROM users WHERE email = ?";
    $stmtUser = $conn->prepare($sqlUser);
    $stmtUser->bind_param("s", $email);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    if ($resultUser->num_rows === 1) {
        // User found
        $user = $resultUser->fetch_assoc();
        $userID = $user['user_id'];



        // Fetch the security answers for this user
        $sql = "SELECT a.answer, q.questionId
        FROM answers AS a
        JOIN q_arelation AS qr ON a.ans_id = qr.q_aid
        JOIN questions AS q ON qr.q_id =q.questionId
        WHERE qr.UserID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        $answersCorrect = true;

        while ($row = $result->fetch_assoc()) {
        if ($row['questionId'] == 1 && strtolower($row['answer']) != strtolower($answer1)) {
            echo $row['answer'];
            echo "no1";
            $answersCorrect = false;
        } elseif ($row['questionId'] == 2 && $row['answer'] != $answer2) {
            $answersCorrect = false;
            echo "no2";
        } elseif ($row['questionId'] == 3 && $row['answer'] != $answer3) {
            $answersCorrect = false;
            echo "no3";
        }
        }

        if ($answersCorrect) {
            
        
        include"../g_view/home_set_new_password.php";
            
        } 
        echo "incorrect answers";
        } else {
        // The answers did not match, handle the error (e.g., show a message to the user)
        echo "The answers provided do not match our records.";
        }

        $stmt->close();

    } else {
        // No user found with the provided email address, handle accordingly
        echo "No account found with that email address.";
    }
$stmtUser->close();
$conn->close();
?>
