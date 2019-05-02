{extends file="layout.tpl"}
{block name='head:title'}advantage{/block}
{block name='body:id'}advantage{/block}
{block name="stylesheets"}
    {headlink rel="stylesheet" href="/{baseadmin}/min/?f=plugins/{$smarty.get.controller}/css/admin.min.css" media="screen"}
{/block}
{block name='article:header'}
    <h1 class="h2"><a href="{$smarty.server.SCRIPT_NAME}?controller={$smarty.get.controller}" title="Afficher la liste des points forts">Advantage</a></h1>
{/block}
{block name='article:content'}
    {if {employee_access type="edit" class_name=$cClass} eq 1}
        <div class="panels row">
            <section class="panel col-xs-12 col-md-12">
                {if $debug}
                    {$debug}
                {/if}
                <header class="panel-header">
                    <h2 class="panel-heading h5">{if $edit}{#edit_adv#|ucfirst}{else}{#add_adv#|ucfirst}{/if}</h2>
                </header>
                <div class="panel-body panel-body-form">
                    <div class="mc-message-container clearfix">
                        <div class="mc-message"></div>
                    </div>
                    {include file="form/adv.tpl" controller="advantage"}
                </div>
            </section>
        </div>
    {/if}
{/block}

{block name="foot" append}
    {capture name="scriptForm"}{strip}
        /{baseadmin}/min/?f=plugins/advantage/js/admin.min.js
    {/strip}{/capture}
    {script src=$smarty.capture.scriptForm type="javascript"}

    {*<script type="text/javascript">
        $(function(){
            if (typeof advantage == "undefined")
            {
                console.log("advantage is not defined");
            }else{
                advantage.run();
            }
        });
    </script>*}
{/block}