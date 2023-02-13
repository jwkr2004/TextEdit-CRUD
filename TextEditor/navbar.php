<nav>
    <div class="navheaders">
        <h1 class="navtitle">TextEdit</h1>
        <h1 class="navwelcome">Welcome <?php if(isset($_SESSION['login_user'])) {echo $login_session;} ?></h1> 
    </div>
    <div class="navbuttons">
        <a class="navbutton" href="/php/TextEditor/">Home</a>
        <?php 
            if(!isset($_SESSION['login_user']) ){
                echo "<a class='navbutton' href='/php/TextEditor/login.php'>Login</a>";
                echo "<a class='navbutton' href='/php/TextEditor/signup.php'>Signup</a>";
            }
            else {
                echo "<a class='navbutton' href='/php/TextEditor/logout.php'>Logout</a>";
            }
        ?>
    </div>    
</nav>