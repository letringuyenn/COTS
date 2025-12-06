<template>
    <div>
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <div class="wrapper">
            <div id="content-page" class="content-page">
                <div class="container-fluid">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import "../../assets/js/jquery.min.js";
import "../../assets/js/rtl.js";
import "../../assets/js/customizer.js";
import "../../assets/js/popper.min.js";
import "../../assets/js/bootstrap.min.js";
import "../../assets/js/jquery.appear.js";
import "../../assets/js/countdown.min.js";
import "../../assets/js/waypoints.min.js";
import "../../assets/js/jquery.counterup.min.js";
import "../../assets/js/wow.min.js";
import "../../assets/js/apexcharts.js";
import "../../assets/js/slick.min.js";
import "../../assets/js/select2.min.js";
import "../../assets/js/jquery.magnific-popup.min.js";
import "../../assets/js/smooth-scrollbar.js";
import "../../assets/js/lottie.js";
import "../../assets/js/core.js";
import "../../assets/js/charts.js";
import "../../assets/js/animated.js";
import "../../assets/js/kelly.js";
import "../../assets/js/morris.js";
import "../../assets/js/maps.js";
import "../../assets/js/worldLow.js";
import "../../assets/js/chartist/chartist.min.js";
import "../../assets/js/chart-custom.js";
import "../../assets/js/custom.js";
export default {
    name: 'Wrapper',
    components: {
    },
}
</script>
<style>
@import "../../assets/css/bootstrap.min.css";
@import "../../assets/js/chartist/chartist.min.css";
@import "../../assets/css/typography.css";
@import "../../assets/css/style.css";
@import "../../assets/css/responsive.css";
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css");
@import url("https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css");
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css");
</style>