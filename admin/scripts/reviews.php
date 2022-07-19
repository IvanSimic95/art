<?php
$sql = "SELECT * FROM reviews WHERE review_moderated = 'approved' ORDER BY review_id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 0) {
                        } else {
                        while ($row = $result->fetch_assoc()) {
                        $time = time_ago($row["review_date"]);
                        echo '<tr id="' . $row["review_id"] . '">
                        <td>#' . $row["review_id"] . '</td>
                        <td>' . $time . '</td>
                        <td>' . $row["review_name"]. '</td>
                        <td>' . $row["product"]. '</td>
                        <td>' . $row["review_rating"]. '</td>
                        <td>' . $row["review_text"]. '</td>
                        </tr>
                        ';
                        }
                        $conn->close();
                                }
                                ?>