<?php include "admin-includes/admin-header.php" ?>


    <div id="wrapper">
        
<!--        navigation include-->
        <?php include "admin-includes/admin-navigation.php" ?>
<!--        navigation include-->

 
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                     <h1 class="page-header">
                            All posts
                            <small>                          
                            <?php 
//                           show the logged in username
                           /* echo $_SESSION['username']; */ 
                            ?></small>
                        </h1>
                        
            <?php            
                if(isset($_GET['source'])){
                    
                    $source = $_GET['source'];
                    
                    
                } else {
                    
                    $source = '';
                }

               
                switch($source){
                        
                        case 'add-post';
                        include "admin-includes/add-post.php";
                        break;
                        
                        case'edit-post';
                        include "admin-includes/edit-post.php";
                        break;
                        
                        default;
                        
                        include "admin-includes/view-all-posts.php";
//                      display all the time
                        
                        break;
                }


            


                        
                        ?>    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
        
        
        <!-- /#page-wrapper -->

<?php include "admin-includes/admin-footer.php" ?>