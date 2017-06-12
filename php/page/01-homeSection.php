<div class="section" data-menuanchor="home" id="homeDiv">

    <!--<iframe id=“video” src=“//www.youtube.com/embed/5iiPC-VGFLU” frameborder=“0” allowfullscreen></iframe>-->


    <div class="row">
        <div class="hidden-xs col-sm-6 col-md-6 col-lg-6 videoDiv">


           <!-- <img src="images/images/vacation-family-img.jpg"/>-->

          <video id="welcomeVideo"  ui-event="{ ended : 'onVideoEnded($event)' }" ng-click="onVideoClick()" playsinline autoplay muted loop>-->
                <source src="images/video/family.mp4" type="video/mp4">


                Please use a real browser that supports video?

           </video>

            <div id="videoControlDiv">
                <div id="playButton"
                     ng-click="startVideo()"
                     ng-if="!videoIsPlaying && !videoEnded"
                     class="img-circle">
                    <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
                </div>

                <div id="replayButton"
                     ng-click="startVideo()"
                     ng-if="!videoIsPlaying && videoEnded"
                     class="img-circle">
                    <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                </div>
            </div>

        </div>
        <p id="bFertileLogo"><img src="images/images/bfertile-logo-white.png" alt="Lanceout Invoice Overview" class="productImg"/></p>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div id="freelanceTextDivWrapper">
                <div id="freelanceTextDiv">
                    <div class="miniLine"></div>
                    <!--<h1>We are making freelancing less risky</h1>-->

                        <h1>We are <font color="HotPink"> by your side </font> while treating infertility.</h1>

                    <!--Making freelancing less risky-->
                    <!--Keeping Freelancers Safe-->
                    <!--<h1>Making Freelacing Safer</h1>-->

                    <p class="narrowTextP">The most difficult roads often lead to a beautiful destination.
                    </p>
                    <p class="pGray">Subscribe and create the story with us</p>
                    <div class="floatlabel-wrapper">
                        <form name="emailForm">
                            <input type="email" name="email" ng-model="email" ng-pattern="emailFormat" class="bottomBorderOnlyInput floatlabel" placeholder="Your e-mail" required/>
                            <div>
                                <span class="error" ng-show="homeSubscribeClicked && emailForm.email.$error.required" ng-class="homeSubscribeClicked?'redText':''" class="ng-cloak">
                                    Required!</span>
                                <span class="error" ng-class="homeSubscribeClicked?'redText':''"  ng-show="emailForm.email.$error.pattern" class="ng-cloak">
                                    Not valid email!</span>
                            </div>
                        </form>
                    </div>
                    <div id="buttonDivHomeWrapper">
                        <div class="buttonDiv" ng-click="homeSubscribeClicked=true;setForm(emailForm);subscribeClick(0)">Subscribe</div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
