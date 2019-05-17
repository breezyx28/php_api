<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registration</title>
</head>
<body>
    <form action="../api/user/create_user.php" method="post">
    <input type="text" name="first_name" placeholder="First name" id="">
    <input type="text" name="last_name" placeholder="last name" id="">
    <input type="email" name="email" placeholder="Email" id="">
    <input type="password" name="password" placeholder="Password" id="">
    <input type="submit" name="submit" value="submit" id="">
    </form>
</body>
</html>