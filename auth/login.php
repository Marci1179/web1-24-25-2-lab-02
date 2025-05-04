<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    ob_start();
    session_start();
?>

<html>
<head>
    <title>Login Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container form-signin">
        <h2>Enter Email and Password</h2>
            <?php
                $msg = ' ';
                
                if (
                    isset($_POST['login'])
                    && !empty($_POST['email'])
                    && !empty($_POST['password'])
                ) {

                    // MySQL connection
                    // phpauth DXsbJynznjx/Cbhe
                    $dbh = new PDO('mysql:host=localhost;dbname=phpauth', username: 'phpauth', password: 'DXsbJynznjx/Cbhe');
                    $sql = "SELECT * FROM users WHERE email = :email AND password = SHA1(:password)";
                    $stmt = $dbh->prepare(query: $sql);
                    $stmt->execute(params: array(
                        ':email' => $_POST['email'],
                        ':password' => $_POST['password']
                    ));
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    // [ 'id' => 1, 'email' => 'hello@me.hu', 'password' => 'HASH' ]
                    // false

                    if ($user) {
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['email'] = $_POST['email'];
                    
                        header(header: 'Location: dashboard.php');
                    } else {
                        $msg = 'Wrong email or password';
                    }
                }
            ?>
    </div>

    <div class="container">
        <form class="form-signin" action="" method="post">
           <h4 class="form-signin-heading">
                <?php echo $msg; ?>
           </h4>
           <div class="form-group">
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="email"
                    required
                    autofocus></br>
           </div>
           <div class="form-group">
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder="password"
                    required>
           </div>
           <button
                class="btn btn-lg btn-primary mt-2"
                type="submit"
                name="login">
                    Login
           </button>
        </form>

        <a href="logout.php" title="Logout">Logout</a>

    </div>
</body>
</html>