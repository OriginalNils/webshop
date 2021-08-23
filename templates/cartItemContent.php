<div class="col-4">
    <img src="https://via.placeholder.com/286x180">
</div>
<div class="col-5">
    <div class="fw-bolder fs-5 text-primary" id="carttitle"><?= $cartItem['title'] ?></div>
    <br>
    <div class="fw-light"><?= $cartItem['description'] ?></div>
    <br>
    
</div>
<div class="col-2 d-flex justify-content-center">
    Menge: 1
</div>
<div class="col-1">
    <div class="fw-bold text-end fs-5 text-primary"><?= number_format($cartItem['price']/100,2,","," ")?> €</div>
</div>
<hr class="my-4">  
