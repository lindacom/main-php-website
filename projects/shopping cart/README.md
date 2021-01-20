Functionality
-------------
Search for a book:

1. librarysearch.php
2. store.php - shopping cart

Shopping cart
-------------

```
if(isset($_GET['title']) && $_GET['title'] !== ""){ //if there is a book title in the url
   
    // IF THERE IS ALREADY A SESSION
    //check if id in the url is already in the cart
    //if not, count items in cart, add url details to array and add array to cart  
    //if so, send an alert message and redirect to search page
    
      if(isset($_SESSION["cart"]))  // if there is a cart session
      {  
           $item_array_id = array_column($_SESSION["cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  // if the id in the url is not already in the array
           {  
                $count = count($_SESSION["cart"]);  // count number of items in the cart
                $item_array = array(  // get id, title, price and quantity from the url and store in array
                     'item_id'               =>     $_GET["id"],
                   'item_name' =>     $_GET["title"], 
                    'item_price'          =>    $_GET["price"], 
                     'item_quantity'          =>     $_GET["quantity"]
                );  
                $_SESSION["cart"][$count] = $item_array;  // store item array in cart session
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="librarysearch.php"</script>';  
           }  
      }  
```
```
// IF A SESSION DOES NOT ALREADY EXIST
      // add url details to an array, add the array to a new cart session
      else  
      {  
           $item_array = array(  // create an array using id, title, price and quantity from url
                'item_id'               =>     $_GET["id"],
                   'item_name' =>     $_GET["title"], 
                    'item_price'          =>    $_GET["price"], 
                     'item_quantity'          =>     $_GET["quantity"]
           );  
           $_SESSION["cart"][0] = $item_array;  // store item array in cart session
      } 
     
 }
```

```
<!-- unset session when url action is delete -->
<?php   

   if(isset($_GET["action"]))  
 {  
     if($_GET["action"] == "delete")  // if the selected action is delete
      {  
           foreach($_SESSION["cart"] as $keys => $values)  // loop through the cart
           {  
                if($values["item_id"] == $_GET["id"])  // if an id value in the cart equals the id in the url
                {                     
                  unset($_SESSION["cart"][$keys]);  // remove the key from the cart session
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="librarysearch.php"</script>';  
                }  
           }  
      }  
 }
 ?>
```

```

//display number of items in the cart
 <?php 
  if(isset($_SESSION['cart'])) {
echo sizeof($_SESSION['cart']);
  }?>
```

```

                         <!-- if there are items in the cart, display the contents of the cart -->
                          <?php   

                          if(!empty($_SESSION["cart"]))  
                          {  
                           echo '<p style="color:red;text-align:center;" >Free shipping on orders over £30!!</p>';

echo '<div class="clearfix">';
echo '<div class="float-left"><h3>Your order</h3></div>';
echo '<div class="float-right"><a href="http://lindacom.infinityfreeapp.com/books/checkout.php"><button class="success button" type="button">Continue to payment > 
</button></a></div>';
echo '<hr />';
echo '</div>';

   
 echo '<p>Please check the details of your order</p>'; 

                               $total = 0;  
   ?> 
                                  <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="20%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="10%">Quantity</th> 
                               <th width="20%">Price</th>                                 
                               <th width="15%">Total</th>  
                               <th width="20%">VAT</th>
                               <th width="5%">Action</th>  
                          </tr> 
  <?php
  // loop through cart and display key and value
                               foreach($_SESSION["cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                                <!-- ITEM NAME  -->
                               <td><?php echo $values["item_name"]; ?></td>  

                                  <!-- QUANTITY  -->
                               <td><?php echo $values["item_quantity"]; ?></td>  
                         
                         <!-- QUANTITY (test) -->
                              <td> 
                              <div class="input-group input-number-group"> 
                           <input class="input-number" type="number" value="<?php echo $values["item_quantity"]; ?>"  style="width:70px" > 
                              </div>
                            </td> 
 <!-- PRICE -->

                             <td>$ <?php echo $values["item_price"]; ?></td> 

                           
 <!-- TOTAL -->
                            
                                   <?php   $total = $total + ($values["item_quantity"] * $values["item_price"]);?>
                              <td>$ <?php echo $total; ?></td> 

                               <!-- VAT -->
                          <?php 
                               $tax = round( ($total / 100) * 20, 2);?>
                              <td>$ <?php echo $tax; ?> </td>

                               <!-- remove action link -->
                                <td><a href="store.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>   
                         

                            </tr>
                          <?php 
                          } 
                         ?>
                                                
                          <?php  
                          
                          } 
                          ?>  
                     </table> 
                     </div>

<!-- if there are items in the cart display the action buttons -->
           <?php  if(isset($_SESSION["cart"])) {
                   
                   
                   echo ' <div class="btn-group align-center">';
                     echo   '<div> <a href="/books/checkout.php"><button class="success button large" type="button">PAYMENT</button></a></div>';
                                      echo '<div><a href="/books/logout.php"><button class="danger button small" type="button">Cancel order</button></a></div>';
                                        echo '</div>';
                 
        
           ?>

           
            
            <?php
            } else {
               echo 'You have no items in the cart';
           }
           ?>
            
      
      </div> 
   ```
