{widget_advantage_data}
{strip}
    {if !isset($orientation)}
        {assign var="orientation" value="left"}
    {/if}
{/strip}
{if isset($advantages) && $advantages != null}
    <section id="advantages" class="clearfix">
        <div class="container">
            <div class="row">
                {strip}{capture name="class"}
                    {$nb = $advantages|count}
                    adv
                    {*col-12{if $nb > 1 && $nb !== 3} col-sm-6{if $nb === 4} col-md-3{/if}{elseif $nb === 3} col-sm-4{/if}*}
                {/capture}{/strip}
                {foreach $advantages as $adv}
                    <div class="{$smarty.capture.class}">
                        <div class="media media-{$orientation}">
                            <div class="media-title">
                                <div class="icon">
                                    <span class="material-icons {$adv.icon}"></span>
                                </div>
                                <div class="title">
                                    <h3>{$adv.title}</h3>
                                </div>
                            </div>
                            <div class="media-body icon-{$orientation}">
                                {if $nb !== 1}{$adv.desc = $adv.desc|truncate:500:'...'}{/if}
                                <p>{$adv.desc}</p>
                            </div>
                            {if $adv.url}<a href="{$adv.url}" title="{#read_more#} {$adv.title}" class="all-hover{if $adv.blank} targetblank{/if}"><span class="sr-only">{$adv.title}</span></a>{/if}
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>
{/if}