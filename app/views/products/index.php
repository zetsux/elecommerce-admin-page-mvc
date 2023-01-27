<div class="container-fluid m-2">
    <div class="row">
        <div class="col-lg-6 mt-2">
            <?php FlashMsg::flashMessage() ?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <h3 class="mt-2 mb-2 ms-1 d-block">Products List</h3>
            <div class="d-flex justify-content-between px-2">
                <button type="button" class="btn btn-warning mt-2 mb-3 addProductButton" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add New Product
                </button>

                <form action="<?= BASE_URL ?>products/search" method="post">
                    <div class="input-group mt-2">
                        <input type="text" autocomplete="off" class="form-control" placeholder="Search for products.." aria-describedby="button-addon2" name="skeyword" id="skeyword">
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
            

            <div class="list-group mt-2">
                <?php foreach ($data["prods"] as $prod) : ?>
                    <a href="<?= BASE_URL ?>products/detail/<?= $prod["id"]?>" class="list-group-item list-group-item-action list-group-item-light 
                        d-flex justify-content-between align-items-center">
                        <?= $prod["name"] ?>
                        <img src="<?= BASE_URL ?>img/<?= $prod["image"]?>" style='width: 60px; height: 60px;' class='img-thumbnail shadow'>
                    </a>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="<?= BASE_URL ?>products/edit/<?= $prod["id"]?>" class="btn btn-primary align-items-center w-50 showEditModal" data-bs-toggle="modal" 
                            data-bs-target="#addModal" data-id="<?= $prod["id"]?>">
                            Edit Product
                        </a>
                        <a href="<?= BASE_URL ?>products/delete/<?= $prod["id"]?>" class="btn btn-danger align-items-center w-50" 
                            onclick="return confirm('Are you sure that you want to delete this product?')">
                            Delete Product
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="addmodalLabel">Add New Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= BASE_URL ?>products/new" enctype="multipart/form-data">
                <input type="hidden" name="aid" id="aid">
                <input type="hidden" name="aoldimg" id="aoldimg">
                    
                <div class="mb-3">
                    <label for="aname" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="aname" id="aname" autocomplete="off" required>
                </div>

                <label for="abrand" class="form-label">Product Brand</label>
                <select class="form-select mb-3" aria-label="Product Brand" id="abrand" name="abrand" required>
                    <option id="optbrand" value="-" style="display: none;">Select your product's brand</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Apple">Apple</option>
                    <option value="Asus">Asus</option>
                    <option value="Miyako">Miyako</option>
                    <option value="Sekai">Sekai</option>
                    <option value="Oxone">Oxone</option>
                    <option value="Xiaomi">Xiaomi</option>
                </select>

                <label for="acategory" class="form-label">Product Category</label>
                <select class="form-select mb-3" aria-label="Product Category" id="acategory" name="acategory" required>
                    <option id="optcategory" value="-" style="display: none;">Select your product's category</option>
                    <option value="Smartphone">Smartphone</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Electric Fan">Electric Fan</option>
                    <option value="Mixer">Mixer</option>
                    <option value="Electric Stove">Electric Stove</option>
                    <option value="TV">TV</option>
                    <option value="Oven">Oven</option>
                    <option value="Rice Cooker">Rice Cooker</option>
                </select>

                <div class="mb-3">
                    <label for="aprice" class="form-label">Product Price</label>
                    <input type="number" class="form-control" name="aprice" id="aprice" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="aseller" class="form-label">Seller Name</label>
                    <input type="text" class="form-control" name="aseller" id="aseller" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="aimage" class="form-label">Product Image</label>
                    <img src='#' style='width: 200px; height: 200px;' class='img-thumbnail shadow mt-1 mb-4 d-none' id="oldimage">
                    <input class="form-control" type="file" id="aimage" name="aimage" required>
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