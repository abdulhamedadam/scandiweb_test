<?php

include ('process-delete.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product List</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  
</head>
<body class="">
<div class="min-h-screen flex flex-col justify-between"> 
  <div class="container mx-auto py-6 px-24 overflow-y-auto "> 
  
    <div id="app">
      <form  id="deleteForm" action="process-delete.php" method="post">
        <div class="flex justify-between mb-8">

            <div><h1 class="text-4xl font-semibold">Product List</h1></div>
            <div class="">  
             <button id='add' class="add rounded-lg bg-blue-500 p-2 text-white mx-2"><a href="productaddVueJs.php">ADD</a></button>

             <button type="submit" name="deleteAll" id="massdelete"
                 class="massdelete rounded-lg p-2 text-white"
                :class="{
                   'bg-red-700': isAnyCheckboxChecked,
                   'bg-gray-500 cursor-not-allowed': !isAnyCheckboxChecked
                }"
                :disabled="!isAnyCheckboxChecked">MASS DELETE</button>

            </div>  

        </div>
    
   
        <hr>
        <p class="font-bold text-red-500">Products selected for deletion: <span class=" text-black"> {{ checkedIds }} </span></p>
        <div class="checkbox-group grid grid-cols-4 gap-x-10 gap-y-10 mt-6 ">
   
   <?php
 
  
        foreach($users as $user)
        {

          ?>
           
            <card value="<?php echo $user['sku']??''?>"  class="hover:bg-gray-100 border-2 cursor-pointer border-gray-600 px-2 pt-2 pb-10">
            <input  type="checkbox" name="checkedIds[]" class="delete-checkbox"  value="<?php echo $user['sku']??''?>"   v-model="checkedIds">
            <div class="text-center">
            <a href="show-product.php?showid=<?php echo $user['id']; ?>" class="card">
              <div><p><?php echo $user['sku']??''; ?></p></div>
              <div><p><?php echo $user['name']??''; ?></p></div>
              <div><p><?php echo $user['price']."$"??''; ?></p></div>             
              <div><p><?php echo $user['attribute']??''; ?></p></div>  
            </a>           
                        
            </div>
     


        </card> 
            
       <?php } ?>  



      </form>
    </div>

  </div>

   
</div>
    
    
       <div class=" px-24 py-10">
        
        <footer> 
            <hr>
            <p class="text-center mt-8">Scandiweb Test assignment</p>
        </footer>    
      </div>

    
       <script src="JS/add-vue.js"></script>
</body>
</html>