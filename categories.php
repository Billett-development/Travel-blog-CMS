<?php include "admin-includes/admin-header.php" ?>


    <div id="wrapper">
        
<!--        navigation include-->
        <?php include "admin-includes/admin-navigation.php" ?>

 

       
       
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                            <small>                          
                            <?php 
//                           show the logged in username
//                            echo $_SESSION['username'];
                            ?></small>
                        </h1>
                    <div class="col-xs-6">
                       
                    <?php 
    
                        insert_categories();
    
                     ?>
                       
                       
                       

            <form action="" method="POST">
                    <div class="form-group">
            <label for="cat_title">Add Category</label>
            <input type="text" class="form-control" name="submit">
                     </div> 
            <div class="form-group">
            <input class="btn btn-primary" type="submit" name="">
                    </div>

                        </form>
                        

<!--                    update and include query-->
                    <?php 
                        
                        if(isset($_GET['edit'])){
                            
                            $cat_id = $_GET['edit'];
                            
                            include "admin-includes/update-categories.php";
                            
                        }
                        
                    ?>
                    
                   </div>
                    
                    <div class="col-xs-6">
                      
                       
                       <table class="table table-bordered table-hover">
                           <thread>
                               <tr>
                                   <th>Id</th>
                                   <th>Category Title</th>
                               </tr>
                           </thread>
                           <tbody>
                               
                               <tr>
                               
                    <?php  findAllCategories();   ?>
                           
                     <?php  deleteCategories();  ?>
                               
                               </tr>

                           </tbody>
                       </table>
                       
                       
                       
                       
                       
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
        
        
        <!-- /#page-wrapper -->

<?php include "admin-includes/admin-footer.php" ?>