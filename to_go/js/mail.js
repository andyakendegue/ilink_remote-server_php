/**
 * Torbara CuteChurch Responsive HTML Template, exclusively on Envato Market: http://themeforest.net/user/torbara?ref=torbara
 * @encoding     UTF-8
 * @version      1.0
 * @copyright    Copyright (C) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Alexandr Khmelnytsky (support@torbara.com)
 */

jQuery(function($) {
    "use strict";

    //Contact us
    jQuery("form.contact-us").submit(function() {

        if(IsEmail(jQuery("input[name='email-774']").val())){
            var url = "/contact-us"; // the mail script

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    data: jQuery("form.contact-us").serialize()+"&tm_form=1", // serializes the form's elements.
                    success: function(data) {
                        alert(data); // show response from the php script.
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });

            jQuery(this)[0].reset();//Clear all form fields
        }else{
            alert("Please fill all fields.");
        }

        return false; // avoid to execute the actual submit of the form.
    });

    // Newsletter subscription
    jQuery("form.newsletter").submit(function() {

        if(IsEmail(jQuery("input[name='email-639']").val())){
            var url = "/newsletter"; // the newsletter controller script

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    data: jQuery("form.newsletter").serialize()+"&tm_form=1", // serializes the form's elements.
                    success: function(data) {
                        alert(data); // show response from the php script.
                        console.log(data);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });

            jQuery(this)[0].reset();//Clear all form fields
        }else{
            alert("Please fill all fields.");
        }

        return false; // avoid to execute the actual submit of the form.
    });

    // Add new post
    jQuery("form.addPost").submit(function() {

            var url = "/home/blog/create"; // the newsletter controller script
            var formData = new FormData(this);

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    cache:false,
                    contentType: false, // obligatoire pour de l'upload
                    processData: false, // obligatoire pour de l'upload
                    //data: jQuery("form.addPost").serialize()+"&tm_form=1", // serializes the form's elements.
                    /*data: {
                "_token": jQuery('input[name=_token]').val(),
                "auteur": jQuery('input[name=auteur]').val(),
                "titre": jQuery('input[name=titre]').val(),
                "contenu": jQuery('input[name=contenu]').val(),
                "imgUpload": file,
                "statut": jQuery('select[name=statut]').val()
            },*/
            data: formData,
                    success: function(data) {

                        $aler_box = jQuery('#boxalert');

                    // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
                    //$aler_box.find('.alert').removeClass('hidden');
                    //$aler_box.find('.alert p:first').html(data);
                        //console.log(data);
                        //alert(data); // show response from the php script.
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });

            //jQuery(this)[0].reset();//Clear all form fields


        return false; // avoid to execute the actual submit of the form.
    });


    //Ajouter une question
    jQuery("form.addQuestion").submit(function() {


            var url = "/to_go/home/faq/create"; // the mail script

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    data: jQuery("form.addQuestion").serialize()+"&tm_form=1", // serializes the form's elements.
                    success: function(data) {
                         $.notify(
  			 data, 
  			{ position:"right" }
			);
			 alert(data); // show response from the php script.
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });



        return false; // avoid to execute the actual submit of the form.
    });

    //Editer une question
    jQuery("form.editQuestion").submit(function() {


            var url = "/home/faq/update"; // the mail script

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    data: jQuery("form.editQuestion").serialize()+"&tm_form=1", // serializes the form's elements.
                    success: function(data) {
                        alert(data); // show response from the php script.
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });

        return false; // avoid to execute the actual submit of the form.
    });

    // Add new restaurant
    jQuery("form.addRestaurant").submit(function() {

            var url = "/home/restaurant/create"; // the newsletter controller script
            var formData = new FormData(this);

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    cache:false,
                    contentType: false, // obligatoire pour de l'upload
                    processData: false, // obligatoire pour de l'upload
                    //data: jQuery("form.addPost").serialize()+"&tm_form=1", // serializes the form's elements.
                    /*data: {
                "_token": jQuery('input[name=_token]').val(),
                "auteur": jQuery('input[name=auteur]').val(),
                "titre": jQuery('input[name=titre]').val(),
                "contenu": jQuery('input[name=contenu]').val(),
                "imgUpload": file,
                "statut": jQuery('select[name=statut]').val()
            },*/
            data: formData,
                    success: function(data) {

                        //$aler_box = jQuery('#boxalert');

                    // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
                    //$aler_box.find('.alert').removeClass('hidden');
                    //$aler_box.find('.alert p:first').html(data);
                        //console.log(data);
                        alert(data); // show response from the php script.
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });

            //jQuery(this)[0].reset();//Clear all form fields


        return false; // avoid to execute the actual submit of the form.
    });

    // Edit new restaurant
    jQuery("form.editRestaurant").submit(function() {

            var url = "/home/restaurant/update"; // the newsletter controller script
            var formData = new FormData(this);

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    cache:false,
                    contentType: false, // obligatoire pour de l'upload
                    processData: false, // obligatoire pour de l'upload
                    //data: jQuery("form.addPost").serialize()+"&tm_form=1", // serializes the form's elements.
                    /*data: {
                "_token": jQuery('input[name=_token]').val(),
                "auteur": jQuery('input[name=auteur]').val(),
                "titre": jQuery('input[name=titre]').val(),
                "contenu": jQuery('input[name=contenu]').val(),
                "imgUpload": file,
                "statut": jQuery('select[name=statut]').val()
            },*/
            data: formData,
                    success: function(data) {

                        //$aler_box = jQuery('#boxalert');

                    // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
                    //$aler_box.find('.alert').removeClass('hidden');
                    //$aler_box.find('.alert p:first').html(data);
                        //console.log(data);
                        alert(data); // show response from the php script.
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });

            //jQuery(this)[0].reset();//Clear all form fields


        return false; // avoid to execute the actual submit of the form.
    });




    // A chaque sélection de fichier pour le restaurant
    jQuery('form.addRestaurant').find('input[name="imgUpload"]').on('change', function (e) {
        var files = jQuery(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview = jQuery('#image_preview');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview.find('.thumbnail').removeClass('hidden');
            $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
            //$image_preview.find('h4').html(file.name);
            //$image_preview.find('.caption p:first').html(file.size +' bytes');
        }
    });
    jQuery('form.editRestaurant').find('input[name="imgUpload"]').on('change', function (e) {
        var files = jQuery(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview = jQuery('#image_preview');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview.find('.thumbnail').removeClass('hidden');
            $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
            //$image_preview.find('h4').html(file.name);
            //$image_preview.find('.caption p:first').html(file.size +' bytes');
        }
    });


    // Add new menu
    jQuery("form.addMenu").submit(function() {

            var url = "/home/menu/create"; // the newsletter controller script
            var formData = new FormData(this);

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    cache:false,
                    contentType: false, // obligatoire pour de l'upload
                    processData: false, // obligatoire pour de l'upload
                    //data: jQuery("form.addPost").serialize()+"&tm_form=1", // serializes the form's elements.
                    /*data: {
                "_token": jQuery('input[name=_token]').val(),
                "auteur": jQuery('input[name=auteur]').val(),
                "titre": jQuery('input[name=titre]').val(),
                "contenu": jQuery('input[name=contenu]').val(),
                "imgUpload": file,
                "statut": jQuery('select[name=statut]').val()
            },*/
            data: formData,
                    success: function(data) {

                        //$aler_box = jQuery('#boxalert');

                    // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
                    //$aler_box.find('.alert').removeClass('hidden');
                    //$aler_box.find('.alert p:first').html(data);
                        //console.log(data);
                        alert(data); // show response from the php script.
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });

            //jQuery(this)[0].reset();//Clear all form fields


        return false; // avoid to execute the actual submit of the form.
    });

    // Edit new restaurant
    jQuery("form.editMenu").submit(function() {

            var url = "/home/menu/update"; // the newsletter controller script
            var formData = new FormData(this);

            jQuery.ajax({
                    type: "POST",
                    url: url,
                    cache:false,
                    contentType: false, // obligatoire pour de l'upload
                    processData: false, // obligatoire pour de l'upload
                    //data: jQuery("form.addPost").serialize()+"&tm_form=1", // serializes the form's elements.
                    /*data: {
                "_token": jQuery('input[name=_token]').val(),
                "auteur": jQuery('input[name=auteur]').val(),
                "titre": jQuery('input[name=titre]').val(),
                "contenu": jQuery('input[name=contenu]').val(),
                "imgUpload": file,
                "statut": jQuery('select[name=statut]').val()
            },*/
            data: formData,
                    success: function(data) {

                        //$aler_box = jQuery('#boxalert');

                    // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
                    //$aler_box.find('.alert').removeClass('hidden');
                    //$aler_box.find('.alert p:first').html(data);
                        //console.log(data);
                        alert(data); // show response from the php script.
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.responseText);
                    }
                });

            //jQuery(this)[0].reset();//Clear all form fields


        return false; // avoid to execute the actual submit of the form.
    });




    // A chaque sélection de fichier pour le restaurant
    jQuery('form.addMenu').find('input[name="imgUpload1"]').on('change', function (e) {
        var files = jQuery(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview1 = jQuery('#image_preview1');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview1.find('.thumbnail').removeClass('hidden');
            $image_preview1.find('img').attr('src', window.URL.createObjectURL(file));
            //$image_preview.find('h4').html(file.name);
            //$image_preview.find('.caption p:first').html(file.size +' bytes');
        }
    });
    // A chaque sélection de fichier pour le restaurant
    jQuery('form.addMenu').find('input[name="imgUpload2"]').on('change', function (e) {
        var files = jQuery(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview2 = jQuery('#image_preview2');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview2.find('.thumbnail').removeClass('hidden');
            $image_preview2.find('img').attr('src', window.URL.createObjectURL(file));
            //$image_preview.find('h4').html(file.name);
            //$image_preview.find('.caption p:first').html(file.size +' bytes');
        }
    });
    // A chaque sélection de fichier pour le restaurant
    jQuery('form.addMenu').find('input[name="imgUpload3"]').on('change', function (e) {
        var files = jQuery(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview3 = jQuery('#image_preview3');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview3.find('.thumbnail').removeClass('hidden');
            $image_preview3.find('img').attr('src', window.URL.createObjectURL(file));
            //$image_preview.find('h4').html(file.name);
            //$image_preview.find('.caption p:first').html(file.size +' bytes');
        }
    });
    //
    jQuery('form.editMenu').find('input[name="imgUpload1"]').on('change', function (e) {
        var files = jQuery(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview1 = jQuery('#image_preview1');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview1.find('.thumbnail').removeClass('hidden');
            $image_preview1.find('img').attr('src', window.URL.createObjectURL(file));
            //$image_preview.find('h4').html(file.name);
            //$image_preview.find('.caption p:first').html(file.size +' bytes');
        }
    });

    //
    jQuery('form.editMenu').find('input[name="imgUpload2"]').on('change', function (e) {
        var files = jQuery(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview2 = jQuery('#image_preview2');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview2.find('.thumbnail').removeClass('hidden');
            $image_preview2.find('img').attr('src', window.URL.createObjectURL(file));
            //$image_preview.find('h4').html(file.name);
            //$image_preview.find('.caption p:first').html(file.size +' bytes');
        }
    });

    //
    jQuery('form.editMenu').find('input[name="imgUpload3"]').on('change', function (e) {
        var files = jQuery(this)[0].files;

        if (files.length > 0) {
            // On part du principe qu'il n'y qu'un seul fichier
            // étant donné que l'on a pas renseigné l'attribut "multiple"
            var file = files[0],
                $image_preview3 = jQuery('#image_preview3');

            // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
            $image_preview3.find('.thumbnail').removeClass('hidden');
            $image_preview3.find('img').attr('src', window.URL.createObjectURL(file));
            //$image_preview.find('h4').html(file.name);
            //$image_preview.find('.caption p:first').html(file.size +' bytes');
        }
    });


    // Bouton "Annuler" pour vider le champ d'upload
    jQuery('#image_preview1').find('button[type="button"]').on('click', function (e) {
        e.preventDefault();

        jQuery('#my_form').find('input[name="image"]').val('');
        jQuery('#image_preview1').find('.thumbnail').addClass('hidden');
    });

    // Bouton "Annuler" pour vider le champ d'upload
    jQuery('#image_preview2').find('button[type="button"]').on('click', function (e) {
        e.preventDefault();

        jQuery('#my_form').find('input[name="image"]').val('');
        jQuery('#image_preview2').find('.thumbnail').addClass('hidden');
    });

    // Bouton "Annuler" pour vider le champ d'upload
    jQuery('#image_preview3').find('button[type="button"]').on('click', function (e) {
        e.preventDefault();

        jQuery('#my_form').find('input[name="image"]').val('');
        jQuery('#image_preview3').find('.thumbnail').addClass('hidden');
    });



    jQuery('#contenu').summernote({
                  height:300,
                });
    jQuery('#description').summernote({
                              height:300,
                            });
    jQuery('#reponse').summernote({
                              height:300,
                            });


    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

});
