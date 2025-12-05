<template>
    <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="index.html">
               <div class="iq-light-logo">
                  <img src="" class="img-fluid" alt="">
               </div>
               <div class="iq-dark-logo">
                  <img src="../../assets/images/logo-dark.gif" class="img-fluid" alt="">
               </div>
               <h4 class="text-primary"><b>COTS</b></h4>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                        <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li>
                        <a href="index.html" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard 1</span></a>
                     </li>
                     <li>
                        <a href="#menu-design" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-menu-3-line"></i><span>Menu Design</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="menu-design" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="horizontal-menu.html"><i class="ri-git-commit-line"></i>Horizontal menu</a></li>
                           <li><a href="horizontal-top-menu.html"><i class="ri-text-spacing"></i>Horizontal Top Menu</a></li>
                           <li><a href="two-sidebar.html"><i class="ri-indent-decrease"></i>Two Sidebar</a></li>
                           <li><a href="vertical-top-menu.html"><i class="ri-line-height"></i>Vertical block menu</a></li>
                        </ul>
                     </li>
                    
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
</template>
<script>
export default {

}
</script>
<style></style>