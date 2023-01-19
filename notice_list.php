<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IU STATION</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/notice.css">
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <nav>
        <?php include "navi.php";?>
    </nav>
    <section>
        <div id="notice_box">
            <h3>STATION > NOTICE LIST</h3>
            <ul id="notice_list">
                <li>
                    <span class="col1">No.</span>
                    <span class="col2">SUBJECT</span>
                    <span class="col3">WRITER</span>
                    <span class="col4">UP FILE</span>
                    <span class="col5">DATE</span>
                    <span class="col6">VIEW</span>
                </li>
                <?php include("./db/db_connect.php");  
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    }else {
                        $page = 1;
                    }
                    
                    $sql = "select count(*) from notice order by num desc";
                    $result = mysqli_query($con, $sql);
                    $row    = mysqli_fetch_array($result);
                    $total_record = intval($row[0]);
                    $scale = 4;
                    $total_page = ceil($total_record / $scale);

                    $start = ($page - 1) * $scale;      
                    $number = $total_record - $start;

                    $sql = "select * from notice order by num desc limit $start , $scale";
                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)){
                        $num         = $row["num"];
                        $id          = $row["id"];
                        $name        = $row["name"];
                        $subject     = $row["subject"];
                        $regist_day  = $row["regist_day"];
                        $hit         = $row["hit"];
                        if ($row["file_name"]){
                            $file_image = "<img src='./img/file.gif'>";
                        }else{
                            $file_image = " ";
                        }
                ?>
                <li>
                    <span class="col1"><?=$number?></span>
                    <span class="col2"><a href="notice_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><?=$file_image?></span>
                    <span class="col5"><?=$regist_day?></span>
                    <span class="col6"><?=$hit?></span>
                </li>
                <?php
                    $number--;
                    }
        
                mysqli_close($con);
                ?>
            </ul>

            <ul id="page_num">
                <?php
                $url = "notice_list.php?mode=send&page=1";
                echo get_paging(5, $page, $total_page, $url);
                ?>
            </ul>
            <ul class="buttons">
                <li><button onclick="location.href='notice_list.php'">LIST</button></li>
                <li>
                    <?php 
                    if($userid === "관리자"){
                    ?>
                        <button onclick="location.href='notice.php'">WRITE</button>
                    <?php
                    }else{
                    ?>
                        <a href="javascript:alert('관리자만 이용 가능합니다!')"><button>WRITE</button></a>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>