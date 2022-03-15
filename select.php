<?php include 'conn.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <title>Select</title>
    <style>
        a{
            text-decoration: none;
            color: blueviolet;
            background-color: white;
            border-radius: 25px;
            border: solid pink;
        }
        table, th, td {
        border:1px solid black;
        padding: none;
        border-collapse: collapse;
        text-align: center;

         border-style: inset;
        }
     
        tr:nth-child(even) {
            color: white;
            background-color:rgb(30, 71, 56);
            border-color: #96D4D4;
        }
        img{
            display:block;
            width: 50px;
            height: 50px;
            align: center;
            transition: 700ms ease-in-out;
		
        }
        img:hover{
			width:100px;
			height:100px;
						
		}
        /* div{
        border: 5px solid red;
        } */
    </style>


  
</head>
<body>


    <a href="index.php">Main page</a>
    <a href="lists.php">Lists page</a>
    <a href="insert.php">Insert page</a><br><br>
    <div id="list"></div>
  
    <form>
    <input type="text"  placeholder = "Search" name="searchField" id="searchField"> 
    <input type="submit" value="Filter" id="searchButton"><br><br>
    <select  id='lists' required>
    <option value="">Select List</option>
    <?php
    $showTables = "SHOW TABLES 
    WHERE tables_in_db_lecoc NOT LIKE '%companies%' AND tables_in_db_lecoc NOT LIKE '%products%'
    AND tables_in_db_lecoc NOT LIKE '%images%' ";
    $res2 = mysqli_query($conn,$showTables);
    while($row2 = mysqli_fetch_array($res2)){

    echo "<option value='$row2[0]'> $row2[0]</option>"; }?>
    </select>
    </form> 
    
        
    <div id="filter"></div>
  <br><br>
</body>
<script>
       $(document).ready(function(){
     
        $('form').submit(function(e){
			e.preventDefault();
           let searchButton = $('#searchButton').val();
           let searchField = $('#searchField').val();

            $.post('PI.php',{searchButton,searchField},function(data){
                $('#filter').html(data);
             
            });
        });
      
        });

    
       

    </script>
</html>