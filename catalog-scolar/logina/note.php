<?php
session_start();
if($_SESSION['username']==''){
      header("location:login.php");
   }

//    ini_set("display_errors",1);
//    ini_set("display_startup_errros",1);
//    error_reporting(E_ALL);

include_once 'db/crud.php';
$conn = new Crud();

//id ul elevului la care se insereaza o nota, venind la pagina "update.php"
$idElev = $_SESSION['idElev'];
// echo $idElev;

// //numele materiei
$numeMaterie = $conn->escape_string($_POST['numeMaterie']);
// echo $numeMaterie;

// //nota
$nota = $_POST['nota'];
// echo $nota;

// //data
$data = $_POST['data'];
// echo $data;

// //daca e teza sau nu
$este_teza = $_POST['este_teza'];
// echo $este_teza;

//verificam daca s a bifat teza
if($este_teza == "nu") {  //daca nu e teza
        $sql  ="INSERT INTO `note`(`disciplina`,`nota`,`datant`,`elev`) VALUES('$numeMaterie','$nota','$data','$idElev')";
        }
        else {
            $exista_teza = 1;
            $sql ="INSERT INTO `note`(`disciplina`,`nota`,`datant`,`elev`,`teza`) VALUES('$numeMaterie','$nota','$data','$idElev',1);";
        }
// echo $sql;

$result =$conn->execute($sql);
if($result) $ok=1;
else $ok=0; 


//INSERAREA IN NEWS FEED SI TRIMITEREA DE EMAIL
    


    //daca s a inserat nota, afisam si in news feed
if($ok==1) {
    $sqlElev = "SELECT nume,prenume,clasa,email FROM elevi WHERE id=$idElev";
    $result1 = $conn->getData($sqlElev);
    
    $nume = $result1[0]['nume']; //numele elevului  
    $prenume = $result1[0]['prenume']; //prenumele elevului
    $email = $result1[0]['email']; //email ul parintelui elevului
    // echo $email;
    
    //clasa poate fie 9,10,11,12..
    $clasaTemp = $result1[0]['clasa']; 
    if($clasaTemp[2]) { 
         $nrClasei = $clasaTemp[0].$clasaTemp[1];
         $literaClasei = $clasaTemp[2];
    }else {
        $nrClasei = $clasaTemp[0];
        $literaClasei = $clasaTemp[1];    
    }

    //subiectul email ului
    $subject = "O noua nota pentru elevul ".$nume." ".$prenume."!";



    //pt cand se vor putea insera mai multe materii deodata ------ IDEE DE VIITOR
    // if(count($materii)>1) {
    //     $doi =''; for($j=0;$j<count($materii); $j++) {
    //         if($informatiiTeza[$j] == "da") continue;
    //         else if($j==count($materii)-1) $doi .= $materii[$j]. " "; //sa nu se mai puna virgula dupa ultima nota
    //       else  $doi .= $materii[$j]. ', ';
    //     }
    //     if($exista_teza == 1){
    //     $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-au inserat notele $doi si teza $nota_teza elevului  $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie');";
    //     //pt email 
    //     // $body = "Elevul".$inf[0]['nume']." ".$inf[0]['prenume']." a primit nota ..";      
    // }
    // else $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-au inserat notele $doi elevului  $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie');";
    // }
     

        $data = date("F jS, Y",strtotime($data));
        if($exista_teza == 1){ //daca s a inserat teza 
        $sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-a inserat nota din teza , $nota , elevului $nume $prenume, clasa a $nrClasei-a $literaClasei, la disciplina $numeMaterie.');";
        //pt email
        $body = "Elevul ".$nume." ".$prenume." a primit nota din teza ".$nota." la disciplina ".$numeMaterie.", in data de ".$data.".";  
        }
        else  {$sql1 = "INSERT INTO myNews (`informatie`) VALUES ('S-a inserat nota $nota elevului $nume $prenume, clasa a $nrClasei-a $literaClasei, ela disciplina $numeMaterie.');";
        $body = "Elevul ".$nume." ".$prenume." a primit nota ".$nota." la disciplina ".$numeMaterie.", in data de ".$data.".";     
        }
        
        //inseram in news feed

    $conn->execute($sql1);


    //trimitem si mail parintelui

       
    //includem clasa de email
    include('mail/phpmailer/mail.php'); //la randul lui, fisierul  mail.php va include fisierul "phpmailer.php" 
  
    
    //creeam o noua instanta
    @$mail =  new Mail();
    $mail->setFrom('learn1@linndows.com'); //de la cine
    $mail->addAddress($email); //catre cine
    $mail->subject($subject); //subiectul (ce apare ingrosat la primirea mesajului)
    $mail->body($body); //mesajul email ului
    $mail->send(); //trimiterea mesajului
    
    echo 'Inserare efectuata cu succes!';

 }


?>