$(function() {

  var profilTab = [];

  function tdValues() {
    $('td').each(function() {
      if ($(this).attr('id')) {
        var tdVals = {};
        tdVals.id = $(this).attr('id');
        tdVals.text = $(this).text();
        profilTab.push(tdVals);
      }
    });
  }

  tdValues();

  $('button#addPatient').removeClass('btn-success').addClass('btn-danger').prop('disabled', true);

  $('div.fileName').click(function() {
    var divCliked = $(this);
    $('div.panel').each(function() {
      if (divCliked.attr('id') == $(this).data('patient')) {
        $(this).slideToggle('slow');
      }
    })
  });

  $(document).on('click', 'td', function() {
    if ($(this).attr('id')) {
      var dataType;
      var text;
      if ($(this).attr('id') == 'birthdate') {
        dataType = 'date';
        var frenchDate = $(this).text().split('/');
        text = frenchDate[2] + '-' + frenchDate[1] + '-' + frenchDate[0];
      } else {
        dataType = 'text';
        text = $(this).text();
      }
      $(this).replaceWith($('<input />', {
        type: dataType,
        id: $(this).attr('id'),
        'class': 'formStyle'
      }).val(text));
    }
  });

  $(document).on('blur', 'input.formStyle', function() {
    var objFound = profilTab.find(x => x.id === $(this).attr('id'));

    if ($(this).attr('id') == 'birthdate') {
      var frenchDate = $(this).val().split('-');
      var val = frenchDate[2] + '/' + frenchDate[1] + '/' + frenchDate[0];
    } else {
      var val = $(this).val();
    }
    if (objFound && profilTab[profilTab.indexOf(objFound)].text !== val) {
      $('a#profilBtn').removeClass('bg-primary').addClass('bg-danger').attr('name', 'modify').removeAttr('href').text('Modifier');
    } else {
      $('a#profilBtn').removeClass('bg-danger').addClass('bg-primary').attr('name', 'retour').attr('href', 'liste-patients.html').text('Retour');
    }

    $(this).wrap($('<td/>', {
      id: $(this).attr('id'),
      html: val
    })).remove();
  });

  $('a#profilBtn').click(function() {
    var profilUpdate = {};
    profilUpdate.id = $('p').data('patient');
    profilUpdate.birthdate = $('td#birthdate').text();
    profilUpdate.phone = $('td#phone').text();
    profilUpdate.mail = $('td#mail').text();

    var postUrl = $.param(profilUpdate);
    if ($(this).attr('name') === 'modify') {
      $.ajax({
        type: 'POST',
        url: 'assets/AJAX/profileUpdate.php',
        data: postUrl,
        success: function(response) {
          $('a#profilBtn').removeClass('bg-danger').addClass('bg-primary').attr('name', 'retour').attr('href', 'liste-patients.html').text('Retour');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log('Status :' + textStatus + ' Error:' + errorThrown);
        }
      });
      profilTab = [];
      tdValues();
    }
  });

  $('a.rdvModal').on('click', function() {
    var rdv = $(this).data('rdv');
    $('h5#rdvModalLabel').text('Rendez-vous du ' + rdv.split('-')[2]);
    $('div#rdvModal div.modal-body').text('');

    $.ajax({
      type: 'POST',
      url: 'assets/AJAX/getRdv.php',
      data: 'rdv=' + rdv,
      success: function(response) {
        var responseTab = response.split('/');
        $.each(responseTab, function(i, dateString) {
          var dateTab = dateString.split('-');
          $('div#rdvModal div.modal-body').prepend('<div class="row"><div class="col-4"><a href="profil-patients/patient/'+ dateTab[0] +'.html">' + dateTab[1] + ' ' + dateTab[2] + '</a></div><div class="col-4">' + dateTab[3] + '</div><div class="col-4">' + dateTab[4] + '</div></div>');
        });
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log('Status :' + textStatus + ' Error:' + errorThrown);
      }
    });
  });

});
