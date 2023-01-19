<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/forum.css">
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <nav>
        <?php include "navi.php";?>
    </nav>
    <section>
        <div id="forum_box">
            <h3 class="title">COMMUNITY > FORUM</h3>
            <?php include("./db/db_connect.php");  
                $num = $_GET["num"];
                $page = $_GET["page"];
                $sql = "select * from forum where num = $num";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);

                $id = $row["id"];
                $nick = $row["nick"];
                $regist_day = $row["regist_day"];
                $subject = $row["subject"];
                $content = $row["content"];
                $file_name = $row["file_name"];
                $file_type = $row["file_type"];
                $copied_file_name = $row["file_copied"];
                $hit = $row["hit"];

                $content = str_replace(" ", "&nbsp;", $content);
                $content = str_replace("\n", "<br>", $content);
                $new_hit = $hit + 1;
                $sql = "update forum set hit = $new_hit where num = $num ";   
                mysqli_query($con, $sql);
            ?>
            <ul id="view_content">
                <li>
                    <span class="col1"><b>SUBJECT : </b><?=$subject?></span>
                    <span class="col2"><?=$nick?> | <?=$regist_day?></span>
                </li>
                <li>
                <?php
                    if($file_name) {
                        $real_name = $copied_file_name;
                        $file_path = "./data/".$real_name;
                        $file_size = filesize($file_path);
                        
                        echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href='board_download.php?real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                    }
                ?>
                <?=$content?>
                </li>
            </ul>
            <ul class="buttons">
                <li><button onclick="location.href='forum_list.php?page=<?=$page?>'">LIST</button></li>
                <li><button onclick="location.href='forum_modify.php?num=<?=$num?>&page=<?=$page?>'">UPDATE</button></li>
                <li><button onclick="location.href='forum_delete.php?num=<?=$num?>&page=<?=$page?>'">DELETE</button></li>
                <li><button onclick="location.href='forum.php'">WRITE</button></li>
            </ul>
        </div>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>