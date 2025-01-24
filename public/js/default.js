$(function() {
   $('.bootstrap-tables').bootstrapTable({});

   $('.confirm').on('click', function(e) {
       return confirm('Are you sure?');
   });
});
