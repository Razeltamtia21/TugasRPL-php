<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER FROM</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <form action="register_process.php" method="post">   
            <?php if (isset($_GET['message'])) {
                $message = htmlspecialchars($_GET['message']);
                echo "<script>
                    alert('$message');
                    window.history.replaceState(null, null, window.location.pathname);
            </script>"; } ?>
        <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope' ></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
                <button type="submit" class="btn">Register</button>
            <div class="register-link">
                <p>have an account? <a href="login.php">Login</a></p>
            </div>
    </form>
</div>
</body>
</html>