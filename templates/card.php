<div class="card">
    <div class="card-title"><?= $product['title'] ?></div>
    <img src="https://via.placeholder.com/286x180" class="card-img-top" alt="...">
    <div class="card-body">
        <?= $product['description'] ?>
        <hr>
        <?= number_format($product['price']/100,2,","," ") ?> €
    </div>
    <div class="card-footer">
        <a href="" class="btn btn-primary">Details</a>
        <a href="index.php/cart/add/<?= $product['id'] ?>" class="btn btn-success">In den Warenkorb</a>
    </div>
</div>