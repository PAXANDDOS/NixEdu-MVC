<div class="breadcrumbs">
    <a href="/">Home</a>
    <span>/</span>
    <a href="#">Account</a>
</div>
<div class="main">
    <div class="login">
        <h1>Welcome to PokeShop!</h1>
        <h2>You're logged in as <?php echo \Framework\Session::get('name') ?>!</h2>
        <form method="POST">
            <input type="submit" name='logout' value="Log out" />
        </form>
    </div>
</div>
