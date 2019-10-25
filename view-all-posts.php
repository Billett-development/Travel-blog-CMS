

            <form action='' method="post">             

            <table class="table table-bordered table-hover">
                           
                 
                           <div id="col-xs-4">
                               
                               <a href="posts.php?source=add-post" style="margin-bottom: 20px;" class="btn btn-primary">Add New</a>
                               
                           </div>          
                           
                           
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    
                                    <th>ID</th>
                                    <th>title</th>
                                    <th>Date visited</th>
                                    <th>Location</th>
                                    <th>Author</th>
                                    <th>Post number</th>
                                    <th>content</th>
                                    <th>image hero</th>
                                    <th>Gallery 1</th>
                                    <th>Gallery 2</th>
                                    <th>Gallery 3</th>
                                    <th>Gallery 4</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                        
                        <tbody>
                            
                               
                               <?php 
                                
                    $query = "SELECT * FROM posts";       
                    $select_posts =$connection->prepare($query);
                    $select_posts->execute();
                    $rows = $select_posts->fetchAll(PDO::FETCH_ASSOC);
                            
                            
                    foreach($rows as $row){
                        
                        
                        
                        $post_id = $row['db_post_id'];
                        $post_title = $row['db_post_title'];
                        $date_visited = $row['db_post_visited'];
                        $post_category_id = $row['db_post_category_id'];
                        $post_author = $row['db_post_author'];
                        $post_number = $row['db_post_number'];
                        $post_image = $row['db_post_image_main'];
                        $post_image_1 = $row['db_post_image_1'];
                        $post_image_2 = $row['db_post_image_2'];
                        $post_image_3 = $row['db_post_image_3'];
                        $post_image_4 = $row['db_post_image_4'];
                        $post_content = $row['db_post_content'];
                       
                        
                        echo "<tr>";
                    
                        
                        ?> 
                            
                        <td>
                           
                <input class='checkboxes' id='selectAll' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                            
                        <?php 
                            
                        echo "<td>{$post_id}</td>";
                        echo "<td>{$post_title}</td>";
                        echo "<td>{$date_visited}</td>";
                        
                        
                        $query = "SELECT * FROM categories WHERE category_id = $post_category_id ";
                        $select_categories_id = $connection->prepare($query);
                        $select_categories_id->execute();
                        $rows = $select_categories_id->fetchAll(PDO::FETCH_ASSOC);
                            
                            
                    foreach($rows as $row){
                        

                        $category_id = $row['category_id'];
                        $category_title = $row['category_title'];
                        
                        echo "<td>{$category_title}</td>";
                            
                        }

                        
                        echo "<td>{$post_author}</td>";
                        echo "<td>{$post_number}</td>";
                        echo "<td>{$post_content}</td>";
                        echo "<td><img width='75' src='img/{$post_image}'</td>";
                        echo "<td><img width='75' src='img/{$post_image_1}'</td>";
                        echo "<td><img width='75' src='img/{$post_image_2}'</td>";
                        echo "<td><img width='75' src='img/{$post_image_3}'</td>";
                        echo "<td><img width='75' src='img/{$post_image_4}'</td>";
                        echo "<td><a href='posts.php?source=edit-post&p_id={$post_id}'>Edit</td>";
                        echo "<td><a href='posts.php?delete={$post_id}'>Delete</td>";

                        echo "</tr>";
                        
                        
                    //// ending for foreach  
                    }
                                
                                ?>    
                            
                        </tbody>
                     </table>
                     </form>
                    
                   
                  <?php 

            if(isset($_GET['delete'])) {
                
                $the_post_id = $_GET['delete'];
                
                $query = "DELETE FROM posts WHERE db_post_id = {$the_post_id} ";
                $delete_query =$connection->prepare($query);
                $delete_query->execute();
                
                
                header("Location: posts.php");
            }



            ?>