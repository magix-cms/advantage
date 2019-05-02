<div class="row">
    <form id="edit_adv" action="{$smarty.server.SCRIPT_NAME}?controller={$smarty.get.controller}&amp;tabs=adv&amp;action={if !$edit}add{else}edit{/if}" method="post" class="validate_form{if !$edit} add_form collapse in{else} edit_form{/if} col-ph-12 col-sm-8 col-md-6">
        <div class="row">
            <div class="form-group col-ph-12 col-sm-6 col-md-4">
                <label for="iconset_adv">{#iconset_adv#|ucfirst} :</label>
                <select name="adv[iconset_adv]" id="iconset_adv" class="form-control">
                    <option value="fontawesome"{if $adv.iconset_adv === 'fontawesome' || !$adv} selected{/if}>FontAwesome</option>
                    <option value="materials"{if $adv.iconset_adv === 'materials'} selected{/if}>Material Icons</option>
                </select>
            </div>
            <div class="form-group col-ph-12 col-sm-6 col-md-4">
                <label for="icon_adv">
                    {#icon_adv#|ucfirst}&nbsp;*&nbsp;
                    <a href="#" class="icon-help text-info"
                       data-toggle="popover"
                       data-title="{#how_to_use#}">
                        <span class="fa fa-question-circle"></span>
                    </a>
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="icon_adv" name="adv[icon_adv]" value="{$adv.icon_adv}" />
                    <span class="input-group-addon" id="icon"></span>
                </div>
                <div id="popover-content-fontawesome" class="hide">
                    <p>{#fa_content#}</p>
                    <p><a href="https://fontawesome.com/">https://fontawesome.com/</a></p>
                    <img src="{$url}/plugins/advantage/img/fa-help.jpg" alt="Help using fontawesome icons"/>
                </div>
                <div id="popover-content-materials" class="hide">
                    <p>{#mi_content#}</p>
                    <p><a href="https://material.io/icons/">https://material.io/icons/</a></p>
                    <img src="{$url}/plugins/advantage/img/mi-help.jpg" alt="Help using materials icons"/>
                </div>
                {*<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    {foreach $icons as $section => $list}
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{$list@index +1}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{$list@index +1}" aria-expanded="true" aria-controls="collapse{$list@index +1}">
                                        {$section}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{$list@index +1}" class="panel-collapse collapse {if $list@first}in{/if}" role="tabpanel" aria-labelledby="heading{$list@index +1}">
                                <div class="panel-body">
                                    <ul class="list-unstyled list-inline row">
                                        {foreach $list as $icon}
                                            <li class="radio col-xs-1">
                                                <input type="radio" name="adv[icon_adv]" id="icon_{$icon}" value="{$icon}"/>
                                                <label for="icon_{$icon}">
                                                    <span class="fa fa-{$icon}"></span>
                                                </label>
                                            </li>
                                        {/foreach}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>*}
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