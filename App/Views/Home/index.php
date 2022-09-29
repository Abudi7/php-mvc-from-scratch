<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p>Welcome</p>
    <span>Hello From the View!<?php echo htmlspecialchars($name);?></span>
    <ul>
        <?php foreach($colours as $colour): ?>
        <li>
        <?php echo htmlspecialchars($colour); ?>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>