/**
 * Created by molnar.mate on 2017.10.24..
 */

var musicinfo;
var commandstatus;
$('.controll').on('click',function(){
    $.post('/mc',{
        command: $(this).attr('id')
    },function(data,status){
        commandstatus=status;
        musicinfo= JSON.parse(data);
    })
});
$(document).ajaxSuccess(function() {
    $('#command_status').text(commandstatus);
    $( "#artist" ).text( musicinfo.artist );
    $( "#song" ).text( musicinfo.title );
    $('#duration').text(durationParser(musicinfo.duration))
});

function durationParser(duration)
{

    var mins= Math.floor(duration/60);
    if(mins<10){
        mins=mins.toString();
        mins="0"+mins;
    }
    var secs=duration-(mins*60);
    if(secs<10){
        secs=secs.toString();
        secs="0"+secs
    }
    return mins+':'+secs;
}





