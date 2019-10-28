<style type="text/css">
    #bcAGGT_container{
        width: 100%;
        height: 100vh;
        background-color: rgba(16,16,16,0.97);
        position: fixed;
        z-index: 9999999999999;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
    
    .bcAGGT_message_box{
        width: 600px;
        background-color: #fff;
        padding: 50px;
        margin: 0 auto;
    }
</style>
<div id="bcAGGT_container">
	<div class="bcAGGT_message_box_wrapper">
        <div class="bcAGGT_message_box">
        Dit mag je niet zien!!!!!
            <?php wpshout_frontend_post(); ?>
        </div>
	</div>
</div>

