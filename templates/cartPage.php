<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <base href="<?= $baseURL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Shop Warenkorb</title>
</head>
<body>
    <?php include __DIR__.'/nav.php'?>
    <header class="container">
    <div class="jumbotron">
        <h1 class="display-4">Warenkorb</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <br>
          
</div>
    </header>
    
    <div class="container" id="cartItemsContent">
        <?php foreach($cartItems as $cartItem):?>
        <div class="row cartItem col-12">
            <?php include __DIR__.'/cartItemContent.php';?>
         </div>
         <?php endforeach?>
         <div class="row">
            <div id="sum" class="col-12 d-flex justify-content-end fs-5">Summe (<?= $countCartItems ?> Artikel): <span class="fw-bold fs-5 text-primary"> <?= number_format($cartSum/100,2,","," ")?> €</span></div>
         </div>
         <br>
         <div class="row justify-content-end">
            <a href="index.php/checkout" class="btn btn-primary col-12">Zur Kasse gehen</a>
         </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>