<?php
session_start();
include ('./php/dbconfig.php');
if($_SESSION['emp_no']=='')
{
header('location:./php/Login.php'); 
}
?>
<div ng-controller="dashboardController">
  <div class="container-fluid">
    <div class="row">
<div class="col-md-12" style="font-size: 20px;margin-bottom:5px;color: #1a1e4c;"><b>Hi {{logEmp.emp_name}} !!! Your Performance Story Board..</b></div>
</div>
        <div id="main-emp-header">
          <div id="main-avatar-placeholder">
            <img src="{{logEmp.emp_img}}" class="img-responsive" style="height: 75px;width: 75px;border-radius: 50%;padding: 2px;border:1px dashed #fff;" />
          </div>
        <div id="main-emp-info">
          <span><h4>{{logEmp.emp_name}}</h4><h4>{{logEmp.emp_designation}}</h4></span>
        </div>
        <div class="scoreButton"><a href="#" class="btn btn-default" data-toggle="modal" id="trigger" data-target="#myModal"><i class="fa fa-star-o"></i> <em class="hidde-xs"></em></a>
        </div>
      </div>
</div>
<div class="container-fluid" style="margin-top:1%;">
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default" style="height: 150px;">
      <div class="panel-heading" >Reach</div>
      <div class="panel-body"> 
      <p><i class="fa fa-phone"></i>   044-2467995 </p>
       <p ><i class="fa fa-mobile"></i>   {{logEmp.emp_contact}}</p>
       <p> <i class="fa fa-envelope"></i> {{logEmp.emp_mailid}}</p>
      </div>
  </div>
</div>
<div class="col-md-3">
      <div class="panel panel-default">
      <div class="panel-heading">Take On
      </div> 
      <div class="panel-body"> 
      <p>{{logEmp.emp_doj}}</p>
      <p>0 yrs 6 Months</p> 
      </div>
  </div>
</div>
<div class="col-md-3">
      <div class="panel panel-default" style="height:140px;">
      <div class="panel-heading">Designation
      </div>
      <div class="panel-body"> 
     <p><i class="fa fa-hourglass"></i>  Full Time</p>
     <p><i class="fa fa-user"></i>  Engineer</p>
     <p><i class="fa fa-map-marker"></i>  {{logEmp.emp_location}} </p>
      </div>
  </div>
</div>
<div class="col-md-3">
      <div class="panel panel-default">
      <div class="panel-heading">
      Task Master</div>
      <div class="panel-body"> 
      <p><i class="fa fa-sitemap"></i> {{logEmp.manager_name || 'N/A'}}</p>

      </div>
  </div>
