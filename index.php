<!DOCTYPE html>
<html>
<head>
    <title>Input User Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Input User Data</h1>
    <form action="process_data.php" method="post">
        <label>Nama Usia Kota:</label>
        <input type="text" name="user_data" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    // Koneksi ke database (sesuaikan dengan konfigurasi database Anda)
    $localhost = 'localhost';
    $username = 'id19086610_magang';
    $password = 'Msib.1122';
    $database = 'id19086610_alvin';

    $conn = new mysqli($localhost, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fungsi untuk mendapatkan data dari database
    function getDataFromDatabase($conn) {
        $sql = "SELECT NAME, AGE, CITY FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Data yang telah diinput:</h2>";
            echo "<table>";
            echo "<tr><th>Nama</th><th>Usia</th><th>Kota</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["NAME"] . "</td>";
                echo "<td>" . $row["AGE"] . "</td>";
                echo "<td>" . $row["CITY"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Data belum diinput.</p>";
        }
    }

    // Tampilkan data dari database
    getDataFromDatabase($conn);

    $conn->close();
    ?>

</body>
</html>
