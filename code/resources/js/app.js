require('./bootstrap')

$(document).ready(function () {
  function checkState (target) {
    var type = target.val()

    if (type === 'update') {
      $updateId.show().find('input').prop('required', true)

      $nameTitle.removeClass('required').find('label').html('Business Name Update (if any)')
      $nameTitle.find('input').prop('required', false)
    } else {
      $updateId.hide().find('input').prop('required', false)

      $nameTitle.addClass('required').find('label').html('Business Name')
      $nameTitle.find('input').prop('required', true)
    }
  }

  var $table = $('#table-service')
  $table.DataTable({
    response: true,
    dom: '<"table-top"if>rt<"table-bottom"lp>',
    paging: false,
    language: {
      searchPlaceholder: 'Search',
      search: '',
    },
    order: [[2, 'desc'], [3, 'desc']]
  })
  $table.css('width', '100%')

  $(window).resize(function () {
    $table.css('width', '100%')
  })

  $(window).resize(function () {
    $('#log').append('<div>Handler for .resize() called.</div>')
  })

  var $updateForm = $('#update-form')
  var $updateId = $('#update-id')
  var $nameTitle = $('#name')

  $('#update-id select').autoComplete()

  $updateId.on('autocomplete.select', function (event, item) {
    $.ajax({
      url: 'statuses/id?q=' + item.value,
    }).done(function (result) {
      $updateForm.find('#inp-name').val(result.name)
      $updateForm.find('#inp-status').val(result.status)
      $updateForm.find('#inp-category').val(result.category_id)
      $updateForm.find('#inp-delivery').prop('checked', result.delivery)
      $updateForm.find('#inp-service_offered').prop('checked', result.service_offered)
      $updateForm.find('#inp-phone').val(result.phone)
      $updateForm.find('#inp-link').val(result.link)
      $updateForm.find('#inp-notes').val(result.notes)
    })
  })

  checkState($updateId)
  $('#inp-update_status').on('change', function (event) {
    checkState($(event.target))

  })

  $('.blog .card').on('click', function () {
      document.location.replace($(this).data('link'))
    }
  )

})

