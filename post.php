<!DOCTYPE html>
<html>

   <?php include "includes/blog_navigation.php" ?>
    
    
    <div class="container">
      <div class="row">
       
       
  <?php 
                
                if(isset($_GET['p_id'])){
                    
                    $post_id = $_GET['p_id'];
                    
                }
    
                $stmt = $connection->prepare("SELECT * FROM posts WHERE db_post_id = $post_id ");
                $stmt->execute();
        

                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


            foreach ($rows as $row ) {
       
       
                $post_title = $row['db_post_title'];
                $date_visited = $row['db_post_visited'];
                $post_author = $row['db_post_author'];
                $post_number = $row['db_post_number'];
                $post_image = $row['db_post_image_main'];
                $post_image_1 = $row['db_post_image_1'];
                $post_image_2 = $row['db_post_image_2'];
                $post_image_3 = $row['db_post_image_3'];
                $post_image_4 = $row['db_post_image_4'];
                $post_content = substr($row['db_post_content'],0,100);

       ?>
       
       
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-10"> 
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img src="img/<?php echo $post_image ?>" alt="..." class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                </div>
                <h1> <?php echo $post_title ?><a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                 
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date">Author: <?php echo $post_author ?> </div>
                  </div>
                 <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i>Date visited: <?php echo $date_visited ?> </div>
                  </div>
                  
                </div>
                <div class="post-body">
                 
                  <p class="lead"><?php echo $post_content?></p>
                  
                <!-- Gallery Section-->
                <section class="gallery no-padding">    
                  <div class="row">
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item"><a href="img/<?php echo $post_image_1 ?>" data-fancybox="gallery" class="image"><img src="img/<?php echo $post_image_1 ?>" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item"><a href="img/<?php echo $post_image_2 ?>" data-fancybox="gallery" class="image"><img src="img/<?php echo $post_image_2 ?>" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item"><a href="img/<?php echo $post_image_3 ?>" data-fancybox="gallery" class="image"><img src="img/<?php echo $post_image_3 ?>" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item"><a href="img/<?php echo $post_image_4 ?>" data-fancybox="gallery" class="image"><img src="img/<?php echo $post_image_4 ?>" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                  </div>
                </section>
                      
                                          
<!--		closing the loop-->
		<?php   }  
         

           $stmt = $connection->prepare("SELECT * FROM posts WHERE db_post_id < $post_id ORDER by db_post_id DESC LIMIT 1");
           $stmt->execute();
        
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        if ( ! $rows){
        
        $post_id_prev = $row['db_post_id'];
        $post_title_prev = $row['db_post_title'];
        
        } else {
            foreach ($rows as $row) {
                
                $post_id_prev = $row['db_post_id'];
                $post_title_prev = $row['db_post_title'];
                
                
                
            }
    }
                     
         ?> 
               
               
                <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                   
                   <a href="post.php?p_id=<?php echo $post_id_prev ?>" class="prev-post text-left d-flex align-items-center">
                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                    <div class="text"><strong class="text-primary">Previous Post </strong>
                      <h6><?php echo $post_title_prev;?></h6>
                    </div>
                    </a>
                                    
        <?php     
    
           $stmt = $connection->prepare("SELECT * FROM posts WHERE db_post_id > $post_id ORDER by db_post_id ASC LIMIT 1");
           $stmt->execute();
           $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
        if ( ! $rows){
            
            $post_id_next = "2";
            $post_title_next= "Click here to get back to the first post";
        
        } else {
            
            foreach ($rows as $row ) {
                
                $post_id_next = $row['db_post_id'];
                $post_title_next = $row['db_post_title'];
                
            }
        }
    
        
         ?> 
                    <a href="post.php?p_id=<?php echo $post_id_next ?>" class="next-post text-right d-flex align-items-center justify-content-end">
                    
                    <div class="text"><strong class="text-primary">Next Post </strong>
                      <h6><?php echo $post_title_next ;?></h6>
                    </div>
                    <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>
                    
                    
                
              </div>
            </div>
          </div>
        </main>
        
        
      </div>
    </div>
    
    
    <?php include "includes/blog_footer.php" ?>
    
    