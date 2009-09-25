// Auto set on page load...
jQuery(document).ready(function() {
    // Uniform
    jQuery('form.uniForm').uniform();

    // Hide all hidden elements
    jQuery('.ctrlHidden').hide();

    // Bind a custom event
    jQuery('.ctrlHolder')
    .live('show', function () {
       var $this = jQuery(this) ;
       var slug = jQuery.trim($this.attr('class').replace('ctrlHolder', '').replace('ctrlHidden', '').replace('multipleInput', ''));

       jQuery ('div.' + slug + ':visible').each(function () {
           $this.find('option[value="' + jQuery(this).find('select').val() + '"]').remove();
       });

       if (jQuery('div.' + slug + ':hidden').length == 1) {
           $this.find('img.rolo_add_ctrl').hide();
       }
    })
    .live('hide', function () {
       var $this = jQuery(this) ;
       var slug = jQuery.trim($this.attr('class').replace('ctrlHolder', '').replace('ctrlHidden', '').replace('multipleInput', ''));

       if (jQuery ('div.' + slug + ':visible').length > 0) {
           jQuery ('div.' + slug + ':visible:last').find('img.rolo_add_ctrl').show();
       }
    });

    // when the add button is clicked
    jQuery('img.rolo_add_ctrl').live('click', function () {
       var $this = jQuery(this) ;
       var slug = jQuery.trim($this.parent('div.ctrlHolder').attr('class').replace('ctrlHolder', '').replace('ctrlHidden', '').replace('multipleInput', ''));

       $this.hide().parents('form.uniForm').find('div.' + slug + ':hidden:first').trigger('show').show();
    });

    // when the delete button is clicked
    jQuery('img.rolo_delete_ctrl').live('click', function () {
       var $this = jQuery(this) ;
       $this.parent('.ctrlHolder').hide().trigger('hide');
    });

//    jQuery('img.rolo_add_ctrl').click(function () {
//       var $this = jQuery(this) ;
//       var slug = "";
//       jQuery.each($this.prevAll('.multipleInput').attr('class').split(' '), function () {
//           if (this != 'multipleInput' && this != 'textInput') {
//               slug = this;
//           }
//       });
//
//       var values = new Array();
//
//       var select_ctrl = "<select>";
//       var img_ctrl = $this.clone(bool);
//
//       var $options = $this.prevAll('select').find('option:not(:selected)');
//       if ($options.length > 0) {
//           jQuery.each($options, function () {
//              values.push(jQuery(this).attr('value'));
//              select_ctrl += '<option value = "' + jQuery(this).attr('value') +'">' + jQuery(this).attr('value') + '</option>';
//           });
//       }
//
//       select_ctrl += '</select>'
//
//       if (values.length > 1) {
//           vimg_ctrl =
//       }
//
//       var name = slug + values[0] + '_rolo_value';
//       var html = '<label for="' + name +'"></label><input type = "text" name = ' + name +' class="textInput " />' + select_ctrl;
//       jQuery(html).appendTo($this.parent('.ctrlHolder'));
//
//    });


});