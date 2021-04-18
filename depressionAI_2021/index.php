<!DOCTYPE html>
<html lang="en">

<head>
 <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="landing page, website design" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>



<style>


.section_padding {
padding: 60px 40px;
}

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color:#800000;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}



.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.navgate101:hover{
background:#800000;
color:black;

}







.category_post{
background-color: #800000;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	

.access2{
border-style: dashed; border-width:4px; border-color:orange;color:white;font-size:14px;
}

.access{
border-style: solid; border-width:4px; border-color:white;color:white;font-size:14px;
}

.access:hover{
color:black;

}


</style>



 
</head>
<body>


<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">

      <ul class="nav navbar-nav navbar-right">




      </ul>

    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->




<div class="right-column-all_no">


<!-- about Section start-->
<div  class="about section_padding aboutus_bgcolor" style=''>

<br>


<center><p class="" style='font-size:26px;color:#800000;font-family:comic sans ms;'><b>Depression AI</b><br> powered by <br>
<b>Azure Facial Recognition AI and Azure Text-Analytics AI</b><br></p>

<span style="font-size:20px;">An interactive application that leverages Patients Textural Data and Facial Recognitions
 to analyze emotions of Patients/Students to make Medical Predications <b>Powered by Azure Cognitive Services</b></span></center>


<h3>Inspiration</h3>

The Covid19 global threats has showed us the growing medical issues and the need of people/students
 suffering from <b>Depression,
Anxiety, Stress</b> and other mental health Conditions.<br><br>

Some people/Students who are mentally unbalanced always try to hide their medical problems so that Society or other students
 will not label them as insane people or people with mental inequalities.<br><br>

To help those suffering from Mental Illness, our application <b>Depression AI</b> was born.<br>

Our application integrates Students <b>Textural Inputs data and Facial Recognition</b> to detect and analyze Students/people's
emotions.

<h3>What the Applications Does</h3>
First, the applications just ask the Students to state or inputs how He/She is feeling Medically on daily basis in the form Inputs. This Students
Textural inputted Data is being analyzed leveraging <b>Azure Sentimental Analysis(Azure Text-Analytics AI)</b>
 to detect some certain keywords sentiments
from the Students inputed data. These keywords can be further analyzed sentimental by Azure AI as <b>postive, negative or 
Neutral</b><br><br>


The <b>Azure Facial Recognition AI</b> leverages convolutional neural networks to analyze features of students faces or facial images to identify emotions. 
Some of the <b>Emotions Parameters/Variables</b> predicted by the <b>Azure Facial Recognition AI</b> includes<br>
<b>Anger<br> Contempt <br>Disgust<br> Fear <br>Happiness<br> Neutral <br>Sadness<br></b>. All this Emotion parameters are used by Medical team
to make Medical prediction and Predications.<br><br>

Finally, all these Emotional Parameters will help to monitor Well-being of the Student in a more realistic natural manner. 
In other words, this will provide more medical insights, best and accurate informations on the well-being of the students
as opposed to Students Medical Self-Reports where alots of students might lie about their mental health Conditions due to
fear and stigma.<br><br> This Medical insights and evaluations in turn will promotes and enhance productivity, Academic Excellence 
and mental well-being of the students in Schools and in world at large.




<br><br>

<div class='col-sm-12'>
<center>




<!-- start pForm  -->


<div style='background:#f1f1f1; padding:16px; color:black'>


<center><h4>Analyze Students Mental Health Conditions via Azure AI.</h4></center>

<!--start form1-->

<script>

$(document).ready(function(){
$('#post_btn').click(function(){
		
var image_url = $("#image_url").val();
var feeling = $("#feeling").val();



if(image_url==""){
alert('image_url cannot be Empty');
//return false;
}


else if(feeling==""){
alert('How are You Feelings Today cannot be Empty');
//return false;
}


else{

$('#loader_l2').fadeIn(400).html('<br><div style="color:white;background:navy;padding:10px;"><img src="ajax-loader.gif">&nbsp;Please Wait, Mental Health Conditions is being Analyzed...</div>');
var datasend = { image_url:image_url, feeling:feeling};	
		$.ajax({
			
			type:'POST',
			url:'depression.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){			
$('#loader_l2').hide();
$('#result_l2').html(msg);
//setTimeout(function(){ $('#result_l2').html(''); }, 5000);				
				
			}
			
		});
		
		}
		
	})
					
});




</script>


<br><br>
 <div class="form-group">
              <label style="" for="">
<span class="fa fa-photo"> Image URL For Azure Facial Recognition<br><br>

<b>

Image Samples<br>
https://cdn.pixabay.com/photo/2014/02/25/10/59/angry-man-274175__340.jpg<br>
https://cdn.pixabay.com/photo/2014/07/31/15/46/oliver-kahn-406393__340.jpg<br>
https://cdn.pixabay.com/photo/2018/02/02/21/41/crazy-3126441__340.jpg<br>
https://csdx.blob.core.windows.net/resources/Face/Images/Family3-Lady1.jpg<br>


</b>

</span>
</label>
              <input type="text" class="col-sm-12 form-control" id="image_url" name="image_url" placeholder="Enter Image URL Eg: ">
            </div><br>


<div class="col-sm-12 form-group">
<label>How are You Feeling Today</label>
<textarea  class="form-control contact_input_color" rows="10" id="feeling"  name="feeling" placeholder="How are You Feeling Today"  required></textarea>
</div>




<br>





<div class="col-sm-12 form-group">
                        <div id="loader_l2"></div>
                        <div id="result_l2"></div>
</div>


<button type="button" id="post_btn" class="post_btn category_post"  />Analyze Mental Conditions</button>
</div>







<!--end form1-->


<br><br>
</div>




</div>



<!--   end pForm  -->



</center>
</div>

</div>





</div>











<div>
  <!--end right column all-->    

   
</body>
</html>

























