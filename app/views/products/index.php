<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-6">
            <h3>Products List</h3>

            <?php foreach ($data["prods"] as $prod) : ?>
                <ul>
                    <li>Name : <?= $prod["name"] ?></li>
                    <li>Brand : <?= $prod["brand"] ?></li>
                    <li>Category : <?= $prod["category"] ?></li>
                    <li>Seller : <?= $prod["seller"] ?></li>
                    <li>Price : <?= $prod["price"] ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>