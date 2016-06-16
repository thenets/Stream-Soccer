var app = angular.module("tyr", []);

/* Main Controller */
app.controller('main', function($scope, $timeout) {
  // Default values
  $scope.console_title = 'Console';
  $scope.console_output = 'Waiting...';


  // Start IDE
  $timeout(function() {
    $scope.n_attributes   = 4;
    $scope.precision      = 90;
    $scope.distance_type  = 'euclidean';

    $.getJSON('./gui/web/core.php?start_ide=1', function(data) {
      editor.getSession().setValue(data.input)
      $scope.$apply();
    });
  }, 2500);


  // analyse()
  $scope.analyse = function(){
    // UI set waiting mode
    $scope.console_title = "Analysing... Please wait...";
    $('#console').addClass('loading');

    // Create data to be sent
    var data = {};
    data.main_data  = editor.getSession().getValue();
    data.n_attributes  = $scope.n_attributes;
    data.precision  = $scope.precision;
    data.distance_type  = $scope.distance_type;

    console.log(data);

    // Send request
    $.ajax({
      type: "POST",
      url: './gui/web/core.php?io=1'+(Math.random()),
      data: data,
      success: function(data) {
        console.log(data)

        $('#console .panel-heading').removeClass('hidden');
        $('#console .panel-footer').removeClass('hidden');
        $('#console').removeClass('loading');

        $scope.console_title = "Finish";
        $scope.console_output = data.console;
        $scope.console_date = data.date;
        $scope.$apply();
      },
      dataType: 'json'
    })
  }

});
