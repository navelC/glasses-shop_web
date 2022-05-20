<style type="text/css">
    #category{
        display: none;
    }
</style>
<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm danh mục</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">danh mục</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" name="name" class="form-control" placeholder="Tên danh mục" value="<?php if(isset($name)) echo $name ?>">
                    </div>
                    <div class="form-group" id="category">
                        <label>Danh mục lớn</label> <br>
                        <select class="form-control" name="idcategory">
                        <?php foreach ($data as $category): ?>
                            <option value="<?=$category['id'] ?>"><?=$category['name']?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Danh mục nhỏ</label>
                        <input type="radio" name="typecategory" value="sub_category">
                        <label>Danh mục lớn</label>
                        <input type="radio" name="typecategory" value="category" checked="checked">
                    </div>
                    <button type="submit" name="addCategory" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </section>
</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[type=radio][name=typecategory]').change(function () {
            if ($("input[name='typecategory']:checked").val() == 'sub_category') {
                document.getElementById('category').style.display = "block";
            }
            else if ($("input[name='typecategory']:checked").val() == 'category') {
                document.getElementById('category').style.display = "none";
            }
        });
    });
</script>