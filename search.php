<?php
    session_start();
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //value=" <?php if(isset($_GET['searchDetails'])){ echo $_GET['searchDetails']; }
                require_once('./database/config.php');

                            if(isset($_GET['SearchBtn'])){
                                $filter = $_GET['searchDetails'];
                                $scan = "SELECT * FROM `persol` WHERE CONCAT(firstname,lastname,email) LIKE '%$filter%' ";
                                $list = 0;

                                $scan_run = mysqli_query($pdo, $scan);

                                if(mysqli_num_rows($scan_run) > 0){
                                    foreach($scan_run as $data){
                                        ?>
                                            <tr>
                                                <td><?= $list++; ?></td>
                                                <td><?=$data['firstName']; ?></td>
                                                <td><?=$data['lastName']; ?></td>
                                                <td><?=$data['email']; ?></td>
                                                <td>new</td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else{ ?>
                                    <tr colspan="5">
                                        <td>No records found</td>
                                    </tr>
                                <?php }
                            }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                