</div>
</div>
</div>
<div class="container-fluid">
  <div class="row">
   <!--  <div class="col-md-2" id="emp-side-info">
      <div class="main_info_side">
            <div class="row">    
                <div class="col-xs-6 col-md-12" style="float:left;">
                                <div class="info_emp" >
                                <h4>Contact</h4>
                                    <p style="cursor: pointer;" id="p1"><i class="fa fa-phone"></i>  044-2467995 </p>
                                    <p style="cursor: pointer;"><i class="fa fa-mobile"></i>  {{logEmp.emp_contact}}</p>
                                    <p style="cursor: pointer;"> <i class="fa fa-envelope"></i>{{logEmp.emp_mailid}}</p><hr/>
                                </div>
                                </div>
                                 <div class="col-xs-6 col-md-12" style="float:left;">
                                <div class="info_emp">
                                    <h4>Hire Date</h4>
                                    <p>{{logEmp.emp_doj}}</p>
                                    <p>0 yrs 6 Months</p> 
                                </div>
                                </div>
                                 <div class="col-xs-6 col-md-12" style="float:left;">
                                <div class="info_emp">
                                <h4> Designation </h4>
                                    <p><i class="fa fa-hourglass"></i> Full Time</p>
                                    <p><i class="fa fa-user"></i> Engineer</p>
                                    <p><i class="fa fa-map-marker"></i>{{logEmp.emp_location}}</p><hr/>
                                </div>
                                </div>
                                 <div class="col-xs-6 col-md-12" style="float:left;">
                                <div class="info_emp">
                                    <h4>Manager</h4>
                                    <p><i class="fa fa-sitemap"></i> HansRaj Singh</p>
                                </div>
                                </div>
                            </div>
    </div></div> -->
    <div class="col-md-12">
      
      <div>
         <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" data-target="#perform"><i class="fa fa-tachometer"></i> <em class="hidden-xs">Overall Performance</em></a></li>
                                  <!-- <li><a data-toggle="tab" href="#selfassess"><i class="fa fa-tachometer"></i> <em class="hidden-xs">Self Assessment</em></a></li> -->
                                  <li><a data-toggle="tab" data-target="#recommend"><i class="fa fa-balance-scale"></i> <em class="hidden-xs">Recommendations</em> </a></li>
                                  <li><a data-toggle="tab" data-target="#gap"><i class="fa fa-thermometer-0"></i><em class="hidden-xs">Gaps</em> </a></li>
                                  <li><a data-toggle="tab" data-target="#achieve"><i class="fa fa-check-square-o"></i><em class="hidden-xs"> Achievements</em></a></li>
         </ul>
          <div class="tab-content">
      <div id="perform" class="tab-pane fade in active">
      
       <div class="row">
       <div class="table-responsive">
          <table class="table table-striped">
            <tr class="toBot" data-toggle="collapse" data-target="#demo1" ng-click="trans1()"><td style="letter-spacing:2px;cursor:pointer;font-weight: bold !important;color:rgba(0,0,0,0.5);">SELF RATING SUMMARY</td><td style="text-align: right;"><i class="{{myIcCollapse1}}" style="font-size: 25px;{{transformation1}}"></i></td></tr>
          </table>
        </div>
         
         <div class="col-md-12 collapse" id="demo1">
            <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th ng-repeat="a in columnSelf track by $index">{{a}}</th>
              </tr>
              <tbody>
                <tr ng-repeat="z in selfTranDetails track by $index">
                  <td>
                  <div class="progress">
                  <div ng-style="applyStyle({{z.Rating}})" class="progress-bar progress-bar-striped  active" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{z.Rating *20}}%;">{{z.Rating}}</div>
                  </div>
                  </td>
                  <td>{{z.Weightage}}</td>
                  <td>{{z.Target}}</td>
                  <td>{{((z.Rating/100)*z.Weightage) | number:2}}</td>
                  <td>{{z.Remarks}}</td>
                </tr>
                <tr>
                  <td style="background-color: {{contextBackgroundOne}};color:{{myColOne}};letter-spacing: 8px;" colspan="3">Weightage Average Score</td>
                  <td colspan="2" style="background-color: {{contextBackgroundOne}};color: {{myColOne}}">{{WAS | number:2}}</td>
                </tr>
              </tbody>
            </table>
          </div>
         </div>
       
     </div>

     <div class="row">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr data-toggle="collapse" data-target="#demo2" ng-click="trans2()"><td style="cursor:pointer;letter-spacing: 3px; font-weight: bold !important;color:rgba(0,0,0,0.5);">APPRAISER(1) RATING SUMMARY</td><td style="text-align: right;"><i class="{{myIcCollapse2}}" style="font-size: 25px;{{transformation2}}"></i></td></tr>
          </table>
        </div>
         
         <div class="col-md-12 collapse" id="demo2">
         
            <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th ng-repeat="a in columnAppOne track by $index">{{a}}</th>
              </tr>
              <tbody>
                <tr ng-repeat="z in appOne track by $index">
                  <td>
                  <div class="progress">
                  <div ng-style="applyStyle({{z.Rating}})" class="progress-bar progress-bar-striped  active" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{z.Rating *20}}%;">{{z.Rating}}</div>
                  </div>
                  </td>
                  <td>{{z.Weightage}}</td>
                  <td>{{z.Target}}</td>
                  <td>{{((z.Rating/100)*z.Weightage) | number:2}}</td>
                  <td>{{z.Remarks}}</td>
                </tr>
                 <tr>
                  <td style="background-color: {{contextBackgroundTwo}};color:{{myColTwo}};letter-spacing: 3px;" colspan="3">Weightage Average Score</td>
                  <td colspan="2" style="background-color: {{contextBackgroundTwo}}; color: {{myColTwo}}">{{App1was | number:2}}</td>
                </tr>
              </tbody>
            </table>
          </div>
         </div> 
       
     </div>

         <div class="row">
          <div class="table-responsive">
          <table class="table table-striped">
            <tr data-toggle="collapse" data-target="#demo3" ng-click="trans3()"><td style="letter-spacing: 3px;cursor:pointer;font-weight: bold !important;color:rgba(0,0,0,0.5);">APPRAISER(2) RATING SUMMARY</td><td style="text-align: right"><i class="{{myIcCollapse3}}" style="font-size: 25px; {{transformation3}}"></i></td></tr>
          </table>
        </div>
         <div class="col-md-12 collapse" id="demo3">
        
            <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th ng-repeat="a in columnAppTwo track by $index">{{a}}</th>
              </tr>
              <tbody>
                <tr ng-repeat="z in appTwo track by $index">
                  <td>
                  <div class="progress">
                  <div ng-style="applyStyle({{z.Rating}})" class="progress-bar progress-bar-striped  active" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{z.Rating *20}}%;">{{z.Rating}}</div>
                  </div>
                  </td>
                  <td>{{z.Weightage}}</td>
                  <td>{{z.Target}}</td>
                  <td>{{((z.Rating/100)*z.Weightage) | number:2}}</td>
                  <td>{{z.Remarks}}</td>
                </tr>
                 <tr>
                  <td style="background-color: {{contextBackgroundThree}};color:{{myColThree}};letter-spacing: 3px;" colspan="3">Weightage Average Score</td>
                  <td colspan="2" style="background-color: {{contextBackgroundThree}}; color: {{myColThree}}">{{App2was | number:2}}</td>
                </tr>
              </tbody>
            </table>
          </div>
         </div>
         </div>

        <div class="row">
          <div class="table-responsive">
          <table class="table table-striped">
            <tr data-toggle="collapse" data-target="#demo4" ng-click="trans4()"><td style="letter-spacing: 3px;cursor:pointer;font-weight: bold !important;color:rgba(0,0,0,0.5);">REVIEWER RATING SUMMARY</td><td style="text-align: right"><i class="{{myIcCollapse4}}" style="font-size: 25px; {{transformation4}}"></i></td></tr>
          </table>
        </div>
         <div class="col-md-12 collapse" id="demo4">  
        
            <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                <th ng-repeat="a in columnReviewer track by $index">{{a}}</th>
              </tr>
              <tbody>
                <tr ng-repeat="z in reviewer track by $index">
                  <td>
                  <div class="progress">
                  <div ng-style="applyStyle({{z.Rating}})" class="progress-bar progress-bar-striped  active" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{z.Rating *20}}%;">{{z.Rating}}</div>
                  </div>
                  </td>
                  <td>{{z.Weightage}}</td>
                  <td>{{z.Target}}</td>
                  <td>{{((z.Rating/100)*z.Weightage) | number:2}}</td>
                  <td>{{z.Remarks}}</td>
                </tr>
                 <tr>
                  <td style="background-color: {{contextBackgroundFour}};color:{{myColFour}};letter-spacing: 3px;" colspan="3">Weightage Average Score</td>
                  <td colspan="2" style="background-color: {{contextBackgroundFour}}; color: {{myColFour}}">{{rWas | number:2}}</td>
                </tr>
              </tbody>
            </table>
          </div>
         </div>
         </div>
       
     </div>
      <div id="recommend" class="tab-pane fade">
     <div class="table-responsive">        
