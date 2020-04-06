require('./bootstrap')

$(document).ready(function () {
  function checkState(target) {
    var type = target.val()

    if (type === 'update') {
      $updateId.show().find('input').prop('required', true)
    } else {
      $updateId.hide().find('input').prop('required', false)

    }
  }

  $('#table-service').DataTable({
    dom: '<"table-top"if>rt<"table-bottom"lp>',
    paging: false
  })

  $('#update-id select').autoComplete()

  $updateId = $('#update-id')

  checkState($updateId)
  $('#inp-update_status').on('change', function (event) {
    checkState($(event.target))

  })


  // var $updateForm = $('#update-form form')
  // $updateForm.find('.submit-update').on('click', function () {$updateForm.submit()})

})