<?php


//上传文件类型列表
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png'
    );


//请求截图保存操作
if ($_SERVER['REQUEST_METHOD'] == 'POST' && 'crop'==$_GET['mothed'])
{
    //获取图片名
    $name=$_GET['name'];

    //高宽
    $targ_w = 300;
    $targ_h = 220;
    /**
     *范围从 0（最差质量，文件更小）
     *到 100（最佳质量，文件最大）。
     *默认为 IJG 默认的质量值（大约 75）
     */
    $jpeg_quality = 90;

    //图片暂放地址'../uppict/'
    //$src = "../uppict/".$_GET['name'];
    $src="./img.jpg";

    //分开图片名和图片后缀
    $arr_name = explode ( ".", $name );

    //判断图片后缀选择新建图片方式
    $img_r ='';
    $img_r = imagecreatefromjpeg ( $src );

    //if ('png' == $arr_name [1])
    //{
    //    $img_r = imagecreatefrompng ( $src );
    //} else
    //{
    //    $img_r = imagecreatefromjpeg ( $src );
    //}

    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

    //截取图片
    imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);

    //判断图片后缀选择生成图片
    //保存位置'./userpic/'// 生成图片
    if ('png' == $arr_name [1])
    {
        imagepng ( $dst_r, './userpic/' . $name );
    } else
    {
        imagejpeg ( $dst_r, './userpic/' . $name, $jpeg_quality );
    }

    //显示保存后的图片
    echo '<img src="./userpic/'.$name.'" />';

    exit;
}

?>