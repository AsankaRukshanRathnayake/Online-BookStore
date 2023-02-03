<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Sign-Up</title>

    </head>

    <body>
        <div>
            <form action="" method="post">
                <h3>Register Now</h3>

                <label for="firstname">First Name</label><br>
                <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" required><br><br>

                <label for="lastname">Last Name</label><br>
                <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" required><br><br>

                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" placeholder="Enter your email" required><br><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Enter password" required><br><br>

                <label for="confirmPassword">Confirm Password</label><br>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Re-enter your password" required><br><br>

                <input type="submit" name="submit" value="Sign-Up" ><br>

                <p>Already have an account?
                    <a href="signin.php">Sign-in</a>
                </p>
            
            </form>
                
    </body>

</html>