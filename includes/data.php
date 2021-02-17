<?php ob_start();
include "../db.php"; ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../css/style.css?v=<?php echo time() ?>">
</head>

<body>

  <h3>Submitted Data In Database</h3>

  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
    </tr>

    <?php
    $query = "SELECT * FROM contactform";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['subject']; ?></td>
      </tr>

    <?php endwhile; ?>

  </table>

</body>

</html>