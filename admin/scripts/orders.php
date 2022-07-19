<?php
$sql = "SELECT * FROM orders WHERE order_status = 'processing' OR order_status = 'shipped' OR order_status = 'paid' ORDER BY order_id DESC LIMIT 10000";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 0) {
                        } else {
                        while ($row = $result->fetch_assoc()) {
                        $time = time_ago($row["order_date"]);
                        $product = ucwords($row["order_product"]);
                        switch ($product) {
                                case "Husband":
                                 $product = "Future Husband Drawing";
                                  break;
                              case "Pastlife":
                                  $product = "Past Life Drawing";
                                  break;
                              case "Baby":
                                  $product = "Future Baby Drawing";
                                  break;
                              case "Soulmate":
                                  $product = "Soulmate Drawing";
                                  break;
                              case "Twinflame":
                                      $product = "Twin Flame Drawing";
                                      break;
                              }
                        if($row["order_status"]=="shipped"){$status="completed";}else{$status = $row["order_status"];}
                        echo '<tr style="cursor: pointer;" id="' . $row["order_id"] . '" onclick="buttonClicked(this.id)">
                        <td>#' . $row["order_id"] . '</td>
                        <td>' . $time . '</td>
                        <td>' . $row["user_name"]. '</td>
                        <td>' . $row["order_email"]. '</td>
                        <td>' . $product. '</td>
                        <td><div class="sbadge sbadge-' . $status. '">' . $status. ' <i class="fas fa-check"></i><i class="fas fa-stream"></i><i class="fas fa-redo"></i><i class="fas fa-ban"></i></div></td>
                        <td>$' . $row["order_price"]. '</td>
                        <td>' . $row["order_priority"]. ' hours</td>
                        </tr>
                        ';
                        }
                        $conn->close();
                                }
                                ?>