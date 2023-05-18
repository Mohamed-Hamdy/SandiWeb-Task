<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Add Product</title>
</head>

<body>

    <nav class="navbar bg-primary">
        <div class="container-fluid px-4">
            <h2 class="navbar-brand my-auto">Products List</h2>
            <span>
                <button form="product_form" class="btn btn-outline-info" type="submit">Save</button>
                <a href="<?php url('products/'); ?>" name="submit" class="btn btn-outline-danger" type="submit">Cancel</a>
            </span>
        </div>
    </nav>
    <h1 class="text-center  my-5 py-3">Add Products Page </h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">


                <?php if (isset($success)) : ?>
                    <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
                <?php endif; ?>
                <?php if (isset($error)) : ?>
                    <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
                <?php endif; ?>




                <form id="product_form" class="p-5 border mb-5" action="<?php url('products/store'); ?>" method="POST">

                    <div class="form-group">
                        <label for="sku">Sku</label>
                        <input type="text" required name="sku" class="form-control" id="sku">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" required name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group" id="priceDiv">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" min=0>
                    </div>

                    <div class="form-group">
                        <label for="productType">Product Type</label>
                        <select name="productType" id="productType" class="form-control">
                            <option value="" id="default">Please Select Your Type</option>
                            <option value="DVD">DVD</option>
                            <option value="Book">Book</option>
                            <option value="Furniture">Furniture</option>
                        </select>
                    </div>
                    <div class="input-style" id="inputSize" style="display: none">
                        <label>Size (in MB)</label>
                        <input type="number" class="form-control" name="size" id="size">
                    </div>
                    <div class="input-style" id="inputWeight" style="display: none">
                        <label>Weight (in KG)</label>
                        <input type="number" step=".01" class="form-control" id="weight" name="weight">
                    </div>
                    <div class="input-style" id="inputHeight" style="display: none">
                        <label>Height (in M)</label>
                        <input type="number" step=".01" class="form-control" id="height" name="height">
                    </div>
                    <div class="input-style" id="inputWidth" style="display: none">
                        <label>Width (in M)</label>
                        <input type="number" step=".01" class="form-control" id="width" name="width">
                    </div>
                    <div class="input-style" id="inputLength" style="display: none">
                        <label>Length (in M)</label>
                        <input type="number" step=".01" class="form-control" id="length" name="length">
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $selectedElement = $("#productType").val();
            hideAllExcept($selectedElement);
        });

        $("#productType").on("change",
            function() {
                var type = $(this).val();
                if (type == "DVD") {
                    hideAllExcept('DVD');
                } else if (type == "Book") {
                    hideAllExcept('Book');
                } else if (type == "Furniture") {
                    hideAllExcept('Furniture');
                }
            }
        );

        $("#saveButton").on("click", function() {
            var selectedOption = $("#productType").val();
            $("#productType").val(selectedOption).select();
        });

        function hideAllExcept($element) {
            $allElements = {
                'DVD': ['inputSize'],
                'Book': ['inputWeight'],
                'Furniture': ['inputHeight', 'inputWidth', 'inputLength'],
            };

            $.each($allElements, function(index, value) {
                console.log(index);
                if (index == $element) {
                    $.each(value, function(i, val) {
                        $(`#${val}`).show();
                    });
                } else {
                    $.each(value, function(i, val) {
                        $(`#${val}`).find("input").val('');
                        $(`#${val}`).hide();

                    });
                }
            });
        }
    </script>
    <?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>
</body>

</html>