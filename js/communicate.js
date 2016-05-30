/**
 * Created by AshBringer on 2015/5/24.
 */
var myAppController = angular.module("myCommunication",[]);
myAppController.controller('communicateController', function($scope,$http) {
    $scope.showAddPost = false;
    $scope.pageName = "postIndex";
    $scope.toPostIndex = function() {
        $scope.pageName = "postIndex";
    };
    $scope.addPostView = function() {
        $scope.showAddPost = !$scope.showAddPost;
    };
    $scope.addPost = function(category,title) {//添加帖子
        if ($(".usernum").val().length == 9) {   //长度判断 
            if (category && title) {
                var addPostPath = "communicate/addPost.php?posttitle=" + title + "&postcategory=" + category + "&host=" + $(".usernum").val();
                $http.get(addPostPath).success(function(data) {
                    $scope.pageName = "postDetail";
                    reload(data[0].postid,data[0].postname);
                    $scope.showAddPost = !$scope.showAddPost;
                });
            }
        } else {
            alert("发帖需要登录，请登录后重新尝试！");
        }
    };
    $scope.searchPost = function(keyWord) {//搜索帖子
        $scope.pageName = "postIndex";
        var keyWords = keyWord ? keyWord : "";
        
        var searchInterface = "communicate/searchPostList.php?keywords=" + keyWords;
        $http.get(searchInterface).success(function(data) {
        	 
            $scope.postList = data;
          
            for (var i = 0;i < data.length;i++) {
                data[i].timetrans = data[i].time.substr(0,4) +"年"+ data[i].time.substr(4,2) +"月"+ data[i].time.substr(6,2) +"日";
            }
        })
    };
    (function() {//闭包自运行 显示最新帖子列表
        $http.get("communicate/postList.php").success(function(data) {
        	data.sort(function (a,b){
					return b.time-a.time;
					});
            $scope.postList = data;
          
            for (var i = 0;i < data.length;i++) {
                data[i].timetrans = data[i].time.substr(0,4) +"年"+ data[i].time.substr(4,2) +"月"+ data[i].time.substr(6,2) +"日";
            }
        });
    })();
    function reload(postid,posttitle) {//重新加载当前帖的更新
        if (posttitle) {
            $scope.postTitle = posttitle;
        }
        var commentPath = "communicate/commentList.php?postid=" + postid;
        $http.get(commentPath).success(function(data) {
            $scope.commentList = data;
            for (var i = 0;i < data.length;i++) {
                data[i].timetrans = data[i].time.substr(0,4) +"年"+ data[i].time.substr(4,2) +"月"+ data[i].time.substr(6,2) +"日 " + data[i].time.substr(8,2) + ":" + data[i].time.substr(10,2) + ":" + data[i].time.substr(12,2);
            }
        });
        var atCommentPath = "communicate/atCommentList.php?postid=" + $scope.clickPostId;
        $http.get(atCommentPath).success(function(data){
            $scope.atCommentList = data;
            for (var i = 0;i < data.length;i++) {
                data[i].timetrans = data[i].time.substr(0,4) +"年"+ data[i].time.substr(4,2) +"月"+ data[i].time.substr(6,2) +"日 " + data[i].time.substr(8,2) + ":" + data[i].time.substr(10,2) + ":" + data[i].time.substr(12,2);
            }
        });
    }
    $scope.postDetail = function(index) {//帖子详情
        $scope.pageName = "postDetail";
        $scope.postTitle = $scope.postList[index].postname;
        $scope.clickPostId = $scope.postList[index].postid;
        reload($scope.clickPostId);
    };
    $scope.editResponse = function(index) {
        $scope.rowSelect = index;

    };
    $scope.response = function(index,commentContent) {//回复帖子
        if ($(".usernum").val().length == 9) {
            if (commentContent) {
                var atinfor = $scope.commentList[index] ? "atinfor=" + $scope.commentList[index].time + $scope.commentList[index].usernum + "&" : "";
                var content = "commentcontent=" + commentContent + "&";
                var usernum = "usernum=" + $(".usernum").val() + "&";
                var postid = "postid=" + $scope.clickPostId;
                var submitPath = "communicate/submitResponse.php?" + atinfor + content + usernum + postid;
                $http.get(submitPath).success(function() {
                    $scope.rowSelect = -1;
                    reload($scope.clickPostId);
                    $(".commentTextarea").val("");
                })
            }else {
                alert("评论不能为空！请重新输入!");
            }
        } else {
            alert("您还没有登录，请先登录再发表评论！");
        }
    };
});
