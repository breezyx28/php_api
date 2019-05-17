<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="api/user/check_user.php" method="get">
    <input type="email" name="email" placeholder="Email" id=""><br>
    <input type="password" name="password" placeholder="Password" id=""><br>
    <input type="submit" name="submit" value="log-in" id="">
    <a href="routes/reg.php">register</a>
    </form>
</body>
</html>