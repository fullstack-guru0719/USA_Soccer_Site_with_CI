<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card card-register mx-auto mt-5 mb-3">
      <div class="card-header">Add Product</div>
      <div class="card-body">
        <form class="add-product-form">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group thumbnail">
                <label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload Product Image</p><div class="p-image-preview"></div></label>
                <input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputProductName" class="form-control" placeholder="Product name" autofocus="autofocus">
                  <label for="inputProductName">Product Name</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputProductDetail" class="form-control" placeholder="Product detail" autofocus="autofocus">
                  <label for="inputProductDetail">Product Detail</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" id="inputProductPrice" class="form-control" placeholder="Product price" min="1" autofocus="autofocus" value="1">
                  <label for="inputProductPrice">Product Price</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" id="inputProductStock" class="form-control" placeholder="Product stock" min="0" autofocus="autofocus" value="0">
                  <label for="inputProductStock">Product Stock</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <p> Select Product Group: </p>
                  <select class="form-control" id="inputCategory" style="font-size: 23px">
                    <?php
                      foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['id']?>"><?php echo $category['category_name']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <p> Select Product Color: </p>
                  <select class="form-control" id="inputColor" style="font-size: 23px">
                    <option>None Color</option>
                    <?php
                      foreach ($colors as $color) { ?>
                    <option value="<?php echo $color['id']?>"><?php echo $color['color_name']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <p> Select Product Size: </p>
                  <select class="form-control" id="inputSize" style="font-size: 23px">
                    <option>None Size</option>
                    <?php
                      foreach ($sizes as $size) { ?>
                    <option value="<?php echo $size['id']?>"><?php echo $size['size_name']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <p> Select Product Status: </p>
                  <select class="form-control" id="inputProductStatus" style="font-size: 23px">
                    <option value="0">Disable</option>
                    <option value="1">Enable</option>
                  </select>
                </div>
              </div>
              <br/>
              <button class="btn btn-primary btn-block" id="add_product_btn" type="submit">Publish</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>