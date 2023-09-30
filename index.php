
<?php include 'components/header.php' ?>

<?php 
$todos=[];
if(file_exists('todo.json')){
      $json = file_get_contents('todo.json');
      $todos= json_decode($json, true);
  }

?>
 <body class="box-border bg-black font-Caveat text-white ">

<main class=" w-10/12 md:w-1/2 bg-black box p-4 mx-auto mt-24 ">
<h1 class="font-bold text-3xl text-white mb-11 w-full text-center">
  Add Todos
</h1>
<div>
  <form action="todoLogic.php" method="POST" class="text-center flex w-full gap-2 items-center justify-center">
<input class="box p-2 bg-black w-10/12 text-xl" type="text" name="todo_name" placeholder="Enter your todos">
  <button class="box p-2 text-white bg-black rounded cursor-pointer"><i class="fa-solid fa-plus"></i></button>
</form>
</div>

<?php foreach($todos as $todoName => $todo): ?>
  
  <div class="mt-8 flex gap-10 items-center justify-evenly  p-3 w-full box rounded">
    <div class="w-3/4 p-2">
    <h3 class="text-xl break-words"><?= $todoName ?></h3>
    </div>

     
     
    <div class="flex gap-2 items-center justify-center w-1/5 ">
 <form action="change_status.php" method="POST" class="text-center">
  
   <input type="hidden" name="todo_name" value="<?= $todoName ?>"> 
 <input  type="checkbox" class="cursor-pointer" <?=$todo["completed"] ? 'checked' : ''?>>
 </form>

    
    <form action="delete.php" method="POST">
 <input type="hidden" name="todo_name" value="<?= $todoName ?>">
 <button class="text-red cursor-pointer text-xl ml-1"><i class="fa-solid fa-trash"></i></button>
    </form>
</div>
    </div>
    
  <?php endforeach ?>


<div class="font-semi text-xl mt-11 text-white mb-11 w-full text-center ">
  <?php 
  if($todos === []){
    echo('No todo list');
  }
  ?>
</div>
</main>
<script src="js/script.js"></script>
</body>
</html>