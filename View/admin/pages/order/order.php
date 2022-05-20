<?php 
    $orders = '<tr status="row" class="odd">'.
                        '<td class="sorting_1">'.$stt.'</td>'.
                        "<td>".$order['id']."</td>".
                        "<td>$".$order['total_price']."</td>".
                        "<td>".$order['name']."</td>".
                        "<td>".$order['order_date']."</td>".
                        "<td>".$order['delivery_date']."</td>".
                        '<td style="text-align: center;">'.
                            '<span class="badge bg-primary">'.
                                $order['status'].
                            '</span>'.
                        '</td>'.
                        '<td style="text-align: center;">'.
                            '<span class="badge bg-danger">'.
                                '<a href="javascript:;" data-id="'.$order['id'].'" data-type="$type" id="del">'.
                                    '<ion-icon name="trash-outline"></ion-icon>'.
                                '</a>'.
                            '</span>'.
                        '</td>'.
                    '</tr>';
 return $orders;
 ?>
