@extends('knock.layouts.dashboard')

@section('title','Dashboard')

@section('page_title_sub', 'Place where it start\'s')

@section('content')
<div class='row'>
  <div class='col-md-12'>      

    <div class="clearfix"></div>
    <div class="col-md-12">

     <div class="col-xs-6">

        <div class="small-box" style="background:Green;color:white;">
          <div class="inner">
            <h3 id="today_sales_amount">
             
            </h3>
            <p>
              Your Subscription ends in  
            </p>
          </div>
          <div class="icon">
            <!-- <i class="fa fa-rupee"></i> -->
          </div>
          <a href="#" class="small-box-footer">
            <br>
          </a>
        </div>
      </div>
    

  </div>
</div>
</div>
@endsection

@section('script')
@parent

<script type="text/javascript">

</script>
@stop