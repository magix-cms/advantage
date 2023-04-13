<div class="row">
    <form id="edit_adv" action="{$smarty.server.SCRIPT_NAME}?controller={$smarty.get.controller}&amp;tabs=adv&amp;action={if !$edit}add{else}edit{/if}" method="post" class="validate_form{if !$edit} add_form collapse in{else} edit_form{/if} col-ph-12 col-sm-8 col-md-6">
        <div class="row">
            <div class="form-group col-ph-12 col-sm-6 col-md-6">
                <label for="icon_adv">
                    {#icon_adv#|ucfirst}&nbsp;*&nbsp;
                    <a href="#" class="icon-help text-info"
                       data-toggle="popover"
                       data-title="{#how_to_use#}">
                        <span class="fa fa-question-circle"></span>
                    </a>
                </label>
                <input type="text" class="form-control" id="icon_adv" name="adv[icon_adv]" value="{$adv.icon_adv}" />

                <div id="popover-content" class="hide">
                    <p>{#cu_content#}</p>
                    <p><a href="http://icomoon.io/">http://icomoon.io/</a></p>
                    <img src="{$url}/plugins/advantage/img/cu-help.jpg" alt="Help using"/>
                </div>
            </div>
        </div>

        {include file="language/brick/dropdown-lang.tpl"}
        <div class="row">
            <div class="col-ph-12">
                <div class="tab-content">
                    {foreach $langs as $id => $iso}
                        <div role="tabpanel" class="tab-pane{if $iso@first} active{/if}" id="lang-{$id}">
                            <fieldset>
                                <legend>Texte</legend>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                                        <div class="form-group">
                                            <label for="title_adv_{$id}">{#title_adv#|ucfirst} :</label>
                                            <input type="text" class="form-control" id="title_slide_{$id}" name="adv[content][{$id}][title_adv]" value="{$adv.content[{$id}].title_adv}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="desc_adv_{$id}">{#content_adv#|ucfirst} :</label>
                                            <textarea class="form-control" id="desc_adv_{$id}" name="adv[content][{$id}][desc_adv]" cols="65" rows="3">{$adv.content[{$id}].desc_adv}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="url_adv">{#url_adv#|ucfirst}</label>
                                            <input id="url_adv" class="form-control" type="text" size="150" name="adv[content][{$id}][url_adv]" value="{$adv.content[{$id}].url_adv}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="blank_adv_{$id}">{#blank_adv#|ucfirst}</label>
                                            <div class="switch">
                                                <input type="checkbox" id="blank_adv_{$id}" name="adv[content][{$id}][blank_adv]" class="switch-native-control"{if $adv.content[{$id}].blank_adv} checked{/if} />
                                                <div class="switch-bg">
                                                    <div class="switch-knob"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <fieldset>
            <legend>Enregistrer</legend>
            {if $edit}
                <input type="hidden" name="adv[id]" value="{$adv.id_adv}" />
            {/if}
            <button class="btn btn-main-theme" type="submit" name="action" value="edit">{#save#|ucfirst}</button>
        </fieldset>
    </form>
</div>