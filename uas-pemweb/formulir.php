<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulir_kontak";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $interest = $_POST['interest'];

    $sql = "INSERT INTO entries (name, email, date, gender, interest) VALUES ('$name', '$email', '$date', '$gender', '$interest')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="css/araki sensei.jpg">
  <title>Formulir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <header>
    <h1>Muhammad Umar Basyir</h1>
  </header>
  <div class="container">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-3 sidebar p-4">
        <h5>Menu</h5>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Halaman Utama</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Formulir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tabel.php">Tabel</a>
          </li>
        </ul>
      </div>
      <!-- Content -->
      <div class="col-9">
        <div class="mt-3">
          <header class="text-center">
            <h1>Formulir Kontak</h1>
          </header>

          <!-- Formulir -->
          <form action="formulir.php" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Kelamin</label><br>
              <input type="radio" name="gender" value="male" required> Laki-laki
              <input type="radio" name="gender" value="female" required> Perempuan
            </div>
            <div class="mb-3">
              <label for="interest" class="form-label">Hal yang paling Anda suka dari Araki Sensei</label>
                <select class="form-select" id="interest" name="interest">
                <option value="Manga">Manga</option>
                <option value="Anime">Anime</option>
                <option value="Novel">Novel</option>
                <option value="Referensi">Referensi Lagu</option>
                <option value="Ketampanannya">Ketampanannya</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>    
  <footer>
    <p>Muhammad Umar Basyir - 121140221</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>
