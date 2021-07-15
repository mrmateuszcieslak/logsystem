<?php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Login</title> 
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Login System</h3>  
                <br />  
                <?php  
                echo '<h1>Witaj na stronie '.$_SESSION["username"].'!!</h1>';  
                echo '<label><a href="logout.php">Logout</a></label>';  
                ?>  
           </div> 
           <head>
     <script src ="https://unpkg.com/read-excel-file@4.x/bundle/read-excel-file.min.js"></script>
</head>
<body> 
           <input type="file" id="input">
           <table id="tbl-data"></table>
           <script>
     var input=document.getElementById('input');
     input.addEventListener('change',function(){
          readXlsxFile(input.files[0]).then(function(data){
               var i = 0;
               data.map((row,index)=>{
               if(i==0){
                     let table=document.getElementById('tbl-data');
                     generateTableHead(table,row);
               }
               if(i>0){
                    let table=document.getElementById('tbl-data');
                    generateTableRows(table,row);
               }
               i++;
               });
          });
     });
     function generateTableHead(table,data){
          let thead=table.createTHead();
          let row=thead.insertRow();
          for(let key of data){
               let th=document.createElement('th');
               let text=document.createTextNode(key);
               th.appendChild(text);
               row.appendChild(th);
          }
     }
     function generateTableRows(table,data){
          let newRow=table.insertRow(-1);
          data.map((row,index)=>{
               let newCell=newRow.insertCell();
               let newText=document.createTextNode(row);
               newCell.appendChild(newText);
           });
          }
</script>
      </body>  