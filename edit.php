<?php
include("inc/functions.php");

//Database connection
$con = dbconnect();

//Define projectId
$projectId = 1;

if(isset($_POST['updateProject'])){
    //Put value $post -> $data
    $data = getPost();

    //Returns a string with backslashes of predefined characters
    $welkomstekst = addslashes($data[4]);

    //Query to update data to database
    $updateSQL = "UPDATE `project` SET
    `projectKleur` = '$data[1]',
    `projectImage` = '$data[2]',
    `projectAanhef` = '$data[3]',
    `projectTekst` = '$welkomstekst'
    WHERE `projectId` = $projectId";

    $update_result = mysqli_query($con, $updateSQL) or die($updateSQL);
}

if(isset($_POST['check'])){
    $insertQuery = "INSERT INTO welkomst (welkomstTekst) VALUES ('$welkomstekst')";
    $query_run = mysqli_query($con, $insertQuery);

    if($query_run){
        $_SESSION['status'] = "Inserted Successfully";
    }
    else{
        $_SESSION['status'] = "Not inserted";
    }
}

// Project Query
$getProjectSQL = "SELECT * FROM project";
$projectResult = mysqli_query($con, $getProjectSQL) or die(mysqli_error($con));

$project = array();
while($row = mysqli_fetch_assoc($projectResult)){
    $project[] = $row;
}

// Welkomsttekst Query
$getTekstSQL = "SELECT * from welkomst";
$tekstResult = mysqli_query($con, $getTekstSQL) or die(mysqli_error($con));

$tekst = array();
while($row = mysqli_fetch_assoc($tekstResult)){
    $tekst[] = $row;
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
<body style="background-color:#ecf1f5;">
    <div class="divje"></div>
    <form id="form" action="edit.php" method="post">
        <div class="container">
            <div class="row">
                <?php
                //Loop through Project Query
                foreach($project as $projectDetails){
                    ?>
                    <div class="col-lg-5 col-12">
                        <div class="welkomstHeader">
                            <h1>Welkomstbord</h1>
                            <p>Pas het welkomstbord aan naar je eigen wens.</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12 mt-5 mb-2">
                        <div class="welkomstContent">
                            <h4>Overlay kleur</h4>
                            <p>Welke kleurcode wil je over de achtergrond hebben?</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 my-auto">
                        <div class="kleurContainer">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Kleur:</span>
                                <input type="color" 
                                    id="colorPalette"
                                    value="<?php echo $projectDetails["projectKleur"]; ?>" 
                                    name="projectKleur" 
                                    class="form-control" 
                                    aria-label="Username" 
                                    aria-describedby="addon-wrapping">
                            </div>
                        </div>
                    </div>
                    <div class="hline"></div>
                    <div class="col-lg-6 col-12 mt-4 mb-2">
                        <div class="welkomstContent">
                            <h4>Afbeelding link</h4>
                            <p>Vul hier een URL link naar een afbeelding in.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 m-auto">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">URL:</span>
                            <input type="text" 
                                id="projectImage"
                                value="<?php echo $projectDetails["projectImage"]; ?>" 
                                name="projectImage" 
                                class="form-control" 
                                aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="hline"></div>
                    <div class="col-lg-7 col-12 mt-4">
                        <div class="welkomstContent">
                            <h4>Aanhef tekst</h4>
                            <p>Bijvoorbeeld: "Heey John!"</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 m-auto">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Aanhef:</span>
                            <input type="text" 
                                id="projectAanhef"
                                value="<?php echo $projectDetails["projectAanhef"]; ?>" 
                                name="projectAanhef" 
                                class="form-control" 
                                aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="hline"></div>
                    <div class="col-lg-5 col-12 mt-4 mb-4">
                        <div class="welkomstContent">
                            <h4>Welkomsttekst</h4>
                            <p>Vul hier een welkomsttekst in.</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 m-auto">
                        <div class="input-group">
                            <span class="input-group-text">Welkomsttekst:</span>
                            <textarea
                                id="inputGroup"
                                class="form-control"
                                name="projectTekst"
                                value="<?php echo $projectDetails["projectTekst"]; ?>"
                                aria-label="With textarea"
                                maxlength="150"><?php echo $projectDetails["projectTekst"]; ?></textarea>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                foreach($tekst as $welkomst){
                    $welkomstTekst = $welkomst['welkomstTekst'];
                    ?> 
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="tekstContainer d-flex">
                            <div class="col-lg-11 col-md-11 col-11">
                                <!-- htmlentities -> fully html code -->
                                <div class="welkomstTekst" data-welkomstTekst="<?php echo htmlentities($welkomstTekst); ?>"><?php echo $welkomstTekst; ?></div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-1 ms-auto my-auto">
                                <!-- button onclick-> get function: CopyToClipboard -->
                                <input href="#" type="button" value=">" onclick="editWelkomstTekst(event)">
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row mb-3">
                <div class="col-sm-10">
                    <div class="form-check">
                        <input type="checkbox" name="check" class="form-check-input" id="gridCheck1" value="Welkomsttekst opslaan">
                        <label class="form-check-label" for="gridCheck1">Welkomsttekst opslaan</label>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex pb-2">
                <!-- Button link to Homepage -->
                <div class="col-lg-3 col-4">
                    <input type="button" class="btn btn-dark" onclick="examplePage();" value="Voorbeeld">
                </div>
                <!-- Button save data -->
                <div class="col-lg-3 col-4 ms-auto">
                    <button type="submit" name="updateProject" class="btn btn-primary">Opslaan</button>
                </div>
            </div>
            <div class="hline"></div>
        </div>
    </form>

    <!-- JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>