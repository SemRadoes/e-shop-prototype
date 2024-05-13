
<header>
    <div class="top-header flex justify-around items-center w-full">
        <div class="image">
            <a href="index.php"><img src="../../logo/logo.JPG" style="height: 80px;" alt="logo"></a>
        </div>
        <div class="search">
            <input class="form-control w-100" type="text" placeholder="search">
        </div>
        <div class="icons">
            <div class="welcome mr-5">Welcome,<br> user</div>
            <div class="usericon icon">
                <i class="fa fa-user fa-lg"></i>
            </div>
            <div class="cartheart icon">
                <i class="fa fa-heart fa-lg"></i>
            </div>
            <div class="carticon icon">
                <i class="fa fa-shopping-cart fa-lg"></i>
            </div>
        </div>
        <div class="flex login-register-button">
            <button class="btn login-button" onclick="goToLoginPage()"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Log in</button>
            <button class="btn logout-button" onclick="goToLogoutPage()"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Log out</button>
        </div>
    </div>
    <div class="bot-header flex p-2 w-full justify-center items-center">
        <div class="nav-item">
            <h3>HOME</h3>
        </div>
        <div class="nav-item">
            <h3>CATEGORIES</h3>
        </div>
        <div class="nav-item">
            <h3>CONTACT</h3>
        </div>
    </div>
</header>