<?php include 'db_connect.php'; ?>
<form method="POST">
  <input type="text" name="name" placeholder="Full Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <select name="role">
    <option value="student">Student</option>
    <option value="admin">Admin</option>
  </select><br>
  <button type="submit" name="register">Register</button>
</form>

<?php
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role'];

  $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name','$email','$password','$role')";
  if ($conn->query($sql)) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
