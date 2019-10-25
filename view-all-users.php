           
                           
            <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Admin</th>
                                    <th>Subscriber</th>
                                    <th>Delete</th>
                                    <th>Edit</th>

                                </tr>
                            </thead>
                        
                        <tbody>
                            
                               
                               <?php 
                                
                    $query = "SELECT * FROM users";
                    $select_users = mysqli_query($connection, $query);
                                   
                    while($row = mysqli_fetch_assoc($select_users)){

                    $user_id = $row['db_user_id'];
                    $username = $row['db_username'];
                    $user_password = $row['db_user_password'];
                    $user_firstname = $row['db_user_firstname'];
                    $user_lastname = $row['db_user_lastname'];
                    $user_email = $row['db_user_email'];
                    $user_role = $row['db_user_role'];

                        
                        
                        echo "<tr>";
                        
                        echo "<td>{$user_id}</td>";
                        echo "<td>{$username}</td>";
                        echo "<td>{$user_firstname}</td>";
                        

                        echo "<td>{$user_lastname}</td>";
                        echo "<td>{$user_email}</td>";
                        echo "<td>{$user_role}</td>";
                        
                        
                        
//                        i want you to select all of the posts where post _id is eqaul to the comment post id
                        
//                        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
//                        $select_post_id_query = mysqli_query($connection,$query);
//                        
//                        while($row = mysqli_fetch_assoc($select_post_id_query)){
//                            
//                            $post_id = $row['post_id'];
//                            $post_title = $row['post_title'];
//                            
//                            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//                            
//                        }
                        
                    
                        
                        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</td>";
                        echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</td>";
                        
                        echo "<td><a href='users.php?delete={$user_id}'>Delete</td>";
                        
                        echo "<td><a href='users.php?source=edit-user&edit-user={$user_id}'>Edit</td>";
                        echo "</tr>";
                        
                    }
                                
                                ?>    
                            
                        </tbody>
                     </table>
                     
                    
                   
                  <?php 

            if(isset($_GET['delete'])) {
                
                $the_user_id = $_GET['delete'];
                
                $query = "DELETE FROM users WHERE db_user_id = {$the_user_id} ";
                
                $delete_users_query = mysqli_query($connection, $query);
                header("location: users.php");
            }



            if(isset($_GET['change_to_sub'])) {
                
                $the_user_id = $_GET['change_to_sub'];
                
                $query = "UPDATE users SET db_user_role = 'Subscriber' WHERE db_user_id = $the_user_id ";
                
                $change_to_sub_query = mysqli_query($connection, $query);
                header("location: users.php");
            }


            if(isset($_GET['change_to_admin'])) {
                
                $the_user_id = $_GET['change_to_admin'];
                
                $query = "UPDATE users SET db_user_role = 'Admin' WHERE db_user_id = $the_user_id ";
                
                $change_to_admin_query = mysqli_query($connection, $query);
                header("location: users.php");
            }




            ?>