<table class="table table-hover table-striped">
  <tr>
    <th>Appraisers</th>
    <!-- <th>Category</th> -->
    <th>Post Date</th>
    <th>Financial year</th>
    <th>Half Year</th>
    <th>Remarks</th>
      </tr>
  <tbody>
<tr>
<td>Appraiser1</td>
<td ></td>
</tr>
<tr>
<td>Appraiser2</td>
  <td>Repeat td here</td>

</tr>
<tr>
<td>Reviewer</td>
<td>Repeat td here</td>

</tr>

  </tbody>
</table>
    </div>
    </div>
    <div id="gap" class="tab-pane fade">
    <div class="table-responsive">        
<table class="table table-hover table-striped">
  <tr>
    <th>Appraisers</th>
    <!-- <th>Category</th> -->
    <th>Post Date</th>
    <th>Financial year</th>
    <th>Half Year</th>
    <th>Remarks</th>
      </tr>
  <tbody>
<tr>
<td>Appraiser1</td>
<td>Repeat td here</td>
</tr>
<tr>
<td>Appraiser2</td>
  <td>Repeat td here</td>

</tr>
<tr>
<td>Reviewer</td>
<td>Repeat td here</td>

</tr>

  </tbody>
</table>
    </div>
    </div>
    <div id="achieve" class="tab-pane fade">
     <div class="table-responsive">        
