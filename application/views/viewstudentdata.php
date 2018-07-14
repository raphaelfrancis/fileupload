<html>
<head>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link href='custom.css' rel='stylesheet' type='text/css'>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


</head>
<body>
<center><h1>VIEW MORE  STUDENT DATA</h1></center>


 <div class="container">
 
      <div class="table-responsive">    
<table border=1 class="table">
<tr style="background-color: #b8daff;"><td style="padding: .75rem;">ID</td><td style="padding: .75rem;">NAME</td><td style="padding: .75rem;">AGE</td><td style="padding:.75rem;">GENDER</td><td style="padding: .75rem;">ADDRESS</td><td style="padding:.75rem;">ROLLNO</td><td style="padding:.75rem;">IMAGE</td><td style="padding:.75rem;">ACTION</td><td style="padding:.75rem;">EDIT ACTION</td></tr>

<?php 
 foreach($studentdata as $studdata){
  if($studdata["image"] != "")
  {
?>
<tr><td><?=$studdata["id"];?></td><td style="padding: .75rem; vertical-align: top; border-top: 1px solid #e9ecef;"><?=$studdata["name"];?></td><td style="padding:.75rem; vertical-align: top; border-top: 1px solid #e9ecef;"><?=$studdata["age"];?></td style="padding: .75rem; vertical-align: top; border-top: 1px solid #e9ecef;"><td><?=$studdata["gender"];?></td><td style="padding: .75rem; vertical-align: top; border-top: 1px solid #e9ecef;"><?=$studdata["address"];?></td><td style="padding: .75rem; vertical-align: top; border-top: 1px solid #e9ecef;"><?=$studdata["rollno"];?></td><td style="padding: .75rem; vertical-align: top; border-top: 1px solid #e9ecef;"><img src = "<?php echo base_url();?>/images/<?php echo $studdata["image"];?>" width = "100" height= "100"/></td><td><a href="deletestudentdata?id=<?php echo $studdata["id"];?>">DELETE</a></td><td><a href="Studentimage/editstudentdata?id=<?php echo $studdata["id"];?>">EDIT STUDENT DATA</a></td></tr>     
   <?php 
 }  
}
?>  
</table>
<ul class="pagination"><?php echo $links;?></ul>
</div>
</div>
</body>
</html>