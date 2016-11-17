<link rel="stylesheet" type="text/css" href="http://localhost/calender/calendar.css" media="all">
<?php 
if(isset($_GET['month']))
{
	$month=$_GET['month'];
}else
{
	$month=date('m');
}
if(isset($_GET['year']))
{
	$year=$_GET['year'];
}else
{
	$year=date('Y');
}
$c_date=date($year."-".$month."-1 12:00:00");
$start_day=date("D", strtotime($c_date));

if(strtolower($start_day)=="sun")
{
	$numday=1;
}else if(strtolower($start_day)=="mon")
{
	$numday=2;
}else if(strtolower($start_day)=="tue")
{
	$numday=3;
}else if(strtolower($start_day)=="wed")
{
	$numday=4;
}else if(strtolower($start_day)=="thu")
{
	$numday=5;
}else if(strtolower($start_day)=="fri")
{
	$numday=6;
}else if(strtolower($start_day)=="sat")
{
	$numday=7;
}

$pre_day=$numday-2;

if($month<date('m') && $year<=date('Y'))
{
	exit();
}
?>
            <div class="calenderSliderMain">
                <div class="calenderSliderIneer">
                    <div class="calenderMainWrap">
                        <div class="calenderHeading">
                        	<?php
							if($month==12)
							{
								$nextmonth=1;
								$nextyear=$year+1;
							}else
							{
								$nextmonth=$month+1;
								$nextyear=$year;
							}
							
							if($month==1)
							{
								$previousmonth=12;
								$previousyear=$year-1;
							}else
							{
								$previousmonth=$month-1;
								$previousyear=$year;
							}
							?>
                            <?php if(($previousmonth>=date('m') && $previousyear>=date('Y')) || $previousyear>date('Y')){?>
                            <a href="http://localhost/calender/callender.php/?month=<?php echo $previousmonth;?>&year=<?php echo $previousyear;?>" class="leftCalArrow cal_navarrow"></a>
                            <?php }?>
                            <time><?php echo date('M',strtotime($c_date));?>,  <?php echo $year;?></time>
                            <a href="http://localhost/calender/callender.php/?month=<?php echo $nextmonth;?>&year=<?php echo $nextyear;?>" class="rightCalArrow cal_navarrow"></a>
                        </div>
                        <div class="calenderWrap">
                            <ul class="calHeader">
                                <li>Sun</li>
                                <li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                            </ul>
                            <ul class="calDates">

                                <?php
								$days=cal_days_in_month(CAL_GREGORIAN, $month, $year);
								$prev_month_days=cal_days_in_month(CAL_GREGORIAN, $previousmonth, $previousyear);
								if($numday==1)
								{
									$count=0;
									$continueEventDays=0;
									for ($date=1; $date <= $days; $date++)
									{
										$addition_class="";
										$tempdate=date_create($date."-".$month."-".$year);
										$this_date=date_format($tempdate,"dmY");;
										//$this_date=date('dmY', strtotime(date($date)));
										?>
										<li><?php echo $date;?></li>
								<?php }
								}else
								{
									for ($date=$prev_month_days-$pre_day; $date <= $prev_month_days; $date++)
									{ ?>
									<li class="disable"><?php echo $date;?></li>
								<?php }
									$count=0;
									$continueEventDays=0;
									for ($date=1; $date <= $days; $date++)
									{
										$addition_class="";
										$tempdate=date_create($date."-".$month."-".$year);
										$this_date=date_format($tempdate,"dmY");;
										//$this_date=date('dmY', strtotime(date($date)));
										?>
									<li><?php echo $date;?></li>
								<?php }
								}?>
                                    
                            </ul>
                        </div>        
                    </div>

                </div><!-- calenderSliderIneer end -->
            </div> <!-- calenderSliderMain end -->