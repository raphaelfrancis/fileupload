<!DOCTYPE html>
<html>
<head>
	<title>Php Ajax Form Validation Example</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
<?php echo form_open_multipart('Studentimage/addstudentimage');?>

  <div class="container">

    <h1><center>ADD STUDENT DATA</center></h1>
   

    <div class="alert alert-danger display-error" style="display: none">
    </div>
    <div class="form-group">
    <div class="controls">
    <div class="col-5">
      <input type="text" id="studentname" name ="studentname" class="form-control" placeholder="Name"><div id = "nameerror"></div>
    </div>
    </div>
    </div>

    <div class="form-group">
    <div class="controls">
    <div class="col-5">
      <input type="text" id="studentage" name ="studentage" class="form-control" placeholder="Age"><div id = "ageerror"></div>
    </div>
    </div>
    </div>

    
    <div class="form-group">
    <div class="col-5">
    <label>GENDER:</label>
    <input type="radio" id="studentgender" name="studentgender" value="m" /> <label for="genderm">Male</label>
    <input type="radio" id="studentgender" name="studentgender" value="f" /> <label for="genderf">Female</label>
    </div>
    </div>
    
    
    <div id= "errorgenderMsg"></div>
  
   
    
    <div class="form-group">
    <div class="controls">
    <div class="col-5">
    <textarea rows = "4" cols = "15" name = "studentaddress" class="form-control" id = "studentaddress" placeholder = "address"></textarea><div id = "addresserror"></div><br>
    </div>
    </div>
    </div>
    <div class="form-group">
    <div class="controls">
    <div class="col-5">
    <input type = "text" placeholder ="Rollno" name ="studentrollno" id = "studentrollno" class="form-control"><div id = "rollnoerror"></div>
    </div>
    </div>  
    </div>

    <div id="hide" class="col-lg-8 col-xs-8">
    <label class="btn btn-primary" for="my-file-selector">
    <input id="my-file-selector" type="file" name ="userfile" style="display:none;">
    Upload your file
   </label>
    </div>
    <br>
    <div class="col-5">
    <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-check"></i> Send Message</button><span style = "padding-right:100px;"></span> <a href = "index.php/Studentimage/viewstudentdata" class="btn btn-primary">VIEWSTUDENT DATA</a>
    <div>
    </form>
    
</div><!-- container class ends -->
    </body>

<script type="text/javascript">
  /*$(document).ready(function() {


      $('#contactForm').submit(function(e){
        e.preventDefault();
        var studentname = $("#studentname").val();
        var studentage = $("#studentage").val();
        var studentgender = $('input[name=studentgender]:checked').val()
        var studentaddress = $("#studentaddress").val();
        var studentrollno = $("#studentrollno").val();
        if(studentname == ''||studentage == ""||studentgender == ""||studentaddress == ""||studentrollno== '')
        {
            $('#error').html("please enter some fields");
        }
        if((studentname == '')||(!isNaN(studentname)))
        {
        $('#nameerror').css('color','red');
        $('#nameerror').html('Please add Studentname');
        return false;
        }
	   
       if((studentage == '')||(isNaN(studentage)))
       {
        $('#ageerror').css('color','red');
        $('#ageerror').html('Please add Studentage');
        return false;
       }
       if (!$('input[id = studentgender]:checked').val() )
       {
        $('#errorgenderMsg').css('color','red');
        $('#errorgenderMsg').html('Please add Studentgender');
        return false;
       }
       if(studentaddress == '') 
       {
        $('#addresserror').css('color','red');
        $('#addresserror').html('Please add Studentaddress');
        return false;
       }
       if((studentrollno == '')||(isNaN(studentrollno)))
       {
        $('#rollnoerror').css('color','red');
        $('#rollnoerror').html('Please add Studentrollno');
        return false;
       }
        $.ajax({
            type: "POST",
            data: {studentname:studentname, studentage:studentage, studentgender:studentgender,studentaddress:studentaddress, studentrollno:studentrollno},
            url: 'index.php/Studentcontroller/addstudentdata',
            dataType: "json",
            success : function(data){
                if (data){
                  alert(data);
                  $('#success').css('color','green');
                  $('#success').html('Studentdata added successfully');
                } else {
                    alert("error");
                }
            },
            error: function (jqXHR, exception) {
          var msg = '';
          if (jqXHR.status === 0) {
              msg = 'Not connect.\n Verify Network.';
          } else if (jqXHR.status == 404) {
              msg = 'Requested page not found. [404]';
          } else if (jqXHR.status == 500) {
              msg = 'Internal Server Error [500].';
          } else {
              msg = 'Uncaught Error.\n' + jqXHR.responseText;
          }
          $('#post').css('color','red');
          $('#post').html(msg);
          return false;
      }

        });


      });
  });*/
</script>
</html>
