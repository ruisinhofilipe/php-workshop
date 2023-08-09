<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Classic Models</title>
</head>
<body>
    <header>
        <h1>Workshop Header</h1>
        <nav>
            Bonjour <?= $_SESSION["user"]["username"] ?>    
            <ul>
                <li>
                    <a href="/index.php">main</a>
                </li>
                <li>
                    <a href="/login.php">Login</a>
                </li>
                <li>
                    <a href="/logout.php">logout</a>
                </li>
                <li>
                    <a href="/register.php">Register</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>

    