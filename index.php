<?php
ob_start();
include "functions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

  $username = escape(strip_tags(trim($_POST['name'])));
  $email = escape(strip_tags(trim($_POST['email'])));
  $subject = escape(strip_tags(trim($_POST['subject'])));

  //___ we will store diff errors in this assoc array
  $error = [
    'username' => '',
    'email' => '',
    'subject' => ''
  ];

  if (strlen($username) < 4)
    $error['username'] = 'Name must be greater than 4';

  if ($username == '')
    $error['username'] = 'Name field can\'t be empty';

  if ($email == '')
    $error['email'] = 'Please provide an email';

  if ($subject == '')
    $error['subject'] = 'please fill this field';


  foreach ($error as $key => $value) {
    if (empty($value)) {              //means no errors bcz value is empty

      //_____unset/clear all keys in array if there r no errors
      unset($error[$key]);
    }
  }

  //_____if error array is empty means no errors
  if (empty($error)) {
    reportContact($username, $email, $subject);
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
  <script src="js/app.js"></script>
</head>

<body>

  <div class="container">
    <h3>Contact Form</h3>

    <form action="index.php" method="POST">
      <input type="text" id="username" name="name" placeholder="Enter full name" class="<?php echo isset($error['username']) ? 'error-border' : '' ?>" value="<?php echo isset($username) ? $username : '' ?>" spellcheck="false">

      <small class="error"> <?php echo isset($error['username']) ? $error['username'] : '' ?></small>

      <input type="email" id="email" name="email" placeholder="Enter email address" class="<?php echo isset($error['email']) ? 'error-border' : '' ?>" value="<?php echo isset($email) ? $email : '' ?>" spellcheck="false">

      <small class="error"> <?php echo isset($error['email']) ? $error['email'] : '' ?></small>

      <textarea id="subject" name="subject" placeholder="Write something" style="height:200px" class="<?php echo isset($error['subject']) ? 'error-border' : '' ?>"><?php echo isset($subject) ? $subject : '' ?></textarea>

      <small class="error"> <?php echo isset($error['subject']) ? $error['subject'] : '' ?></small>

      <div class="btn-cont">
        <input type="submit" value="Submit" name="submit">
      </div>

      <div class="bottom-text">

        <p>
          <a href="includes/data.php">View</a> Submitted data.
        </p>

        <p>
          <a href="includes/help.php">Here</a>
          is how this form is created.
        </p>

      </div>

    </form>


  </div>


</body>

</html>