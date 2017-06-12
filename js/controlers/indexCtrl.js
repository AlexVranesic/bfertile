'use strict';
var app = angular.module('index', ['ui.event']) .config( ['$provide', function ($provide){
    $provide.decorator('$browser', ['$delegate', function ($delegate) {
        $delegate.onUrlChange = function () {};
        $delegate.url = function () { return ""};
        return $delegate;
    }]);
}]);

app.controller('indexCtrl', function($scope, $http, $location, $anchorScroll) {

    $scope.videoIsPlaying=true;
    $scope.videoEnded=false;
    $scope.videoIsInTheMiddle=false;
    $scope.emailFormat = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,15}$/;

    $scope.email="";
    $scope.siteMap=['MainPage','PaidSickLeave', 'GuaranteedPayment', 'GearInsurance', 'Liability', 'TheDeadline'];


    $scope.startVideo = function(){
        $('#welcomeVideo').get(0).play();
        $scope.videoIsPlaying=true;
        $scope.videoStarted=true;
        $scope.videoIsInTheMiddle=true;
        $scope.videoEnded=false;
    }

    $scope.onVideoEnded=  function(evt) {
        $scope.videoIsPlaying=false;
        $scope.videoEnded=true;
        $scope.videoIsInTheMiddle=false;
    };

    $scope.onVideoClick = function(){
        if($scope.videoIsPlaying)
        {
            $('#welcomeVideo').get(0).pause();
            $scope.videoIsPlaying=false;
        }
    }

    $scope.scrollTo = function(anchorId){
        $scope.menuClicked=true;
        $.fn.fullpage.moveTo(anchorId);
        $scope.trackScroll(anchorId);
    }


    //each pixel should fire only once
    $scope.scrolleTracked=[false,false,false,false,false,false]

    $scope.trackScroll = function(id){

        if(!$scope.scrolleTracked[id-1])
        {
            fbq('trackCustom', 'ScrolledTo'+ $scope.siteMap[id-1]);
            $scope.scrolleTracked[id-1]=true;
        }
    }

    $scope.buttonMap=[];


    $scope.purcaseTracking = function(dataSentType){
        /*var productList=[];

        if($scope.formData.products.sicknessCheck)
            productList.push(1);
        if($scope.formData.products.paymentCheck)
            productList.push(2);
        if($scope.formData.products.gearCheck)
            productList.push(3);
        if($scope.formData.products.legalCheck)
            productList.push(4);*/

        fbq('trackCustom', 'Subscribe', {
            dataSentType:dataSentType,
            products: $scope.formData.products

        });

        if($scope.formData.products.sicknessCheck)
           fbq('trackCustom', 'SubSickness');
        if($scope.formData.products.paymentCheck)
           fbq('trackCustom', 'SubPayment');
        if($scope.formData.products.gearCheck)
           fbq('trackCustom', 'SubGear');
        if($scope.formData.products.legalCheck)
           fbq('trackCustom', 'SubLegal');

    }

    $scope.currentDiv="home";
    $scope.currentDivIndex=1;
    $scope.showProductMenu=false;

    $scope.menuClicked=false;

    $(document).ready(function() {

        $('#fullpage').fullpage({
            loopTop: false,
            loopBottom: true,
            normalScrollElements: '#productMenuWrapper, #myModal',
            fixedElements: '#productMenuWrapper, #myModal',
            lockAnchors: false,
            anchors:['home', 'covercosts', 'threatmentplan', 'connectingpeople', 'userrewiews', 'noworries'],
            responsiveWidth: 768,

            onLeave: function(index, nextIndex, direction){
                $scope.currentDivIndex=nextIndex;
                if(nextIndex==1 || nextIndex>5 )
                    $scope.showProductMenu=false;

                if(!$scope.menuClicked)
                {
                    $scope.$apply();
                }

                $scope.menuClicked=false;
            },
            afterLoad: function(anchorLink, index){
                if(index==1)
                {
                    $scope.startVideo();
                }
                if(index==1 || index>5 )
                    $scope.showProductMenu=false;
                else
                    $scope.showProductMenu=true;

                $scope.currentDiv=anchorLink;
                $scope.currentDivIndex=index;
                $scope.$apply();
                $scope.trackScroll(index);

            },
            afterRender: function(){
                //console.log('afterRender')
            },
            afterResize: function(){
                // console.log('afterResize')
            },
            afterResponsive: function(isResponsive){
                // console.log('afterResponsive')
            },
            afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){
                //console.log('afterSlideLoad')
            },
            onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){
                // console.log('onSlideLeave')
            }
        });
        $.fn.fullpage.setScrollingSpeed(1000);


        if($location.absUrl().search('sickday')>0)
            $.fn.fullpage.moveTo(2);
        else if($location.absUrl().search('invoicesafety')>0)
            $.fn.fullpage.moveTo(3);
        else if($location.absUrl().search('gearinsurance')>0)
            $.fn.fullpage.moveTo(4);
        else if($location.absUrl().search('liabilityinsurance')>0)
            $.fn.fullpage.moveTo(5);
        else if($location.absUrl().search('noworries')>0)
            $.fn.fullpage.moveTo(6);

        $scope.startVideo();

    });

    /* ------------------ MODAL CTRL ---------_*/

    $scope.errorEmail=false;
    $scope.errorProducts=false;

    //TODO PROD
    var link="http://lanceout.com/commingsoon";
    $scope.formData={
        id:0,
        email:'',
        products:{
            paymentCheck: false,
            sicknessCheck: false,
            gearCheck: false,
            legalCheck: false,
            fundCheck: false
        },
        selectedFreelancerType: 0,
        yearsOfExperience: -1,
        otherProfession: ''
    }

    $scope.formState=0; //0- not sent, 1 - basic data sent, 2 - extra data sent

    $scope.formData.selectedFreelancerType={name:'What kind of freelancer are you?', id:-1};

    $scope.freelancerTypes=[{name:'Web developer', id:1},
                            {name:'Designer', id:2},
                            {name:'Photographer', id:3},
                            {name:'Writer or Copywriter', id:4},
                            {name:'Programmer', id:5},
                            {name:'Arhitect', id:6},
                            {name:'Other', id:7}
                           ];

    $scope.setFreelancerType = function(type){
        $scope.formData.selectedFreelancerType=type;
    }

    $scope.setPaymentCheck= function(){
        $scope.formData.products.paymentCheck=!$scope.formData.products.paymentCheck;
    }

    $scope.setSicknessCheck = function(){
        $scope.formData.products.sicknessCheck= !$scope.formData.products.sicknessCheck;
    }

    $scope.setGearCheck = function(){
        $scope.formData.products.gearCheck= !$scope.formData.products.gearCheck;
    }

    $scope.setLegalCheck = function(){
        $scope.formData.products.legalCheck= !$scope.formData.products.legalCheck;
    }

    $scope.setFundCheck = function(){
        $scope.formData.products.fundCheck= !$scope.formData.products.fundCheck;
    }

    $scope.selectExperience = function(years){
        $scope.formData.yearsOfExperience=years;
    }

    $scope.subscribeButtonNumber=0;

    $scope.subscribeClick= function(buttonNumb){
        $scope.formState=0;

        $scope.formData.email="";
        $scope.subscribeButtonNumber=buttonNumb;

        if(buttonNumb==0)
        {
            window.scrollTo(0, 0);
            $scope.getInvite();
        }

        if(buttonNumb>0 || $scope.emailForm.$valid)
        {
            $('#myModal').modal('show');
        }


        $scope.formData.products.sicknessCheck= (buttonNumb==1);
        $scope.formData.products.paymentCheck=(buttonNumb==2);
        $scope.formData.products.gearCheck=(buttonNumb==3);
        $scope.formData.products.legalCheck=(buttonNumb==4);
    }


    $scope.getInvite = function(){

        if(!$scope.currentForm.$valid){
            return;
        }

        $scope.formData.email=$scope.currentForm.email.$viewValue;
        $scope.purcaseTracking('Subscription');
        $scope.sendData();

        if($scope.subscribeButtonNumber>0)
            $scope.formState=1;
        else
            $scope.formState=0;
    }


    $scope.currentForm=null;

    $scope.setForm = function(form){
        $scope.currentForm=form;
    }

    $scope.sendData = function(){
        $http.post(link+"/php/procedures/sendBasicData.php", $scope.formData)
            .then(function (success){
            $scope.formData.id=parseInt(success.data);
            $scope.formData.email="";
            $scope.email="";

        },function (error){
            console.log(error);
        });
    }

    $scope.sendExtraData = function(){
        $scope.purcaseTracking('ExtraData');

        $http.post(link+"/php/procedures/sendExtraData.php", $scope.formData)
            .then(function (success){
            $scope.formState=1;
            $scope.formData.email="";
            $scope.email="";
        },function (error){
            console.log(error);
        });
    }


});

