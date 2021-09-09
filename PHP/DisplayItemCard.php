<?php

//THIS CODE IS USED TO DISPLAY EACH ITEM FROM THE DATABASE IN THE STORE BASED OF THEIR CATEGORIES



/* ========================= IF CATEGORY IS SET ========================= */
    if (isset($_GET["category"]))
    {
       
        
        //YOU CAN REMOVE THIS PART IF YOU WANT TO REMOVE THE SORTING SYSTEM
        
        
        /* ========================= IF CATEGORY & SORTING TYPE IS SET ========================= */
        if (isset($sorting_type))
        {
            /* ========================= IF SORTING TYPE IS SORT BY NEW ========================= */
            if ($sorting_type == "sort_by_new")
            {
                if ($category == "all" || $category == "0")
                {
                    $sql_getAllItem = "SELECT * FROM items ORDER BY date_added";
                    $sql_getAllItem_res = mysqli_query($conn, $sql_getAllItem);                                                                                                    

                    if(mysqli_num_rows($sql_getAllItem_res) < 1) {
                        echo "<h1 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found!<h1>";
                    }
                    else
                    {
                        while ($item = mysqli_fetch_assoc($sql_getAllItem_res)) 
                        {
                                $item_id = $item["id"];
                                $item_name = $item["item_name"];
                                $item_price = $item["item_price"];
                                $item_image = $item["main_image"];

                                echo"
                                   <div class='col-md-4'>
                                      <figure class='card card-product-grid'>
                                         <div class='img-wrap'> 


                                            <!--<span class='badge badge-danger'> NEW </span>-->
                                            <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                            <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                         </div> 
                                         <figcaption class='info-wrap'>
                                            <div class='fix-height'>
                                               <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                               <div class='price-wrap mt-2'>
                                                  <span class='price'>$$item_price</span>
                                               </div>
                                            </div>
                                            <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                        </figcaption>
                                    </figure>
                                 </div>";
                                $numberItems ++;
                        }
                    }
                }
                else
                {
                    //PREPARED STATEMENT STEP BY STEP

                    //SQL Script
                    $sql_getAllItem = "SELECT * FROM items WHERE cat_id = ?";


                    //Executing the prepared statement
                    $stmt = $conn->prepare($sql_getAllItem);
                    $stmt->bind_param('i', $secured_category);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    //If error
                    if(mysqli_num_rows($result) < 1) {
                       echo "<h1 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found!<h1>";
                    }
                    else
                    {
                        //looking through all objects in table
                        while ($item = mysqli_fetch_assoc($result)) 
                        {
                                $item_id = $item["id"];
                                $item_name = $item["item_name"];
                                $item_price = $item["item_price"];
                                $item_image = $item["main_image"];

                                echo"
                                   <div class='col-md-4'>
                                      <figure class='card card-product-grid'>
                                         <div class='img-wrap'> 
                                            <!--<span class='badge badge-danger'> NEW </span>-->
                                            <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                            <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                         </div> 
                                         <figcaption class='info-wrap'>
                                            <div class='fix-height'>
                                               <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                               <div class='price-wrap mt-2'>
                                                  <span class='price'>$$item_price</span>
                                               </div>
                                            </div>
                                            <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                        </figcaption>
                                    </figure>
                                 </div>";
                        }
                    }
                }
            }
            
            /* ========================= IF SORTING TYPE IS SORT BY LOW TO HIGH ========================= */
            if ($sorting_type == "sort_by_low_high")
            {
                if ($category == "all")
                {
                    $sql_getAllItem = "SELECT * FROM items ORDER BY item_price ASC";
                    $sql_getAllItem_res = mysqli_query($conn, $sql_getAllItem);                                                                                                    

                    if(mysqli_num_rows($sql_getAllItem_res) < 1) {
                        echo "<h1 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found!<h1>";
                    }
                    else
                    {
                        while ($item = mysqli_fetch_assoc($sql_getAllItem_res)) 
                        {
                                $item_id = $item["id"];
                                $item_name = $item["item_name"];
                                $item_price = $item["item_price"];
                                $item_image = $item["main_image"];

                                echo"
                                   <div class='col-md-4'>
                                      <figure class='card card-product-grid'>
                                         <div class='img-wrap'> 


                                            <!--<span class='badge badge-danger'> NEW </span>-->
                                            <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                            <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                         </div> 
                                         <figcaption class='info-wrap'>
                                            <div class='fix-height'>
                                               <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                               <div class='price-wrap mt-2'>
                                                  <span class='price'>$$item_price</span>
                                               </div>
                                            </div>
                                            <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                        </figcaption>
                                    </figure>
                                 </div>";
                               
                        }
                    }
                }
                else
                {
                    //PREPARED STATEMENT STEP BY STEP

                    //SQL Script
                    $sql_getAllItem = "SELECT * FROM items WHERE cat_id = ?";


                    //Executing the prepared statement
                    $stmt = $conn->prepare($sql_getAllItem);
                    $stmt->bind_param('i', $secured_category);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    //If error
                    if(mysqli_num_rows($result) < 1) {
                       echo "<h1 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found!<h1>";
                    }
                    else
                    {
                        //looking through all objects in table
                        while ($item = mysqli_fetch_assoc($result)) 
                        {
                                $item_id = $item["id"];
                                $item_name = $item["item_name"];
                                $item_price = $item["item_price"];
                                $item_image = $item["main_image"];

                                echo"
                                   <div class='col-md-4'>
                                      <figure class='card card-product-grid'>
                                         <div class='img-wrap'> 
                                            <!--<span class='badge badge-danger'> NEW </span>-->
                                            <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                            <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                         </div> 
                                         <figcaption class='info-wrap'>
                                            <div class='fix-height'>
                                               <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                               <div class='price-wrap mt-2'>
                                                  <span class='price'>$$item_price</span>
                                               </div>
                                            </div>
                                            <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                        </figcaption>
                                    </figure>
                                 </div>";
                        }
                    }
                }
            }
            
            
            /* ========================= IF SORTING TYPE IS SORT BY HIGH TO LOW ========================= */
            else if ($sorting_type == "sort_by_high_low")
            {
                if ($category == "all")
                {
                    $sql_getAllItem = "SELECT * FROM items ORDER BY item_price DESC";
                    $sql_getAllItem_res = mysqli_query($conn, $sql_getAllItem);                                                                                                    

                    if(mysqli_num_rows($sql_getAllItem_res) < 1) {
                        echo "<h1 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found!<h1>";
                    }
                    else
                    {
                        while ($item = mysqli_fetch_assoc($sql_getAllItem_res)) 
                        {
                                $item_id = $item["id"];
                                $item_name = $item["item_name"];
                                $item_price = $item["item_price"];
                                $item_image = $item["main_image"];

                                echo"
                                   <div class='col-md-4'>
                                      <figure class='card card-product-grid'>
                                         <div class='img-wrap'> 


                                            <!--<span class='badge badge-danger'> NEW </span>-->
                                            <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                            <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                         </div> 
                                         <figcaption class='info-wrap'>
                                            <div class='fix-height'>
                                               <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                               <div class='price-wrap mt-2'>
                                                  <span class='price'>$$item_price</span>
                                               </div>
                                            </div>
                                            <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                        </figcaption>
                                    </figure>
                                 </div>";
                        }
                    }
                }
                else
                {
                    //PREPARED STATEMENT STEP BY STEP

                    //SQL Script
                    $sql_getAllItem = "SELECT * FROM items WHERE cat_id = ?";


                    //Executing the prepared statement
                    $stmt = $conn->prepare($sql_getAllItem);
                    $stmt->bind_param('i', $secured_category);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    //If error
                    if(mysqli_num_rows($result) < 1) {
                       echo "<h1 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found!<h1>";
                    }
                    else
                    {
                        //looking through all objects in table
                        while ($item = mysqli_fetch_assoc($result)) 
                        {
                                $item_id = $item["id"];
                                $item_name = $item["item_name"];
                                $item_price = $item["item_price"];
                                $item_image = $item["main_image"];

                                echo"
                                   <div class='col-md-4'>
                                      <figure class='card card-product-grid'>
                                         <div class='img-wrap'> 
                                            <!--<span class='badge badge-danger'> NEW </span>-->
                                            <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                            <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                         </div> 
                                         <figcaption class='info-wrap'>
                                            <div class='fix-height'>
                                               <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                               <div class='price-wrap mt-2'>
                                                  <span class='price'>$$item_price</span>
                                               </div>
                                            </div>
                                            <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                        </figcaption>
                                    </figure>
                                 </div>";
                                 $numberItems ++;
                        }
                    }
                }
            }
        }
        //END OF THE SORTING SYSTEM
        
        
        
        else
        {
            if ($category == "all")
                    {
                        $sql_getAllItem = "SELECT * FROM items ORDER BY id";
                        $sql_getAllItem_res = mysqli_query($conn, $sql_getAllItem);                                                                                                    

                        if(mysqli_num_rows($sql_getAllItem_res) < 1) {
                            echo "<h1 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found!<h1>";
                        }
                        else
                        {
                            while ($item = mysqli_fetch_assoc($sql_getAllItem_res)) 
                            {
                                    $item_id = $item["id"];
                                    $item_name = $item["item_name"];
                                    $item_price = $item["item_price"];
                                    $item_image = $item["main_image"];

                                    echo"
                                       <div class='col-md-4'>
                                          <figure class='card card-product-grid'>
                                             <div class='img-wrap'> 


                                                <!--<span class='badge badge-danger'> NEW </span>-->
                                                <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                                <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                             </div> 
                                             <figcaption class='info-wrap'>
                                                <div class='fix-height'>
                                                   <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                                   <div class='price-wrap mt-2'>
                                                      <span class='price'>$$item_price</span>
                                                   </div>
                                                </div>
                                                <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                            </figcaption>
                                        </figure>
                                     </div>";
                            }
                        }
                    }
                    else
                    {
                        //PREPARED STATEMENT STEP BY STEP

                        //SQL Script
                        $sql_getAllItem = "SELECT * FROM items WHERE cat_id = ?";


                        //Executing the prepared statement
                        $stmt = $conn->prepare($sql_getAllItem);
                        $stmt->bind_param('i', $secured_category);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        //If error
                        if(mysqli_num_rows($result) < 1) {
                           echo "<h1 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found!<h1>";
                        }
                        else
                        {
                            //looking through all objects in table
                            while ($item = mysqli_fetch_assoc($result)) 
                            {
                                    $item_id = $item["id"];
                                    $item_name = $item["item_name"];
                                    $item_price = $item["item_price"];
                                    $item_image = $item["main_image"];

                                    echo"
                                       <div class='col-md-4'>
                                          <figure class='card card-product-grid'>
                                             <div class='img-wrap'> 
                                                <!--<span class='badge badge-danger'> NEW </span>-->
                                                <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                                <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                             </div> 
                                             <figcaption class='info-wrap'>
                                                <div class='fix-height'>
                                                   <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                                   <div class='price-wrap mt-2'>
                                                      <span class='price'>$$item_price</span>
                                                   </div>
                                                </div>
                                                <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                            </figcaption>
                                        </figure>
                                     </div>";
                            }
                        }
                    }
        }
    }


    //THIS CODE HERE IS USED BY THE SYSTEM IF THE SEARCH FUNCTION HAS BEEN USED
    else
    {
        if (isset($_GET["search"]))
        {
                $query = $_GET["search"];
                $min_length = 3;


                if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

                $query = htmlspecialchars($query); 
                // changes characters used in html to their equivalents, for example: < to &gt;



                $sql_getQuery = "SELECT * FROM items WHERE item_name LIKE '%$query%'";
                $sql_getQuery_res = mysqli_query($conn, $sql_getQuery); 


                if(mysqli_num_rows($sql_getQuery_res) < 1)
                { 
                     echo "<h4 style='text-align:center; margin-top: 10%; margin-left: 40%;'>No item found with keyword: $query</h4>";
                }
                else
                {
                    while ($item = mysqli_fetch_assoc($sql_getQuery_res)) 
                    {
                        $item_id = $item["id"];
                        $item_name = $item["item_name"];
                        $item_price = $item["item_price"];
                        $item_image = $item["main_image"];

                        echo"
                           <div class='col-md-4'>
                              <figure class='card card-product-grid'>
                                 <div class='img-wrap'> 
                                    <!--<span class='badge badge-danger'> NEW </span>-->
                                    <a href='product-detail.php?itemID=$item_id'><img src='Images/$item_image'></a>
                                    <a class='btn-overlay' href='#'><i class='fa fa-search-plus'></i> Quick view</a>
                                 </div> 
                                 <figcaption class='info-wrap'>
                                    <div class='fix-height'>
                                       <a href='product-detail.php?itemID=$item_id'>$item_name</a>
                                       <div class='price-wrap mt-2'>
                                          <span class='price'>$$item_price</span>
                                       </div>
                                    </div>
                                    <a href='#' class='btn btn-block btn-primary'>Add to cart </a>
                                </figcaption>
                            </figure>
                         </div>";

                    }

                }
            }
            else{ // if query length is less than minimum
                echo "<h4 style='text-align:center; margin-top: 10%; margin-left: 40%;'>Minimum length is 3</h4>";
            }
        }
    }
?>