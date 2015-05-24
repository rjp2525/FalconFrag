(function() {
  $(document).ready(function() {
    var loading;
    loading = $('body').find('.page-loading-overlay');
    if (loading.length) {
      $(window).load(function() {
        loading.addClass('loaded');
      });
    }
    window.onerror = function() {
      loading.addClass('loaded');
    };
  });

}).call(this);

//# sourceMappingURL=core.js.map