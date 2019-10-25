<!--        header file link-->
<?php include "admin-includes/admin-header.php";?>
<?php 


if (isset($_SESSION['name'])){

            
} else {
    
    
    header("Location: ../login");
    
}



?>
   
   
    <div id="wrapper">
    
<!--        navigation file link-->
<?php include "admin-includes/admin-navigation.php";?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to your Admin Page:
                            <small>
                            <?php 
//                           show the logged in username
                              echo $_SESSION['name'];
                            ?>
                            </small>
                        </h1>
                        
                    </div>
                </div>
                
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                <?php 
                                    
//                                 query to count amount of posts and display on dashboard   
                                    
                                $query = "SELECT * FROM posts";
                                $result = $connection->prepare($query);
                                $result->execute();

                                $post_counts = $result->rowCount();
                                 
                                 echo "<div class='huge'>{$post_counts}</div>";
                                    
                                ?>
                                
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                   <?php 
                                    
//                query to count amount of categories and display on dashboard 
                                    
                                $query = "SELECT * FROM categories";
                                $result = $connection->prepare($query);
                                $result->execute();
                                    
                                $counts_categories = $result->rowCount();
                                 
                                 echo "<div class='huge'>{$counts_categories}</div>";
                                    
                                ?>
                                
                                     <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
               
        <?php 
                
                

                
//      query to count amount of published posts and display on chart   
    $query = "SELECT * FROM posts ";
    $result = $connection->prepare($query);
    $result->execute();
                
    $post_published_count = $result->rowCount();
                
        ?>
<!--        all code for grabbing dynamic data from the database and putting into a google chart-->
        <div class="row">

            <script type="text/javascript">
                
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],
                
            <?php 
                
        $chart_text = ['All Posts', 'Users', 'Categories']; 
        $chart_count = [$post_counts, $number_of_users, $counts_categories]; 
                    
//                runs the loop to output the two above varibales 8 times into the chart
                for($i = 0; $i < 8; $i++) {
                    
                    echo "['{$chart_text[$i]}'" . "," . "{$chart_count[$i]}],";
                    
                }     
                
                
            ?>   

                
                
            ]);

            var options = {
            chart: {
            title: '',
            subtitle: '',
            }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
            }
            </script>
            
<!--        styling for the chart-->
        <div id="columnchart_material" style="width: auto; height: 500px;"></div>



        </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "admin-includes/admin-footer.php";?>