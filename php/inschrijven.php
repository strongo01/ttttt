<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stijl.css">
    <title>Formulier controle</title>
</head>
<body>
    <div class="container">
        <?php
        // Controle of een formulier gepost is
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Arrays declareren voor opslag van fouten en data
            $aErrors = array();
            $aData = array();
            
            // Velden die in het formulier aanwezig moeten zijn
            $aFormulierVelden = array('naam', 'email', 'telefoon', 'geboortedatum', 'handicap', 'ervaring');
            
            // Alle formuliervelden doorlopen
            foreach($aFormulierVelden as $sVeld)
            {
                // Controleren of er een waarde voor het formulierveld bestaat
                if(isset($_POST[$sVeld]))
                {    
                    // Spaties aan begin en eind weghalen
                    $sValue = trim($_POST[$sVeld]);
                    
                    // Controle of variabele gevuld is
                    if(empty($sValue))
                    {
                        // Foutmelding toevoegen
                        $aErrors[] = 'Je bent vergeten om '.$sVeld.' in te vullen';
                    }
                    
                    // Ingevulde waarden aan data array toevoegen
                    $aData[$sVeld] = $sValue;
                }
                else
                {
                    $aErrors[] = 'Het veld '.$sVeld.' is niet gepost!';
                }
            }
            
            // Controleren of er geen fouten opgetreden zijn
            if(empty($aErrors))
            {
                // Formulier succes!
                header('Refresh: 5; url=../index.html');
                echo '<p>Je hebt het formulier succesvol ingevuld! De volgende gegevens zijn bekend:</p>';
                echo '<p><b>Naam: </b>'.$aData['naam'].'<br />';
                echo '<b>Email: </b>'.$aData['email'].'<br />';
                echo '<b>Telefoon: </b>'.$aData['telefoon'].'<br />';
                echo '<b>Geboortedatum: </b>'.$aData['geboortedatum'].'<br />';
                echo '<b>Handicap: </b>'.$aData['handicap'].'<br />';
                echo '<b>Ervaring: </b>'.$aData['ervaring'].'</p>';
                echo '<div style="text-align: center;"><b>Binnen 5 seconde wordt u terugverwezen naar de hoofdsite</b></div>';
            }
            else
            {
                // Fouten opgetreden: weergeven en terug naar formulier
                header('Refresh: 5; url=../inschrijfpagina.html');
                foreach($aErrors as $sError)
                {
                    echo '<p style="color:red">'.$sError.'</p>';
                }
            }
        }
        else
        {
            // Verwerk.php mag nog niet bezocht worden, terug naar het formulier
            header('Location: formulier.php');
        }
        ?>
    </container>
</body>