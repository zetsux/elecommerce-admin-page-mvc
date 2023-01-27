<div class="container-fluid m-2">
    <div class="row">
        <div class="col-lg-6 mt-2">
            <?php FlashMsg::flashMessage() ?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">

            <div class="d-flex justify-content-between px-1">
                <h3 class="m-2">Products List</h3>
                <button type="button" class="btn btn-warning mt-2 mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add New Product
                </button>
            </div>
            

            <div class="list-group mt-2">
                <?php foreach ($data["prods"] as $prod) : ?>
                    <a href="<?= BASE_URL ?>products/detail/<?= $prod["id"]?>" class="list-group-item list-group-item-action list-group-item-light 
                        d-flex justify-content-between align-items-center">
                        <?= $prod["name"] ?>
                        <img src='../public/img/<?= $prod["image"]?>' style='width: 60px; height: 60px;' class='img-thumbnail shadow'>
                    </a>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="<?= BASE_URL ?>products" class="btn btn-primary align-items-center w-50">Edit</a>
                        <a href="<?= BASE_URL ?>products/delete/<?= $prod["id"]?>" class="btn btn-danger align-items-center w-50" 
                            onclick="return confirm('Are you sure that you want to delete this product?')">
                            Delete
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalLabel">Add New Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= BASE_URL ?>products/new" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="aname" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="aname" id="aname" placeholder="ex : iPhone 14 Pro Max 128 GB" required>
                </div>

                <!-- <div class="mb-3">
                    <label for="abrand" class="form-label">Product Brand</label>
                    <input type="text" class="form-control" name="abrand" id="abrand" placeholder="ex : Apple">
                </div> -->

                <label for="abrand" class="form-label">Product Brand</label>
                <select class="form-select mb-3" aria-label="Product Brand" id="abrand" name="abrand" required>
                    <option value="Samsung">Samsung</option>
                    <option value="Apple">Apple</option>
                    <option value="Asus">Asus</option>
                    <option value="Miyako">Miyako</option>
                    <option value="Sekai">Sekai</option>
                    <option value="Oxone">Oxone</option>
                    <option value="Xiaomi">Xiaomi</option>
                </select>

                <!-- <div class="mb-3">
                    <label for="acategory" class="form-label">Product Category</label>
                    <input type="text" class="form-control" name="acategory" id="acategory" placeholder="ex : Smartphone">
                </div> -->

                <label for="acategory" class="form-label">Product Category</label>
                <select class="form-select mb-3" aria-label="Product Category" id="acategory" name="acategory" required>
                    <option value="Smartphone">Smartphone</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Electric Fan">Electric Fan</option>
                    <option value="Mixer">Mixer</option>
                    <option value="Electric Stove">Electric Stove</option>
                    <option value="TV">TV</option>
                    <option value="Oven">Oven</option>
                    <option value="Oven">Rice Cooker</option>
                </select>

                <div class="mb-3">
                    <label for="aprice" class="form-label">Product Price</label>
                    <input type="number" class="form-control" name="aprice" id="aprice" placeholder="ex : 22999999" required>
                </div>

                <div class="mb-3">
                    <label for="aseller" class="form-label">Seller Name</label>
                    <input type="text" class="form-control" name="aseller" id="aseller" placeholder="ex : Johnny Grey" required>
                </div>

                <div class="mb-3">
                    <label for="aimage" class="form-label">Product Image</label>
                    <input class="form-control" type="file" id="aimage" name="aimage">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Save Product</button>
            </form>
        </div>
        </div>
    </div>
</div>