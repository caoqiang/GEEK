var mainApp = angular.module('mainModule', ['ngRoute', 'ngCookies', 'ui.bootstrap']);
//路由
mainApp.config(['$routeProvider', '$httpProvider',
	function($routeProvider, $httpProvider) {
		$routeProvider
		//新添加的手机搜索
			.when('/phoneaccountsearch', {
				templateUrl: 'html/phoneaccount.html',
				controller: 'phoneaccountController'
			})
			.otherwise({
				redirectTo: '/phoneaccountsearch'
			});
		$httpProvider.interceptors.push('authInterceptor');
	}
]);
url = "http://121.43.110.33:8080/api/flow-count"//测试
//url = "http://115.29.172.215:8080/api/flow-count"//生产
//url="http://192.168.3.6:8080/api/flow-count"//开发
mainApp.factory('authInterceptor', function($rootScope, $q, $cookieStore) {
	return {
		request: function(config) {
			config.headers = config.headers || {};
			config.headers.Authorization = localStorage.token;
			return config;
		},
		response: function(response) {
			if (response.status === 401) {}
			return response || $q.when(response);
		}
	};
});
//左侧菜单栏
mainApp.controller('leftmenuController', function($scope, $http) {
		$http.get("json/menu001.json").success(function(response) {
			//  $http.get(url+"/menu").success(function(response){	
			$scope.items = response.items;
		}).error(function() {
			alert("网络忙，请稍后再试！");
		});
	})
	//小屏时上侧菜单栏
mainApp.controller('topmenuController', function($scope, $http) {
		$http.get("json/menu001.json").success(function(response) {
			//	$http.get(url+"/menu").success(function(response){
			$scope.item = response.items;
		}).error(function() {
			alert("网络忙，请稍后再试！");
		});
	})
	//手机搜索
mainApp.controller('phoneaccountController', function($scope, $http, $timeout) {	
	//时间输入
	$scope.init = function() {
		       var maxdate = new Date();
		        $scope.startTime=maxdate;
		       $scope.endTime=maxdate;		       
    			$scope.maxDate= maxdate;
    			var mindate = new Date().setDate(maxdate.getDate() - 30)
    					$scope.minDate= mindate;
	};
	$scope.disabled = function(date, mode) {
		return false;
	};
	$scope.openstartTime = function() {
		$timeout(function() {
			$scope.startopened = true;
		});
	};
	$scope.openendTime = function() {
		$timeout(function() {
			$scope.endopened = true;
		});
	}
	$scope.dateOptions = {
		'year-format': "'yyyy'",
		'starting-day': 1
	};
	$scope.format = 'yyyy-MM-dd';
	//$scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'yyyy-MM-dd','shortDate'];
	//搜索
	clearNonumber = function(tThis) { //过滤数字
		var num = tThis.value;
		tThis.value = num.replace(/\D/g, "");
	}
	phoneNumber.onfocus = function() { //绑定获取焦点事件
		clearNonumber(this);
	}
	phoneNumber.onkeyup = function() { //绑定键盘事件
		clearNonumber(this);
	}
	phoneNumber.onblur = function() { //失去焦点事件
		clearNonumber(this);
	}
	    
	$scope.Search = function() {
		var Mobnum = $scope.accountnumber; //获取的号码	
		var Starttime = $scope.startTime; //开始时间
		var Endtime = $scope.endTime; //终止时间
		var page = 1;
		if ((Mobnum != null || Mobnum == null) && ((Starttime != null && Endtime != null) && (Starttime <= Endtime))) {
			searchttp(page,Mobnum,Starttime,Endtime);
		} else if(Starttime == null && Endtime == null){
			searchttp(page,Mobnum);
		}
		else {
			alert("输入时间有误！");
		}
		
		$scope.enterSearchAcc1=function($event){
		if ($event.keyCode == 13){
			$scope.Search();
        }
	};
		////	分页栏		
		//上一頁
		$scope.prev = function() {
			page = $scope.currentPage - 1;
			searchttp(page,Mobnum,Starttime,Endtime);
		};
		//下一頁
		$scope.next = function() {
			page = $scope.currentPage + 1;
			searchttp(page,Mobnum,Starttime,Endtime);
		};
		////选定页数
	$scope.enterSearchAcc2=function($event){
		if ($event.keyCode == 13){
			$scope.confirm();
        }
	};
		$scope.confirm = function() {
			if($scope.pageNo!=null && $scope.pageNo<=$scope.totalPage && $scope.pageNo>0 )
			{
				page = $scope.pageNo;
			    searchttp(page,Mobnum,Starttime,Endtime);
			}else{
				alert("请输入正确页数！")
			}
			
		}
//数据接口
		function searchttp(page,Mobnum,Starttime,Endtime) {
			$http.post(url, {
					"mobnum": Mobnum,
					"starttime": Starttime,
					"endtime": Endtime,
					"page": page
				})
				.success(function(response) {
					$scope.accounts = response.datas;
					$scope.totalPage = response.pagetotle;
					$scope.currentPage = response.page;

				}).error(function() {
			alert("网络忙，请稍后再试！");
		});
	}

	}

});