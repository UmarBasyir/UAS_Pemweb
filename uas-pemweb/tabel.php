<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="css/araki sensei.jpg">
  <title>Tabel</title>
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
            <a class="nav-link" href="formulir.php">Formulir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Tabel</a>
          </li>
        </ul>
      </div>
      <!-- Content -->
      <div class="col-9">
        <div class="mb-3">
          <header class="text-center">
            <h1>Tabel Prestasi John Doe</h1>
          </header>

          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Hal yang disukai dari Araki Sensei</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "formulir_kontak";

              $conn = new mysqli($servername, $username, $password, $dbname);

              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT id, name, email, date, gender, interest FROM entries";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  $no = 1;
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no++ . "</td>";
                      echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['interest']) . "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='6'>No data found</td></tr>";
              }

              $conn->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <p>Muhammad Umar Basyir - 121140221</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
