<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2017.10.20.
 * Time: 13:27
 */
?>
<button type="button" class="controll" id="play" name='play' value="play">PLAY</button>
<button type="button" class="controll" id="pause" >PAUSE</button>
<button type="button" class="controll" id="stop" >STOP</button>
<button type="button" class="controll" id="next" >NEXT</button>
<button type="button" class="controll" id="prev" >PREV</button>
<button type="button" class="controll" id="volup" >Vol +++</button>
<button type="button" class="controll" id="voldown" >Vol ---</button>
<button type="button" id="info" >INFO</button>
<div id="command_status"></div>
<div id="music_info">
    <div id="artist"><?php echo $status['artist']?></div>
    <div id="song"><?php echo $status['title']?></div>
    <div id="duration"></div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/musicController.js"></script>
