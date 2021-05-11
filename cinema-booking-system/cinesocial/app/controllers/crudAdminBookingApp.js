var crudBookingApp = angular.module('crudBookingApp', ['datatables']);
crudBookingApp.controller('crudBookingController', ['$scope', '$q', 'DTOptionsBuilder', '$http', function ($scope, $q, DTOptionsBuilder, $http) {
    $scope.showOld = false;
    $scope.date_play = [];
    $scope.time_play = [];
    $scope.theatre_play = [];
    $scope.theatre_name = [];
    $scope.hall_name_play = [];
    $scope.accountText;
    $scope.listName_hall;
    $scope.hall_name_theatre = [];
    $scope.booking_type_Hall = [];
    $scope.listName_hall_type;
    $scope.listName_S = [];
    $scope.arraySeats = [];
    $scope.listName_S_selected;
    $scope.generalTheatre = false;
    $scope.generalHall = false;
    $scope.generalHallType = false;
    $scope.generalDate = false;
    $scope.generalTime = false;
    $scope.generalMovie = false;
    $scope.promise;
    $scope.promise1;
    $scope.indexSeatsSub = [];
    $scope.SeatsSub = [];
    $scope.allowsub = false;
    $scope.allowsubseat = false;
    $scope.success = false;
    $scope.error = false;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withOption('stateSave', true)
        //.withPaginationType("simple_numbers")
        //.withDisplayLength(25)
        .withOption("retrieve", true)
        .withOption('order', [0, 'desc']);

    $scope.fetchData = function () {
        $http.get('../../models/fetch_data_bookings.php').then(function (response) {
            $scope.namesData = response.data;
        });
    };
    $scope.openModal = function () {
        var modal_popup = angular.element('#crudmodal');
        modal_popup.modal('show');
    };

    $scope.closeModal = function () {
        var modal_popup = angular.element('#crudmodal');
        modal_popup.modal('hide');
    };

    $scope.openModal1 = function () {
        var modal_popup = angular.element('#crudmodal1');
        modal_popup.modal('show');
    };

    $scope.closeModal1 = function () {
        var modal_popup = angular.element('#crudmodal1');
        modal_popup.modal('hide');
    };

    $scope.addData = function () {
        $http({
            method: "POST",
            url: "../../models/insert_bookings.php",
            data: {
                'action': 'pre_add_Data'
            }
        })
            .then(function (response) {
                $scope.show_Old = false;
                $scope.movie_name = {};
                $scope.movie_name = response.data['movies_l'];
                $scope.theatre_name = {};
                $scope.rest_info_movie = response.data['rest_info_movie'];
                $scope.rest_info_time = response.data['rest_info_time'];
                $scope.rest_info_general = response.data['rest_info_general'];
                $scope.modalTitle = 'Add Data';
                $scope.submit_button = 'Insert';
                $scope.openModal();
            })
    };

    $scope.submitForm = function () {

        $http({
            method: "POST",
            url: "../../models/insert_bookings.php",
            data: {
                'first_name': $scope.first_name,
                'last_name': $scope.last_name,
                'movie_name': $scope.listName_movie,
                'theatre': $scope.listName_theatre,
                'hall_type': $scope.listName_hall,
                'booking_type': $scope.listName_hall_type,
                'date': $scope.listName_date,
                'time': $scope.listName_Time,
                'seatp': $scope.seatp,
                'phone_number': $scope.phone_number,
                'account': $scope.account,
                'action': $scope.submit_button,
                'id': $scope.hidden_id
            }
        }).then(function (response) {
            if (response.data.error != '') {
                $scope.success = false;
                $scope.error = true;
                $scope.errorMessage = response.data.error;
            } else {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = response.data.message;
                $scope.form_data = {};
                $scope.closeModal();
                $scope.fetchData();
            }
        })
    };
    $scope.fetchSingleData = function (bookingID) {
        $http({
            method: "POST",
            url: "../../models/insert_bookings.php",
            data: {
                'id': bookingID,
                'action': 'fetch_single_data'
            }
        }).then(function (response) {
            $scope.movie_name = [];
            $scope.theatre_name = [];
            $scope.first_name = response.data.first_name;
            $scope.last_name = response.data.last_name;
            $scope.show_Old = true;
            $scope.old_movie = response.data.movie_name;
            $scope.movie_name = {};
            $scope.movie_name = response.data['movies_l'];
            $scope.theatre_name = {};
            $scope.rest_info_movie = response.data['rest_info_movie'];
            $scope.rest_info_general = response.data['rest_info_general'];
            $scope.old_theatre = response.data.theatre;
            $scope.old_hall_type = response.data.hall_type;
            $scope.old_booking_type = response.data.booking_type;
            $scope.old_date = response.data.date;
            $scope.old_time = response.data.time;
            $scope.old_seatp = response.data.seatp;
            $scope.phone_number = response.data.phone_number;
            $scope.account = response.data.account;
            $scope.hidden_id = bookingID;
            $scope.modalTitle = 'Edit Data';
            $scope.submit_button = 'Edit';
            $scope.openModal1();
        });
    };

    $scope.deleteData = function (bookingID) {
        if (confirm("Are you sure you want to remove it?")) {
            $http({
                method: "POST",
                url: "../../models/insert_bookings.php",
                data: {
                    'id': bookingID,
                    'action': 'Delete'
                }
            }).then(function (response) {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = response.data['message'];
                $scope.fetchData();
            });
        }
    };

    $scope.updateMovie = function (id) {
        var length = Object.keys($scope.rest_info_movie).length - 1;
        var isCheck_M_D = 0;
        $scope.date_play = []; //initiates array for pushing

        $scope.listName_movie = id; //get selected movie Name
        for (i = 0; i <= length; i++) {
            if (id == $scope.rest_info_movie[i][0].movie_play_fk && isCheck_M_D == false) {
                $http({
                    method: "POST",
                    url: "../../models/insert_bookings.php",
                    data: {
                        'movie_name': id,
                        'action': 'movie_based'
                    }
                }).then(function (response) {
                    isCheck_M_D = true;
                    for (k = 0; k < response.data.length; k++) {
                        $scope.date_play.push([response.data[k].date_play_fk]);
                    }


                    $scope.time_play = [];
                    $scope.listName_theatre = [];
                    $scope.hall_name_theatre = [];
                    $scope.booking_type_Hall = [];
                    $scope.listName_S = [];
                })
            }
        }
        if ($scope.listName_movie != '') {
            $scope.generalMovie = true;
        } else {
            $scope.generalmovie = false;
        }
    }
    $scope.updateDate = function (id) {
        $scope.time_play = [];
        var length = Object.keys($scope.rest_info_general).length - 1;
        var isCheck_D_D = 0;
        $scope.listName_date = id;
        $scope.theatre_name = [];
        $scope.time_play = []; //initiates array for pushing
        for (i = 0; i <= length; i++) {
            if (id == $scope.rest_info_general[i][0].date_play_fk && isCheck_D_D == false) {
                $http({
                    method: "POST",
                    url: "../../models/insert_bookings.php",
                    data: {
                        'movie_name': $scope.listName_movie,
                        'date_play': id,
                        'action': 'date_based'
                    }
                }).then(function (response) {
                    if (isCheck_D_D == false) {
                        for (k = 0; k < response.data.length; k++) {
                            $scope.time_play.push([response.data[k].time_play]);
                            isCheck_D_D = true;
                        }
                    }
                    $scope.listName_theatre = [];
                    $scope.hall_name_theatre = [];
                    $scope.booking_type_Hall = [];
                    $scope.listName_S = [];
                })
            }
        }
        if ($scope.listName_date != '') {
            $scope.generalDate = true;
        } else {
            $scope.generalDate = false;
        }
    }

    $scope.updateTime = function (id) {
        $scope.listName_theatre = [];
        var length = Object.keys($scope.rest_info_general).length - 1;
        var isCheck_T_TN = 0;
        $scope.listName_Time = id;
        for (i = 0; i <= length; i++) {
            if (id == $scope.rest_info_general[i][0].time_play && isCheck_T_TN == false) {
                $http({
                    method: "POST",
                    url: "../../models/insert_bookings.php",
                    data: {
                        'time_play': id,
                        'movie_name': $scope.listName_movie,
                        'date_play': $scope.listName_date,
                        'action': 'time_based'
                    }
                }).then(function (response) {
                    if (isCheck_T_TN == false) {
                        for (k = 0; k < response.data.length; k++) {
                            $scope.theatre_name.push([response.data[k].theatre_name_fk]);
                            isCheck_T_TN = true;
                        }
                    }
                    $scope.hall_name_theatre = [];
                    $scope.booking_type_Hall = [];
                    $scope.listName_S = [];
                })
            }
        }
        if ($scope.listName_Time != '') {
            $scope.generalTime = true;
        } else {
            $scope.generalTime = false;
        }
    }

    $scope.updateTheatre = function (id) {
        $scope.hall_name_theatre = [];
        var length = Object.keys($scope.rest_info_general).length - 1;
        var isCheck_TΝ_ΗΤ = 0;
        $scope.listName_theatre = id;

        for (i = 0; i <= length; i++) {
            if (id == $scope.rest_info_general[i][0].theatre_name_fk && isCheck_TΝ_ΗΤ == false) {
                $http({
                    method: "POST",
                    url: "../../models/insert_bookings.php",
                    data: {
                        'theatre': id,
                        'time_play': $scope.listName_Time,
                        'movie_name': $scope.listName_movie,
                        'date_play': $scope.listName_date,
                        'action': 'theatre_based'
                    }
                }).then(function (response) {
                    if (isCheck_TΝ_ΗΤ == false) {
                        for (k = 0; k < response.data.length; k++) {
                            $scope.hall_name_theatre.push([response.data[k].hall_name_fk]);
                            isCheck_TΝ_ΗΤ = true;
                        }
                    }
                    $scope.booking_type_Hall = [];
                    $scope.listName_S = [];
                })
            }
        }
        if ($scope.listName_theatre != '') {
            $scope.generalTheatre = true;
        } else {
            $scope.generalTheatre = false;
        }
    }

    $scope.updateHallName = function (id) {
        $scope.booking_type_Hall = [];
        var length = Object.keys($scope.rest_info_general).length - 1;
        var isCheck_H_HT = 0;
        $scope.listName_hall = id;
        for (i = 0; i <= length; i++) {
            if (id == $scope.rest_info_general[i][0].hall_name_fk && isCheck_H_HT == false) {
                $http({
                    method: "POST",
                    url: "../../models/insert_bookings.php",
                    data: {
                        'hall_name': id,
                        'theatre': $scope.listName_theatre,
                        'time_play': $scope.listName_Time,
                        'movie_name': $scope.listName_movie,
                        'date_play': $scope.listName_date,
                        'action': 'hall_based'
                    }
                }).then(function (response) {
                    if (isCheck_H_HT == false) {
                        for (k = 0; k < response.data.length; k++) {
                            $scope.booking_type_Hall.push([response.data[k].hall_type_fk]);
                            isCheck_H_HT = true;
                        }
                    }


                    $scope.listName_S = [];
                })
            }
        }
        if ($scope.listName_hall != '') {
            $scope.generalHall = true;
        } else {
            $scope.generalHall = false;
        }
    }

    $scope.promise = function (i) {
        return $http({
            method: "POST",
            url: "../../models/fetch_data_booking_view_seats_available.php",
            data: {
                'movie_name': $scope.rest_info_general[i][0].movie_play_fk,
                'theatre_n': $scope.rest_info_general[i][0].theatre_name_fk,
                'hall_name_n': $scope.rest_info_general[i][0].hall_name_fk,
                'date_play_n': $scope.rest_info_general[i][0].date_play_fk,
                'hall_type_n': $scope.rest_info_general[i][0].hall_type_fk,
                'time_play_n': $scope.rest_info_general[i][0].time_play
            }
        })
    }

    $scope.promise1 = function (i) {
        return $http({
            method: "POST",
            url: "../../models/fetch_data_booking_view_seats.php",
            data: {
                'movie_name': $scope.rest_info_general[i][0].movie_play_fk,
                'theatre_n': $scope.rest_info_general[i][0].theatre_name_fk,
                'hall_name_n': $scope.rest_info_general[i][0].hall_name_fk,
                'date_play_n': $scope.rest_info_general[i][0].date_play_fk,
                'hall_type_n': $scope.rest_info_general[i][0].hall_type_fk,
                'time_play_n': $scope.rest_info_general[i][0].time_play
            }
        })
    }

    $scope.updateHallType = function (id) {
        $scope.listName_S = [];

        var length = Object.keys($scope.rest_info_general).length - 1;
        var isCheck_HT_S = 0;
        $scope.listName_hall_type = id;
        if ($scope.listName_hall_type != '') {
            $scope.generalHallType = true;
        } else {
            $scope.generalHallType = false;
        }
        if ($scope.listName_hall != '') {
            $scope.generalHall = true;
        } else {
            $scope.generalHall = false;
        }
        if ($scope.listName_theatre != '') {
            $scope.generalTheatre = true;
        } else {
            $scope.generalTheatre = false;
        }
        if ($scope.listName_Time != '') {
            $scope.generalTime = true;
        } else {
            $scope.generalTime = false;
        }
        if ($scope.listName_date != '') {
            $scope.generalDate = true;
        } else {
            $scope.generalDate = false;
        }
        if ($scope.listName_movie != '') {
            $scope.generalMovie = true;
        } else {
            $scope.generalmovie = false;
        }

        if ($scope.generalTheatre && $scope.generalHall && $scope.generalHallType && $scope.generalDate && $scope.generalTime && $scope.generalMovie) {

            for (i = 0; i <= length; i++) {
                if (id == $scope.rest_info_general[i][0].hall_type_fk && $scope.rest_info_general[i][0].time_play == $scope.listName_Time.toString() && $scope.rest_info_general[i][0].movie_play_fk == $scope.listName_movie.toString() && $scope.rest_info_general[i][0].hall_name_fk == $scope.listName_hall.toString() && $scope.rest_info_general[i][0].date_play_fk == $scope.listName_date.toString() && isCheck_HT_S == false) {
                    $q.all([$scope.promise(i), $scope.promise1(i)]).then(function (responses) {
                        //promise
                        $scope.SeatsSub = [];
                        $scope.SeatsSub = responses.map((resp) => resp.data);
                        $scope.indexSeatsSub = [];
                        for (i = 0; i < $scope.SeatsSub[0].length; i++) { //if no result DONT run
                            $scope.indexSeatsSub.push(parseInt($scope.SeatsSub[0][i].seatP));
                        }
                        //promise 1
                        $scope.arraySeats = [];
                        $scope.arraySeats = responses.map((resp) => resp.data);
                        $scope.listName_S = [];
                        for (i = 1; i <= $scope.arraySeats[1][0].seatsAvailable; i++) {
                            $scope.listName_S.push(i);
                        }
                        $scope.listName_S = $scope.listName_S
                            .filter(x => !$scope.indexSeatsSub.includes(x))
                            .concat($scope.indexSeatsSub.filter(x => !$scope.listName_S.includes(x)))
                    })
                }
            }
        }
    }

    $scope.updateHallType_edit = function (id) {
        $scope.listName_S = [];

        var length = Object.keys($scope.rest_info_general).length - 1;
        var isCheck_HT_S = 0;
        $scope.listName_hall_type = id;
        if ($scope.listName_hall_type != '') {
            $scope.generalHallType = true;
        } else {
            $scope.generalHallType = false;
        }
        if ($scope.listName_hall != '') {
            $scope.generalHall = true;
        } else {
            $scope.generalHall = false;
        }
        if ($scope.listName_theatre != '') {
            $scope.generalTheatre = true;
        } else {
            $scope.generalTheatre = false;
        }
        if ($scope.listName_Time != '') {
            $scope.generalTime = true;
        } else {
            $scope.generalTime = false;
        }
        if ($scope.listName_date != '') {
            $scope.generalDate = true;
        } else {
            $scope.generalDate = false;
        }
        if ($scope.listName_movie != '') {
            $scope.generalMovie = true;
        } else {
            $scope.generalmovie = false;
        }

        if ($scope.generalTheatre && $scope.generalHall && $scope.generalHallType && $scope.generalDate && $scope.generalTime && $scope.generalMovie) {
            for (i = 0; i <= length; i++) {
                if (id == $scope.rest_info_general[i][0].hall_type_fk 
                    && $scope.rest_info_general[i][0].time_play == $scope.listName_Time.toString() 
                    && $scope.rest_info_general[i][0].movie_play_fk == $scope.listName_movie.toString() 
                    && $scope.rest_info_general[i][0].hall_name_fk == $scope.listName_hall.toString() 
                    && $scope.rest_info_general[i][0].date_play_fk == $scope.listName_date.toString() 
                    && isCheck_HT_S == false) {
                    $q.all([$scope.promise(i), $scope.promise1(i)]).then(function (responses) {
                        //promise
                        $scope.SeatsSub = [];
                        $scope.SeatsSub = responses.map((resp) => resp.data);
                        $scope.indexSeatsSub = [];
                        for (i = 0; i < $scope.SeatsSub[0].length; i++) { //if no result DONT run
                            $scope.indexSeatsSub.push(parseInt($scope.SeatsSub[0][i].seatP));
                        }
                        $scope.arraySeats = [];
                        $scope.arraySeats = responses.map((resp) => resp.data);
                        $scope.listName_S = [];
                        for (i = 1; i <= $scope.arraySeats[1][0].seatsAvailable; i++) {
                            $scope.listName_S.push(i);
                        }
                    })
                }
            }
        }

    }

    $scope.updateSeats = function (id) {
        $scope.listName_S_selected = id;

    }

    $scope.searchAccount = function (id) {
        $http({
            method: "POST",
            url: "../../models/insert_bookings.php",
            data: {
                'search': id,
                'action': 'search_account'
            }
        }).then(function (response) {
            $scope.accountText = response.data;
            if ($scope.accountText == 'Exists') {
                $scope.allowsub = true;
            } else $scope.allowsub = false;
        })
    }
    $scope.searchAccountSeat = function (id) {
        $http({
            method: "POST",
            url: "../../models/insert_bookings.php",
            data: {
                'search_seats': id,
                'first_name': $scope.first_name,
                'last_name': $scope.last_name,
                'movie_name': $scope.movie_names,
                'phone_number': $scope.phone_number,
                'account': $scope.account,
                'date': $scope.date,
                'time': $scope.time,
                'theatre': $scope.theatre,
                'hall_type': $scope.hall_name,
                'booking_type': $scope.hall_type,
                'seatp': $scope.seatp,
                'action': 'search_account_seat'
            }
        }).then(function (response) {
            if (response.data.error != '') {
                $scope.success = false;
                $scope.error = true;
                $scope.errorMessage = response.data.error;
                $scope.successMessage = response.data.message;
                $scope.seatText = response.data;
                if ($scope.seatText == 'Taken') {
                    $scope.allowsubseat = true;
                } else $scope.allowsubseat = false;
            } else {
                $scope.success = true;
                $scope.error = false;
                $scope.successMessage = response.data.message;
                $scope.seatText = response.data;
                if ($scope.seatText == 'Taken') {
                    $scope.allowsubseat = true;
                } else $scope.allowsubseat = false;
            }
        })
    }
}]);