<table class="table table-hover table-striped">
  <tr>
    <th>Appraisers</th>
    <!-- <th>Category</th> -->
    <th>Post Date</th>
    <th>Financial year</th>
    <th>Half Year</th>
    <th>Remarks</th>
      </tr>
  <tbody>
<tr>
<td>Appraiser1</td>
<td>Repeat td here</td>
</tr>
<tr>
<td>Appraiser2</td>
  <td>Repeat td here</td>

</tr>
<tr>
<td>Reviewer</td>
<td></td>

</tr>

  </tbody>
</table>
    </div>
    </div>
</div>

<!-- <div id="selfassess" class="tab-pane fade">
<div class="table-responsive" ng-controller="WasController">        
<table class="table table-hover table-striped ">
  <tr>
    <th>KPI Name</th>
    <th>Self-Score</th>
    <th>Remarks</th>
  </tr>
<tbody>
<tr ng-repeat="a in logRep">
<td>{{a.kpi_name}}</td>
<td> 
  <div class="progress">
    <div id="{{prgId}}" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="background-color: rgba(0,0,0,0.5); width:{{a.self_rating *20}}%"><input type="hidden" name="" ng-model="vala" value="{{vala}}" >{{a.self_rating}}</div>
  </div>
</td>
<td>{{a.self_remarks}}</td>
</tr>

</tbody>
</table>
    </div>
    </div> -->
  
  </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container-fluid" ng-controller="slideCtrl as vm">
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog  modal-lg" style="width: 95%;">
    
      <!-- Modal content-->
     <div class="modal-content">
      <form name="rateForm"   ng-submit="SubmitScores()">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Self Score</h4>
        </div>
        <div class="modal-body">
              <!--  -->
        <div class="row">
          <div class="col-md-12">
          <div class="table-responsive">
                 <table class="table table-striped table-hover">
                   <tr>
                     <th ng-repeat="x in columns">{{x}}</th>
                    <!--  <th  style="text-align: left;">KPI</th>
                     <th  style="text-align: left;">Remarks</th> -->

                   </tr>
                   <tbody>
                     <tr ng-repeat="y in kpilist">
                       <td>
                         {{y.Name}}
                       </td>
                       <td>{{y.Type}}</td>
                       <td><center><span>Last Saved : {{y.self_rating}}</span></center><span><rzslider
         rz-slider-model="Ratings[y.Name]"
         rz-slider-options="slider.options"></rzslider></span></td>
            <td><input type="text"  class="form-control" style=" padding: 33px 12px;" placeholder="{{y.self_remarks}}" ng-model="Remarks[y.Name]" required></td>
                     </tr>
                   </tbody>
                 </table>
               </div>
               </div>
          
        </div>
       
       
        </div>
        <div class="modal-footer">
        <button class="btn btn-default" ng-click="ShowAnswers()">Save</button>
        <button type="submit" class="btn btn-default">Submit</button>
        </div>
         </form>
      </div>
      
    </div>
  </div>

