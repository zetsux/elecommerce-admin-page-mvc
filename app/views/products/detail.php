<div class="container-fluid m-2">
    <div class="card" style="width: 18rem;">
        <img src="../../../public/img/<?= $data["prod"]["image"] ?>" class="card-img-top" alt="Product Image">

        <div class="card-body">
            <h5 class="card-title"><?= $data["prod"]["name"] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Brand : <?= $data["prod"]["brand"] ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Category : <?= $data["prod"]["category"] ?></h6><br>
            <h6 class="card-text mb-3">Seller : <?= $data["prod"]["seller"] ?></h6>
            <a href="<?= BASE_URL ?>products" class="btn btn-warning">Go Back</a>
        </div>
    </div>
</div>