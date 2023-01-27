<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data["title"] ?></title>
    <link href="<?= BASE_URL; ?>css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">
</head>
<body style="background-color: #A7C7E7">

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand px-2" href="<?= BASE_URL; ?>">Elecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>">Home</a>
        <a class="nav-link active" aria-current="page" href="<?= BASE_URL . 'products' ?>">Products</a>
        <a class="nav-link active" aria-current="page" href="<?= BASE_URL . 'about' ?>">About</a>
        <!-- <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled">Disabled</a> -->
      </div>
    </div>
  </div>
</nav>