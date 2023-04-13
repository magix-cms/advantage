/*
 # -- BEGIN LICENSE BLOCK ----------------------------------
 #
 # This file is part of MAGIX CMS.
 # MAGIX CMS, The content management system optimized for users
 # Copyright (C) 2008 - 2013 magix-cms.com <support@magix-cms.com>
 #
 # OFFICIAL TEAM :
 #
 #   * Gerits Aurelien (Author - Developer) <aurelien@magix-cms.com> <contact@aurelien-gerits.be>
 #
 # Redistributions of files must retain the above copyright notice.
 # This program is free software: you can redistribute it and/or modify
 # it under the terms of the GNU General Public License as published by
 # the Free Software Foundation, either version 3 of the License, or
 # (at your option) any later version.
 #
 # This program is distributed in the hope that it will be useful,
 # but WITHOUT ANY WARRANTY; without even the implied warranty of
 # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 # GNU General Public License for more details.

 # You should have received a copy of the GNU General Public License
 # along with this program.  If not, see <http://www.gnu.org/licenses/>.
 #
 # -- END LICENSE BLOCK -----------------------------------

 # DISCLAIMER

 # Do not edit or add to this file if you wish to upgrade MAGIX CMS to newer
 # versions in the future. If you wish to customize MAGIX CMS for your
 # needs please refer to http://www.magix-cms.com for more information.
 */
/**
 * Author: Salvatore Di Salvo
 * Copyright: MAGIX CMS
 * Date: 05-11-15
 * Time: 13:51
 * License: Dual licensed under the MIT or GPL Version
 */
var advantage = (function ($, undefined) {
    'use strict';

    /**
     * updateTimer
     * @param ts
     * @param func
     */
    function updateTimer(ts, func) {
        var timer = false;
        if (timer) clearTimeout(timer);
        timer = setTimeout(func, ts ? ts : 1000);
    }

    /**
     * watch fields
     * @param field
     */
    function watch(field) {
        field.keypress(function () {
            updateTimer('', 'advantage.initShowIcon();');
        }).change(function () {
            updateTimer(100, 'advantage.initShowIcon();');
        });
    }

    /**
     * Retreive lat and lng of the address
     */
    function showIcon(){
        var iconset = $('#iconset_adv').val(),
            icon = $('#icon_adv').val(),
            html = '';

        if(icon !== '') {
            switch (iconset) {
                case 'fontawesome':
                    html = '<i class="'+icon+'"></i>';
                    break;
                case 'materials':
                    html = '<i class="material-icons">'+icon.replace(' ','_')+'</i>';
                    break;
            }

            $('#icon').html(html);
        }
    }

    return {
        // Fonction Public        
        run: function () {
            $('.icon-help').each(function(){
                $(this).popover('destroy').popover({
                    html: true,
                    placement: 'bottom',
                    content: function() {
                        //let type = $('#iconset_adv').val();
                        return $('#popover-content').html();
                    }
                });
            });

            watch($('#icon_adv'));
        }/*,
        initShowIcon: function () {
            showIcon();
        }*/
    };
})(jQuery);

$(function(){
    advantage.run();
});