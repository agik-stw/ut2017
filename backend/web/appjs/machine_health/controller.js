Machine_health.controller('controller_machine_health', ['$scope', function($scope){
	//add data
	$scope.add=function(){
		
	},


//btn refresh
	$scope.btn_refresh=function(){
refresh();
	},

	$scope.select_date=[
	{value:'all_date',text:'All Date'},
	{value:'receive_date',text:'Receive Date'},
	{value:'sample_date',text:'Sample Date'},
	{value:'report_date',text:'Report Date'},
	]
}]);