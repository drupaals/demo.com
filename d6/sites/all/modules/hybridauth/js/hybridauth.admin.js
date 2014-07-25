// The following line will prevent a JavaScript error if this file is included and vertical tabs are disabled.
Drupal.verticalTabs = Drupal.verticalTabs || {};

Drupal.verticalTabs.fset_providers = function() {
  var vals = [];
  
  $('fieldset.vertical-tabs-fset_providers label').each(function (index, Element) {
    var label_for = $(this).attr('for');
    if ($('#' + label_for).is(':checked')) {
      vals.push($.trim($(this).text()));
    }
  });
  
  return vals.join(', ');
};

Drupal.verticalTabs.fset_fields = function() {
  var vals = [];

  $('fieldset.vertical-tabs-fset_fields label').each(function (index, Element) {
    var label_for = $(this).attr('for');
    if (label_for && $('#' + label_for).is(':checked')) {
      vals.push($.trim($(this).text()));
    }
  });

  return vals.join(', ');
};

Drupal.verticalTabs.fset_widget = function() {
  var vals = [];

  return vals.join('<br />');
};

Drupal.verticalTabs.fset_account = function() {
  var vals = [];

  $('fieldset.vertical-tabs-fset_account label').each(function (index, Element) {
    var label_for = $(this).attr('for');
    if ((label_for == 'edit-hybridauth-disable-username-change' || label_for == 'edit-hybridauth-remove-password-fields'
      || label_for == 'edit-hybridauth-pictures' || label_for == 'edit-hybridauth-override-realname'
      || label_for == 'edit-hybridauth-registration-username-change') && $('#' + label_for).is(':checked')) {
      vals.push($.trim($(this).text()));
    }
    var label, value;
    if (label_for == 'edit-hybridauth-email-verification-0' || label_for == 'edit-hybridauth-register-0') {
      label = '<span style="font-weight:bold;">' + $.trim($(this).parent().parent().parent().children('label').text()) + '</span>';
      $(this).parent().parent().parent().children('div.form-radios').find('label').each(function(index, Element) {
        var label_for = $(this).attr('for');
        if ($('#' + label_for).is(':checked')) {
          value = $.trim($(this).text());
        }
      });
      vals.push(label + ' ' + value);
    }
  });

  return vals.join('<br />');
};

Drupal.verticalTabs.fset_other = function() {
  var vals = [];

  var value = $('#edit-hybridauth-destination').attr('value');
  var label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-destination"]').text()) + '</span>';
  if (value) {
    vals.push(label + ': ' + value);
  }
  else {
    vals.push(label + ' ' + 'return to the same page');
  }

  label = '<span style="font-weight:bold;">' + $.trim($('#edit-hybridauth-forms-user-login-wrapper').parent().parent().children('label').text()) + '</span>';
  var list = [];
  $('#edit-hybridauth-forms-user-login-wrapper').parent().find('label').each(function(index, Element) {
    var label_for = $(this).attr('for');
    if ($('#' + label_for).is(':checked')) {
      list.push($.trim($(this).text()));
    }
  });
  vals.push(label + ' ' + list.join(', '));

  /*label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-duplicate-emails"]').text()) + '</span>';
  list = [];
  $('#edit-hybridauth-duplicate-emails').find('label').each(function(index, Element) {
    var label_for = $(this).attr('for');
    if ($('#' + label_for).is(':checked')) {
      list.push($.trim($(this).text()));
    }
  });
  vals.push(label + ': ' + list.join(', '));*/

  label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-debug"]').text()) + '</span>';
  if ($('#edit-hybridauth-debug').is(':checked')) {
    vals.push(label + ': ' + 'Enabled');
  }
  else {
    vals.push(label + ': ' + 'Disabled');
  }

  return vals.join('<br />');
};

/*$('#edit-fset-widget', context).drupalSetSummary(function(context) {
    var vals = [];
    
    var value = $('#edit-hybridauth-widget-title', context).attr('value');
    var label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-widget-title"]', context).text()) + '</span>';
    if (value) {
      vals.push(label + ': ' + value);
    }
    else {
      vals.push(label + ': ' + 'None');
    }
    
    var widget_type;
    label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-widget-type"]', context).text()) + '</span>';
    var list = [];
    $('#edit-hybridauth-widget-type', context).find('label').each(function(index, Element) {
      var label_for = $(this).attr('for');
      if ($('#' + label_for).is(':checked')) {
        list.push($.trim($(this).text()));
        widget_type = $('#' + label_for).val();
      }
    });
    vals.push(label + ': ' + list.join(', '));
    
    if (widget_type == 'link') {
      value = $('#edit-hybridauth-widget-link-text', context).attr('value');
      label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-widget-link-text"]', context).text()) + '</span>';
      if (value) {
        vals.push(label + ': ' + value);
      }
      else {
        vals.push(label + ': ' + 'None');
      }
    }
    
    if (widget_type == 'link' || widget_type == 'button') {
      value = $('#edit-hybridauth-widget-link-title', context).attr('value');
      label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-widget-link-title"]', context).text()) + '</span>';
      if (value) {
        vals.push(label + ': ' + value);
      }
      else {
        vals.push(label + ': ' + 'None');
      }
    }
    
    label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-widget-icon-pack"]', context).text()) + '</span>';
    value = $('#edit-hybridauth-widget-icon-pack', context).find('option:selected').text();
    vals.push(label + ': ' + value);
    
    label = '<span style="font-weight:bold;">' + $.trim($('label[for="edit-hybridauth-widget-weight"]', context).text()) + '</span>';
    value = $('#edit-hybridauth-widget-weight', context).find('option:selected').text();
    vals.push(label + ': ' + value);
    
    return vals.join('<br />');
  });*/
