<?php
session_start();
include ('../settings/connection.php');
require_once('../action/get_all_vendors.php');

// Execute the function to get all vendors
$vendors = getAllVendors();


$UserName1 = $_SESSION['fname'];
$UserName2 = $_SESSION['lname'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Vendors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
      .upcoming-tasks {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0px;
        max-height: 350px;
        }

      .upcoming-tasks th, .upcoming-tasks td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        }

      .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgb(8, 43, 8);
        padding: 50px;
        margin: 0 10px;
        flex: 1 0 30%; /* Flex-grow: 1, Flex-shrink: 0, Flex-basis: 30% */
        max-width: 1000%; /* Limit the width to 30% of the container */
        text-align: center;
        align-items: center;
        border: 3px solid;
        margin-bottom: 10px;
        margin-top: 90px;
        height: 180px;
        display: flex;
        transform: translateX(-100px); /* Move the card to the left */
        flex-direction: column; /* Align content vertically */
        justify-content: center;
            flex-direction: column; /* Align content vertically */
            justify-content: center; /* Align content horizontally */
        }

      .card:hover {
        background-color: rgb(148, 148, 11); /* Yellow on hover */
     }

      .dashboard {
        display: flex;
        flex-wrap: wrap; /* Allow cards to wrap to the next line */
        justify-content: space-between; /* Distribute space between cards */
        padding: 20px;
        margin-bottom: 0px;
    }

      #completion-rate-card { border-color: #3498db; } 
      .card h3 { margin-bottom: 0px; }
      .card .stat {
            font-size: 24px;
            font-weight: bold;
            margin: 0px 0;
        }
      .highlight { font-weight: bold; }  
      /* Search bar container */
        .search-container {
            margin-bottom: 20px;
            align-items: center;
            display: flex;
        }

        /* Search bar input field */
        .search-container input[type=text] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 8px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Style the search button */
        .search-container button {
            padding: 10px;
            background: #ddd;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        /* Style the search button on hover */
        .search-container button:hover {
            background:rgb(8, 43, 8);
        }
        #searchInput {
            flex: 1; /* Take up remaining space */
            margin-right: 10px; /* Add some spacing between input and button */
        }

        /* Search button */
        #searchButton {
            padding: 8px 12px;
            background-color: rgb(148, 148, 11);
            color: white;
            border: none;
            cursor: pointer;
        }

        /* Style button on hover */
        #searchButton:hover {
            background-color: rgb(8, 43, 8);
        }
        .search-input {
            width: 100%; /* Full width of its container */
            padding: 15px 20px; /* Larger padding for better readability */
            margin: 10px 0; /* Space above and below */
            border: 2px solid #4B0082; /* Matching the theme with a border */
            border-radius: 8px; /* Rounded corners */
            font-size: 16px; /* Larger font size for better visibility */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Subtle shadow for depth */
            box-sizing: border-box; /* Includes padding and border in width */
        }

        /* Add focus style to enhance usability */
        .search-input:focus {
            border-color: #673ab7;
            outline: none; /* Removes the default outline */
            box-shadow: 0 2px 8px rgba(0,0,0,0.2); /* Stronger shadow when focused */
        }

      
      </style>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
            <li>
                <a href="#" class="logo">
                <img src="../g_img/logo.png" alt="" />
                <span id="name" class="nav-item">Home Maintenance</span>
                </a>
            </li>
            <li>
                <a href="../g_view/dash.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
                </a>
            </li>
            <li>
                <a href="../g_view/maintenancePlans.php">
                <i class="fas fa-tools"></i>
                <span class="nav-item">Maintenance plans</span>
                </a>

            </li>
            <li>
                <a href="../g_view/manageservices.php">
                <i class="fas fa-concierge-bell"></i>
                <span class="nav-item">Service Request</span>
                </a>
            </li>
            <li>
                <a href="../g_view/notification_page.php" >
                <i class="fas fa-question-circle"></i>
                <span class="nav-item">Notifications</span>
                </a>
            </li>
            <li>
                <a href="../g_view/setting.php" class="settings">
                <i class="fas fa-cog"></i>
                <span class="nav-item">Settings</span>
                </a>
            </li>
            <li>
                <a href="../g_view/dash_help.php" class="help">
                <i class="fas fa-question-circle"></i>
                <span class="nav-item">Help</span>
                </a>
            </li>
            <li>
                <a href="../g_view/home.php" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
                </a>
            </li>
            </ul>
        </nav>
        
        <section class="main">
            <div class="main-top">
                <h1>DASHBOARD</h1>
                <i class="fas fa-user-cog"><?php echo $UserName1;?> <?php echo $UserName2;?></i> 
            </div>
            <section class="main-task">
                <section class="upcoming-tasks">
                <div class="search-container">
                <input type="text" id="searchInput" class="search-input" onkeyup="searchProvider()" placeholder="Search provider by name, email,category">
                    <div class="search-results-dropdown"></div>
                    <button type="button" onclick="searchProvider()" id="searchButton">Search</button>
                </div>
                

                    <div class="container">
                    <h1 class="text-center mb-4" style="display: inline-block;">List of Vendors</h1>
                    
                        <div class="row row-cols-1 row-cols-md-3 g-4" >
                            <?php foreach ($vendors as $vendor) : ?>  
                                <?php
                                    $sql = "SELECT category_name FROM servicecategories WHERE category_id = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $vendor['category_id']);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $row = $result->fetch_assoc();
                                    $categoryName = $row['category_name'];
                                    // Close the prepared statement
                                    $stmt->close();

                                    $sql = "SELECT review_text FROM reviews WHERE provider_id = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $vendor['user_id']);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $reviews[] = $row['review_text'];
                                        }
                                    } else {
                                        $reviews = []; // Set reviews to an empty array if there are no reviews
                                    }
                                    // Close the prepared statement
                                    $stmt->close();
                                ?>
                                <div class="col vendor-card" data-cat="<?php echo $categoryName; ?>" data-name="<?php echo $vendor['fname'] . ' ' . $vendor['lname']; ?>" data-address="<?php echo $vendor['address']; ?>" data-email="<?php echo $vendor['email']; ?>">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-size: 21px;">Category: <?php echo $categoryName; ?></h5>
                                            <h5 class="card-title" style="font-size: 20px;">Name: <?php echo $vendor['fname'] . ' ' . $vendor['lname']; ?></h5>
                                            <p class="card-text" style="font-size: 20px;">Address: <?php echo $vendor['address']; ?></p>
                                            <p class="card-text" style="font-size: 20px;">Email: <?php echo $vendor['email']; ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="btn btn-primary" style="color: blue" onclick="showDescription('<?php echo $vendor['phone_number']; ?>', <?php echo htmlspecialchars(json_encode($reviews)); ?>)">View Details</a>
                                            <a href="#" class="btn btn-secondary" style="color: blue" onclick="review('<?php echo $vendor['user_id']; ?>','<?php echo $vendor['fname']; ?>')">Review</a>
                                            
                                        </div>
                                    </div>
                                </div>

                        <?php endforeach; ?>
                    </div>
                </div>
    <script>
        
        function showDescription(phoneNumber, reviews) {
            var reviewsHtml = '';
            if (Array.isArray(reviews)) {
                reviewsHtml = reviews.map(function(review) {
                    return '<div>' + review + '</div>';
                }).join('');
            } else {
                reviewsHtml = reviews; // Assuming reviews is already a string
            }

            Swal.fire({
                title: 'Details',
                html: '<div><strong>Phone Number:</strong> ' + phoneNumber + '</div><div><strong>Reviews:</strong><br>' + reviewsHtml + '</div>',
                showConfirmButton: false,
                background: 'rgba(0, 0, 0, 0.8)'
            });
}


        function review(id, name) {
            Swal.fire({
                title: 'Review ' + name,
                html: '<textarea id="reviewText" rows="4" cols="50" placeholder="Write your review here..."></textarea>',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Submit Review'
            }).then((result) => {
                if (result.isConfirmed) {
                    var review = document.getElementById('reviewText').value;
                    // Redirect to the review.php script with the id and review text
                    window.location.href = "../action/review.php?id=" + id + "&review=" + review ;
                }
            });
        }

        function searchProvider() {
    var input, filter, cards, card, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    cards = document.querySelectorAll('.card-body');

    cards.forEach(card => {
        txtValue = card.textContent || card.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            card.parentElement.style.display = ""; // Show the card container
        } else {
            card.parentElement.style.display = "none"; // Hide the card container
        }
    });
}

        
        // Close the dropdown when clicking outside
        document.addEventListener('click', function(event) {
            var dropdown = document.querySelector('.search-results-dropdown');
            var searchBox = document.getElementById('searchInput');
            // Close the dropdown if the click is outside of the dropdown and the search box
            if (!dropdown.contains(event.target) && !searchBox.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });

        // Adding event listener for the search box
        document.getElementById('searchInput').addEventListener('input', searchProvider)
        ;
    </script>

</html>
