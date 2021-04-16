<?php
class UpdateHandlings {
        public static function getAdminSideBar(){
           echo '<div class="admin-section admin-section1 ">
            <ul>
                <li><i class="fas fa-sliders-h"></i><a href="admin.php">Dashboard </a><i class="fas admin-dropdown fa-chevron-right"></i></li>
                <li><i class="fas fa-ticket-alt"></i><a href="bookingAdmin.php">Bookings</a> <i class="fas admin-dropdown fa-chevron-right"></i></li>
                <li class="admin-navigation-schedule"><i class="fas fa-calendar-alt"></i><a href="scheduleAdmin.php">Schedule <i
                        class="fas admin-dropdown fa-chevron-right"></i>
                </li>
                <li><i class="fas fa-film"></i><a href="moviesAdmin.php">Movies <i class="fas admin-dropdown fa-chevron-right"></i></li>
                <li><i class="fas fa-video"></i><a href="#">Trailers</a> <i class="fas admin-dropdown fa-chevron-right"></i></li>
            </ul>
        </div>';
        }
}
?>