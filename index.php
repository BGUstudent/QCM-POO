<!DOCTYPE html>

<?php include 'Ask.php'; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
<div class="global">
    <h1>Programmation Orientée Objet</h1>

    <div id="score">
            <?php 
                if (isset($_POST['submit'])){
                    $_SESSION['score'] = 0;
                    $score = $_SESSION['score'];
                    $_SESSION['wrong'] = array();
                    $wrong = $_SESSION['wrong'];
                    for ($i = 0; $i < 22; $i++){
                        if (isset($_POST['answer'.$i])){
                            if ($_POST['answer'.$i]==1){
                                $score++;
                            }
                            else{
                            array_push($wrong, $i);
                            }
                        }
                        else {
                            $x = $i+1;
                            echo "<script>alert('réponds à la question $x, canard')</script>";
                            return; //pour arreter la fonction en cas d'erreur
                        }
                    }
                    echo "<div id='result'>Vous avez $score bonnes réponses sur 22</div><b><br>Correction :</b><br><br>
                    ";
                    foreach ($wrong as $item){
                        $correction = new Ask($item);
                        $question = $correction->GetQuestions();
                        $réponse = $correction->GetAnswers(); 
                        echo "$question<br>$réponse <br><br>";
                    }
                };
            ?>
        </div>

    <div class="center">
        <form method='POST'>
            <?php
                for ($i = 0; $i < 22; $i++){
                    $first = new Ask($i);
                    $first-> createQuestion();
                } 
            ?>
            <br><button type='submit' name='submit' id='button'>Valider</button>
        </form>

    </div>
</div>
</body>
</html>