(function(sumula) {
  sumula.AppComponent =
    ng.core.Component({
      selector: 'sumula',
      templateUrl: BASE_URL+'sumula/render_usercard'
    })
    .Class({
      constructor: function() {
      	var context = this;
      	$.getJSON(BASE_URL+'sumula/rest_get_users', function(data){
	        context.people = data;
	    });
      }
    });
})(window.sumula || (window.sumula = {}));