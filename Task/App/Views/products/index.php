<?php $id ?>

<nav class="navbar bg-primary">
    <div class="container-fluid px-4">
        <h2 class="navbar-brand my-auto">Products List</h2>

        <span>
            <a href="<?php url('products/add'); ?>" type="button" class="btn btn-outline-info" type="submit">ADD</a>
            <form action="<?php url('/products/delete/') ?>" method="post" id="delete-form" class="d-inline-block">
                <button for="delete-form" id="delete-product-btn" class="btn btn-outline-danger" type="submit">MASS
                    DELETE</button>
            </form>
        </span>
    </div>
</nav>
<h1 class="text-center  my-5 py-3">View All Products </h1>

<div class="container my-5">
    <div class="row g-4">


        <?php if (isset($success)) : ?>
            <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
        <?php endif; ?>



        <?php $i = 1; ?>
        <?php if (is_array($products) || is_object($products)) : ?>
            <?php foreach ($products as $i => $product) : ?>

                <div class="col-6 col-md-3">
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input form="delete-form" id="delete-checkbox" type="checkbox" class="delete-checkbox form-check-input" name="<?= $product['id'] ?>">
                                    <?php $id = $product['id']; ?>

                                </label>
                            </div>
                            <p class="card-title text-center"><?= $product['sku'] ?></p>
                            <p class="card-text text-center"><?= $product['name'] ?></p>
                            <p class="card-text text-center"><?= $product['price'] ?> $</p>
                            <p class="card-text text-center"><?= $product['value'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>


<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>