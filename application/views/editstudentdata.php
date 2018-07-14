<?php

if(isset($studenteditdata))
{
    
    
    $updateid = $studenteditdata[0]["id"];
    $name = $studenteditdata[0]["name"];
    $age = $studenteditdata[0]["age"];
    $gender = $studenteditdata[0]["gender"];
    $address = $studenteditdata[0]["address"];
    $rollno = $studenteditdata[0]["rollno"];
	$image = $studenteditdata[0]["image"];
    
}
?>


<html>
  <head><h1><center>EDIT STUDENT DATA</center></h1></head>
  <body>
  
  
  <?php echo form_open('Studentcontroller/updatestudentdata');?>
  
  <div><label>NAME:<span style="padding-right:42px;"></span></label><input type = "text" name = "studentname" value = "<?php if(isset($name))echo $name;?>" ></div><br>
  <div><label>AGE:<span style="padding-right:55px;"></span></label><input type = "text" name = "studentage" value = "<?php if(isset($age))echo $age;?>" ></div>
  
  <div>GENDER:
           <?php
           if(isset($gender))
           {
            ?>
            <input type="radio" name="studentgender" value="<?php if($gender=="m")?>" checked>male
            <input type="radio" name="studentgender" value="<?php if($gender=="f")?>" checked">female
            <?php
           }
           ?>
        </div>
  <div><label>ADDRESS<span style="padding-right:20px;"></span></label><textarea rows = "4" cols = "15" name = "studentaddress" value = ""><?php if(isset($address))echo $address;?></textarea></div>
  <div><label>ROLLNO<span style="padding-right:28px;"></span></label><input type = "text" name = "studentrollno" value = "<?php if(isset($rollno))echo $rollno;?>"></div>
  <div><label>IMAGE:</label><img src = "<?php echo base_url();?>/images/<?php echo $image;?>" width ="100" height = "100">
  <?php
  if(isset($updateid))
  {
  ?>
  <div><input type = "hidden" name = "updateid" value = "<?php echo $updateid;?>">
  <?php
  }
  ?>
  <div><input type = "submit" name = "submit" value =  "update"></div>
  <?php echo form_close();?>
  
  </body>
  <?php
  if(isset($updateerror))
  {
   foreach($updateerror as $key =>$value)
   {
    echo $key . "-" . $value . "<br>";
   }               
  }
  ?>
  </html>