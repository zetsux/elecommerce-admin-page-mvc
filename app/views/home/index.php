<div class="container-fluid m-2">
    <div class="jumbotron mt-2">
        <h1 class="display-4">Welcome to my Simple MVC App!</h1>
        <p class="lead">This application was created as the product of learning about the MVC architecture in PHP.</p>
        <p>My name is <?= $data["name"] ?></p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="<?= BASE_URL . 'about' ?>" role="button">About</a>
    </div>
</div>