</div>
 <!-- <script type="text/javascript" src="/PMS_corephp/js/jquery.min.js"></script>
    <link href="/PMS_corephp/boot/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/PMS_corephp/boot/js/bootstrap.min.js"></script>
    <link href="/PMS_corephp/css/simple-sidebar.css" rel="stylesheet"> -->
<div class="container-fluid" style="margin-top:10px;">
<div class="row">
<div class="col-md-3" style="padding: 0px;">
<div class="panel panel-default" style="height: 150px;">
      <div class="panel-heading" >Achievements</div>
      <div class="panel-body" style="text-align: center;"> 
      <b style="font-size: 25px;">3.5</b><br>
                  <p> Grade B </p>
  <i class="fa fa-hand-rock-o fa-2x" style="float: right;margin-top: -110px;"></i>  
</div>
</div>
</div>
<div class="col-md-3">
<div class="panel panel-default" style="height: 150px;">
      <div class="panel-heading">Appraiser</div>
      <div class="panel-body" style="text-align: center;"> 
      <p>Score(1)</p>
       <p>Score(2)</p>
       <p>Score(2)</p>  
       <i class="fa fa-level-down fa-3x" style="float: left;margin-top: -50px;"></i>  
       <i class="fa fa-level-up fa-3x" style="float: right;margin-top: -50px;"></i>
</div>
</div>
</div>
<div class="col-md-3">
<div class="panel panel-default">
      <div class="panel-heading" >Wall of Achievements</div>
      <div class="panel-body" style="text-align: center;" > 
      <i class="fa fa-trophy fa-5x"></i>  
</div>
</div>
</div>
<div class="col-md-3" style="padding: 0px;">
<div class="panel panel-default" style="height: 150px;">
      <div class="panel-body"> 
      <canvas id="myChart" height="150" style="margin-top:-12px;"></canvas>
       <script src="../PMS_corephp/js/chart2.js"></script>  
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4" style="margin-left: -15px;">
<div class="panel panel-default" style="height: 200px;">
<div class="panel-body">
<p style="margin-top: -16px;text-align: center;"> <b> KPI Wise Ratings </b></p>
<canvas id="myChart1" height="120" width="" style="margin-top:-12px;"></canvas>
   <script src='../PMS_corephp/js/chart1.js'></script>
</div>
</div>
</div>
<div class="col-md-4" style="margin-left: 2px;">
 <div class="panel panel-default" style="height: 200px;">
<div class="panel-body">
<p style="margin-top: -15px;text-align: center;"> <b> KPI Wise Performance Trends </b></p>
<canvas id="myLine" height="130" width="" style="margin-top:-20px;"></canvas>
   <script src="../PMS_corephp/js/line.js"></script>
</div>
</div> 
</div>
<div class="col-md-4" style="margin-left: 13px;padding: 0px;">
<div class="panel panel-default" style="height: 200px;">
      <div class="panel-heading"> <i class="fa fa-anchor fa-2x"></i> Focus Areas</div>
      <div class="panel-body" style="text-align: justify; margin-left:20px;" >
