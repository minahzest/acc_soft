// Generated by CoffeeScript 1.9.3
(function() {
  $(function() {
    $(document).on("click touchend", ".gridly .brick", function(event) {
      var $this, size;
      event.preventDefault();
      event.stopPropagation();
      $this = $(this);
      $this.data('width', size);
      $this.data('height', size);
      return $('.gridly').gridly('layout');
    });
    return $('.gridly').gridly();
  });

}).call(this);
