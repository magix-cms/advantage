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
var MC_plugins_advantage = (function ($, undefined) {
    /**
     * Save
     * @param id
     * @param collection
     * @param type
     */
    function save(getlang,type,id,modal){
        if(type == 'add'){
            // *** Set required fields for validation
            $(id).validate({
                onsubmit: true,
                event: 'submit',
                rules: {
                    title: {
                        required: true,
                        minlength: 3
                    },
                    icon: {
                        required: true
                    },
                    content: {
                        maxlength: 500
                    }
                },
                submitHandler: function(form) {
                    $.nicenotify({
                        ntype: "ajax",
                        uri: '/'+baseadmin+'/plugins.php?name=advantage&getlang='+getlang+'&action=edit',
						typesend: 'post',
						resetform: true,
						datatype: 'json',
						noticedata: $(form).serialize(),
                        successParams:function(data){
                            $(modal).modal('hide');
							window.setTimeout(function() { $(".alert-success").alert('close'); }, 4000);
							$.nicenotify.initbox(data.notify,{
								display:true
							});
							if(data.statut && data.result != null) {
								$('#no-entry').before(data.result);
								updateList();
							}
                        }
                    });
                    return false;
                }
            });
        }else if(type == 'edit'){
            // *** Set required fields for validation
            $(id).validate({
                onsubmit: true,
                event: 'submit',
                rules: {
                    title: {
                        required: true,
                        minlength: 3
                    },
                    icon: {
                        required: true
                    },
                    content: {
                        maxlength: 500
                    }
                },
                submitHandler: function(form) {
                    $.nicenotify({
                        ntype: "submit",
                        uri: '/'+baseadmin+'/plugins.php?name=advantage&getlang='+getlang+'&action=edit',
                        typesend: 'post',
                        idforms: $(form),
                        resetform: false,
                        successParams:function(data){
                            window.setTimeout(function() { $(".alert-success").alert('close'); }, 4000);
                            $.nicenotify.initbox(data,{
                                display:true
                            });
                        }
                    });
                    return false;
                }
            });
        }
    }
    function del(getlang,type,id,modal){
        if(type === 'page'){
            // *** Set required fields for validation
            $(id).validate({
                onsubmit: true,
                event: 'submit',
                rules: {
                    delete: {
                        required: true,
                        number: true,
                        minlength: 1
                    }
                },
                submitHandler: function(form) {
                    $.nicenotify({
                        ntype: "submit",
                        uri: '/'+baseadmin+'/plugins.php?name=advantage&getlang='+getlang+'&action=delete',
                        typesend: 'post',
                        idforms: $(form),
                        resetform: true,
                        successParams:function(data){
                            $(modal).modal('hide');
                            window.setTimeout(function() { $(".alert-success").alert('close'); }, 4000);
                            $.nicenotify.initbox(data,{
                                display:true
                            });
                            $('#order_'+$('#delete').val()).remove();
                            updateList();
                        }
                    });
                    return false;
                }
            });
        }
    }

    /**
     * Liste des points forts
     * @param getlang
     */
    function getAdvantage(baseadmin,getlang){
        $.nicenotify({
            ntype: "ajax",
            uri: '/'+baseadmin+'/plugins.php?name=advantage&getlang='+getlang+'&action=getlist',
            typesend: 'get',
            beforeParams:function(){
                var loader = $(document.createElement("tr")).attr('id','loader').append(
                    $(document.createElement("td")).addClass('text-center').append(
                        $(document.createElement("span")).addClass("loader offset5").append(
                            $(document.createElement("img"))
                                .attr('src','/'+baseadmin+'/template/img/loader/small_loading.gif')
                                .attr('width','20px')
                                .attr('height','20px')
                        )
                    )
                );
                $('#no-entry').before(loader);
            },
            successParams:function(data){
                $('#loader').remove();
                $.nicenotify.initbox(data,{
                    display:false
                });
                if(data === undefined){
                    console.log(data);
                }
                if(data !== null){
                    $('#no-entry').before(data);
                }
                updateList();
            }
        });
    }
    function updateList() {
        var rows = $('#list_adv tr');
        if (rows.length > 1) {
            $('#no-entry').addClass('hide');

            $( 'a.toggleModal').off();
            $( 'a.toggleModal' ).click(function(){
                if($(this).attr('href') != '#'){
                    var id = $(this).attr('href').slice(1);

                    $('#delete').val(id);
                }
            });

            if (rows.length >= 5) {
                $('#addbtn').addClass('hide');
            } else {
                $('#addbtn').removeClass('hide');
            }
        } else {
            $('#no-entry').removeClass('hide');
            $('#addbtn').removeClass('hide');
        }
    }
    return {
        // Fonction Public        
        run: function (baseadmin,getlang) {
            // Init function
            save(getlang,'add','#add_adv_page','#add-page');
            save(getlang,'edit','#edit_adv_page',null);
            del(getlang,'page','#del_adv_page','#deleteModal');
            updateList();

            $(function(){
                var icon = $('[name="icon"]:checked').attr('id');

                if ( icon != undefined ){
                    $('[name="icon"]').change(function(){
                        $('#'+icon).removeProp('checked');
                    })
                }

				$( ".ui-sortable" ).sortable({
					items: "> tr",
					placeholder: "ui-state-highlight",
					cursor: "move",
					axis: "y",
					update: function(){
						var serial = $( ".ui-sortable" ).sortable('serialize');
						$.nicenotify({
							ntype: "ajax",
							uri: '/'+baseadmin+'/plugins.php?name=advantage&getlang='+getlang+'&action=order',
							typesend: 'post',
							noticedata : serial,
							successParams:function(e){
								$.nicenotify.initbox(e,{
									display:false
								});
							}
						});
					}
				});
				$( ".ui-sortable" ).disableSelection();
            });
        }
    };
})(jQuery);