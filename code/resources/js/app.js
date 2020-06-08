require('./bootstrap')

$(document).ready(function () {
  var $updateForm = $('#update-form')
  var $updateId = $('#update-id')
  var $nameTitle = $('#name')
  var $typeInput = $('#inp-update_type')
  var $collectionWrapper = $('#collection-inp')
  var $deliveryWrapper = $('#delivery-inp')

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

  function checkType (target) {
    var type = target.val()
    if (type === 'Business') {
      $collectionWrapper.show()
      $deliveryWrapper.show()
    } else {
      $collectionWrapper.hide()
      $deliveryWrapper.hide()
    }
  }

  var $tables = $('.table-service  table')
  $('.table-service.table-business  table').DataTable({
    response: true,
    dom: '<"table-top"if>rt<"table-bottom"lp>',
    paging: false,
    language: {
      searchPlaceholder: 'Search',
      search: '',
    },
    order: [[2, 'desc'], [3, 'desc']]
  })
  $('.table-service.table-community  table').DataTable({
    response: true,
    dom: '<"table-top"if>rt<"table-bottom"lp>',
    paging: false,
    language: {
      searchPlaceholder: 'Search',
      search: '',
    },
    order: [[2, 'desc']]
  })
  $('#myTabs .nav-item').one('click', function () {
    setTimeout(function () {
      $($.fn.dataTable.tables(true)).DataTable()
        .responsive.recalc()
    }, 200)
  })
  $tables.css('width', '100%')

  $(window).resize(function () {
    $tables.css('width', '100%')
  })

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

  checkType($typeInput)
  $typeInput.on('change', function (event) {
    checkType($(event.target))
  })

  $('.blog .card').on('click', function () {
      document.location.replace($(this).data('link'))
    }
  )

})

