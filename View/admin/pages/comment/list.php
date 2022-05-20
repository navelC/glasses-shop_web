<?php error_reporting(E_ERROR | E_PARSE); ?>
<style type="text/css">
    .badge {
        cursor: pointer;
    }
</style>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách bình luận</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách bình luận</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content-header">
            <div class="col-sm-2">
                <select id="change">
                    <option value="all" selected>Tất cả</option>
                    <option value="wait">bình luận mới đặt</option>
                    <option value="delivering">bình luận đang giao</option>
                    <option value="received">bình luận đã nhận</option>
                </select>
            </div>
    </section>
    <section>
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php  
                                    if (isset($_SESSION['thongbao'])) {?>
                                        <div class="form-group alert alert-primary">
                                            <?=$_SESSION['thongbao']?>
                                            <?php unset($_SESSION['thongbao']); ?>
                                        </div>
                                    <?php }
                                ?>
                                <table id="example2" class="table table-bordered table-hover dataTable" status="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr status="row">
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã bình luận</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">nội dung</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">mã người bình luận</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">mã sản phẩm</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">thời gian bình luận</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">trả lời bình luận</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order">
                                        <?php
                                            foreach ($datacomment as $comment) {?>
                                                <tr status="row" class="odd">
                                                    <td><?=$comment['id']?></td>
                                                    <td><?=$comment['content']?></td>
                                                    <td><?=$comment['iduser']?></td>
                                                    <td><?=$comment['idproduct']?></td>
                                                    <td><?=$comment['date']?></td>
                                                    <td>trả lời</td>
                                                </tr>
                                            <?php }
                                        ?>
                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#change").change(function(){
            var type = $(this).val();
            var order = '';
            if(type == 'wait'){
                <?php
                    $type = 'wait';
                    $stt = 0;
                    foreach ($dataorder1 as $comment){++$stt
                ?>
                order += '<tr status="row" class="odd">'+
                        '<td class="sorting_1"><?=$stt?></td>'+
                        "<td><?=$comment['id']?></td>"+
                        "<td>$<?=$comment['total_price']?></td>"+
                        "<td><?=$comment['name']?></td>"+
                        "<td><?=$comment['order_date']?></td>"+
                        "<td><?=$comment['delivery_date']?></td>"+
                        '<td style="text-align: center;">'+
                            '<span class="badge bg-primary">'+
                                "<?=$comment['status']?>"+
                            '</span>'+
                        '</td>'+
                        '<td style="text-align: center;">'+
                            '<span class="badge bg-danger">'+
                                '<a href="javascript:;" data-id="<?=$comment['id']?>" data-type="<?=$type?>" id="del">'+
                                    '<ion-icon name="trash-outline"></ion-icon>'+
                                '</a>'+
                            '</span>'+
                        '</td>'+
                    '</tr>';
                <?php } ?>
            }
            else if(type == 'received'){
                <?php
                    $type = 'received';
                    $stt = 0;
                    foreach ($dataorder2 as $comment){++$stt
                ?>
                order += '<tr status="row" class="odd">'+
                        '<td class="sorting_1"><?=$stt?></td>'+
                        "<td><?=$comment['id']?></td>"+
                        "<td>$<?=$comment['total_price']?></td>"+
                        "<td><?=$comment['name']?></td>"+
                        "<td><?=$comment['order_date']?></td>"+
                        "<td><?=$comment['delivery_date']?></td>"+
                        '<td style="text-align: center;">'+
                            '<span class="badge bg-primary">'+
                                "<?=$comment['status']?>"+
                            '</span>'+
                        '</td>'+
                        '<td style="text-align: center;">'+
                            '<span class="badge bg-danger">'+
                                '<a href="javascript:;" data-id="<?=$comment['id']?>" data-type="<?=$type?>" id="del">'+
                                    '<ion-icon name="trash-outline"></ion-icon>'+
                                '</a>'+
                            '</span>'+
                        '</td>'+
                    '</tr>';
                <?php } ?>
            }
            else if(type == 'all'){
                <?php
                    $type = 'all';
                    $stt = 0;
                    foreach ($dataorder as $comment){++$stt
                ?>
                order += '<tr status="row" class="odd">'+
                        '<td class="sorting_1"><?=$stt?></td>'+
                        "<td><?=$comment['id']?></td>"+
                        "<td>$<?=$comment['total_price']?></td>"+
                        "<td><?=$comment['name']?></td>"+
                        "<td><?=$comment['order_date']?></td>"+
                        "<td><?=$comment['delivery_date']?></td>"+
                        '<td style="text-align: center;">'+
                            '<span class="badge bg-primary">'+
                                "<?=$comment['status']?>"+
                            '</span>'+
                        '</td>'+
                        '<td style="text-align: center;">'+
                            '<span class="badge bg-danger">'+
                                '<a href="javascript:;" data-id="<?=$comment['id']?>" data-type="<?=$type?>" id="del">'+
                                    '<ion-icon name="trash-outline"></ion-icon>'+
                                '</a>'+
                            '</span>'+
                        '</td>'+
                    '</tr>';
                <?php } ?>
            }
            document.getElementById("order").innerHTML = order;
        });
        
     });
</script>
