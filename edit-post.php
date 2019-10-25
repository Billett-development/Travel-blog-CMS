   <?php 

    if(isset($_GET['p_id'])) {
        
        $the_post_id = $_GET['p_id'];
    }

            $query = "SELECT * FROM posts WHERE db_post_id = $the_post_id";
            $select_posts_by_id = $connection->prepare($query);
            $select_posts_by_id->execute();
            $rows = $select_posts_by_id->fetchAll(PDO::FETCH_ASSOC);
                            
                            
            foreach($rows as $row){
            

                        $post_id = $row['db_post_id'];
                        $post_title = $row['db_post_title'];
                        $post_category_id = $row['db_post_category_id'];
                        $date_visited = $row['db_post_visited'];
                        $post_image = $row['db_post_image_main'];
                        $post_image_1 = $row['db_post_image_1'];
                        $post_image_2 = $row['db_post_image_2'];
                        $post_image_3 = $row['db_post_image_3'];
                        $post_image_4 = $row['db_post_image_4'];
                        $post_content = $row['db_post_content'];
                        $post_author = $row['db_post_author'];
                        $post_number = $row['db_post_number'];
            
            }


            if(isset($_POST['update_post'])){

                $post_title = $_POST['post_title'];
                $post_category_id = $_POST['post_category'];
                $date_visited = $_POST['date_visited'];
                $post_author = $_POST['post_author'];
                $post_number = $_POST['post_number'];
                $post_image = $_FILES['image_hero']['name'];
                $post_image_1 = $_FILES['image_gal1']['name'];
                $post_image_2 = $_FILES['image_gal2']['name'];
                $post_image_3 = $_FILES['image_gal3']['name'];
                $post_image_4 = $_FILES['image_gal4']['name'];
                $post_image_temp = $_FILES['image_hero']['tmp_name'];
                move_uploaded_file($post_image_temp, "img/$post_image" );
            
                $post_content = $_POST['post_content'];

                
                if(empty($post_image)) {
                    
                    $query = "SELECT * FROM posts WHERE db_post_id = $the_post_id ";
                    $select_posts_by_id = $connection->prepare($query);
                    $select_posts_by_id->execute();
                    $rows = $select_posts_by_id->fetchAll(PDO::FETCH_ASSOC);
                            
                            
            foreach($rows as $row){
                
                        
                        $post_image = $row['db_post_image_main'];
                        $post_image_1 = $row['db_post_image_1'];
                        $post_image_2 = $row['db_post_image_2'];
                        $post_image_3 = $row['db_post_image_3'];
                        $post_image_4 = $row['db_post_image_4'];
                        
                    }
                    
                    
                }
                
                
                      
                
                
            $sql = "UPDATE posts SET db_post_title=?, db_post_category_id=?,db_post_visited=?, db_post_image_main=?, db_post_image_1=?, db_post_image_2=?, db_post_image_3=?, db_post_image_4=?, db_post_content=? , db_post_number=?, db_post_author=? WHERE db_post_id=?";
                
            $stmt= $connection->prepare($sql);
            $stmt->execute([$post_title,$post_category_id,$date_visited,$post_image,$post_image_1,$post_image_2,$post_image_3,$post_image_4,$post_content,$post_number,$post_author, $the_post_id]);
                    
            echo "<p> <h3> Post Updated.</h3> <a href='../single.php?p_id={$the_post_id}'> View updated post</a> </p>";
                
            }
//////////////////////////// // name placeholders code DOES NOT WORK /////////////////////////////////////////////
//               $data = [
//                    
//                    'db_post_title' => $post_title,                        
//                    'db_post_category_id' => $post_category_id,                        
//                    'db_post_date',                     
//                    'db_post_visited' => $date_visited,                        
//                    'db_post_image_main' => $post_image,                        
//                    'db_post_image_1' => $post_image_1,                    
//                    '$post_image_2' => $post_image_2,                    
//                    '$post_image_3' => $post_image_3,                    
//                    '$post_image_4' => $post_image_4,                    
//                    'db_post_content' => $post_content,
//                    'db_post_id' => $the_post_id
//                        
//                        
//                ];
//                
//                $stmt = "UPDATE posts SET db_post_title=:db_post_title, db_post_category_id=:db_post_category_id, db_post_date =: now(), db_post_visited=:db_post_visited, db_post_image_main=:db_post_image_main, db_post_image_1=:db_post_image_1, db_post_image_2=:db_post_image_2, db_post_image_3=:db_post_image_3, db_post_image_4=:db_post_image_4, db_post_content=:db_post_content WHERE db_post_id=:db_post_id";
                
                          // 11 
//                
//                $query = $connection->prepare($stmt);
//                
//                $query->execute($data);      
                
                
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////              


?>
   
   
   <form action="" method="post" enctype="multipart/form-data">
    
        
            
        <div class="form-group">
            <label for="title">Post Title</label>
            <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
        </div>

        <div class="form-group">
            <select name="post_category" id="post_category">
                
            <?php 
                
                $query = "SELECT * FROM categories ";
                $select_categories = $connection->prepare($query);
                $select_categories->execute();
                $rows = $select_categories->fetchAll(PDO::FETCH_ASSOC);
                            
                            
            foreach($rows as $row){

                    $category_id = $row['category_id'];
                    $category_title = $row['category_title'];
                        
                    echo "<option value='{$category_id}'>{$category_title}</option>";
                    }
            ?>
            
            
            </select>
        </div>

                            
        <div class="form-group">
            <label for="title">Date visited</label>
            <input type="text" class="form-control" name="date_visited" value="<?php echo $date_visited; ?>">
        </div>
        
        <div class="form-group">
            <label for="title">Post Number</label>
            <input type="text" class="form-control" name="post_number" value="<?php echo $post_number; ?>">
        </div>
        
        <div class="form-group">
            <label for="title">Post Author</label>
            <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
        </div>        
                            
        <div class="form-group">
            <label for="title">Post Image (hero) </label>
            <input type="file"  name="image_hero">
        </div>
        
        <div class="form-group">
            <label for="title">Post Image 1 (Gallery) </label>
            <input type="file"  name="image_gal1">
        </div>  
        <div class="form-group">
            <label for="title">Post Image 2  </label>
            <input type="file"  name="image_gal2">
        </div>  
        <div class="form-group">
            <label for="title">Post Image 3  </label>
            <input type="file"  name="image_gal3">
        </div>  
        <div class="form-group">
            <label for="title">Post Image 4  </label>
            <input type="file"  name="image_gal4">
        </div>  

        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="body" cols="20" rows="10"> <?php echo $post_content ?>
            </textarea>
        </div>        

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_post" value="Publish Post">
        </div>                              
                                    
                                                                                                             
    
</form>