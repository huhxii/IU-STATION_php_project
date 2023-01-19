<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/source/iustation/db/db_connect.php";
    $message = $id = " ";
    $id = $_GET["id"];

    if(!$id){
        $message = "<li>ID MISSING!</li>";
    }else{
        $sql = "select * from members where id = '$id'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) == 1){
            $message = "<li>".$id." Used!!</li>";
            $message = "<li>Use Another ID</li>";
        }else{
            $message = "<li>".$id." Can Regist</li>";
        }
        mysqli_close($con);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        h3 {
            padding-left: 5px;
            border-left: solid 5px #edbf07;
        }
        #close {
            margin: 20px 0 0 80px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h3>ID CHECK</h3>
    <p><?php echo $message?></p>
    <div id="close">
        <button onclick="javascript:self.close()">CLOSE</button>
    </div>
</body>
</html>