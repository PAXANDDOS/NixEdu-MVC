<div class="breadcrumbs">
    <a href="/">Home</a>
    <span>/</span>
    <a href="#">Cart</a>
</div>
<div class="main">
    <div class="cartList">
        <?php
        $exists = false;
        foreach ($products as $product) {
            echo "
            <form class='cartItem' method='POST'>
                <img src='" . $product->image . "'>
                <h3>" . $product->name . "</h3>
                <input type='number' style='display:none' name='removeItem' value='" . $product->id . "'/>
                <input type='submit' name='remove' value='Remove'>
            </form>
            ";
            $exists = true;
        }
        if (!$exists)
            echo "<h2>Nothing in cart yet. Start shopping!</h2>";
        else echo "
        <div class='cartConfirm'>
            <h2>Proceed to payment</h2>
        </div>
        ";
        ?>
    </div>
</div>
