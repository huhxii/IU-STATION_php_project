<?php
    function create_table($con, $table_name){
        $flag = false;
        $sql = "show tables from iustation";
        $result = mysqli_query($con, $sql) or die("테이블 보여주기 실패". mysqli_error($con));
        while($row = mysqli_fetch_array($result)){
            if($row[0] == "$table_name"){
                $flag = true;
                break;
            }
        }

        if($flag == false){
            switch($table_name){
                case 'members' :
                    $sql = "CREATE TABLE if not exists `members` (
                        `num` int not null auto_increment,
                        `id` char(15) not null,
                        `password` char(25) not null,
                        `name` char(15) not null,
                        `nick` char(30) not null,
                        `email` char(50),
                        `regist_day` char(20),
                        `level` int,
                        PRIMARY KEY(`num`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                    break;
                case 'notice' :
                    $sql = "CREATE TABLE if not exists `notice` (
                        `num` int NOT NULL AUTO_INCREMENT,
                        `id` char(15) NOT NULL,
                        `nick` char(10) NOT NULL,
                        `subject` char(200) NOT NULL,
                        `content` text NOT NULL,
                        `regist_day` char(20) NOT NULL,
                        `hit` int NOT NULL, 
                        `file_name` char(40) NOT NULL,
                        `file_type` char(40) NOT NULL,
                        `file_copied` char(40) NOT NULL,
                        PRIMARY KEY (`num`),
                        KEY `id` (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                    break;
                case 'notice_ripple':
                    $sql = "CREATE TABLE if not exists `notice_ripple` (
                        `num` int(11) NOT NULL AUTO_INCREMENT,
                        `parent` int(11) NOT NULL,
                        `id` char(15) NOT NULL,
                        `name` char(10) NOT NULL,
                        `nick` char(10) NOT NULL,
                        `content` text NOT NULL,
                        `regist_day` char(20) DEFAULT NULL,
                        PRIMARY KEY (`num`),
                        KEY `regist_day` (`regist_day`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;";
                    break;
                case 'image' :
                    $sql = "CREATE TABLE if not exists `image` (
                        `num` int NOT NULL AUTO_INCREMENT,
                        `id` char(15) NOT NULL,
                        `nick` char(10) NOT NULL,
                        `subject` char(200) NOT NULL,
                        `content` text NOT NULL,
                        `regist_day` char(20) NOT NULL,
                        `hit` int NOT NULL, 
                        `file_name` char(40) NOT NULL,
                        `file_type` char(40) NOT NULL,
                        `file_copied` char(40) NOT NULL,
                        PRIMARY KEY (`num`),
                        KEY `id` (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                    break;
                case 'image_ripple':
                    $sql = "CREATE TABLE if not exists `image_ripple` (
                        `num` int(11) NOT NULL AUTO_INCREMENT,
                        `parent` int(11) NOT NULL,
                        `id` char(15) NOT NULL,
                        `name` char(10) NOT NULL,
                        `nick` char(10) NOT NULL,
                        `content` text NOT NULL,
                        `regist_day` char(20) DEFAULT NULL,
                        PRIMARY KEY (`num`),
                        KEY `regist_day` (`regist_day`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;";
                    break;     
                case 'forum' :
                    $sql = "CREATE TABLE if not exists `forum` (
                        `num` int NOT NULL AUTO_INCREMENT,
                        `id` char(15) NOT NULL,
                        `nick` char(10) NOT NULL,
                        `subject` char(200) NOT NULL,
                        `content` text NOT NULL,
                        `regist_day` char(20) NOT NULL,
                        `hit` int NOT NULL, 
                        `file_name` char(40) NOT NULL,
                        `file_type` char(40) NOT NULL,
                        `file_copied` char(40) NOT NULL,
                        PRIMARY KEY (`num`),
                        KEY `id` (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                    break;
                case 'forum_ripple':
                    $sql = "CREATE TABLE if not exists `forum_ripple` (
                        `num` int(11) NOT NULL AUTO_INCREMENT,
                        `parent` int(11) NOT NULL,
                        `id` char(15) NOT NULL,
                        `name` char(10) NOT NULL,
                        `nick` char(10) NOT NULL,
                        `content` text NOT NULL,
                        `regist_day` char(20) DEFAULT NULL,
                        PRIMARY KEY (`num`),
                        KEY `regist_day` (`regist_day`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;";
                    break;
                case 'goods' :
                $sql = "CREATE TABLE if not exists `goods` (
                    `num` int NOT NULL AUTO_INCREMENT,
                    `id` char(15) NOT NULL,
                    `nick` char(10) NOT NULL,
                    `subject` char(200) NOT NULL,
                    `content` text NOT NULL,
                    `regist_day` char(20) NOT NULL,
                    `hit` int NOT NULL, 
                    `file_name` char(40) NOT NULL,
                    `file_type` char(40) NOT NULL,
                    `file_copied` char(40) NOT NULL,
                    PRIMARY KEY (`num`),
                    KEY `id` (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                break;
            case 'goods_ripple':
                $sql = "CREATE TABLE if not exists `goods_ripple` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `parent` int(11) NOT NULL,
                    `id` char(15) NOT NULL,
                    `name` char(10) NOT NULL,
                    `nick` char(10) NOT NULL,
                    `content` text NOT NULL,
                    `regist_day` char(20) DEFAULT NULL,
                    PRIMARY KEY (`num`),
                    KEY `regist_day` (`regist_day`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;";
                break;
                default :
                    echo "<script>alert('해당 테이블을 찾을 수 없습니다.')</script>";
            }

            $result = mysqli_query($con, $sql) or die("테이블 생성 실패". mysqli_error($con));
            if($result == true){
                echo "<script>alert('{$table_name}테이블이 생성 되었습니다.')</script>";
            }else{
                echo "<script>alert('{$table_name}테이블 생성이 실패 하였습니다.')</script>";
            }
        }
    }
?>