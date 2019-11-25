<script>
$('#edit').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)

  var title = button.data('title')
  var description = button.data('description')
  var category_id = button.data('category_id')

  var modal = $(this)

  modal.find('.modal-body #title').val(title)
  modal.find('.modal-body #description').val(description)
  modal.find('.modal-body #category_id').val(category_id)
})

// EDIT Course
$('#edit-course').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)

  var course_name = button.data('course_name')
  var course_name_id = button.data('course_name_id')

  var modal = $(this)

  modal.find('.modal-body #course_name').val(course_name)
  modal.find('.modal-body #course_name_id').val(course_name_id)
})


$('#delete').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)
  var category_id = button.data('category_id')

  var modal = $(this)

  modal.find('.modal-body #category_id').val(category_id)
})

  $('#delete_car').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)
  var car_id = button.data('car_id')

  var modal = $(this)

  modal.find('.modal-body #car_id').val(car_id)
})
</script>

<script type="text/javascript">

$(document).ready(function() {
    $('.courses').select2();
});

</script>
