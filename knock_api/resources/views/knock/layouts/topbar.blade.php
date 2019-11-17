<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
            <li ><a href="/">Dashboard  </a></li>
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Schedule <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="/knock/masters/schedule_beat">Add Schedule</a></li>
          <li><a href="/knock/my_schedule">My Schedules</a></li>
     
           
        </ul>
</li>
			<!-- <li><a href="#">Record Beat</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Masters <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/knock/masters/designation">Designation</a></li>
                <li><a href="/knock/masters/police_station">Police Station</a></li>
                <li><a href="/knock/masters/police_member">Police Members</a></li>
                <li class="divider"></li>
				<li><a href="/knock/masters/beat">Beats</a></li>
				<!-- <li><a href="#">Beat Members Types</a></li> -->
				<!-- <li><a href="#">Beat Members</a></li> -->
                <li class="divider"></li>
                <!-- <li><a href="#">Checklist</a></li> -->
              </ul>
			</li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
              <li><a href="/knock/reports/pending_beats">Pending Beat Report</a></li>
                <li><a href="/knock/reports/completed_beats">Completed Beat Report</a></li>
              <li class="divider"></li>
                <li><a href="#">Beat Plan v/s Beat Executed</a></li>
                <li><a href="#">Police Station Wise</a></li>
                <li><a href="#">Police Members Wise</a></li>
                <li><a href="#">Beat Members Details</a></li>
                <li class="divider"></li>
				<li><a href="#">Crime Rate Analysis <small class="label pull-right bg-green">BI</small></a></li>
				<li><a href="#">Special Beat Analytics <small class="label pull-right bg-green">BI</small></a></li>
				
                <li class="divider"></li>
                <li><a href="#">Proposed Hotspots <small class="label pull-right bg-orange">AI</small></a></li>
              </ul>
            </li>
          </ul>
</div>
@section('script')
@parent
<script type="text/javascript">
	$(function(){

	});
</script>
@stop