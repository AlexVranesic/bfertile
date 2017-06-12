<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


                <div class="questionsDiv"  ng-if="formState==0">



                    <!------------------------- GET THE INVITE --------------------->
                    <div ng-hide="subscribeButtonNumber==0">
                        <h1>Your email</h1>
                        <div>
                            <form name="emailFormModal">

                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                                    <input type="email" name="email" ng-model="email" ng-pattern="emailFormat" class="bottomBorderOnlyInput" placeholder="Your e-mail" required style="text-align: center;" />
                                     <span class="error" ng-show="modalSubscribeClicked && emailFormModal.email.$error.required" ng-class="modalSubscribeClicked?'redText':''" class="ng-cloak" style="right: 20px;">
                                    Required!</span>
                                <span class="error" ng-class="modalSubscribeClicked?'redText':''"  ng-show="emailFormModal.email.$error.pattern" class="ng-cloak" style="right: 20px;">
                                    Not valid email!</span>
                                </div>
                            </div>

                            <div>

                            </div>
                            </form>


                        </div>
                    </div>
                    <h1 ng-show="subscribeButtonNumber==0" style="margin-bottom: -6px; margin-top:45px;">
                        Thank you for your contact!
                    </h1>
                    <p ng-show="subscribeButtonNumber==0" style="font-size:15px;">
                    For more personalised experience - tell us what would you be interested in?</p>

                    <h1  ng-show="subscribeButtonNumber>0" style=" margin-top: 44px;
                               margin-bottom: 10px;">What would you be interested in?</h1>
                    <h2 style="
                               font-family: 'Roboto', sans-serif;
                               font-size: 14px;
                               font-weight: 300;
                               color: #575555;
                               text-align: center;
                               margin-top: 0px;
                               margin-bottom: 30px;
                               ">(You can select more than one)</h2>
                    <div ng-if="errorProducts" class="alert alert-danger" id="errorProducts" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        Choose at least one!
                    </div>




                    <div class="optionWrapper">
                        <div class="option" ng-class="formData.products.sicknessCheck? 'chosen' : '' " ng-click="setSicknessCheck()">
                            Covering costs
                            <span class="glyphicon glyphicon-ok hidden-xs" aria-hidden="true"></span>
                        </div>
                        <a data-toggle="collapse" data-target="#collapseSickDayData" aria-expanded="false" aria-controls="collapseSickDayData">
                            ?
                        </a>
                    </div>
                    <div class="collapse" id="collapseSickDayData">
                        <div class="well">
                            <p>Couples, who are battling with infertility problems are facing various obstaces and problems.</p>
                            <p>Usualy they are dealing with high costs, which quickly become incremental, as one cycle in rarely enough.</p>
                            <p>We will cover the costs for the treatment you need.</p>
                            <a data-toggle="collapse" data-target="#collapseSickDayData" aria-expanded="false" aria-controls="collapseSickDayData">
                                Hide details
                            </a>
                        </div>
                    </div>


                    <div class="optionWrapper">
                        <div class="option" ng-class="formData.products.paymentCheck? 'chosen' : '' " ng-click="setPaymentCheck()">
                            Tracking treatment plan
                            <span class="glyphicon glyphicon-ok hidden-xs" aria-hidden="true"></span>
                        </div>
                        <a data-toggle="collapse" data-target="#collapsePaymentData" aria-expanded="false" aria-controls="collapsePaymentData">
                            ?
                        </a>
                    </div>
                    <div class="collapse" id="collapsePaymentData">
                        <div class="well">
                            <p>Finding the right treatment for you can be difficult.</p>
                            <p>We provide you with information you need, </p>
                            <p>build and track your perscribed fertility testing and therapy.</p>

                            <a data-toggle="collapse" data-target="#collapsePaymentData" aria-expanded="false" aria-controls="collapsePaymentData">
                                Hide details
                            </a>
                        </div>
                    </div>



                    <div class="optionWrapper">
                        <div class="option" ng-class="formData.products.gearCheck? 'chosen' : '' " ng-click="setGearCheck()">
                            Connecting people
                            <span class="glyphicon glyphicon-ok hidden-xs" aria-hidden="true"></span>
                        </div>
                        <a data-toggle="collapse" data-target="#collapseGearData" aria-expanded="false" aria-controls="collapseGearData">
                            ?
                        </a>
                    </div>
                    <div class="collapse" id="collapseGearData">
                        <div class="well">
                            <p>We will connect you to other people who are going through the same difficult path and are willing to share their experiences and help out by offering advice. </p>
                            <p>We will also include specialists who can answer all the complex medical questions you have.</p>
                            <a data-toggle="collapse" data-target="#collapseGearData" aria-expanded="false" aria-controls="collapseGearData">
                                Hide details
                            </a>
                        </div>
                    </div>



                    <div class="optionWrapper">
                        <div class="option" ng-class="formData.products.legalCheck? 'chosen' : '' " ng-click="setLegalCheck()">
                            Collecting user reviews
                            <span class="glyphicon glyphicon-ok hidden-xs" aria-hidden="true"></span>
                        </div>
                        <a data-toggle="collapse" data-target="#collapseLegalData" aria-expanded="false" aria-controls="collapseLegalData">
                            ?
                        </a>
                    </div>
                    <div class="collapse" id="collapseLegalData">
                        <div class="well">
                            <p>You will be able to access structured patient ratings of treatment processes, facilities and doctors.</p>

                            <a data-toggle="collapse" data-target="#collapseLegalData" aria-expanded="false" aria-controls="collapseLegalData">
                                Hide details
                            </a>
                        </div>
                    </div>

                    <div ng-show="subscribeButtonNumber==0" class="modal-close" ng-click="sendExtraData()">PERSONALISE</div>

                    <div class="modal-close" ng-hide="subscribeButtonNumber==0" ng-click="modalSubscribeClicked=true;setForm(emailFormModal);getInvite()">SUBSCRIBE</div>

                    <!------------------------- EO GET THE INVITE --------------------->
                </div>



                <!------- STATE 2 of modal - THANK YOU  -------->

                <div style="padding:5%;">
                    <div ng-if="formState>=1">
                        <!------------------------- DATA IS SENT --------------------->
                        <p>Thank you for your contact information! </p>
                        <p>We will contact you once we open the product!</p>
                        <!------------------------- DATA IS SENT --------------------->
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
