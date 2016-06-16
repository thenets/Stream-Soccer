(function(sumula) {
  document.addEventListener('DOMContentLoaded', function() {
    ng.platformBrowserDynamic.bootstrap(sumula.AppComponent);
  });
})(window.sumula || (window.sumula = {}));