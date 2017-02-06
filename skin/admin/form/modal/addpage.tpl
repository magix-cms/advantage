<div class="modal fade" id="add-page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">{#add_adv#|ucfirst}</h4>
            </div>
            <form id="add_adv_page" class="forms_plugins_travel" method="post" action="">
                <div class="modal-body row">
                    <div class="form-group col-xs-12">
                        <label for="title">{#title_adv#|ucfirst}&nbsp;*</label>
                        <input id="title" class="form-control" type="text" size="150" value="" name="title" placeholder="{#title_adv_ph#|ucfirst}" />
                    </div>
                    <div class="form-group col-xs-12">
                        <label>{#icon_adv#|ucfirst}&nbsp;*</label>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
                                                <input type="radio" name="icon" id="icon_{$icon}" value="{$icon}"/>
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
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="content">{#content_adv#|ucfirst}</label>
                        <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="url">{#link_adv#|ucfirst}</label>
                        <input id="url" class="form-control" type="text" size="150" value="" name="url" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{#cancel#|ucfirst}</button>
                    <input type="submit" class="btn btn-primary" value="{#save#|ucfirst}" />
                </div>
            </form>
        </div>
    </div>
</div>