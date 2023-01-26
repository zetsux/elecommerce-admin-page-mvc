<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-6">
            <h3 class="m-1">Products List</h3>

            <div class="list-group mt-4">
                <?php foreach ($data["prods"] as $prod) : ?>
                    <a href="<?= BASE_URL ?>products/detail/<?= $prod["id"]?>" class="list-group-item list-group-item-action list-group-item-info 
                        d-flex justify-content-between align-items-center">
                        <?= $prod["name"] ?>
                        <img src='../public/img/<?= $prod["image"]?>' style='width: 60px; height: 60px;' class='img-thumbnail shadow'>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>