<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>
    <div class="container">
      <nav>
        <ul>
          <li>
            <a href="home.php" class="logo">
              <img src="../g_img/bbg_logo.jpeg" alt="" />
              <span id="name" class="nav-item">HealthLine</span>
            </a>
          </li>
          <li>
            <a href="../g_view/admin.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
          </li>
          <li>
            <a href="../g_view/profile.php">
              <i class="fas fa-user"></i>
              <span class="nav-item">Profile</span>
            </a>
          </li>
          <li>
            <a href="../g_view/appointmentList.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Appointment List</span>
            </a>
          </li>
          <li>
            <a href="../g_view/setting.php" class="settings">
              <i class="fas fa-cog"></i>
              <span class="nav-item">Settings</span>
            </a>
          </li>
          <li>
            <a href="#" class="help">
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
        <h1>Help Page: Health Scheduling WebApp</h1>

    <h2>1. Scheduling Appointments:</h2>
    <ol>
        <li><strong>Log in:</strong> Use your registered email and password to log in to your account.</li>
        <li><strong>Navigate to Schedule:</strong> Once logged in, navigate to the "Schedule" section of the website.</li>
        <li><strong>Select Appointment Type:</strong> Choose the type of appointment you require (e.g., General Check-up, Specialist Consultation).</li>
        <li><strong>Choose Date and Time:</strong> Select a suitable date and time from the available slots.</li>
        <li><strong>Confirm Appointment:</strong> Review the details of your appointment and confirm to schedule it.</li>
    </ol>

    <h2>2. Constant Reminders:</h2>
    <ul>
        <li><strong>Email Notifications:</strong> Receive email notifications for upcoming appointments, prescription refills, or health check-ups.</li>
        <li><strong>SMS Alerts:</strong> Opt-in to receive SMS alerts to your registered phone number for timely reminders.</li>
        <li><strong>In-App Notifications:</strong> Get instant notifications within the app for any updates or reminders.</li>
    </ul>

    <h2>3. Health History Management:</h2>
    <ol>
        <li><strong>Medical Records:</strong> Access your medical records from the "Health History" section of the website.</li>
        <li><strong>View Past Meetings:</strong> Review details of past appointments, including date, time, doctor's notes, and diagnosis.</li>
        <li><strong>Update Information:</strong> Keep your health information up-to-date by adding any changes or new diagnoses.</li>
        <li><strong>Share with Healthcare Providers:</strong> Easily share your health history with healthcare providers for better continuity of care.</li>
    </ol>

    <h2>4. Additional Assistance:</h2>
    <ul>
        <li><strong>Email:</strong> Send an email to <a href="mailto:support@healthschedulingwebapp.com">support@healthschedulingwebapp.com</a> for assistance.</li>
        <li><strong>FAQs:</strong> Check out our Frequently Asked Questions (FAQs) section for answers to common queries.</li>
    </ul>

    <p>We hope this guide helps you make the most out of our Health Scheduling WebApp. Thank you for choosing us for your healthcare needs!</p>
        
      </section>
    </div>
    <style>
        .main{
            margin-left: 5%;
        }

        h1 {
            text-align: center;
            color: #64121f;
            margin-bottom: 20px;
        }

        h2 {
            color: #64121f;
            margin-top: 20px;
        }

        p {
            margin-bottom: 15px;
        }

        ol {
            margin-bottom: 20px;
        }

        /* ul {
            list-style-type: none;
            padding-left: 0;
        }

        li::before {
            content: "•";
            color: #64121f;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        } */
    </style>
  </body>
</html>
