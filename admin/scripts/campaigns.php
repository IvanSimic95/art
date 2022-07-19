<?php


        $sql = "SELECT * FROM orders WHERE order_status = 'shipped' OR order_status = 'processing' GROUP BY fbCampaign ORDER BY order_id DESC";
        $result = $conn->query($sql);
                if ($result->num_rows == 0) {
                         echo "no results";
                } else {
                        while ($row = $result->fetch_assoc()) {
                        $id = $row["fbCampaign"];
                                
                                if($id == "domain_click" OR $id == "{{campaign.id}}" OR $id == "" OR $id == "0"){
                                }else{

                                        //Find campaign name from DB
                                        $sql2 = "SELECT * FROM campaigns WHERE id = '$id'";
                                        $r2 = $conn->query($sql2);
                                        $fetch2 = $r2->fetch_assoc();
                                        if ($r2->num_rows == 0) {
                                        $name = $id;
                                        } else {
                                        $name = $fetch2['name'];
                                        }

                                        //Find campaign Sales Count from DB
                                        $sql4 = "SELECT * FROM orders WHERE (order_status = 'shipped' AND fbCampaign = '$id' AND DATE(order_date) >= '$startDate' AND DATE(order_date) <= '$endDate') OR (order_status = 'processing' AND fbCampaign = '$id' AND DATE(order_date) >= '$startDate' AND DATE(order_date) <= '$endDate')";
                                        $r4 = $conn->query($sql4);
                                        $countSales = $r4->num_rows;
                                  

                                        //Find campaign Sales from DB
                                        $sql3 = "SELECT SUM(order_price) AS sum_quantity FROM orders WHERE (order_status = 'shipped' AND fbCampaign = '$id' AND DATE(order_date) >= '$startDate' AND DATE(order_date) <= '$endDate') OR (order_status = 'processing' AND fbCampaign = '$id' AND DATE(order_date) >= '$startDate' AND DATE(order_date) <= '$endDate')";
                                        $r3 = $conn->query($sql3);
                                        $fetch3 = $r3->fetch_assoc();
                                        $sum = $fetch3['sum_quantity'];
                                        if($sum > 0){
                                        $sum = $sum * 0.84;
                                        $sum = round($sum);
                                        }else{
                                        $sum = 0;
                                        }

                                        echo '<tr id="' . $id . '">
                                        <td><a href="adsets.php?c='.$id.'&cname='.$name.'&sdate='.$startDate.'&edate='.$endDate.'">' . $id . '</a></td>
                                        <td>' . $name . '</td>
                                        <td>' . $countSales. '</td>
                                        <td>' . $sum. '</td>
                                        </tr>
                                        ';
                                }

                       
                        }
                        $conn->close();
                }
?>