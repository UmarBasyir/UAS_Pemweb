# UAS_Pemweb

website ini adalah lanjutan dari UTS Pemweb yang dimana website ini berisikan form mengenai Araki Sensei


Nama : Muhammad Umar Basyir

NIM : 121140221

Kelas : RA

## Bagian 1: Client-side Programming (30%)

### 1.1 Manipulasi DOM dengan JavaScript (15%)

**Form Input dengan 4+ Elemen:**

```html
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
```

**Tampilan Data dalam Tabel:**

```php
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
```

### 1.2 Event Handling (15%)

```javascript
document.getElementById('name').addEventListener('input', function() {
    const name = this.value;
    const nameError = document.getElementById('nameError');
    if (/\d/.test(name)) {
      nameError.textContent = 'Name should not contain numbers.';
    } else {
      nameError.textContent = '';
    }
  });
  
  document.getElementById('email').addEventListener('input', function() {
    const email = this.value;
    const emailError = document.getElementById('emailError');
    if (!email.includes('@')) {
      emailError.textContent = 'Email should contain @.';
    } else {
      emailError.textContent = '';
    }
  });
  
  document.getElementById('gender').addEventListener('change', function() {
    const gender = this.value;
    const genderError = document.getElementById('genderError');
    if (!gender) {
      genderError.textContent = 'Please select a gender.';
    } else {
      genderError.textContent = '';
    }
  });
  
  document.getElementById('interest').addEventListener('change', function() {
    const interest = this.value;
    const interestError = document.getElementById('interestError');
    if (!interest) {
      interestError.textContent = 'Please select an interest.';
    } else {
      interestError.textContent = '';
    }
  });
  
  document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const gender = document.getElementById('gender').value;
    const interest = document.getElementById('interest').value;
  
    let isValid = true;
  
    if (/\d/.test(name)) {
      document.getElementById('nameError').textContent = 'Name should not contain numbers.';
      isValid = false;
    }
    if (!email.includes('@')) {
      document.getElementById('emailError').textContent = 'Email should contain @.';
      isValid = false;
    }
    if (!gender) {
      document.getElementById('genderError').textContent = 'Please select a gender.';
      isValid = false;
    }
    if (!interest) {
      document.getElementById('interestError').textContent = 'Please select an interest.';
      isValid = false;
    }
  
    if (isValid) {
      alert('Form submitted successfully!');
    }
  });
```

## Bagian 2: Server-side Programming (30%)

### 2.1 Pengelolaan Data dengan PHP (20%)

```php
<?php
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
```

### 2.2 Objek PHP Berbasis OOP (10%)

```php
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $interest = $_POST['interest'];

    $new_entry = array(
        'name' => $name,
        'email' => $email,
        'date' => $date,
        'gender' => $gender,
        'interest' => $interest
    );

    if (!isset($_SESSION['entries'])) {
        $_SESSION['entries'] = array();
    }

    $_SESSION['entries'][] = $new_entry;

    header("Location: tabel.html");
    exit();
}
?>
```


## Bagian 3: Database Management (20%)

### 3.1 Pembuatan Tabel (5%)

```sql
CREATE DATABASE formulir_kontak;

USE formulir_kontak;

CREATE TABLE entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    interest TEXT NOT NULL
);
```

### 3.2 Konfigurasi Database (5%)

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulir_kontak";

$conn = new mysqli($servername, $username, $password, $dbname);
```


### 3.3 Manipulasi Data (10%)

```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $interest = $_POST['interest'];

    $new_entry = array(
        'name' => $name,
        'email' => $email,
        'date' => $date,
        'gender' => $gender,
        'interest' => $interest
    );

    if (!isset($_SESSION['entries'])) {
        $_SESSION['entries'] = array();
    }

    $_SESSION['entries'][] = $new_entry;
```

## Bagian 4: State Management (20%)

### 4.1 Session Management (10%)

```php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $interest = $_POST['interest'];

    $new_entry = array(
        'name' => $name,
        'email' => $email,
        'date' => $date,
        'gender' => $gender,
        'interest' => $interest
    );

    if (!isset($_SESSION['entries'])) {
        $_SESSION['entries'] = array();
    }

    $_SESSION['entries'][] = $new_entry;

    header("Location: tabel.html");
```

### 4.2 Cookie & Storage Management (10%)

membuat cookie

```javascript
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
```

membaca cookie

```javascript
function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
```

menghapus cookie

```javascript
function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}
```
## Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)

* Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?


* Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda.

<br>

* Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?

Dengan menggunakan protokol HTTPS dan dengan menggunakan fitur firewall / keamanan berganda yang disediakan pada penyedia hosting web

* Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.

Server web: Server web Apache.
Database server: Database server MySQL.
Aplikasi web: Aplikasi web saya ditulis dalam bahasa PHP, JS, CSS, HTML
