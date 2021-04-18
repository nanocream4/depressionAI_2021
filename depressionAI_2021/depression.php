<?php



ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);

error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$image_url = strip_tags($_POST['image_url']);
 $feeling = strip_tags($_POST['feeling']);



$data_param = "{\"url\":\"$image_url\"}";

//update Azure Url end point

//$url ='https://example.cognitiveservices.azure.com/face/v1.0/detect?detectionModel=detection_01&returnFaceId=true&returnFaceLandmarks=false&returnFaceAttributes=age,gender,headPose,smile,facialHair,glasses,emotion,hair,makeup,occlusion,accessories,blur,exposure,noise';

$url ='your-azure-facila-recognition-url-endpoint/face/v1.0/detect?detectionModel=detection_01&returnFaceId=true&returnFaceLandmarks=false&returnFaceAttributes=age,gender,headPose,smile,facialHair,glasses,emotion,hair,makeup,occlusion,accessories,blur,exposure,noise';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Ocp-Apim-Subscription-Key: Your-API-KEY-FOR-FACIAL-Recognition"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 

$json = json_decode($output, true);
$gender = $json[0]['faceAttributes']['gender'];
$age = $json[0]['faceAttributes']['age'];

$anger = $json[0]['faceAttributes']['emotion']['anger'];
$contempt = $json[0]['faceAttributes']['emotion']['contempt'];
$disgust = $json[0]['faceAttributes']['emotion']['disgust'];
$fear = $json[0]['faceAttributes']['emotion']['fear'];
$happiness = $json[0]['faceAttributes']['emotion']['happiness'];
$neutral = $json[0]['faceAttributes']['emotion']['neutral'];
$sadness = $json[0]['faceAttributes']['emotion']['sadness'];



echo 
  "<br><br><div style='background:#c1c1c1;color:black;'><b style='color:white;background:green;padding:10px;font-size:20px'>
Mental Health Conditions Analyzed Successfully</b><br><br><br>

<img src='$image_url' width='200px' height='200px'><br><br>
 <div><b>Anger: </b> $anger</div>
 <div><b>Contempt: </b> $contempt</div>
 <div><b>Disgust: </b> $disgust </div>
 <div><b>Fear: </b> $fear </div>
<div><b>Happiness: </b> $happiness </div>
<div><b>Neutral: </b> $neutral </div>
<div><b>Sadness: </b> $sadness </div>
</div>";

}




// Make API Call to AzureAI Sentimental API

$data_param ='{ documents: [{ id: "1", text: "'.$feeling.'"}]}';

//$url ='https://example.cognitiveservices.azure.com/text/analytics/v3.1-preview.3/sentiment?opinionMining=true';

$url ='Your-azure-text-analytics-url-enpoint/text/analytics/v3.1-preview.3/sentiment?opinionMining=true';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Ocp-Apim-Subscription-Key: your-API-Key-for-text-Analytics"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 

//echo $output;


$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// catch error message before closing
if (curl_errno($ch)) {
    //echo $error_msg = curl_error($ch);
}

curl_close($ch); 

if($http_status==200){

echo "<div style='color:white;background:green;padding:10px;'>Medical Textural Data Successfully Analyzed Sentimentally</div>";

}
else {
echo "<div style='color:white;background:red;padding:10px;'>There is an Issue Making Sentimentals API Call. Please Check Internet Connections</div>";
exit();

}   



$json = json_decode($output, true);
$sentiment = $json["documents"][0]["sentiment"];
$positivity = $json["documents"][0]["confidenceScores"]["positive"];
$negativity = $json["documents"][0]["confidenceScores"]["negative"];
$neutrality = $json["documents"][0]["confidenceScores"]["neutral"];

$text = $json["documents"][0]["sentences"][0]["text"];

echo "<div class='title_css1'><b>Medical Text Analyzed: </b> $text </div><br>
 <div class=''><b>Sentiments: </b> $sentiment</div>
 <div class=''><b>Positive: </b> $positivity</div>
 <div class=''><b>Negative: </b> $negativity </div>
 <div class=''><b>Neutral: </b> $neutrality </div>";
?>


<h3 style='width:100%;min-width:100%;'>Medical Statistical Text-Analytics</h3>

<marquee><b>Medical Text Analyzed: </b><?php echo $feeling; ?> </marquee>

<style type="text/css">

/*
BODY {
    width: 550PX;
}
*/

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


    
<div id="loadera" class='res_center_css'></div>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {


$('#loadera').fadeIn(400).html('<br><div style="color:black;background:#c1c1c1;padding:10px;"><img src="ajax-loader.gif">  &nbsp;Please Wait,  Chart Statistics is being Loaded...</div>');
  
var negativity = '<?php echo $negativity ?>';
var positivity = '<?php echo $positivity ?>';
var neutrality = '<?php echo $neutrality ?>';

                $.post('statictics.php?negativity='+negativity + "&positivity=" + positivity + "&neutrality=" + neutrality,
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].sentiments);
                        marks.push(data[i].scores);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Medical Text-Analytics (Textural Data Sentimental Analysis)',
                                backgroundColor: '#800000',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: 'orange',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]

                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
$('#loadera').hide();
            }
        }
        </script>


