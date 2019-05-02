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
                    col-12{if $nb > 1 && $nb !== 3} col-sm-6{if $nb === 4} col-md-3{/if}{elseif $nb === 3} col-sm-4{/if}
                {/capture}{/strip}
                {foreach $advantages as $adv}
                <div class="{$smarty.capture.class}">
                    <div class="media media-{$orientation}">
                        <div class="icon">
                            {if $adv.iconset === 'materials'}<i class="material-icons">{$adv.icon|replace:' ':'_'}</i>{else}<span class="{$adv.icon}"></span>{/if}
                            <h4>{$adv.title}</h4>
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