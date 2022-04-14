<?php
include("inc/functions.php");

//Database connection
$con = dbconnect();

//Project Query
$getProjectSQL = "SELECT * FROM project";
//Result
$projectResult = mysqli_query($con, $getProjectSQL) or die(mysqli_error($con));

$project = array();
while($row = mysqli_fetch_assoc($projectResult)){
    $project[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Welkomstbord</title>
</head>
<body>
    <header class="d-flex justify-content-between">
        <img class="logo" src="img/logo-rmi-welkombij.svg" style="max-width:260px"/>
        <div class="slogan d-flex align-items-center">
             <p><span>Creatief</span> én <strong>effectief</strong><br>
             <span class="smalltxt">met een eigenwijs tintje!</span></p>
        </div>
    </header>
    
    <?php
        //Loop trough saved data
        foreach($project as $projectDetails){
            ?>
            <!-- Fill saved background image -->
            <main id="main" style="background-image:url('<?php echo $_GET["image"];?>')">
            <div class="text-container">
                <!-- Fill saved salutation -->
                <h1 class="namen" id="aanhef"><?php echo $_GET["aanhef"];?></h1>
                <img src="img/line.png">
                <!-- Fill saved welcome text -->
                <h6 id="welkom-tekst"><?php echo $_GET["tekst"];?></h6>
            </div>
            <!-- Fill saved background color -->
            <div class="gradient" style="background: <?php $_GET['kleur']; ?>; opacity: 0.75;"></div>
            <?php
        }
    ?>
    </main>

    <footer>
        <div class="arrow_text_container d-flex justify-content-end">
            <div class="arrow_text">
                <img src="img/Arrow.png">
                <span class="team-tekst">Wij staan voor je klaar!</span>
            </div>
        </div>
        <img class="peoplepicture" src="img/PeoplePicture.png"/>
        <div class="slopingbar"></div>
        <!-- Counter to refresh data every 30 seconds -->
        <h3>Counter</h3>
    </footer>

    <!-- JS Files -->
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>