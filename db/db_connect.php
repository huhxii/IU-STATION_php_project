<?php
    $con = mysqli_connect("localhost", "root", "123456");

    if(!$con){
        die("database connect fail".mysqli_connect_errno());
    }

    $database_flag = false;
    $sql = "show databases";
    $result = mysqli_query($con, $sql) or die("데이터베이스 보여주기 실패". mysqli_error($con));
    while($row = mysqli_fetch_array($result)){
        if($row[0] == "iustation"){
            $database_flag = true;
            break;
        }
    }

    if($database_flag == false){
        $sql = "create database iustation";
        $result = mysqli_query($con, $sql) or die("데이터베이스 생성 실패". mysqli_error($con));
        if($result == true){
            echo "<script>alert('데이터베이스가 생성 되었습니다.')</script>";
        }
    }

    $dbcon = mysqli_select_db($con, "iustation") or die("데이터베이스 선택 실패". mysqli_error($con));
    if($dbcon == false){
        echo "<script>alert('데이터베이스 선택 실패했습니다.')</script>";
    }
    
    function get_paging($write_pages, $current_page, $total_page, $url) { 
        $url = preg_replace('/page=[0-9]*/', '', $url) . 'page=';
        $str = '';
        ($current_page > 1) ? ($str .= '<a href="' . $url . '1" > << </a>' . PHP_EOL) : ''; 
        $start_page = (((int)(($current_page - 1) / $write_pages)) * $write_pages) + 1;
        $end_page = $start_page + $write_pages - 1;
        if ($end_page >= $total_page) $end_page = $total_page;
        if ($start_page > 1) $str .= '<a href="' . $url . ($start_page - 1) . '" > <- </a>' . PHP_EOL;
        if ($total_page > 1) {
            for ($k = $start_page; $k <= $end_page; $k++) {
                if ($current_page != $k)
                    $str .= '<a href="' . $url . $k . '">' . $k . '</a>' . PHP_EOL;
                else
                    $str .= '<span style="color:blue">' . $k . '</span>' . PHP_EOL;
            }
        }
        if ($total_page > $end_page) $str .= '<a href="' . $url . ($end_page + 1) . '"> -> </a>'.PHP_EOL;
        if ($current_page < $total_page) {
            $str .= '<a href="' . $url . $total_page . '" > >> </a>' . PHP_EOL;
        }
        if ($str) return "<li><span >{$str}</span></li>";
        else return "";
    }
      
    function get_paging2($write_pages, $current_page, $total_page, $url) { 
    }
    function input_set($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
        //경고 메시지 
    function alert_back($message){
        echo("<script>
            alert('$message');
            history.go(-1)
        </script>");
    }
?>