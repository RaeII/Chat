<?php
    session_start();
 
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoin_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
        $output = "";

        $sql = "SELECT * FROM messages 
        LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
        WHERE (outgoing_msg_id = {$outgoin_id} AND incoming_msg_id = {$incoming_id}) 
        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoin_id}) 
        ORDER BY id_msg";
       
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0){
          while($row = mysqli_fetch_assoc($query)){
            if($row['incoming_msg_id'] === $incoming_id){//Manda a mensagem
              $output .= '<div class="chat incoming">
                              <img src="php/img/'.$row['img'].'" alt="">
                              <div class="details">
                                 <p> '.$row['message'].'</p>
                              </div>
                          </div>';
            }else{//recebe a mensagem
                $output .= '<div class="chat outgoing">
                             <div class="details">
                                <p>'.$row['message'].'</p>
                             </div>
                         </div>';
            }
          }
         echo $output; 
        }else{
          echo "";
        }
    
      }else{
         header("../login.php");
      }
      
?>