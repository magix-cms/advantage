{script src="/{baseadmin}/min/?f=plugins/{$pluginName}/js/admin.js" concat={$concat} type="javascript"}
<script type="text/javascript">
    $(function(){
        if (typeof MC_plugins_advantage == "undefined")
        {
            console.log("MC_plugins_advantage is not defined");
        }else{
            MC_plugins_advantage.run(baseadmin,getlang);
        }
    });
</script>