a. Take training on XXXX<br>
b. Publish one case study every month<br>
c. Ensure obtaining minimum lead time in procurement<br>
d. Take active role in CSR activities of the company<br>          
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-3" style="padding: 0px;">
<div class="panel panel-default" style="height: 180px;">
<div class="panel-body">
<canvas id="myBubble" style="margin-top:-12px;height:80px;"></canvas>
    <script src="../PMS_corephp/js/bubble.js"></script>
</div></div></div>
<div class="col-md-3">
<div class="panel panel-default" style="height: 180px;">
<div class="panel-body">
<p style="margin-top:-15px;"><b>Top Scorers in the Organization</b></p>
<div class="progress" >
    <div class="progress-bar progress-bar-striped active progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:76%">
      76%<span id="value" style="margin-left: 112%;">2</span>
    </div>
  </div>
    <div class="progress">
    <div class="progress-bar progress-bar-striped active progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:17%">
      17%<span id="value" style="margin-left: 497%;">4</span>
    </div>
  </div>
    <div class="progress">
    <div class="progress-bar progress-bar-striped active progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:43%">
      43%<span id="value" style="margin-left: 197%;">3</span>
    </div>
  </div>
  <div class="progress">
    <div class="progress-bar progress-bar-striped active progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:90%">
      90%<span id="value" style="margin-left:94%;">1</span>
    </div>
  </div>
</div>
<style type="text/css">
  #value{
    font-size: 22px;
    color: #000000;
  }
</style>
</div>
</div>
<div class="col-md-3">
<div class="panel panel-default" style="height: 180px;">
<div class="panel-body">
<p style="margin-top: -10px;"> <b>Your Grade in Overall Organization </b></p>
<canvas id="myDon" height="100" width="240" style="margin-top:-1px;"></canvas>
<script src="../PMS_corephp/js/doughnut.js"></script>
</div>
</div>
</div>
<div class="col-md-3" style="padding: 0px;">
<div class="panel panel-default" style="height: 180px;">
<div class="panel-body" style="margin-top: -10px;">
<b >Your Action Points for Improvement</b><br>
a. Take training on XXXX<br>
b. Publish one case study every month<br>
c. Ensure obtaining minimum lead time in procurement<br>
d. Take active role in CSR activities of the company  
</div>
</div>            
</div></div>
<!-- <div class="row">
<div class="col-md-12" style="border:2px groove #8492A5; "> Access Other Apps</div>
</div> -->
<div class="row">
<div class="col-md-2" style="padding: 1px;">
<div class="panel panel-default">
<div class="panel-body" style="text-align: center;"> 
Organization Structure<br>
<i class="fa fa-sitemap fa-3x" style="margin-top: 20px;"> </i>
</div>
</div>
</div>
<div class="col-md-2">
<div class="panel panel-default">
<div class="panel-body" style="text-align: center;">
Skill matrix<br>
<i class="fa fa-sitemap fa-3x" style="margin-top: 20px;"> </i>
</div>
</div>
</div>
<div class="col-md-2">
<div class="panel panel-default">
<div class="panel-body" style="text-align: center;">
Bulls Eye<br>
<i class="fa fa-sitemap fa-3x" style="margin-top: 20px;"> </i>
</div>
</div>
</div>
<div class="col-md-2">
<div class="panel panel-default">
<div class="panel-body" style="text-align: center;">
Physometric Assessment<br>
<i class="fa fa-sitemap fa-3x" style="margin-top: 20px;"> </i>
</div>
</div>
</div>
<div class="col-md-2">
<div class="panel panel-default">
<div class="panel-body" style="text-align: center;">
Feedback <br>
<i class="fa fa-sitemap fa-3x" style="margin-top: 20px;"> </i>
</div>
</div>
</div>
<div class="col-md-2" style="padding: 1px;">
<div class="panel panel-default">
<div class="panel-body" style="text-align: center;">
Checklist Engine<br>
<i class="fa fa-sitemap fa-3x" style="margin-top: 20px;">  </i>
</div>
</div>
</div>
</div>
</div>
