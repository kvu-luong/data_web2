<?php
                                                    foreach ($userList as $userList){
                                                ?>
                                                                <tr>
                                                                    <td><b><?php echo $userList->id ?></b></td>
                                                                    <td><?php echo $userList->firstname." ".$userList->lastname ?></td>
                                                                    <td><?php
                                                                        if (($userList->type)==0)
                                                                            echo "Student";
                                                                        else echo "Lecturer";
                                                                    ?></td>
                                                                    <td>
                                                                        <button type="submit" name="modify" class="w3-button w3-sand w3-hover-indigo edit_data" id="<?php echo $userList->id ?>" ><b>Modify</b></button>
                                                                    </td>
                                                                    <td>
                                                                        <form method="POST" action="UserServlet.php">
                                                                            <input type="hidden" name="method" value="delete" >
                                                                            <button type="submit" name="delete" class="w3-button w3-sand w3-hover-indigo" value="<?php echo $userList->id ?>" ><b>Delete</b></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                <?php
                                                    }
                                                ?>
