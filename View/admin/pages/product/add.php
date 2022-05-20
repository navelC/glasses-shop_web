<script src="../../Public/admin/dist/js/ckeditor.js"></script>
<div class="content-wrapper" style="min-height: 353px;">
<div class="content-header">
<div class="container-fluid">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form method="POST" action="?controller=addProduct" enctype="multipart/form-data" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Product Name
                    </label>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                   <div class="form-group mb-3">
                    <label
                      for="name"
                      >Price
                    </label>
                    <input
                      id="name"
                      name="price"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                   <div class="form-group mb-3">
                    <label
                      for="name"
                      >Quantity
                    </label>
                    <input
                      id="name"
                      name="quantity"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                     <textarea name="description" id="editor"></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category" name="idcategory" 
                    >
                    <?php 
                      foreach ($datapcategory as $row) {
                        echo '<option value = "'.$row['id'].'">'.$row['name']."</option>";
                      }
                     ?>
                    </select>
                  </div>
                  
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" name="anh" style="display:none;" />
                  <input
                    type="button"
                    class="btn btn-primary btn-block mx-auto"
                    value="UPLOAD PRODUCT IMAGE"
                    onclick="document.getElementById('fileInput').click();"
                  />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
    </script>