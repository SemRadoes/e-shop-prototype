
<?php session_start(); 
    include '../modules/sessionVariables.php';?>
<header>
    <div class="grid grid-cols-3 grid-rows-2 w-full gap-2">
        <div class="flex justify-center items-center">
            <a href="index.php"><img src="../../logo/logo.JPG" alt="logo"></a>
        </div>
        <div class="flex justify-between items-center">
            <div class="search">
                <input name="search" class="w-full p-2 rounded" type="text" placeholder="search" id="search">
            </div>
            <div class="relative border-2 rounded p-3 hover:cursor-pointer dropdown" onclick="showDropdown()">
                <div class="flex flex-col text-s absolute hidden hidden-dropdown rounded top-14 right-1">
                    <i class="fa fa-user fa-lg border-b-2 border-black p-2 w-full dropdown-items">&nbsp;Account</i>
                    <i class="fa fa-envelope fa-lg border-b-2 border-black p-2 w-full dropdown-items">&nbsp;Bestellingen</i>
                    <i class="fa fa-heart fa-lg border-b-2 border-black p-2 w-full dropdown-items">&nbsp;Wishlist</i>
                    <i class="fa fa-shopping-cart fa-lg border-b-2 border-black p-2 w-full dropdown-items">&nbsp;Cart</i>
                    <i class="fa fa-sign-out fa-lg  p-2 w-full dropdown-items" onclick="goToLogoutPage()">&nbsp;uitloggen</i>
                    <i class="fa fa-sign-out fa-lg  p-2 w-full dropdown-items" onclick="goToAbout()">&nbsp;ABOUT US</i>
                    <i class="fa fa-sign-out fa-lg  p-2 w-full dropdown-items" onclick="goToContact()">&nbsp;CONTACT</i>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    function goToHome(){
        window.location.href = "../main/index.php"
    }
    function goToAbout(){
        window.location.href = "../main/about.php"
    }
    function goToContact(){
        window.location.href = "../main/contact.php"
    }
    function goToLoginPage(){
        window.location.href = "../login/loginPage.php"
    }
    function showDropdown(){
        $(".hidden-dropdown").slideToggle(200);
    }
    $(document).ready(() => {
        $("#search").keydown(function(event) {
            if (event.key === "Enter") {
                const searchValue = $("#search").val();
                window.location.href = "../main/items.php?searchvalue=" + searchValue;
            }
        });
    });
</script>;