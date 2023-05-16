<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
     content="IE=edge">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0">
    <title>PHP FORM HADLING</title>
</head>
<body>
     <?php
     // back to null
     $namaLengkap = '';
     $pasword = '';

     // message error requiret
     $namaLengkapError = '';
     $paswordError = '';
        function dataType($datapasword)
     {
        $inputData = trim ($datapasword);
        $inputData = stripslashes ($datapasword);
        $inputData = htmlspecialchars ($datapasword);
        return $inputData;
     }
     if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(empty($_POST['namaLengkap'])){
            $namaLengkapError = "Nama lengkap tidak boleh kosong!";
           }else{
            $namaLengkap = dataType($_POST['namaLengkap']);
           }
           if(empty($_POST['pasword'])){
             $paswordError = " pasword tidak boleh kosong!";
           }else{
            $pasword = dataType($_POST['pasword']);
           }
     }
     ?>

     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div style="margin-bottom: 3px;">  
    <label for ="nama">namaLengkap</label>
    <input type="text" id="namaLengkap" name ="namaLengkap" placeholder= "masukan nama anda" >
    <span style="color:red; font-size:12px"><?php echo $namaLengkapError; ?></span>
</div>
<div style="margin-bottom: 3px;">
        <label for ="pasword">pasword</label>
        <input type ="number" id ="pasword" name ="pasword" placeholder= "masukan pasword anda" />
        <span style="color:red; font-size:10px"><?php echo $paswordError; ?> </span>   
</div>
<button type="submit">simpan</button>
</form>
<?php
echo "nama saya adalah " .$namaLengkap;
echo "<br>";
echo "kels saya saat ini " .$pasword;
?>


</body>
</html>