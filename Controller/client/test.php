 echo'<p><button style="color:blue"><u>Trả lời</u></button>'; //nut tra loi
 if ($reply == '') {
          echo'<p></p>';
         }
         else { 
          echo'<div id="abc" style="border: solid 1px; margin-left:70px;padding: 2px; background: #ddd;">
            <h6 style="color:red">Tác giả:</h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$dong['reply'].'
          </div>';} // javascript 


           <script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#abc").toggle(function(){;});
        })
    })
</script>  


// admin 

 $sql = "SELECT * FROM binhluan where id=$idd limit  $start,$limit";
	    $ketqua = mysqli_query($conn , $sql);
	    while ($row = mysqli_fetch_assoc($ketqua)) {
                                    echo'
                                    <tr>
                                        <td><a href="">'.$row['noidung'].'</a></td>
                                        <td><textarea rows="3" value="" type="text" name="reply1"></textarea </td>
                                        <td><button name="reply2">Reply</button></td>    
                                    </tr> 
                                    ';    
                                     }  


                                    <?php 
if (isset($_POST['reply2'])) {
     $conn = mysqli_connect("localhost","root","","demo");  
         $reply = $_POST['reply1'];  
    $sql1 = " UPDATE binhluan SET reply='$reply' where id =".$_GET['id'];
    $ketqua = mysqli_query($conn, $sql1);
            echo '<script language="javascript">'; 
            echo 'alert("Đã trả lời !")'; 
            echo '</script>';
       
}
  ?>