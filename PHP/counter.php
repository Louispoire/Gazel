<?php



//THIS CODE IS USED BY THE SYSTEM TO SETUP THE BASIC STORE PHP COMPONENT

//IT IS ALSO USED TO COUNT THE NUMBER OF ITEM IN THE WHOLE STORE OR IN EACH CATEGORY


include "connectDB.php";


session_start();


//number of item is used to count the number of items in the store/category
$numberItems = 0;


//is the category input is set while loading a page
if (isset($_GET["category"]))
{

    //Used in the breadcrumbs system
    $cat_name = "";
    
    //GET the category from the page
    $category = (int)$_GET["category"];
    $_SESSION["cat"] = $category;
    $secured_category = mysqli_real_escape_string($conn, $category);


    //Check if a category has been choosen
    if ($category != "all")
    {


        $sql_getCat = "SELECT * FROM categories WHERE id = ?";


        //Executing the prepared statement
        $stmt = $conn->prepare($sql_getCat);
        $stmt->bind_param('i', $secured_category);
        $stmt->execute();
        $result = $stmt->get_result();

        if(mysqli_num_rows($result) < 1) {

        }
        else
        {
            while ($cat = mysqli_fetch_assoc($result)) 
            {
                $cat_name = $cat["title"];
            }
        }


        $sql_getAllItem = "SELECT * FROM items WHERE cat_id =?";

         //Executing the other prepared statement
        $stmt = $conn->prepare($sql_getAllItem);
        $stmt->bind_param('i', $secured_category);
        $stmt->execute();
        $result = $stmt->get_result();

        if(mysqli_num_rows($result) < 1) {

        }
        else
        {
            while ($item = mysqli_fetch_assoc($result)) 
            {
                $numberItems ++;
            }
        }

    }
    else
    {
        $sql_getAllItem = "SELECT * FROM items ORDER BY id";
        $sql_getAllItem_res = mysqli_query($conn, $sql_getAllItem);                                                                                                    

        if(mysqli_num_rows($sql_getAllItem_res) < 1) {

        }
        else
        {
            while ($item = mysqli_fetch_assoc($sql_getAllItem_res)) 
            {
                $numberItems ++;
            }
        }

    }
    
    if (isset($_GET["sorting"]))
    {
        $sorting_type = $_GET["sorting"];
    }
}
else
{
    if (isset($_GET["search"]))
    {
            $query = $_GET["search"];
            
            $query = htmlspecialchars($query); 
            // changes characters used in html to their equivalents, for example: < to &gt;


                
            $sql_getQuery = "SELECT * FROM items WHERE item_name LIKE '%$query%'";
            $sql_getQuery_res = mysqli_query($conn, $sql_getQuery); 

            while ($item = mysqli_fetch_assoc($sql_getQuery_res)) 
            {
                     $numberItems ++;

            }

    }
}
?>