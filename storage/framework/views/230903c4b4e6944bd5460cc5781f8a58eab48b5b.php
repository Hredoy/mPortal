  <script>
    $(document).ready(function(){
      $('.switch').click(function(){
        $(this).toggleClass('checked');
        $('input[name="status"]').not(':checked').prop("checked", true);
      });
    });
  </script><?php /**PATH C:\xampp\htdocs\projects\pro-4\mPortal\resources\views/scripts/toggleStatus.blade.php ENDPATH**/ ?>