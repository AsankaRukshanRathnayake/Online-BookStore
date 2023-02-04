<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">

        <title>Sign-In</title>

    </head>
    <body>
        <div>
            <?php
            include "header.php"
            ?>
        </div>


        <div>
            <form name="signin-form" action="" method="POST">
                <h3>Sign In</h3>

                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" placeholder="Enter your email" required><br><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Enter your password" required><br><br>

                <input type="submit" name="submit" value="Sign-In"><br>

                <p>Don't have an Account? <a href="signup.php">Create Account</a></p>


            </form>
        </div>

        <div>
            <?php
                include "footer.php"
            ?>
        </div>
        
    </body>
</html>