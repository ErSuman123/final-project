<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cusmotic";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            $msg = "✅ Welcome, <strong>$username</strong>! Login is successful.";
        } else {
            $msg = "❌ Error: " . $conn->error;
        }
    } else {
        $msg = "Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Cosmetic Shop</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #d7d2cc, #304352);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            transition: transform 0.3s;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 0.3s;
        }
        input:hover, button:hover {
            background-color: #f0f0f0;
        }
        h2 {
            text-align: center;
        }
        .message {
            margin-top: 15px;
            text-align: center;
            color: green;
        }
        .links {
            text-align: center;
            margin-top: 10px;
        }
        .links a {
            color: #333;
            text-decoration: none;
            margin: 0 5px;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <?php if ($msg): ?>
        <div class="message"><?php echo $msg; ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <div class="links">
        <a href="index.php">← Home</a> | 
        <a href="signup.php">Sign Up</a>
    </div>
</div>
</body>
</html>
