<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cosmetic_shop";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    $phone = $_POST['phone'] ?? '';

    if ($name && $password && $confirm && $phone) {
        if ($password !== $confirm) {
            $msg = "❌ Passwords do not match.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, password, phone) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $password, $phone);
            if ($stmt->execute()) {
                header("Location: index.php?signup=success");
                exit;
            } else {
                $msg = "❌ Error: " . $conn->error;
            }
        }
    } else {
        $msg = "Please fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Cosmetic Shop</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #fbc2eb, #a6c1ee);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .signup-box {
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
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: background-color 0.3s ease;
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
            color: red;
        }
        .links {
            text-align: center;
            margin-top: 10px;
        }
        .links a {
            text-decoration: none;
            color: #333;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="signup-box">
    <h2>Sign Up</h2>
    <?php if ($msg): ?>
        <div class="message"><?php echo $msg; ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <input type="text" name="name" placeholder="Full Name" required><br>
        <input type="text" name="phone" placeholder="Phone Number" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
        <button type="submit">Sign Up</button>
    </form>
    <div class="links">
        <a href="login.php">← Login</a>
    </div>
</div>
</body>
</html>
