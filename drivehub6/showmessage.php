<?php

echo 'back to send another:<a href="message.php" class="btn btn-primary">message</a>';

$filename = "groupmessage.txt";

// Open and read the contents of the original file
$myfile = fopen($filename, "r") or die("Unable to open file!");
$fdata = fread($myfile, filesize($filename));
fclose($myfile);

// Append the data to the new file
$filedata = "groupmessagedata.txt";
$myfiledata = fopen($filedata, "a") or die("Unable to open file!");
file_put_contents("groupmessagedata.txt", $fdata, FILE_APPEND);
fclose($myfiledata);

// Open and read the contents of the new file
$filedataread = fopen($filedata, "r") or die("Unable to open file!");
while (!feof($filedataread)) {
    echo "<br>";
    echo fgets($filedataread) . "<br />";
    echo "<br>";
}
fclose($filedataread);






























//  $filename="groupmessage.txt";
// $myfile = fopen($filename, "r") or die("Unable to open file!");
// // echo fread($myfile,filesize($filename));
// // echo file_get_contents("groupmessage.txt");
// fclose($myfile);

// $fdata= file_get_contents("groupmessage.txt");
//         //echo "<br>";
//         //echo file_put_contents("test.txt","Hello World. Testing!");






//      $filedata="groupmessagedata.txt";
// $filedata = fopen($filedata,"a") or die("Unable to open file!");


// fseek("groupmessagedata.txt",feof($filedata));
//  file_put_contents("groupmessagedata.txt",$fdata);
// // fseek("groupmessagedata.txt",feof($filedata));
// //  SEEK_END("groupmessagedata.txt");
// //  $len=filesize($filedata);
// fclose($filedata);



// $filedataread=fopen("groupmessagedata.txt","r") or die("Unable to open file!");
//   while(!feof($filedataread))
//         {
//             echo "<br>";
//             echo fgets($filedataread). "<br />";
//         }
            
//     // for ($i=0 ; $i<$len;$i++){
    //     echo fgets("groupmessagedata.txt"). "<br />";

    // }
// fwrite($filedata,$finalmessage);



      
       
        //fwrite($file,"Hello World. Testing!");
        //echo fgets($file);
        /*while(!feof($file))
        {
            echo fgets($file). "<br />";
        }*/
        //print_r(file("testr.txt"));

        //echo file_get_contents("testr.txt");
        //echo "<br>";
        //echo file_put_contents("test.txt","Hello World. Testing!");
        //echo "<br>";
        //echo ftell($file);
        //echo "<br>";
        //fseek($file,10,SEEK_CUR);
        //echo ftell($file);




        




// // echo "hello";


?>