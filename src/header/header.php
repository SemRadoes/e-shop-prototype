
<?php session_start(); 

    include '../modules/sessionVariables.php';
?>
<header>
    <div class="header grid grid-cols-4 grid-flow-col grid-rows-2 w-full p-3">
        <div class="image row-span-3 flex justify-center items-center">
            <a href="index.php"><img src="../../logo/logo.JPG" alt="logo"></a>
        </div>
        <div class="col-span-3 flex justify-between items-center">
            <div class="search">
                <input class="w-full p-2 rounded" type="text" placeholder="search">
            </div>
                <?php if(isset($user_id)){?>
                    <div class="relative border-2 rounded p-2 dropdown">
                        <div class="inline-flex items-center welcome-text" onclick="showDropdown()">
                            Welcome, <?php echo $user_firstname ?> 
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </div>
                        <div class="flex flex-col text-xs absolute hidden hidden-dropdown rounded top-11">
                            <i class="fa fa-user fa-lg border-b-2 border-black p-2 w-full dropdown-items">&nbsp;Account</i>
                            <i class="fa fa-envelope fa-lg border-b-2 border-black p-2 w-full dropdown-items">&nbsp;Bestellingen</i>
                            <i class="fa fa-heart fa-lg border-b-2 border-black p-2 w-full dropdown-items">&nbsp;Wishlist</i>
                            <i class="fa fa-shopping-cart fa-lg border-b-2 border-black p-2 w-full dropdown-items">&nbsp;Cart</i>
                            <i class="fa fa-sign-out fa-lg  p-2 w-full dropdown-items" onclick="goToLogoutPage()">&nbsp;uitloggen</i>
                        </div>
                    </div><?php  } else { ?> 
                    <button class="login-button inline-flex gap-1 rounded p-3" onclick="goToLoginPage()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z" clip-rule="evenodd" />
                        </svg>
                        Log in
                    </button> <?php } ?>
        </div>
        <div class="col-span-3 flex p-2 w-full items-center gap-3">
            <div id="home-nav" onclick="goToHome()">
                <h3 class="nav-item">HOME</h3>
            </div>
            <div id="home-nav" onclick="goToAbout()">
                <h3 class="nav-item">ABOUT US</h3>
            </div>
            <div id="contact-nav" onclick="goToContact()">
                <h3 class="nav-item">CONTACT</h3>
            </div>
        </div>
    </div>
</header>
<script>
    function goToLoginPage(){
        window.location.href = "../login/loginPage.php"
    }
    function goToLogoutPage(){
        window.location.href = "../login/logout.php"
    }
    function goToHome(){
        window.location.href = "../main/index.php"
    }
    function goToAbout(){
        window.location.href = "../main/about.php"
    }
    function goToContact(){
        window.location.href = "../main/contact.php"
    }
    function showDropdown(){
        $('.hidden-dropdown').slideToggle(200);
    }
</script>