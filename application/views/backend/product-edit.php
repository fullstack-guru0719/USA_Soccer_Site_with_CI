<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card card-register mx-auto mt-5 mb-3">
      <div class="card-header">Edit Product</div>
      <div class="card-body">
        <form class="edit-product-form">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group thumbnail">
                <label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload Product Image</p><div class="p-image-preview" style="background-image: url('<?php echo base_url() . $edit_product[0]['product_image']; ?>');"></div></label>
                <input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="editProductName" class="form-control" placeholder="Product name" autofocus="autofocus" value="<?php echo $edit_product[0]['product_name']; ?>">
                  <label for="editProductName">Product Name</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="editProductDetail" class="form-control" placeholder="Product detail" autofocus="autofocus" value="<?php echo $edit_product[0]['product_detail']; ?>">
                  <label for="editProductDetail">Product Detail</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" id="editProductPrice" class="form-control" placeholder="Product price" min="1" autofocus="autofocus" value="<?php echo $edit_product[0]['product_price']; ?>">
                  <label for="editProductPrice">Product Price</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" id="editProductStock" class="form-control" placeholder="Product stock" min="0" autofocus="autofocus" value="<?php echo $edit_product[0]['product_stock']; ?>">
                  <label for="editProductStock">Product Stock</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <p> Select Product Group: </p>
                  <select class="form-control" id="editCategory" style="font-size: 23px">
                    <?php
                      foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['id']?>" <?php  echo ($category['id'] == $edit_product[0]['category_id'] ) ? "selected": " " ?>><?php echo $category['category_name']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <p> Select Product Color: </p>
                  <select class="form-control" id="editColor" style="font-size: 23px">
                    <option>None Color</option>
                    <?php
                      foreach ($colors as $color) { ?>
                    <option value="<?php echo $color['id']?>" <?php  echo ($color['id'] == $edit_product[0]['color_id'] ) ? "selected": " " ?>><?php echo $color['color_name']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div><div class="form-group">
                <div class="form-label-group">
                  <p> Select Product Size: </p>
                  <select class="form-control" id="editSize" style="font-size: 23px">
                    <option>None Size</option>
                    <?php
                      foreach ($sizes as $size) { ?>
                    <option value="<?php echo $size['id']?>" <?php  echo ($size['id'] == $edit_product[0]['size_id'] ) ? "selected": " " ?>><?php echo $size['size_name']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <p> Select Product Status: </p>
                  <select class="form-control" id="editProductStatus" style="font-size: 23px">
                    <option value="0" <?php  echo ($edit_product[0]['product_status'] == '0' ) ? "selected": " " ?>>Disable</option>
                    <option value="1" <?php  echo ($edit_product[0]['product_status'] == '1' ) ? "selected": " " ?>>Enable</option>
                  </select>
                </div>
              </div>
              <br/>
              <button class="btn btn-primary btn-block" id="update_product_btn" attr-id="<?php echo $edit_product[0]['id']; ?>" type="submit">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>