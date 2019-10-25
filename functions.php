<?php 

class func {
    
    
public static function checkLoginState($dbh) {
    
    
    if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID'])){
        
        session_start();
    }
    
    if(isset($_COOKIE['id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])){
        
        $query = "SELECT * FROM sessions WHERE sessions_userid = :userid AND sessions_token = :token AND sessions_serial = :serial";
        
        $userid = $_COOKIE['userid'];
        $token = $_COOKIE['token'];
        $serial = $_COOKIE['serial'];
        
        $stmt = $dbh->prepare(query);
        $stmt->execute(array(':userid' => $userid, ':token' => $token, ':serial' => $serial));
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row['sessions_userid'] > 0 ) {
            
            if (
                $row['sessions_userid'] == $_COOKIE['userid'] &&
                $row['sessions_token'] == $_COOKIE['token'] &&
                $row['sessions_serial'] == $_COOKIE['serial']
            ) {
                
                if(
                $row['sessions_userid'] == $_SESSION['userid'] &&
                $row['sessions_token'] == $_SESSION['token'] &&
                $row['sessions_serial'] == $_SESSION['serial']
                    ){
                    
                    return true;
                }
            }
        }
        
        
    }
}

    public static function createString($len) {
        
        $string = "1yhgsdyfdbvggfik45hbgtjk675476fh45274hbf8734g3474gb4732632hg3";
        $s = '';
        $r_new = '';
        $r_old = '';
        
        for ($i = 1; $i < $len; $i++) {
            
            while ($r_old == $r_new){
                
                $r_new = rand(0, 60);
            }
            
            $r_old = $r_new;
            
            $s = $s.$string[$r_new];

        }
        
        return $s;
        
        
    }

}






function confirmQuery($result) {
    
    global $connection;
    
          if(!$result){
          
          die("QUERY FAILED ". mysqli_error($connection));
      }
    
    
    
}
function insert_categories(){
    
    
    
        global $connection;
    
    
        if(isset($_POST['submit'])){
            
        $new_cat = $_POST['submit'];
            
            
        $stmt = $connection->prepare("SELECT * FROM categories");
        $stmt->execute(); 
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                    
        foreach($rows as $row){
            
        $cat_title = $row['category_title'];
            
        }
            
        if($cat_title == "" || empty($cat_title)){

            echo "This field should not be empty";

        } else {
            
            
            $query = $connection->prepare('INSERT INTO categories(category_title) VALUES (:new_cat)');
            $query->execute(['new_cat' => $new_cat]);


            if(!$query){

                die('QUERY FAILED' . mysqli_error($connection));
            }

        }

    }
                       

    
}


function findAllCategories(){
    
    global $connection;
    
    // find all categories query
                                   
    
                    $stmt = $connection->prepare("SELECT * FROM categories");
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
                    foreach($rows as $row){
                        

                    $cat_id = $row['category_id'];
                    $cat_title = $row['category_title'];
                        
                    echo "<tr>";  
                    echo "<td>{$cat_id}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                    echo "</tr>";    

                    }

                    
    
    
    
}

function deleteCategories(){
    
     global $connection;
    //delete cat query      
                    
                    if(isset($_GET['delete'])){
                        
                        $the_cat_id = $_GET['delete'];
                        
                        $stmt = $connection->prepare("DELETE FROM categories WHERE category_id = {$the_cat_id} ");
                        $stmt->execute();
                        
                        header("location: categories.php"); // refresh the page
                        
                    }
                                   
    
}


function is_admin($username = ''){
    
    global $connection;
    
    $query = "SELECT db_user_role FROM users WHERE db_username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    
    $row = mysqli_fetch_array($result);
    
    if($row['user_role'] == 'Admin'){
        
        return true;
        
    }else {
        
        return false;
    }
}


?>