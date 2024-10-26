<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORGOT PASSWORD FROM</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <form action="reset_password_process.php" method="post">
            <?php if (isset($_GET['message'])) {
                $message = htmlspecialchars($_GET['message']);
                echo "<script>
                    alert('$message');
                    window.history.replaceState(null, null, window.location.pathname);
            </script>"; } ?>
        <h1>Forgot Password</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-open-alt'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password_confirm" placeholder="Password Confirm" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
                <button type="submit" class="btn">Reset</button>
            <div class="register-link">
                <p>remember password? <a href="login.php" class="back">Back</a></p>
            </div>
    </form>
</div>
</body>
</html>