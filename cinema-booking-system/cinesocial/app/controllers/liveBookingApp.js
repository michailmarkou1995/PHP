var bookingUpdateView = angular.module('liveBookingApp', ['ngSanitize']);
bookingUpdateView.controller('liveBookingController', ['$scope', '$http', '$q', function ($scope, $http, $q) {
    $scope.isAvailable = false;
    $scope.movieTitle = "";
    $scope.isPressed = false;
    $scope.then = false;
    $scope.error = false;
    $scope.list_TN_1;
    $scope.list_HN_2;
    $scope.list_D_3;
    $scope.list_HT_4;
    $scope.list_TP_5;
    $scope.list_S_6 = [];
    $scope.indexSeatsSub = [];
    $scope.list_css = [];
    $scope.times_seats_call;
    $scope.listName;
    $scope.listHall;
    $scope.listDate;
    $scope.listHallType;
    $scope.listTimePlay;
    $scope.listSeats;
    $scope.arraySeats;
    $scope.keepcountcss = 0;
    $scope.totalCount = 1;
    $scope.total;
    $scope.rerun = true;
    $scope.generalTheatre = false;
    $scope.generalHall = false;
    $scope.generalHallType = false;
    $scope.generalDate = false;
    $scope.generalTime = false;
    $scope.promise;
    $scope.promise1;

    $scope.isNotScheduled = function () {
        $scope.isAvailable = false;
        $http({
            method: "POST",
            url: "../models/fetch_data_booking_view_available.php",
            data: { 'movie_name': $scope.movieTitle }
        }).then(function (response) {
            $scope.isAvailable = response.data.isAvailable;
        })
    };

    $scope.fetchData = function () {
        $http({
            method: "POST",
            url: "../models/fetch_data_booking_view.php",
            data: { 'movie_name': $scope.movieTitle }
        }).then(function onSuccess(response) {
            $scope.list_D_3 = response.data;
        }).catch(function onError(response) { })
            .finally(function () { })
    }

    $scope.promise = function (i) {
        return $http({
            method: "POST",
            url: "../models/fetch_data_booking_view_seats_available.php",
            data: { 'movie_name': $scope.movieTitle, 'theatre_n': $scope.list_HT_4[i].theatre_name_fk, 'hall_name_n': $scope.list_HT_4[i].hall_name_fk, 'date_play_n': $scope.list_HT_4[i].date_play_fk, 'hall_type_n': $scope.list_HT_4[i].hall_type_fk, 'time_play_n': $scope.list_HT_4[i].time_play }
        })
    }

    $scope.promise1 = function (i) {

        return $http({
            method: "POST",
            url: "../models/fetch_data_booking_view_seats.php",
            data: { 'movie_name': $scope.movieTitle, 'theatre_n': $scope.list_HT_4[i].theatre_name_fk, 'hall_name_n': $scope.list_HT_4[i].hall_name_fk, 'date_play_n': $scope.list_HT_4[i].date_play_fk, 'hall_type_n': $scope.list_HT_4[i].hall_type_fk, 'time_play_n': $scope.list_HT_4[i].time_play }
        })
    }

    $scope.updateDate = function (id) {
        var length = Object.keys($scope.list_D_3).length - 1;
        var isCheck_D_TP = 0;
        $scope.listDate = id.date_play_fk;

        for (i = 0; i <= length; i++) {
            if (id.date_play_fk == $scope.list_D_3[i].date_play_fk && isCheck_D_TP == false) {
                $http({
                    method: "POST",
                    url: "../models/fetch_data_booking_view_time_play_D.php",
                    data: { 'movie_name': $scope.movieTitle, 'date_play': $scope.list_D_3[i].date_play_fk }
                }).then(function (response) {
                    isCheck_D_TP = true;
                    $scope.list_TP_5 = response.data;
                    $scope.listTimePlay = "";
                    $scope.listHall = "";
                    $scope.listHallType = "";
                    $scope.listName = "";
                    $scope.listSeats = [];
                    $scope.list_TN_1 = [];
                    $scope.list_HN_2 = [];
                    $scope.list_HT_4 = [];
                    $scope.list_S_6 = [];
                    $scope.list_css = [];
                })
            }
        }
        if ($scope.listDate != '') { $scope.generalDate = true; }
        else { $scope.generalDate = false; }
    }

    $scope.updateTheatre = function (id) {
        var length = Object.keys($scope.list_TN_1).length - 1;
        var isCheck_TN_TN = 0;
        $scope.listName = id.theatre_name_fk;

        for (i = 0; i <= length; i++) {
            if (id.theatre_name_fk == $scope.list_TN_1[i].theatre_name_fk && isCheck_TN_TN == false) {
                $http({
                    method: "POST",
                    url: "../models/fetch_data_booking_view_TN_HN.php",
                    data: { 'movie_name': $scope.movieTitle, 'date_play': $scope.list_TN_1[i].date_play_fk, 'time_play': $scope.list_TN_1[i].time_play, 'theatre_name': $scope.list_TN_1[i].theatre_name_fk }
                }).then(function (response) {
                    isCheck_TN_TN = true;
                    $scope.list_HN_2 = response.data;
                    $scope.listHall = "";
                    $scope.listHallType = "";
                    $scope.listSeats = [];
                    $scope.list_HT_4 = [];
                    $scope.list_S_6 = [];
                    $scope.list_css = [];
                })
            }
        }

        if ($scope.listName != '') { $scope.generalTheatre = true; }
        else { $scope.generalTheatre = false; }
    }

    $scope.updateHall = function (id) {
        var length = Object.keys($scope.list_HN_2).length - 1;
        var isCheck_HN_HT = 0;
        $scope.listHall = id.hall_name_fk;

        for (i = 0; i <= length; i++) {
            if (id.hall_name_fk == $scope.list_HN_2[i].hall_name_fk && isCheck_HN_HT == false) {
                $http({
                    method: "POST",
                    url: "../models/fetch_data_booking_view_HN_HT.php",
                    data: { 'movie_name': $scope.movieTitle, 'date_play': $scope.list_HN_2[i].date_play_fk, 'time_play': $scope.list_HN_2[i].time_play, 'theatre_name': $scope.list_HN_2[i].theatre_name_fk, 'hall_name': $scope.list_HN_2[i].hall_name_fk }
                }).then(function (response) {
                    isCheck_HN_HT = true;
                    $scope.list_HT_4 = response.data;
                    $scope.listHallType = "";
                    $scope.listSeats = [];
                    $scope.list_S_6 = [];
                    $scope.list_css = []; //-re render ISSUE SOLVER of CSS positions selection + numbering
                })
            }
        }
        if ($scope.listHall != '') { $scope.generalHall = true; }
        else { $scope.generalHall = false; }
    }

    $scope.updateHallType = function (id) {
        var length = Object.keys($scope.list_HT_4).length - 1;
        var isCheck_HT_seats = 0;
        $scope.listHallType = id.hall_type_fk;
        if ($scope.listName != '') { $scope.generalTheatre = true; }
        else { $scope.generalTheatre = false; }
        if ($scope.listHall != '') { $scope.generalHall = true; }
        else { $scope.generalHall = false; }
        if ($scope.listHallType != '') { $scope.generalHallType = true; }
        else { $scope.generalHallType = false; }
        if ($scope.listDate != '') { $scope.generalDate = true; }
        else { $scope.generalDate = false; }
        if ($scope.listTimePlay != '') { $scope.generalTime = true; }
        else { $scope.generalTime = false; }

        if ($scope.generalTheatre && $scope.generalHall && $scope.generalHallType && $scope.generalDate && $scope.generalTime) {
            for (i = 0; i <= length; i++) {
                if ($scope.listHallType == $scope.list_HT_4[i].hall_type_fk && $scope.listHall == $scope.list_HT_4[i].hall_name_fk && $scope.listDate == $scope.list_HT_4[i].date_play_fk && $scope.listName == $scope.list_HT_4[i].theatre_name_fk && $scope.listTimePlay == $scope.list_HT_4[i].time_play && isCheck_HT_seats == false) {
                    $q.all([$scope.promise(i), $scope.promise1(i)]).then(function (responses) {

                        //promise
                        $scope.SeatsSub = [];
                        $scope.SeatsSub = responses.map((resp) => resp.data);
                        $scope.indexSeatsSub = [];
                        for (i = 0; i < $scope.SeatsSub[0].length; i++) {//if no result DONT run
                            $scope.indexSeatsSub.push(parseInt($scope.SeatsSub[0][i].seatP));
                        }
                        //promise 1
                        $scope.list_css = [];
                        $scope.arraySeats = [];
                        $scope.arraySeats = responses.map((resp) => resp.data);
                        $scope.list_S_6 = [];
                        for (i = 1; i <= $scope.arraySeats[1][0].seatsAvailable; i++) {
                            $scope.list_S_6.push(i);
                        }
                        $scope.times_seats_call = Math.ceil($scope.arraySeats[1][0].seatsAvailable / 8);
                        $scope.rerun = true;
                        for (i = 1; i <= $scope.times_seats_call; i++) {
                            $scope.list_css.push(i);
                        }
                        $scope.list_S_6 = $scope.list_S_6
                            .filter(x => !$scope.indexSeatsSub.includes(x))
                            .concat($scope.indexSeatsSub.filter(x => !$scope.list_S_6.includes(x)))
                    })
                }
            }
        }
    }



    $scope.updateTimePlay = function (id) {
        var length = Object.keys($scope.list_TP_5).length - 1;
        var isCheck_T_TN = 0;
        $scope.listTimePlay = id.time_play;

        for (i = 0; i <= length; i++) {
            if (id.time_play == $scope.list_TP_5[i].time_play && isCheck_T_TN == false) {
                $http({
                    method: "POST",
                    url: "../models/fetch_data_booking_view_TN_T.php",
                    data: { 'movie_name': $scope.movieTitle, 'date_play': $scope.list_TP_5[i].date_play_fk, 'time_play': $scope.list_TP_5[i].time_play }
                }).then(function (response) {
                    isCheck_T_TN = true;
                    $scope.list_TN_1 = response.data;
                    $scope.listName = "";
                    $scope.listHall = "";
                    $scope.listHallType = "";
                    $scope.listName = "";
                    $scope.listSeats = [];
                    $scope.list_HT_4 = [];
                    $scope.list_HN_2 = [];
                    $scope.list_S_6 = [];
                    $scope.list_css = [];
                })
            }
        }
        if ($scope.listTimePlay != '') { $scope.generalTime = true; }
        else { $scope.generalTime = false; }
    }

    $scope.updateSeats = function (id) {
        $scope.listSeats = id;
    }

    $scope.submitBookForm = function (first_name, last_name, phone_number) {
        $scope.submit_button = 'Insert';
        $http({
            method: "POST",
            url: "../models/insert_Book_Client.php",
            data: { 'movie_name': $scope.movieTitle, 'first_name': first_name, 'last_name': last_name, 'phone_number': phone_number, 'account': $scope.emailUser, 'theatre': $scope.listName, 'hall_type': $scope.listHall, 'date': $scope.listDate, 'booking_type': $scope.listHallType, 'time': $scope.listTimePlay, 'seatp': $scope.listSeats, 'action': $scope.submit_button }
        }).then(function (response) {
            if (response.data.error != '' && response.data.alertB != '') {
                alert(response.data.alertB);
                $scope.success = false;
                $scope.error = true;
                $scope.errorMessage = response.data.error;
            }
            else if (response.data.alertB != '') {
                alert(response.data.alertB);
                $scope.success = true;
                $scope.error = false;
                $scope.form_data = {};
                location.reload();
                return false;
            }
            else {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = response.data.message;
                $scope.form_data = {};
                location.reload();
                return false;
            }
        }).catch(function onError(response) { });
    }
    $scope.updateSeatsCss = function (id) {

    }

    $scope.checked = function (id) {
        if (id > $scope.arraySeats[1][0].seatsAvailable) { return 'seat occupied'; }
        if ($scope.listSeats != '' && parseInt(id) == parseInt($scope.listSeats)) {
            return 'seat selected';
        }
        return 'seat';
    }

    $scope.isRes = function (id) {
        $scope.total = 1;
        $scope.total = $scope.keepcountcss + 1;
        for (i = 0; i < $scope.indexSeatsSub.length; i++) {
            if (id == $scope.indexSeatsSub[i]) {
                return true;
            }
        }
        return false;
    }
    $scope.keepSeats = function (id) {
        for (i = 0; i < $scope.arraySeats[1][0].seatsAvailable; i++) {
            $scope.keepcountcss += id;
            return $scope.keepcountcss.toString();
        }
    }
    $scope.countInit = function () {
        if ($scope.rerun == true) {
            $scope.totalCount = 1;
            $scope.number = 1;
        }
        $scope.rerun = false;
        return $scope.totalCount++;
    }

}]);