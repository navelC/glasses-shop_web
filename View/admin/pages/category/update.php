<?php if($type == 'sub') $name = $data['name'];
    else $name = $data1['name'];
?>
<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">sửa danh mục</h1>
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
                        <input type="text" name="name" class="form-control" placeholder="Tên danh mục" value="<?=$name?>">
                    </div>
                    <?php if($type == 'sub'): ?>
                    <div class="form-group" id="category">
                        <label>Danh mục lớn</label> <br>
                        <select class="form-control" name="idcategory">
                        <?php foreach ($datacategories as $category){
                                $check = '';
                                if ($category['id'] == $data['idcategory']) $check = 'selected';
                                echo "<option value='".$category['id']."' $check >".$category['name']."</option>";
                                $check = '';
                            }
                        ?>
                        </select>
                    </div>
                <?php endif ?>
                    <button type="submit" name="addCategory" class="btn btn-primary">cập nhật</button>
                </div>
            </form>
        </div>
    </section>
</div>
