{extends file="layout.tpl"}
{block name='body:id'}plugins-{$pluginName}{/block}
{block name="styleSheet" append}
    {include file="css.tpl"}
{/block}
{block name="article:content"}
    {include file="nav.tpl"}
    <!-- Notifications Messages -->
    <div class="mc-message clearfix"></div>
    <p id="addbtn">
        <a class="toggleModal btn btn-primary" data-toggle="modal" data-target="#add-page" href="#">
            <span class="fa fa-plus"></span>
            {#add_adv_btn#|ucfirst}
        </a>
    </p>
    <!-- Maintenance Messages -->
    <p class="col-sm-12 alert alert-info fade in">
        <span class="fa fa-info-circle"></span> {#limit_adv#|ucfirst}
    </p>
    <table class="table table-bordered table-condensed table-hover">
        <thead>
        <tr>
            <th>{#icon_adv#|ucfirst}</th>
            <th>{#title_adv#|ucfirst}</th>
            <th>{#content_adv#|ucfirst}</th>
            <th>{#link_adv#|ucfirst}</th>
            <th><span class="fa fa-edit"></span></th>
            <th><span class="fa fa-trash-o"></span></th>
        </tr>
        </thead>
        <tbody id="list_adv" class="ui-sortable">
        {if isset($pages) && !empty($pages)}
            {include file="loop/list.tpl" pages=$pages}
        {/if}
        {include file="no-entry.tpl" pages=$pages}
        </tbody>
    </table>
    {include file="form/modal/addPage.tpl"}
    {include file="modal/delete.tpl"}
{/block}
{block name='javascript'}
    {include file="js.tpl"}
{/block}