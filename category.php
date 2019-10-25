

  <?php include "includes/blog_navigation.php" ?>
    
    
    
        <div class="container">
      <div class="row">
       
    
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
       		
<!--		Dynamic grabbing of posts from the database-->
		 <?php 
    
            if(isset($_GET['category'])){
                    
                   $post_category_id = $_GET['category'];
                }

                $stmt = $connection->prepare("SELECT * FROM posts WHERE db_post_category_id = $post_category_id ");
                $stmt->execute();
        

                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


            foreach ($rows as $row ) {
                
                                $post_id = $row['db_post_id'];
                                $post_title = $row['db_post_title'];
                                $date_visited = $row['db_post_visited'];
                                $post_author = $row['db_post_author'];
                                $post_image = $row['db_post_image_main'];
                                $post_image = $row['db_post_image_main'];
                                $post_image = $row['db_post_image_main'];
                                $post_image = $row['db_post_image_main'];
                                $post_content = substr($row['db_post_content'],0,100);
                                
                    
                ?>
        
              <!-- post -->
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="post.php?p_id=<?php echo $post_id ?>"><img src="img/<?php echo $post_image?>" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                  </div><a href="post.php?p_id=<?php echo $post_id ?>">
                    <h3 class="h4"><?php echo $post_title ?></h3></a>
                  <p class="text-muted"><?php echo $post_content ?></p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="title"><span><?php echo $post_author ?></span></div></a>
                    <div class="date"><i class="icon-clock"></i><?php echo  $date_visited ?></div>
                  </footer>
                </div>
              </div>
        
<!--		closing the loop here so it will run this code through every post -->
		
		<?php    } ?> 
        
         </div> 
          </main> 
          
            <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form action="#" class="search-form">
              <div class="form-group">
                <input type="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
                    
                     <!-- Widget [Categories Widget]-->
<!--	         Dynamic category code retrieved from database-->
            <div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
                <?php 
                
                
                $stmt = $connection->prepare("SELECT * FROM categories");
                $stmt->execute();
        

                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


            foreach ($rows as $row ) {
            
                $category_title = $row['category_title'];
                $category_id = $row['category_id'];

                echo "
                
                    <div class='item d-flex justify-content-between'><a href='category.php?category={$category_id}'>{$category_title}</a></div>
                ";

                }
 

                ?>
                     
          </div>    
               
               
                </aside>
          
           
        </div>
      </div>
</div>
   
   
   
   
    
    
    <!-- Divider Section-->
<!--
    <section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
          </div>
        </div>
      </div>
    </section>
-->
    
    
    
    <?php include "includes/blog_footer.php" ?>
