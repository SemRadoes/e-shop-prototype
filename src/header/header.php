
<?php session_start(); ?>
<header>
    <div class="top-header flex justify-around items-center w-full">
        <div class="image">
            <a href="index.php"><img src="../../logo/logo.JPG" style="height: 80px;" alt="logo"></a>
        </div>
        <div class="search">
            <input class="w-full p-2 rounded" type="text" placeholder="search">
        </div>
        <div class="icons">
            <?php if(isset($_SESSION['$user_ID'])){?><div class="welcome mr-5">Welcome,<br><?php echo $_SESSION['$user_lastname']. " " . $_SESSION['$user_firstname']?></div><?php }?>
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
        <div class="flex login-register-button text-white">
            <div class="p-2 rounded inline flex hover:cursor-pointer login-button" onclick="goToLoginPage()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z" clip-rule="evenodd" />
            </svg>
            Log in
            </div>
            <div class="inline flex p-2 rounded hover:cursor-pointer logout-button" onclick="goToLogoutPage()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
            Log out
            </div>
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