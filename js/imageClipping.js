/**
 * Created by Administrator on 2017/6/17.
 */
$(document).ready(function(){
    var originalImg=$('.select img');
    var totalWidth=parseInt(originalImg.css('width'));
    var totalHeight=parseInt(originalImg.css('height'));

    var dynamicImg=new Div();
    dynamicImg.createDiv($('.select'));

    var resultImg=new Div();
    resultImg.createDiv($('.smallImg'));

    function Div(){
        this.div=null;

        this.createDiv=function(parent){
            this.div=('<div></div>');

            $(this.div).attr({
                width:'200px',
                height:'200px',
                border:'1px solid black',
                position:'absolute'
            });
            parent.appendTo($(this.div));
        };

        this.removeDiv=function(parent){
            parent.remove();
        };
    }
});