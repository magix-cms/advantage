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
                {strip}
                {$nb = $advantages|count}
                {if $nb == 4}
                    {capture name="class"}
                        col-ph-12 col-sm-6 col-md-3
                    {/capture}
                {else}
                    {$class = (12/$nb)}
                    {capture name="class"}
                        col-ph-12 col-sm-{$class}
                    {/capture}
                {/if}
                {/strip}
                {foreach $advantages as $adv}
                    {capture name="advbody"}
                        <div class="media-body icon-{$orientation}">
                            <h4>{$adv.title}</h4>
                            {if $nb != 1}
                                {$adv.desc = $adv.desc|truncate:500:'...'}
                            {/if}
                            <p>{$adv.desc}</p>
                        </div>
                    {/capture}
                    <div class="{$smarty.capture.class}">
                        <div class="media">
                            {if $orientation == 'right' or $orientation == 'bottom'}
                                {$smarty.capture.advbody}
                            {/if}
                            <div class="media-{$orientation} icon">
                                {if $adv.iconset === 'fontawesome'}
                                    <span class="fa {$adv.icon}"></span>
                                {elseif $adv.iconset === 'materials'}
                                    <i class="material-icons">{$adv.icon|replace:' ':'_'}</i>
                                {/if}
                            </div>
                            {if $orientation == 'left' or $orientation == 'top'}
                                {$smarty.capture.advbody}
                            {/if}
                            {if $adv.url}
                                <a href="{$adv.url}" title="{#read_more#} {$adv.title}" class="all-hover {if $adv.blank}targetblank{/if}"><span class="sr-only">{$adv.title}</span></a>
                            {/if}
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>
{/if}