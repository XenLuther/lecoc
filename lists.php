<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <title>Lists</title>
</head>
<style>
     a{
            text-decoration: none;
            color: blueviolet;
            background-color: white;
            border-radius: 25px;
            border: solid pink;
        }
</style>
<body>

    <a href="index.php">Main page</a>
    <a href="select.php">Select page</a>
    <a href="insert.php">Insert page</a><br><br>

    <form>
    <input type="text" placeholder="New List Name" id="listName" required>
    <input type="submit" value="Submit">
    </form> <br>

    <select  id='lists'>
    <option value="">Select List</option>
    <?php
    $showTables = "SHOW TABLES 
    WHERE tables_in_db_lecoc NOT LIKE '%companies%' AND tables_in_db_lecoc NOT LIKE '%products%'
    AND tables_in_db_lecoc NOT LIKE '%images%' ";
    $res2 = mysqli_query($conn,$showTables);
    while($row2 = mysqli_fetch_array($res2)){

    echo "<option value='$row2[0]'> $row2[0]</option>"; }?>
    </select>
    
    <div id="listProducts"></div> 
</body>
<script>
   
    $('form').submit(function(){
		
            let listName = $('#listName').val();
			
            
            $.post('validate.php',{listName},function(){
            alert('Created list: ' +' '+ (listName)+'!');
      
             });
		});


        $('#lists').on('change',function(){
            let ln = $('#lists').val();

           $.post('validate.php',{ln},function(data){
            
            $('#listProducts').html(data);
           });
           
        });
       
	

</script>
</html>