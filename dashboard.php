<?php 
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = ucwords($_SESSION["username"]);
include('connect.php');

// Ambil data pengguna dari database
$query = "SELECT * FROM users";
$result = $connect->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            font-size: 2.5rem;
            margin: 20px 0;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #548383;
            color: white;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #548383;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #4a7b7b;
        }
    </style>
</head>
<body>
    <h1>Hello, <?php echo htmlspecialchars($username); ?></h1>
    <h2>Daftar Pengguna yang Pernah Login</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <a href="logout.php">Logout</a>
</body>
</html>
