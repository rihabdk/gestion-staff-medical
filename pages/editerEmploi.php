<?php
     require_once('connexiondb.php');
     require_once('identifier.php');
     
    $ide=isset($_GET['idE'])?$_GET['idE']:0;
    $requete="select * from emploi where idEmploi=$ide";
    $resultat=$pdo->query($requete);
    $emploi=$resultat->fetch();
    $nome=$emploi['nomEmploi'];
    $specialite=strtolower($emploi['specialite']);
?>

<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'une Emploi</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
        
    </head>
    <body>
        <?php include("menu.php"); ?>

        <div class="container">

        <div class="panel panel-danger margetop">
                 <div class="panel-heading">Edition de l'emploi:</div>
                 <div class="panel-body">
                 <form method="post" action="updateEmploi.php" class="form">
                        <div class="form-group">
                             <label for="emploi">id de l'Emploi:</label>
                            <input type="text" name="idE" 
                                   class="form-control" 
                                   value="<?php echo $ide ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="niveau">Nom de l'emploi:</label>
                            <input type="text" name="nomE" 
                                   placeholder="Nom de l'emploi"
                                   class="form-control"
                                   value="<?php echo $nome ?>"/>
                        </div>
                        <label for="emploi">Emploi:</label>
			            <select name="emploi" class="form-control" id="emploi">
                            
                            <option value="i" <?php if($emploi=="i") echo "selected" ?>   >Infirmiere</option>
                            <option value="sec" <?php if($emploi=="sec") echo "selected" ?>>Secretaire </option>
                            <option value="sur" <?php if($emploi=="sur") echo "selected" ?>>Surveillante</option>
                            <option value="re" <?php if($emploi=="re") echo "selected" ?>>Responsable du bloc </option>
                            <option value="d" <?php if($emploi=="d") echo "selected" ?>>Directeur</option> 
                            <option value="m" <?php if($emploi=="m") echo "selected" ?>>M??dicin</option>
			            </select><br>
                        
                        <label for="specialite">Specialit??:</label>
			            <select name="specialite" class="form-control" id="specialite">
                            <option >sans specialit??</option>
                            <option >chirurgie</option>
                            <option>canc??rologie m??dicale</option>
                            <option>g??riatrie</option>
                            <option >anesth??sie</option>
                            <option > gyn??cologie</option>
                            <option >orthop??die</option> 
                            <option>h??matologie</option>
			            </select><br>
			            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                                     
                        
                   </form>
        </div>
        </div>
    </body>
</HTML>