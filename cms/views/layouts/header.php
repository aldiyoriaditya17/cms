<?php

use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="red" data-image="<?=$baseUrl?>/ism/assets/img/3.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="" class="simple-text logo-mini">
       &copy;
        </a>
        <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
         CMS ISM & MOANA
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?=$baseUrl?>/ism/assets/img/faces/avatar.jpg" />
          </div>
          <div class="user-info">
            <a class="nav-link">
              <span>
               Asep Saepudin
               
              </span>
            </a>
          
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=$baseUrl?>/index.php">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$baseUrl?>/index.php?r=user%2Findex">
              <i class="material-icons">view_list</i>
              <p> Management User </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$baseUrl?>/index.php?r=posting%2Fposting">
              <i class="material-icons">view_list</i>
              <p> Management Posting</p>
            </a>
          </li>
      
             <li class="nav-item">
            <a class="nav-link" href="<?=$baseUrl?>/index.php?r=group%2Findex">
                   <i class="material-icons">grid_on</i>
              <p> Management Group </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">description</i>
              <p> Report
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?=$baseUrl?>/index.php?r=posting%2Findex">
                    <span class="sidebar-mini"> RV </span>
                    <span class="sidebar-normal"> Report View </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?=$baseUrl?>/index.php?r=posting%2Flike">
                    <span class="sidebar-mini"> RL </span>
                    <span class="sidebar-normal"> Report Like </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?=$baseUrl?>/index.php?r=posting%2Fcomment">
                    <span class="sidebar-mini"> RC </span>
                    <span class="sidebar-normal"> Report Comment </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
   <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
      
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
           
            <ul class="navbar-nav">
              
            
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                 
                 
                 <center> <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'dropdown-item']
                                ) ?> </center>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>