<?php
session_start(); //lglssa
if (isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])) {


  $servername = "localhost";
  $username = "root";
  $password = "";
  $data_base = "gramalens_emails";
  $con = mysqli_connect($servername,$username,$password,$data_base); //sqlconnection
    // Insert image content into database 
  $email= $_SESSION["email"];
  $query = "SELECT image FROM user WHERE email_user='$email'"; 
  if($result = mysqli_query($con,$query)){
    
    $row = $result -> fetch_assoc();
    if($row != null){
      $_SESSION["image"]=$row["image"];

    }
      mysqli_close($con);   
  }


  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GramaLens Emails</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css” />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  </head>

  <body>
    <nav>
      <div id="continuer1">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['image']); ?>" alt="images/profil.png" id="image">
        <form id="profil-form" action="profil_change.php" method="POST" enctype="multipart/form-data">
              <input type="file" id="img-file" name="image" hidden="hidden" />
            </form>
        <p id="p1"><?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"] ?></>
      </div>
      <div id="continuer2">
        <button class="logoutButton logoutButton--dark">
          <svg class="doorway" viewBox="0 0 100 100">
            <path
              d="M93.4 86.3H58.6c-1.9 0-3.4-1.5-3.4-3.4V17.1c0-1.9 1.5-3.4 3.4-3.4h34.8c1.9 0 3.4 1.5 3.4 3.4v65.8c0 1.9-1.5 3.4-3.4 3.4z" />
            <path class="bang" d="M40.5 43.7L26.6 31.4l-2.5 6.7zM41.9 50.4l-19.5-4-1.4 6.3zM40 57.4l-17.7 3.9 3.9 5.7z" />
          </svg>
          <svg class="figure" viewBox="0 0 100 100">
            <circle cx="52.1" cy="32.4" r="6.4" />
            <path
              d="M50.7 62.8c-1.2 2.5-3.6 5-7.2 4-3.2-.9-4.9-3.5-4-7.8.7-3.4 3.1-13.8 4.1-15.8 1.7-3.4 1.6-4.6 7-3.7 4.3.7 4.6 2.5 4.3 5.4-.4 3.7-2.8 15.1-4.2 17.9z" />
            <g class="arm1">
              <path
                d="M55.5 56.5l-6-9.5c-1-1.5-.6-3.5.9-4.4 1.5-1 3.7-1.1 4.6.4l6.1 10c1 1.5.3 3.5-1.1 4.4-1.5.9-3.5.5-4.5-.9z" />
              <path class="wrist1"
                d="M69.4 59.9L58.1 58c-1.7-.3-2.9-1.9-2.6-3.7.3-1.7 1.9-2.9 3.7-2.6l11.4 1.9c1.7.3 2.9 1.9 2.6 3.7-.4 1.7-2 2.9-3.8 2.6z" />
            </g>
            <g class="arm2">
              <path
                d="M34.2 43.6L45 40.3c1.7-.6 3.5.3 4 2 .6 1.7-.3 4-2 4.5l-10.8 2.8c-1.7.6-3.5-.3-4-2-.6-1.6.3-3.4 2-4z" />
              <path class="wrist2"
                d="M27.1 56.2L32 45.7c.7-1.6 2.6-2.3 4.2-1.6 1.6.7 2.3 2.6 1.6 4.2L33 58.8c-.7 1.6-2.6 2.3-4.2 1.6-1.7-.7-2.4-2.6-1.7-4.2z" />
            </g>
            <g class="leg1">
              <path
                d="M52.1 73.2s-7-5.7-7.9-6.5c-.9-.9-1.2-3.5-.1-4.9 1.1-1.4 3.8-1.9 5.2-.9l7.9 7c1.4 1.1 1.7 3.5.7 4.9-1.1 1.4-4.4 1.5-5.8.4z" />
              <path class="calf1"
                d="M52.6 84.4l-1-12.8c-.1-1.9 1.5-3.6 3.5-3.7 2-.1 3.7 1.4 3.8 3.4l1 12.8c.1 1.9-1.5 3.6-3.5 3.7-2 0-3.7-1.5-3.8-3.4z" />
            </g>
            <g class="leg2">
              <path
                d="M37.8 72.7s1.3-10.2 1.6-11.4 2.4-2.8 4.1-2.6c1.7.2 3.6 2.3 3.4 4l-1.8 11.1c-.2 1.7-1.7 3.3-3.4 3.1-1.8-.2-4.1-2.4-3.9-4.2z" />
              <path class="calf2"
                d="M29.5 82.3l9.6-10.9c1.3-1.4 3.6-1.5 5.1-.1 1.5 1.4.4 4.9-.9 6.3l-8.5 9.6c-1.3 1.4-3.6 1.5-5.1.1-1.4-1.3-1.5-3.5-.2-5z" />
            </g>
          </svg>
          <svg class="door" viewBox="0 0 100 100">
            <path
              d="M93.4 86.3H58.6c-1.9 0-3.4-1.5-3.4-3.4V17.1c0-1.9 1.5-3.4 3.4-3.4h34.8c1.9 0 3.4 1.5 3.4 3.4v65.8c0 1.9-1.5 3.4-3.4 3.4z" />
            <circle cx="66" cy="50" r="3.7" />
          </svg>
          <span class="button-text">Log Out</span>
        </button>

      </div>
    </nav>
    <div id="cn">
      <div id="left">
        <h1 class="title">Message viewer:</h1>
        <iframe id="viewr" src="<?php
        if(isset($_SESSION["path"])){
          echo $_SESSION["path"];
        }
        ?>" frameborder="0"></iframe>
        <div class="container1">
                <a class="btn effect01" href="sendEmail.php"><span>Send</span></a> <br>
            </div>
      </div>
      <div id="right">
        <h1 class="title">Receivers:</h1>
        <div id="cn1">
          <div id="card">
            <label id="title-lbl">Recipients</label><br />
            <label id="counter-lbl"><?php echo(isset($_SESSION["emails-count"]))? $_SESSION["emails-count"]: "0"; ?></label>
            <p id="paragraph-lbl">
              This card displays the number of recipients the email in the
              viewer will be sent to.
            </p>
          </div>
          <div id="card1">
            <label id="title-lbl1">Email sent</label><br />
            <label id="counter-lbl1"><?php echo(isset($_SESSION["sent-email"]))? $_SESSION["sent-email"]: "0"; ?></label>
            <p id="paragraph-lbl1">
              This card displays the number of emails that has been sent to the
              recipients.
            </p>
          </div>
        </div>
        <div id="upload-message-section">
          <div id="card2">
            <label id="title-lbl2">Upload message</label><br />
            <?php
              if(!isset($_GET["doneUpload"]) and !isset($_GET["errorUpload"]) ){ ?>
               <svg id="small-message" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
              class="bi bi-chat-right-text" viewBox="0 0 16 16">
              <path
                d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
              <path
                d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
            </svg>
              
              <?php
              }
              ?>
            <div >
              <?php
              if(isset($_GET["doneUpload"])){ ?>
              <svg id="check-logo1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" 
                class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path
                  d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" 
                  stroke="white" stroke-width="0.5"/>
                <path
                  d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"
                  stroke="white" stroke-width="0.5"  />
              </svg>
              
              <?php
              }
              ?>
              <?php
              if(isset($_GET["errorUpload"])){ ?>
              <svg id="error-logo1" xmlns="http://www.w3.org/2000/svg"  width="36" height="36" fill="white" class="bi bi-x-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
</svg>
              
              <?php
              }
              ?>

              
            </div>
            
            <p id="paragraph-lbl2">
              <?php
              if(isset($_GET["errorUpload"])){ 
                echo $_GET["errorUpload"];
              }
              else{?>
            
              You can upload a file that contain a message and it should respect
              html or text format.
              <?php 
              }
              ?>
            </p>
            <form id="uploadMsg-form" action="uploadMsg.php" method="POST" enctype="multipart/form-data">
              <input type="file" id="real-file" name="message" hidden="hidden" />
            </form>
            <div id="cont">
              <div class="button" id="custom-button">
                <a>
                  <span id="btn-up-txt">Upload Message</span>
                  <svg class="load" version="1.1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 40 40"
                    enable-background="new 0 0 40 40">
                    <path opacity="0.3" fill="#fff"
                      d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
            s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
            c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z" />
                    <path fill="#fff" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
            C22.32,8.481,24.301,9.057,26.013,10.047z">
                      <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20"
                        to="360 20 20" dur="0.5s" repeatCount="indefinite" />
                    </path>
                  </svg>
                  <svg class="check" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                  </svg>
                </a>

                <div>
                  <span></span>
                </div>
              </div>
              <span id="custom-text">No file chosen, yet.</span>
            </div>
          </div>
        </div>
        <div id="card3">
            <label id="title-lbl2">Upload Emails</label><br />
            <?php
              if(!isset($_GET["doneUploadEmail"]) and !isset($_GET["errorUploadEmail"]) ){ ?>
               <svg id="small-message" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
              class="bi bi-chat-right-text" viewBox="0 0 16 16">
              <path
                d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
              <path
                d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
            </svg>
              
              <?php
              }
              ?>
            <div >
              <?php
              if(isset($_GET["doneUploadEmail"])){ ?>
              <svg id="check-logo1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" 
                class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path
                  d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" 
                  stroke="white" stroke-width="0.5"/>
                <path
                  d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"
                  stroke="white" stroke-width="0.5"  />
              </svg>
              
              <?php
              }
              ?>
              <?php
              if(isset($_GET["errorUploadEmail"])){ ?>
              <svg id="error-logo1" xmlns="http://www.w3.org/2000/svg"  width="36" height="36" fill="white" class="bi bi-x-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
</svg>
              
              <?php
              }
              ?>

              
            </div>
            
            <p id="paragraph-lbl2">
              <?php
              if(isset($_GET["errorUploadEmail"])){ 
                echo $_GET["errorUploadEmail"];
              }
              else{?>
            
              You can upload a file that contain a Emails to send message to and it should respect
              text format.
              <?php 
              }
              ?>
            </p>
            <form id="uploadMsg-form" action="uploadMsg.php" method="POST" enctype="multipart/form-data">
              <input type="file" id="real-file" name="message" hidden="hidden" />
            </form>
            <div id="cont">
              <div class="button1" id="custom-button1">
              <form id="uploadEmail-form" action="uploadEmail.php" method="POST" enctype="multipart/form-data">
              <input type="file" id="real-file1" name="email" hidden="hidden" />
            </form>
                <a>
                  <span id="btn-up-txt">Upload Emails</span>
                  <svg class="load" version="1.1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 40 40"
                    enable-background="new 0 0 40 40">
                    <path opacity="0.3" fill="#fff"
                      d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
            s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
            c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z" />
                    <path fill="#fff" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
            C22.32,8.481,24.301,9.057,26.013,10.047z">
                      <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20"
                        to="360 20 20" dur="0.5s" repeatCount="indefinite" />
                    </path>
                  </svg>
                  <svg class="check" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                  </svg>
                </a>

                <div>
                  <span></span>
                </div>
              </div>
              <span id="custom-text1" style="display: none;">No file chosen, yet.</span>
            </div>
          </div>
        </div>
      </div>
      
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="scripts/main.js"></script>
  </body>

  </html>



  <?php
} else {
  header("Location: index.php");
  exit();
}

?>