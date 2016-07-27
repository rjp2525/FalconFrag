// Product category list functions
var categoryList = function() {
    // Initialize product category list view
    var initTreeView = function() {
        var treeData = jQuery.getJSON('https://alpha.falconfrag.com/admin/api/products/categories')
            .done(function(data) {
                jQuery('.js-tree-json').treeview({
                    data: data,
                    color: "#555",
                    expandIcon: "fa fa-plus",
                    collapseIcon: "fa fa-minus",
                    nodeIcon: "fa fa-folder text-flat",
                    onhoverColor: "#f9f9f9",
                    selectedColor: "#555",
                    selectedBackColor: "#f1f1f1",
                    showTags: !0,
                    levels: 3
                    //enableLinks: true
                })
                .on('nodeSelected', function(event, d) {
                    jQuery.getJSON('https://alpha.falconfrag.com/admin/api/products/category/' + d.href)
                        .done(function(data) {
                            jQuery('#category-detail-title').text("");
                            jQuery('#category-detail-body').html("");

                            jQuery('#category-detail-title').text(data.title);
                            jQuery('#edit-category-button').attr('data-category-id', data.id)
                            jQuery('button#delete-category').attr('data-category-id', data.id)
                            jQuery('#edit-category-button').attr('href', 'https://alpha.falconfrag.com/admin/products/categories/' + jQuery('#edit-category-button').attr('data-category-id') + '/edit');
                            jQuery('#category-detail-body').html(
                                "<table class=\"table\">" +
                                "        <tr>" +
                                "            <td>" + data.title + " <span class=\"pull-right label label-danger\">" + data.slug + "</span></td>" +
                                "        </tr>" +
                                "        <tr>" +
                                "            <td>" + data.description + "</td>" +
                                "        </tr>" +
                                "</table>"
                            );
                            jQuery('#category-details').show();
                        })
                        .fail(function(jqxhr, status, error) {
                            // Request failed
                        });
                })
                .on('nodeUnselected', function(event, d) {
                    jQuery('#category-details').hide();
                });
            })
            .fail(function(jqxhr, status, error) {
                // Request failed
            });
    };

    // Ajax form submission to create a new category
    var ajaxCreateCategory = function() {
        jQuery('button#save-new-category').click(function() {
            var $newCategoryForm = jQuery('#form-create-category');
            jQuery.ajax({
                type: $newCategoryForm.attr('method'),
                url: $newCategoryForm.attr('action'),
                data: $newCategoryForm.serialize(),
                beforeSend: function() {
                    jQuery('button#save-new-category').button('loading');
                },
                success: function(data) {
                    $newCategoryForm.each(function() {
                        this.reset();
                    });
                    jQuery('button#save-new-category').button('reset');
                    jQuery('#modal-category-create').modal('hide');
                    jQuery.notify({
                        icon: 'fa fa-check',
                        message: data.message,
                        url: ''
                    },
                    {
                        element: 'body',
                        type: 'success',
                        allow_dismiss: true,
                        newest_on_top: true,
                        showProgressbar: false,
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        animate: {
                            enter: 'animated fadeIn',
                            exit: 'animated fadeOutDown'
                        }
                    });

                    initTreeView();
                },
                error: function(data) {
                    var errors = jQuery.parseJSON(data.responseText);
                    console.log(errors);
                    jQuery('button#save-new-category').button('reset');
                    jQuery.notify({
                        icon: 'fa fa-times',
                        message: errors[0],
                        url: ''
                    },
                    {
                        element: 'body',
                        type: 'danger',
                        allow_dismiss: true,
                        newest_on_top: true,
                        showProgressbar: false,
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        animate: {
                            enter: 'animated fadeIn',
                            exit: 'animated fadeOutDown'
                        }
                    });
                }
            });
        });
    };

    // Intialize form validation for new product categories
    var initCreateCategoryValidation = function() {
        jQuery('#form-create-category').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'title': {
                    required: true,
                    maxlength: 60
                },
                'description': {
                    maxlength: 255
                },
                'display_order': {
                    digits: true,
                    maxlength: 11
                },
            },
            messages: {
                'title': {
                    required: 'Please enter a category title',
                    maxlength: 'Category titles must be less than 60 characters'
                },
                'description': {
                    maxlength: 'The description must be less than 255 characters.'
                },
                'display_order': {
                    digits: 'Display order may only contain numbers.',
                    maxlength: 'Display order must be less than 11 digits long.'
                }
            }
        });

        jQuery('#form-edit-category').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'title': {
                    required: true,
                    maxlength: 60
                },
                'description': {
                    maxlength: 255
                },
                'display_order': {
                    digits: true,
                    maxlength: 11
                },
            },
            messages: {
                'title': {
                    required: 'Please enter a category title',
                    maxlength: 'Category titles must be less than 60 characters'
                },
                'description': {
                    maxlength: 'The description must be less than 255 characters.'
                },
                'display_order': {
                    digits: 'Display order may only contain numbers.',
                    maxlength: 'Display order must be less than 11 digits long.'
                }
            }
        });

        jQuery('#form-create-category').on('keyup blur', function() {
            if(jQuery('#form-create-category').valid()) {
                jQuery('button#save-new-category').prop('disabled', false);
            } else {
                jQuery('button#save-new-category').prop('disabled', 'disabled');
            }
        });

        jQuery('#form-edit-category').on('keyup blur', function() {
            if(jQuery('#form-create-category').valid()) {
                jQuery('button#save-edit-category').prop('disabled', false);
            } else {
                jQuery('button#save-edit-category').prop('disabled', 'disabled');
            }
        });
    };

    var initEditCategory = function() {
        jQuery('#save-edit-category').on('click', function() {
            console.log("fired");
            var $editCategoryForm = jQuery('#form-edit-category');
            jQuery.ajax({
                type: $editCategoryForm.attr('method'),
                url: $editCategoryForm.attr('action'),
                data: $editCategoryForm.serialize(),
                beforeSend: function() {
                    jQuery('button#save-edit-category').button('loading');
                },
                success: function(data) {
                    jQuery('button#save-edit-category').button('reset');
                    jQuery('#modal-category-edit').modal('hide');
                    jQuery.notify({
                        icon: 'fa fa-check',
                        message: data.message,
                        url: ''
                    },
                    {
                        element: 'body',
                        type: 'success',
                        allow_dismiss: true,
                        newest_on_top: true,
                        showProgressbar: false,
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        animate: {
                            enter: 'animated fadeIn',
                            exit: 'animated fadeOutDown'
                        }
                    });

                    initTreeView();
                },
                error: function(data) {
                    var errors = jQuery.parseJSON(data.responseText);
                    console.log(errors);
                    jQuery('button#save-edit-category').button('reset');
                    jQuery.notify({
                        icon: 'fa fa-times',
                        message: errors[0],
                        url: ''
                    },
                    {
                        element: 'body',
                        type: 'danger',
                        allow_dismiss: true,
                        newest_on_top: true,
                        showProgressbar: false,
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        animate: {
                            enter: 'animated fadeIn',
                            exit: 'animated fadeOutDown'
                        }
                    });
                }
            });
        });
    };

    // Initialize the category delete buttons
    var initDeleteCategory = function() {
        var $deleteButton = jQuery('button#delete-category');
        $deleteButton.on('click', function() {
            jQuery.ajax({
                type: 'POST',
                url: 'https://alpha.falconfrag.com/admin/products/categories/' + $deleteButton.attr('data-category-id') + '/delete',
                success: function(data) {
                    jQuery('#category-details').hide();
                    jQuery.notify({
                        icon: 'fa fa-check',
                        message: data.message,
                        url: ''
                    },
                    {
                        element: 'body',
                        type: 'success',
                        allow_dismiss: true,
                        newest_on_top: true,
                        showProgressbar: false,
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        animate: {
                            enter: 'animated fadeIn',
                            exit: 'animated fadeOutDown'
                        }
                    });

                    initTreeView();
                },
                error: function(data) {
                    var errors = jQuery.parseJSON(data.responseText);
                    console.log(errors);
                    jQuery.notify({
                        icon: 'fa fa-times',
                        message: errors[0],
                        url: ''
                    },
                    {
                        element: 'body',
                        type: 'danger',
                        allow_dismiss: true,
                        newest_on_top: true,
                        showProgressbar: false,
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        animate: {
                            enter: 'animated fadeIn',
                            exit: 'animated fadeOutDown'
                        }
                    });
                }
            });
        });
    };

    return {
        init: function() {
            initTreeView();
            ajaxCreateCategory();
            initCreateCategoryValidation();
            initEditCategory();
            initDeleteCategory();
        }
    };
}();

jQuery(function() {
    categoryList.init()
});