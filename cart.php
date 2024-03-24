<?php
    $page="cart";
session_start();

if(isset($_SESSION['email'])){

}
else{
    header('location:login.php');
}

$email = $_SESSION['email'];

require "conn.php";

$sql1 = "SELECT sum(qty) as nop, sum(total) as total FROM cart WHERE useremail='$email'";
$result1 = $conn->query($sql1); 
$row1 = $result1->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body{
            padding:-5px;
        }
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



    <?php
    require "link.php";
    ?>
</head>
<body>

<?php
    require "components/header.php";

    ?>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-16 my-12">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
                <th scope="col" class="px-6 py-3">
                    Product Image
                </th>
                <th scope="col" class="px-6 py-3">
                Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Qty
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>
            </tr>
            </thead>
        <tbody>
        <?php
$email = $_SESSION['email'];
// $sql = "SELECT cart.id,cart.qty,cart.proid, cart.price, cart.total, products.proname,products.price,products.img
// FROM cart
// INNER JOIN products ON cart.proid=products.id";

$sql = "SELECT * FROM cart WHERE useremail='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo '
    
   <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700" id="deleteid'.$row['id'].'">
   <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
   <a href="product.php?id='.$row['proid'].'">
       <img src="'.$row['img'].'" style="width:100px;border-radius:10px;">
    </a>
   </th>
   <td class="px-6 py-4">
       '.$row['proname'].'
   </td>
   <td class="px-6 py-4">
       <input class="qty" style="border:2px solid gray;width:100px;border-radius:10px;" min="1" type="number" value="'.$row['qty'].'" onchange="fun(this.value,'.$row['id'].','.$row['price'].')">
   </td>
   <td class="px-6 py-4 price">
       '.$row['price'].'
   </td>
   <td class="px-6 py-4 sub">
       '.$row['total'].'
   </td>
   <td class="px-6 py-4">
       <button onclick="ddelete('.$row['id'].')" class="font-medium text-blue-600 dark:text-blue-500 hover:text-blue-800"><i class="bi bi-trash"></i></button>
   </td>
</tr>
   
   
   ';
  }
} 

           
            ?>



        </tbody>
    </table>
</div>



<div class="relative overflow-x-auto mx-16 my-12 shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tbody>
            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Cart Total
                </th>
                <td class="px-6 py-4 subtotal border ">
                <?php echo $row1['total'] ?>
                    
                </td>
               
            </tr>
            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Shipping
                </th>
                <td class="px-6 py-4border ">
                    Free
                </td>
                
            </tr>
            <tr class="bg-white border dark:bg-gray-800">
                <th scope="row" class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Total
                </th>
                <td class="px-6 py-4 subtotal border ">
                    <?php echo $row1['total'] ?>
                </td>
              
            </tr>
            <tr class="bg-white border dark:bg-gray-800">
                <td colspan="2" scope="row" class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <button class="bg-blue-500 hover-bg-blue-800 text-white p-3">Proceed To checkout</button>
                </td>
              
            </tr>
        </tbody>
    </table>
</div>


<script>

// for qty and subtotal
function fun(x, y, z) {
  $.ajax({
    type: "POST",
    url: "qty.php",
    data: {
      pro: y,
      qty: x,
      price:z
    },
    dataType:"JSON",

    success: function(data) {
          $("#cart").html(data.nop);
          $(".subtotal").html(data.total);
    }
  });




  let price = document.getElementsByClassName("price");
  let qy = document.getElementsByClassName("qty");
  let subtotal = document.getElementsByClassName("sub");

  for(let i=0;i<price.length;i++){

    subtotal[i].textContent=(price[i].textContent*qy[i].value);
  }

}




// delete item from cart
function ddelete(x){

  if(confirm('Are you sure?')){

    $.ajax({
      type: "POST",
      url: "delete.php",
      data: {
        id:x
      },
      dataType:"JSON",
      success: function (data) {
          $("#deleteid"+x).hide('slow');
          $("#cart").html(data.nop);
          $(".subtotal").html(data.total);
        }
    });
}
}


<!-- </script> -->


<?php
   
    require "components/footer.php";
?>
    
</body>
</html>