<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <base href="<?= $baseURL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Shop</title>
</head>
<body>
    <?php include __DIR__.'/nav.php'?>
    <header class="container">
    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">  
</div>
    </header>
    
    <section class="container" id="loginForm">
        <br>   
        <form action="index.php/login" method="POST">
            <div class="row">
            <div class="card col-md-4 offset-md-4">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <?php if($hasErrors):?>
                        <div class="alert alert-danger" role="alert">
                            <?php foreach($errors as $errorMessage):?>
                                <p><?= $errorMessage?></p>
                            <?php endforeach;?>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" value="<?=$username?>" class="form-control" id="username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="Password">
                    </div>
                </div>
                <div class="card-footer">
                    <button name="submit" type="submit" class="btn btn-success">Login</button>
                </div>
            </div>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>