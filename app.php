<?php
// error display
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// buat database dan tabel
function createDatabaseAndTable() {
    // Pastikan menggunakan jalur absolut
    $dbFile = __DIR__ . '/students.db'; 

    try {
        // Cek apakah file database sudah ada
        $isNewDatabase = !file_exists($dbFile);

        // koneksi ke sqlite
        $db = new SQLite3($dbFile);

        // cek tabel student
        $query = "SELECT name FROM sqlite_master WHERE type='table' AND name='student'";
        $result = $db->query($query);

        // jika belum ada maka buat
        if (!$result->fetchArray()) {
            // Tabel tidak ada, buat tabel baru
            $createTableQuery = "
                CREATE TABLE student (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name VARCHAR(100) NOT NULL,
                    age INTEGER NOT NULL,
                    grade VARCHAR(10) NOT NULL
                );
            ";

            $db->exec($createTableQuery);

            if ($db->lastErrorCode() > 0) {
                die("Gagal membuat tabel: " . $db->lastErrorMsg());
            }
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    } finally {
        if (isset($db)) {
            $db->close();
        }
    }
}

// koneksi ke sqlite
function connectDB() {
    // panggil create db
    createDatabaseAndTable();
    
    try {
        // Sambungkan ke database SQLite
        $db = new SQLite3(__DIR__ . '/students.db');
        return $db;
    } catch (Exception $e) {
        die("Koneksi ke database gagal: " . $e->getMessage());
    }
}

// fungsi ambil siswa by id
function selectStudentsById($id) {
    // Memanggil fungsi koneksi
    $db = connectDB();
    
    if ($db) {
        // Query untuk mengambil semua data dari tabel students
        $query = "SELECT * FROM student WHERE id=".$id;

        // Menjalankan query dan mendapatkan hasilnya
        $result = $db->query($query);

        if (!$result) {
            echo "Query gagal: " . $db->lastErrorMsg();
            return null;
        }

        // Mengambil semua data dalam bentuk array asosiatif
        $students = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $students[] = $row;
        }

        // Mengembalikan hasil query dalam bentuk array
        return $students;
    } else {
        echo "Gagal koneksi ke database.";
        return null;
    }
}

// fungsi ambil semua siswa
function selectStudents() {
    // Memanggil fungsi koneksi
    $db = connectDB();
    
    if ($db) {
        // Query untuk mengambil semua data dari tabel students
        $query = "SELECT * FROM student";

        // Menjalankan query dan mendapatkan hasilnya
        $result = $db->query($query);

        if (!$result) {
            echo "Query gagal: " . $db->lastErrorMsg();
            return null;
        }

        // Mengambil semua data dalam bentuk array asosiatif
        $students = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $students[] = $row;
        }

        // Mengembalikan hasil query dalam bentuk array
        return $students;
    } else {
        echo "Gagal koneksi ke database.";
        return null;
    }
}

// fungsi hapus siswa by id
function deleteStudent($id) {
    // echo "hasil";
    $db = connectDB();
    if ($db) {
        $query = "DELETE from student where id =".$id;
        // Menjalankan query untuk menambahkan data siswa
        $result = $db->exec($query);

        if (!$result) {
            echo "Query gagal: " . $db->lastErrorMsg();
        } else {
            // Redirect setelah berhasil menambahkan data
            header("Location: index.php");
            exit;
        }
    } else{
        echo "Gagal koneksi ke database.";
    }
}

// fungsi utambah siswa
function addStudent($name, $age, $grade) {
    $db = connectDB();
    if ($db) {
        // Kode ini rentan terhadap SQL Injection karena tidak ada sanitasi input

        // Menyusun query untuk menambahkan data siswa tanpa sanitasi input
        $query = "INSERT INTO student (name, age, grade) VALUES ('$name', '$age', '$grade')";
        //$query = "DELETE from student where age != 999999";
        // Menjalankan query untuk menambahkan data siswa
        $result = $db->exec($query);

        if (!$result) {
            echo "Query gagal: " . $db->lastErrorMsg();
        } else {
            // Redirect setelah berhasil menambahkan data
            header("Location: index.php");
            exit;
        }
    } else {
        echo "Gagal koneksi ke database.";
    }
}

// fungsi update siswa
function updateStudent($id, $name, $age, $grade) {
    $db = connectDB();
    if ($db) {
        // Menyusun query untuk menambahkan data siswa tanpa sanitasi input
        $query = "UPDATE student SET name = '$name', age = '$age', grade = '$grade' WHERE id=$id";
        // Menjalankan query untuk menambahkan data siswa
        $result = $db->exec($query);

        if (!$result) {
            echo "Query gagal: " . $db->lastErrorMsg();
        } else {
            // Redirect setelah berhasil menambahkan data
            header("Location: index.php");
            exit;
        }
    } else {
        echo "Gagal koneksi ke database.";
    }
}
