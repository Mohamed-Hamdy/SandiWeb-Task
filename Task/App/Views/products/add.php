<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<h1 class="text-center  mt-5 mb-2 py-3">Add New Product </h1>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">


            <?php if (isset($success)) : ?>
                <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
            <?php endif; ?>
            <?php if (isset($error)) : ?>
                <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
            <?php endif; ?>


            <form class="p-5 border mb-5" method="POST" action="<?php url('products/store'); ?>">
                
                <div class="form-group">
                    <label for="sku">Sku</label>
                    <input type="text" required name="sku" class="form-control" id="sku" >
                </div>
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" required name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="type">Type Switcher</label>
                    <select name="type" id="type" class="form-control">
                        <option value="" disabled></option>
                        <option value="DVD">DVD</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                </div>
                <div class="form-group" id="priceDiv" style="display: none;">
                    <label for="price">Price</label>
                    <input type="number"  name="price" class="form-control" id="price"  min=0>
                </div>
                <div class="form-group" id="sizeDiv" style="display: none;">
                    <label for="size">Size</label>
                    <input type="number"  name="size" class="form-control" id="size" min=0  placeholder="Value in MB">
                </div>
                <div class="form-group" id="weightDev" style="display: none;">
                    <label for="weight">Weight</label>
                    <input type="number"  name="weight" class="form-control" id="weight" min=0  placeholder="Value in KG">
                </div>

                <div class="form-group" id="heightDiv" style="display: none;">
                    <label for="height">Height</label>
                    <input type="number"  name="height" class="form-control" id="height" min=0  placeholder="Value in CM">
                </div>
                <div class="form-group" id="widthDiv" style="display: none;">
                    <label for="width">Width</label>
                    <input type="number"  class="form-control" name="width" id="width" min=0  placeholder="Value in CM">
                </div>
                <div class="form-group" id="lengthDiv" style="display: none;">
                    <label for="length">Length</label>
                    <input type="number"  class="form-control" name="length" id="length" min=0   placeholder="Value in CM" >
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
<script>
    function validate() {
             const check = document.getElementById('skuValidate');

            if (check >= 1) {
                alert("SKU Must be Unique");
                return false;
            } else if (check == 0) {
                alert("Good SKU");
                return true;
            } 
        }

    const el = document.getElementById('type');
    const priceDiv = document.getElementById('priceDiv');
    const sizeDiv = document.getElementById('sizeDiv');

    const weightDev = document.getElementById('weightDev');
    
    const heightDiv = document.getElementById('heightDiv');
    const widthDiv = document.getElementById('widthDiv');
    const lengthDiv = document.getElementById('lengthDiv');
    
    el.addEventListener('change', function handleChange(event) {
        if (event.target.value === 'DVD' || event.target.value === 'Book' || event.target.value === 'Furniture') {
            if(event.target.value === 'DVD'){
                sizeDiv.style.display = 'block';
                document.getElementById("size").required = true;
               
                weightDev.style.display = 'none';

                heightDiv.style.display = 'none';
                widthDiv.style.display = 'none';
                lengthDiv.style.display = 'none';
                    
            }else if(event.target.value === 'Book'){
                weightDev.style.display = 'block';
                document.getElementById("weight").required = true;

                sizeDiv.style.display = 'none';

                heightDiv.style.display = 'none';
                widthDiv.style.display = 'none';
                lengthDiv.style.display = 'none';
                
            }else if(event.target.value === 'Furniture'){
                heightDiv.style.display = 'block';
                widthDiv.style.display = 'block';
                lengthDiv.style.display = 'block';
                
                document.getElementById("height").required = true;
                document.getElementById("width").required = true;
                document.getElementById("length").required = true;

                sizeDiv.style.display = 'none';
                weightDev.style.display = 'none';
            }
        } else {
            sizeDiv.style.display = 'none';

            weightDev.style.display = 'none';

            heightDiv.style.display = 'none';
            widthDiv.style.display = 'none';
            lengthDiv.style.display = 'none';        
        }
    });
</script>
<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
