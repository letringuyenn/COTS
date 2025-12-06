<template>
    <div>
        <footer class="iq-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-right">
                        Copyright 2020 <a href="#">COTS</a> All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
        <nav class="iq-float-menu">
            <input type="checkbox" href="#" class="iq-float-menu-open" name="menu-open" id="menu-open" />
            <label class="iq-float-menu-open-button" for="menu-open">
                <span class="lines line-1"></span>
                <span class="lines line-2"></span>
                <span class="lines line-3"></span>
            </label>
            <button class="iq-float-menu-item bg-info" data-toggle="tooltip" data-placement="top" title="Direction Mode"
                data-mode="rtl"><i class="ri-text-direction-r"></i></button>
            <button class="iq-float-menu-item bg-danger" data-toggle="tooltip" data-placement="top" title="Color Mode"
                id="dark-mode" data-active="true"><i class="ri-sun-line"></i></button>
            <button class="iq-float-menu-item bg-warning" data-toggle="tooltip" data-placement="top"
                title="Comming Soon"><i class="ri-palette-line"></i></button>
        </nav>
    </div>
</template>
<script>
export default {

}
</script>
<style></style>