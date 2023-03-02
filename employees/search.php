<?php
                        
                            require_once('./database/config.php');

                            if(isset($_GET['browser'])){
                                $filter = $_GET['q'];
                                $scan = "SELECT * FROM `staffs_details` WHERE CONCAT(firstName,lastName,email,department) LIKE '%$filter%' ";
                                $list = 0;

                                $scan_run = mysqli_query($pdo, $scan);

                                if(mysqli_num_rows($scan_run) > 0){
                                    foreach($scan_run as $data){
                                        ?>
                                        <div class="row">
                                            <div class="col list-group">
                                                <li type="A">
                                                    <?php echo
                                                        "<a href='./more.php?id=$data[id]' class='list-group-item-light'>"
                                                        .$data['firstName'] ."  ". $data['lastName']." - ". $data['department']. " Department".
                                                        "</a>"
                                                    ;?>
                                                </li>
                                            </div>
                                        </div>
                                        <tbody>
                                    <?php }
                                }
                                else{ ?>
                                    <tr colspan="6">
                                        <td colspan="6">No records found</td>
                                    </tr>
                                <?php } } ?>       
                        </tbody>
                </table>