<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Signup Confirmation</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php
                if (isset($_SESSION['user_id'])) {
                    ?>
                    <li><a href="profile.php" class="btn-success"><?php echo $_SESSION['user_firstNamee']; ?></a></li>
                    <li><a href="logout.php" class="btn-danger">LogOut</a></li>
                <?php } else { ?>
                    <li><a href="index.php">Signup</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php } ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
