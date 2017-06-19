/**
*检测是否有选取一个区域
**/
function checkCoords()
{
    if (parseInt($('#w').val())) 
      return true;
    alert("请截取一个区域再提交保存！");
    return false;
};

jQuery(function($)
{
    var jcrop_api,
        boundx,
        boundy,

    // Grab some information about the preview pane
    $preview = $('#preview-pane'),
    $pcnt = $('#preview-pane .preview-container'),
    $pimg = $('#preview-pane .preview-container img'),

    //这里获取的是装img的div宽高
    xsize = $pcnt.width(),
    ysize = $pcnt.height();

    //这里可以设置jcrop的属性，
    //如当改变截取区域时激活onChange: updatePreview动作等
    $('#target').Jcrop({
      onChange: updatePreview,
      onSelect: updatePreview,
      aspectRatio: xsize/ysize,
      setSelect:[0,0,300,200],
      allowResiza:false,
      bgColor:''
    },function(){

      // 用jcrop的getBounds()方法获取真实尺寸
      var bounds = this.getBounds();
      boundx = bounds[0];
      boundy = bounds[1];
      // Store the API in the jcrop_api variable
      jcrop_api = this;

      // Move the preview into the jcrop container for css positioning
      $preview.appendTo(jcrop_api.ui.holder);
    });

    //更新jcrop预览视图
    function updatePreview(c)
    {

      if (parseInt(c.w) > 0)
      {
        //下面的比例是div的宽高与截图坐标比
        var rx = xsize / c.w;
        var ry = ysize / c.h;

        //改变预览图的大小和显示位置
        $pimg.css({
          width: Math.round(rx * boundx) + 'px',
          height: Math.round(ry * boundy) + 'px',
          marginLeft: '-' + Math.round(rx * c.x) + 'px',
          marginTop: '-' + Math.round(ry * c.y) + 'px'
        });

        var realWidth =  $("#real_img").width();
        var realHeight = $("#real_img").height();
        console.log(realWidth  );
    //记录位置和宽高
        $('#x').val(Math.round( c.x * realWidth / boundx ));
        $('#y').val(Math.round( c.y * realHeight / boundy));
        $('#w').val(Math.round( c.w * realWidth / boundx  ));
        $('#h').val(Math.round( c.w * realWidth / boundx ));

      }
    };

});