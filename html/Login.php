<?php
// No PHP logic yet, but structure is now PHP ready
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/login.css" />
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <img src="/assets/img/Logo-NOBG.png" alt="Logo">

            <h1>EVENT <span class="gray-text">HORIZON</span></h1>
            <p>PUSHING BOUNDARIES,BUILDING FUTURES</p>
        </div>
        <div class="login-section">
            <div class="login-header">
                <h1>EVENT <span class="gray-text">HORIZON</span></h1>
                <p>PUSHING BOUNDARIES,BUILDING FUTURES</p>  
            </div>
            <div class="login-box">
                <form>
                    <div class="input-group">
                        <span class="icon">👤</span>
                        <input type="text" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <span class="icon">🔒</span>
                        <input type="password" placeholder="Password" required>
                    </div>
                    <button type="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>