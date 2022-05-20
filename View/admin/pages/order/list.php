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
                    <h1>Danh sách đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content-header">
            <div class="col-sm-2">
                <select id="change">
                    <option value="all" selected>Tất cả</option>
                    <option value="wait">đơn hàng mới đặt</option>
                    <option value="delivering">đơn hàng đang giao</option>
                    <option value="received">đơn hàng đã nhận</option>
                </select>
            </div>
    </section>
    <section>
        <div class="col-12">
            <div class="card">
                <!-- day/.card-header -->
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã đơn hàng</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">tổng tiền</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tên người đặt</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày đặt hàng</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày nhận hàng</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Trạng thái</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order">
                                        <?php
                                            $type = 'sub';
                                            $stt = 0;
                                            foreach ($dataorder as $order) {?>
                                                <tr status="row" class="odd">
                                                    <td class="sorting_1"><?=++$stt?></td>
                                                    <td><?=$order['id']?></td>
                                                    <td>$<?=$order['total_price']?></td>
                                                    <td><?=$order['name']?></td>
                                                    <td><?=$order['order_date']?></td>
                                                    <td><?=$order['delivery_date']?></td>
                                                    <td style="text-align: center;">
                                                        <span class="badge bg-primary" id="status"  data-id="<?=$order['id']?>">
                                                            <?=$order['status']?>
                                                        </span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <span class="badge bg-danger">
                                                            <a href="javascript:;" data-id="<?=$order['id']?>" id="del">
                                                                <ion-icon name="trash-outline"></ion-icon>
                                                            </a>
                                                        </span>
                                                    </td>
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
                    foreach ($dataorder1 as $order){++$stt
                ?>
                order += '<?php echo require 'pages/order/order.php'; ?>';
                <?php } ?>
            }
            else if(type == 'received'){
                <?php
                    $type = 'received';
                    $stt = 0;
                    foreach ($dataorder2 as $order){++$stt
                ?>
                order += '<?php echo require 'pages/order/order.php'; ?>';
                <?php } ?>
            }
            else if(type == 'all'){
                <?php
                    $type = 'all';
                    $stt = 0;
                    foreach ($dataorder as $order){++$stt
                ?>
                order += '<?php echo require 'pages/order/order.php'; ?>';
                <?php } ?>
            }
            document.getElementById("order").innerHTML = order;
        });
        
     });
    $(document).on('click','#del',function(){
        var id = $(this).attr('data-id');
        var type =  $(this).attr('data-type');
        $.ajax({
            url: '../../ajax/index.php?controller=delorder',
            method:"POST",
            cache: false,
            data:{id:id, type:type},
            success:function(data){
                $(this).closest('tr').remove();
            }
        });
    });
    $(document).on('click','#status',function(){
        var id = $(this).attr('data-id');
        var status = $(this).text();
        alert(status);
        if (status.indexOf("chờ xác nhận") != -1){
            status = 'đã nhận hàng';
            $(this).text(status);
        } 
        else{
            status = 'chờ xác nhận';
            $(this).text(status);
        } 
        $.ajax({
            url: '../../ajax/index.php?controller=order',
            method:"POST",
            data:{id:id, status:status},
            success:function(){
            }
        });
    });
</script>
