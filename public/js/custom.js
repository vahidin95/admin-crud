<script type="text/javascript">
    $.('.courses').selectpicker().val( (( json_encode($student->courses()->allRelatedIds())  ))  ).triger('change');
</script>
