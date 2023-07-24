<?php
// Koneksi ke database
$localhost = 'localhost';
$username = 'id19086610_magang';
$password = 'Msib.1122';
$database = 'id19086610_alvin';

$conn = new mysqli($localhost, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk menyimpan data ke database
function saveToDatabase($name, $age, $city, $conn) {
    $name = strtoupper($name); // Ubah nama menjadi UPPERCASE
    $created_at = date('Y-m-d H:i:s');

    // Ambil angka usia dari input
    preg_match('/\b(\d+)\b/', $age, $matches);
    if (!empty($matches)) {
        $age = $matches[0];
    } else {
        $age = 0; // Jika tidak ada angka usia dalam input, set usia ke 0
    }

    $sql = "INSERT INTO users (NAME, AGE, CITY, CREATED_AT) VALUES ('$name', '$age', '$city', '$created_at')";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Memproses data yang dikirimkan dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_data = $_POST["user_data"];

    // Memisahkan data berdasarkan spasi
    list($name, $age, $city) = explode(" ", $user_data, 3);

    // Menyimpan data ke database
    saveToDatabase($name, $age, $city, $conn);
}

$conn->close();
?>
