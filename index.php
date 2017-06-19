<?php

//上传文件类型列表
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png'
    );

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <link rel="stylesheet" href="css/demos.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="css/uppic.css" type="text/css" />
    <title></title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="jc-demo-box">
                    <div class="clear_float">
                        <img src="img.jpg"  id="target" class="float"/>
                        <img src="img.jpg"  id="real_img" style="display:none;"/>
                        <div id="preview-pane">
                            <div class="preview-container">
                               <img src="img.jpg" class="jcrop-preview " alt="Preview" />
                            </div>
                        </div>
                    </div>
                    <form action="imageClipping.php?mothed=crop&name=img.jpg" method="post" onsubmit="return checkCoords();">
                        <!-- 记录截图坐标和宽高 -->
                        <input type="hidden" id="x" name="x" />
                        <input type="hidden" id="y" name="y" />
                        <input type="hidden" id="w" name="w" />
                        <input type="hidden" id="h" name="h" />
                        <input type="submit" value="保存" class="btn btn-large btn-inverse"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="./js/jquery.min.js"></script>
<script src="./js/jquery.Jcrop.min.js"></script>
<script src="./js/imageClipping.js"></script>
</body>
</html>