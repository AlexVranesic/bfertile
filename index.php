<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sl">
    <head>
        <?php include('php/page/head.php'); ?>
    </head>
    <body ng-app="index" ng-controller="indexCtrl">
        <div id="fullpage">

            <div id="productMenuWrapper" ng-show="showProductMenu" class="hidden-xs">
                <div id="productMenu">
                    <div id="lightGrayVertical"></div>
                    <div id="darkGrayVertical" ng-style="{ top: (currentDivIndex-3)*30 }"></div>

                    <h3 id="sickdaymenu" ng-class="currentDivIndex==2 ? 'active':''"  ng-click="scrollTo(2)">COVERING COSTS</h3>
                    <h3 id="invoicesafetymenu" ng-class="currentDivIndex==3 ? 'active':''"  ng-click="scrollTo(3)">TRACKING TREATMENT PLAN</h3>
                    <h3 id="gearinsurancemenu" ng-class="currentDivIndex==4 ? 'active':''"  ng-click="scrollTo(4)">CONNECTING PEOPLE</h3>
                    <h3 id="liabilityinsurancemenu" ng-class="currentDivIndex==5 ? 'active':''" ng-click="scrollTo(5)">COLLECTING USER REVIEWS</h3>
                </div>
            </div>
            <?php include ('php/page/indexInviteModal.php'); ?>


            <?php
            include('php/page/01-homeSection.php');
            include('php/page/productSection.php');
            include('php/page/thedeadline.php');

            ?>
        </div>
        <?php include('php/page/footer.php'); ?>

    </body>
</html>
