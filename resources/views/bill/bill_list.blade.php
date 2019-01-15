@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title" style="float:left;">
            <h1>Topup Profit By Month
                <small>Search by month</small>

            </h1>
            {!! Form::open(['method'=>'GET','url'=>url('bill')])  !!}

            <input type="date" name="date"/>


            <input type="submit" value="search"/>
            {!! Form::close() !!}
        </div>

    </div>
    @if(\Illuminate\Support\Facades\Session::has('A'))
        <div class="row">
            <div class="alert alert-info">

                Updated success!
            </div>
        </div>
    @endif
    <div class="row">

        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Topup Count From Yangon Office</span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Card</th>
                            <th> 1000</th>
                            <th> 3000</th>
                            <th> 5000</th>
                            <th> 10000</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Card</th>
                            <th> 1000</th>
                            <th> 3000</th>
                            <th> 5000</th>
                            <th> 10000</th>
                            <th>Created At</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php
                            $data=DB::table('topup_bill')->where('by_office','yangon')->where('date',$date)->count();

                        @endphp
                        @for ($count=1;$count< 4;$count++)
                            <?php $h = 0;?>


                            <tr>
                                <td>
                                    {{$count}}
                                </td>
                                <td>
                                    @if($count== 1 )
                                        {{'Mpt'}}
                                    @elseif($count == 2)
                                        {{'Tel'}}
                                    @else
                                        {{'OOredoo'}}
                                    @endif
                                </td>

                                <td>
                                    <?php
                                    if ($data > 0) {
                                        $datat_bill_data = DB::table('topup_bill')->where('by_office', 'yangon')->where('date', $date);
                                        if ($datat_bill_data->count() > 0) {
                                            $h = 1;

                                            $datat_bill = $datat_bill_data->first();
                                        } else {
                                            $h = 0;
                                        }

                                    }?>
                                    @if($h==1)
                                        @if($count==1)
                                            {{$datat_bill->mptsm}}
                                        @elseif($count ==2)

                                            {{$datat_bill->telsm}}
                                        @else

                                            {{$datat_bill->oosm}}
                                        @endif
                                    @else
                                        @if($count==1)
                                            <?php   $formda = 'mptsm'; ?>
                                        @elseif($count ==2)
                                            <?php   $formda = 'telsm'; ?>

                                        @else
                                            <?php   $formda = 'oosm'; ?>

                                        @endif

                                        <input type="number" id="{{$formda}}" value="0" onkeyup="add_totalb()"/>
                                    @endif
                                </td>


                                <td>
                                    <?php
                                    if ($data > 0) {
                                        $datat_bill_data = DB::table('topup_bill')->where('by_office', 'yangon')->where('date', $date);
                                        if ($datat_bill_data->count() > 0) {
                                            $h = 1;

                                            $datat_bill = $datat_bill_data->first();
                                        } else {
                                            $h = 0;
                                        }

                                    }?>
                                    @if($h==1)
                                        @if($count==1)
                                            {{$datat_bill->mptmi}}
                                        @elseif($count ==2)
                                            {{$datat_bill->telmi}}
                                        @else
                                            {{$datat_bill->oomi}}
                                        @endif
                                    @else
                                        @if($count==1)
                                            <?php   $formdam = 'mptmi'; ?>
                                        @elseif($count ==2)
                                            <?php   $formdam = 'telmi'; ?>

                                        @else
                                            <?php   $formdam = 'oomi'; ?>

                                        @endif


                                        <input type="number" id="{{$formdam}}"  value="0" onkeyup="add_totalb()"/>
                                    @endif
                                </td>

                                <td>
                                    <?php
                                    $datat_bill_data = DB::table('topup_bill')->where('by_office', 'yangon')->where('date', $date);
                                    if ($datat_bill_data->count() > 0) {
                                        $h = 1;

                                        $datat_bill = $datat_bill_data->first();
                                    } else {
                                        $h = 0;
                                    }
                                    ?>
                                    @if($h==1)
                                        @if($count==1)
                                            {{$datat_bill->mptbi}}
                                        @elseif($count ==2)
                                            {{$datat_bill->telbi}}
                                        @else
                                            {{$datat_bill->oobi}}
                                        @endif
                                    @else
                                        @if($count==1)
                                            <?php   $formdab = 'mptbi'; ?>
                                        @elseif($count ==2)
                                            <?php   $formdab = 'telbi'; ?>
                                        @else
                                            <?php   $formdab = 'oobi'; ?>
                                        @endif
                                        <input type="number" id="{{$formdab}}"  value="0" onkeyup="add_totalb()"/>
                                    @endif
                                </td>
                                <td>
                                    <?php
                                    $datat_bill_data = DB::table('topup_bill')->where('by_office', 'yangon')->where('date', $date);
                                    if ($datat_bill_data->count() > 0) {
                                        $h = 1;

                                        $datat_bill = $datat_bill_data->first();
                                    } else {
                                        $h = 0;
                                    }
                                    ?>
                                    @if($h==1)
                                        @if($count ==1)
                                            {{$datat_bill->mptxb}}
                                        @elseif($count == 2)
                                            {{$datat_bill->telxb}}
                                        @else
                                            {{$datat_bill->ooxb}}
                                        @endif
                                    @else

                                        @if($count == 1)
                                            <?php   $formdax = 'mptxb'; ?>
                                        @elseif($count ==2)
                                            <?php $formdax = 'telxb'; ?>

                                        @else
                                            <?php $formdax = 'ooxb'; ?>

                                        @endif

                                        <input type="number" id="{{$formdax}}"  value="0" onkeyup="add_totalb()"/>
                                    @endif
                                </td>
                                <td>
                                    {{$date}}
                                    @if($count == 1)



                                    @endif

                                </td>
                            </tr>
                        @endfor
                        <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="'align">Total Amount:</td>
                            <td> &nbsp;
                                <?php
                                $hasfef = DB::table('topup_bill')->where('by_office', 'yangon')->where('date', $date);
                                if($hasfef->count() > 0){
                                echo $hasfef->first()->total;
                                }
                                else{
                                ?>

                                <input type="number" id="total" value="0" disabled/>
                              <!--  <input type="button" value="total" onClick="add_totalb()" /> -->


                            <?php

                                }
                                ?>
                            </td>

                            <td>   @if($h != 1)

                                    <form method="post" action="{{url('bill_add')}}">
                                        <input type="hidden" name="mptsm" id="uniqueIDmptsm">
                                        <input type="hidden" name="total" id="uniqueIDmptotal">
                                        <input type="hidden" name="oosm" id="uniqueIDoosm">
                                        <input type="hidden" name="telsm" id="uniqueIDtelsm">
                                        <input type="hidden" name="mptmi" id="uniqueIDmptmi">
                                        <input type="hidden" name="oomi" id="uniqueIDoomi">
                                        <input type="hidden" name="telmi" id="uniqueIDtelmi">
                                        <input type="hidden" name="mptbi" id="uniqueIDmptbi">
                                        <input type="hidden" name="oobi" id="uniqueIDoobi">
                                        <input type="hidden" name="telbi" id="uniqueIDtelbi">
                                        <input type="hidden" name="mptxb" id="uniqueIDmptxb">
                                        <input type="hidden" name="ooxb" id="uniqueIDooxb">
                                        <input type="hidden" name="telxb" id="uniqueIDtelxb">
                                        <input type="hidden" name="by_office" value="yangon">
                                        <input type="hidden" name="date" value="{{$date}}">

                                        <script>
                                            function add_totalb()
                                            {
                                                var mptonev  = document.getElementById('mptsm').value;
                                                var oonev    = document.getElementById('oosm').value;
                                                var telonev  = document.getElementById('telsm').value;
                                                var mptthreev= document.getElementById('mptmi').value;
                                                var oothreev = document.getElementById('oomi').value;
                                                var telthreev= document.getElementById('telmi').value;
                                                var mptfivev   = document.getElementById('mptbi').value;
                                                var oofivev   = document.getElementById('oobi').value;
                                                var telfivev   = document.getElementById('telbi').value;
                                                var mptxev   = document.getElementById('mptxb').value;
                                                var telxv   = document.getElementById('ooxb').value;
                                                var ooxv   = document.getElementById('telxb').value;
                                                var nt= (Number(mptonev) * 1000)  + (Number(oonev) * 1000) +(Number(telonev) * 1000) +(Number(mptthreev) * 3000) +(Number(oothreev) * 3000) +(Number(telthreev) * 3000) +(Number(mptfivev) * 5000)
                                                    +(Number(oofivev) * 5000) +(Number(telfivev) * 5000) +(Number(mptxev) * 10000) + (Number(telxv) * 10000) +(Number(ooxv) * 10000);
                                                document.getElementById('total').value=Number(nt);
                                            }
                                            var total=(document.getElementById('mptsm').value * 1000) + (document.getElementById('oosm').value * 1000) +(document.getElementById('telsm').value * 1000) + (document.getElementById('mptmi').value * 3000) + (document.getElementById('oomi').value * 3000) +(document.getElementById('telmi').value * 3000) +(document.getElementById('mptbi').value * 5000)+(document.getElementById('oobi').value * 5000) + (document.getElementById('telbi').value * 5000) + (document.getElementById('mptxb').value * 10000) +(document.getElementById('ooxb').value * 10000) +(document.getElementById('telxb').value * 10000);
                                            document.getElementById('total').value = total;
                                            function cal() {
                                                var mptsm = document.getElementById('mptsm').value;
                                                document.getElementById('uniqueIDmptsm').value = mptsm;
                                                var total = document.getElementById('total').value;
                                                document.getElementById('uniqueIDmptotal').value = total;
                                                var oosm = document.getElementById('oosm').value;
                                                document.getElementById('uniqueIDoosm').value = oosm;
                                                var telsm = document.getElementById('telsm').value;
                                                document.getElementById('uniqueIDtelsm').value = telsm;
                                                var mptmi = document.getElementById('mptmi').value;
                                                document.getElementById('uniqueIDmptmi').value = mptmi;
                                                var oomi = document.getElementById('oomi').value;
                                                document.getElementById('uniqueIDoomi').value = oomi;
                                                var telmi = document.getElementById('telmi').value;
                                                document.getElementById('uniqueIDtelmi').value = telmi;
                                                var mptbi = document.getElementById('mptbi').value;
                                                document.getElementById('uniqueIDmptbi').value = mptbi;
                                                var oobi = document.getElementById('oobi').value;
                                                document.getElementById('uniqueIDoobi').value = oobi;
                                                var telbi = document.getElementById('telbi').value;
                                                document.getElementById('uniqueIDtelbi').value = telbi;
                                                var mptxb = document.getElementById('mptxb').value;
                                                document.getElementById('uniqueIDmptxb').value = mptxb;
                                                var ooxb = document.getElementById('ooxb').value;
                                                document.getElementById('uniqueIDooxb').value = ooxb;
                                                var telxb = document.getElementById('telxb').value;
                                                document.getElementById('uniqueIDtelxb').value = telxb;

                                            }
                                        </script>
                                        <input type="submit" value="Calculate" onClick="cal()"/>
                                    </form>
                                @else
                                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'SuperAdmin')
                                        <form action="{{url('delete_topup_bill')}}" method="post">
                                            <input type="hidden" name="local" value="yangon"/>
                                            <input type="hidden" name="created" value="{{$date}}"/>
                                            <input type="submit" value="delete"/>
                                        </form>
                                    @endif
                                @endif</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


    <!-- END PAGE BREADCRUMB -->


    <!-- BEGIN PAGE BASE CONTENT -->
    <script>
        function add_totalt()
        {
            var mptonevt  = document.getElementById('mptsmt').value;
            var oonevt    = document.getElementById('oosmt').value;
            var telonevt  = document.getElementById('telsmt').value;
            var mptthreevt= document.getElementById('mptmit').value;
            var oothreevt = document.getElementById('oomit').value;
            var telthreevt= document.getElementById('telmit').value;
            var mptfivevt   = document.getElementById('mptbit').value;
            var oofivevt   = document.getElementById('oobit').value;
            var telfivevt   = document.getElementById('telbit').value;
            var mptxevt   = document.getElementById('mptxbt').value;
            var telxvt   = document.getElementById('ooxbt').value;
            var ooxvt   = document.getElementById('telxbt').value;
            var ntt= (Number(mptonevt) * 1000)  + (Number(oonevt) * 1000) +(Number(telonevt) * 1000) +(Number(mptthreevt) * 3000) +(Number(oothreevt) * 3000) +(Number(telthreevt) * 3000) +(Number(mptfivevt) * 5000)
                +(Number(oofivevt) * 5000) +(Number(telfivevt) * 5000) +(Number(mptxevt) * 10000) + (Number(telxvt) * 10000) +(Number(ooxvt) * 10000);
            document.getElementById('totalt').value=Number(ntt);
        }
        function calt() {
            var mptsmt = document.getElementById('mptsmt').value;
            document.getElementById('uniqueIDmptsmt').value = mptsmt;
            var totalt = document.getElementById('totalt').value;
            document.getElementById('uniqueIDmptotalt').value = totalt;
            var oosmt = document.getElementById('oosmt').value;
            document.getElementById('uniqueIDoosmt').value = oosmt;
            var telsmt = document.getElementById('telsmt').value;
            document.getElementById('uniqueIDtelsmt').value = telsmt;
            var mptmit = document.getElementById('mptmit').value;
            document.getElementById('uniqueIDmptmit').value = mptmit;
            var oomit = document.getElementById('oomit').value;
            document.getElementById('uniqueIDoomit').value = oomit;
            var telmit = document.getElementById('telmit').value;
            document.getElementById('uniqueIDtelmit').value = telmit;
            var mptbit = document.getElementById('mptbit').value;
            document.getElementById('uniqueIDmptbit').value = mptbit;
            var oobit = document.getElementById('oobit').value;
            document.getElementById('uniqueIDoobit').value = oobit;
            var telbit = document.getElementById('telbit').value;
            document.getElementById('uniqueIDtelbit').value = telbit;
            var mptxbt = document.getElementById('mptxbt').value;
            document.getElementById('uniqueIDmptxbt').value = mptxbt;
            var ooxbt = document.getElementById('ooxbt').value;
            document.getElementById('uniqueIDooxbt').value = ooxbt;
            var telxbt = document.getElementById('telxbt').value;
            document.getElementById('uniqueIDtelxbt').value = telxbt;

        }
    </script>
    <div class="row">

        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Topup Count From Taungyi Office</span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Card</th>
                            <th> 1000</th>
                            <th> 3000</th>
                            <th> 5000</th>
                            <th> 10000</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Card</th>
                            <th> 1000</th>
                            <th> 3000</th>
                            <th> 5000</th>
                            <th> 10000</th>
                            <th>Created At</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @php
                            $datat=DB::table('topup_bill')->where('by_office','taungyi')->where('date',$date)->count();

                        @endphp
                        @for ($countt=1;$countt < 4;$countt++)
                            <?php $h = 0;?>


                            <tr>
                                <td>
                                    {{$countt}}
                                </td>
                                <td>
                                    @if($countt== 1 )
                                        {{'Mpt'}}
                                    @elseif($countt == 2)
                                        {{'Tel'}}
                                    @else
                                        {{'OOredoo'}}
                                    @endif
                                </td>

                                <td>
                                    <?php
                                    if ($datat > 0) {
                                        $datat_bill_data = DB::table('topup_bill')->where('by_office', 'taungyi')->where('date', $date);
                                        if ($datat_bill_data->count() > 0) {
                                            $h = 1;

                                            $datat_bill = $datat_bill_data->first();
                                        } else {
                                            $h = 0;
                                        }

                                    }?>
                                    @if($h==1)
                                        @if($countt==1)
                                            {{$datat_bill->mptsm}}
                                        @elseif($countt ==2)

                                            {{$datat_bill->telsm}}
                                        @else

                                            {{$datat_bill->oosm}}
                                        @endif
                                    @else
                                        @if($countt==1)
                                            <?php   $formdat = 'mptsmt'; ?>
                                        @elseif($countt ==2)
                                            <?php   $formdat = 'telsmt'; ?>

                                        @else
                                            <?php   $formdat = 'oosmt'; ?>

                                        @endif

                                        <input type="number" id="{{$formdat}}"  value="0" onkeyup="add_totalt()"/>
                                    @endif
                                </td>


                                <td>
                                    <?php
                                    if ($datat > 0) {
                                        $datat_bill_data = DB::table('topup_bill')->where('by_office', 'taungyi')->where('date', $date);
                                        if ($datat_bill_data->count() > 0) {
                                            $h = 1;

                                            $datat_bill = $datat_bill_data->first();
                                        } else {
                                            $h = 0;
                                        }

                                    }?>
                                    @if($h==1)
                                        @if($countt==1)
                                            {{$datat_bill->mptmi}}
                                        @elseif($countt ==2)
                                            {{$datat_bill->telmi}}
                                        @else
                                            {{$datat_bill->oomi}}
                                        @endif
                                    @else
                                        @if($countt==1)
                                            <?php   $formdamt = 'mptmit'; ?>
                                        @elseif($countt ==2)
                                            <?php   $formdamt = 'telmit'; ?>

                                        @else
                                            <?php   $formdamt = 'oomit'; ?>

                                        @endif


                                        <input type="number" id="{{$formdamt}}"  value="0" onkeyup="add_totalt()"/>
                                    @endif
                                </td>

                                <td>
                                    <?php
                                    $datat_bill_data = DB::table('topup_bill')->where('by_office', 'taungyi')->where('date', $date);
                                    if ($datat_bill_data->count() > 0) {
                                        $h = 1;

                                        $datat_bill = $datat_bill_data->first();
                                    } else {
                                        $h = 0;
                                    }
                                    ?>
                                    @if($h==1)
                                        @if($countt==1)
                                            {{$datat_bill->mptbi}}
                                        @elseif($countt ==2)
                                            {{$datat_bill->telbi}}
                                        @else
                                            {{$datat_bill->oobi}}
                                        @endif
                                    @else
                                        @if($countt==1)
                                            <?php   $formdabt = 'mptbit'; ?>
                                        @elseif($countt ==2)
                                            <?php   $formdabt = 'telbit'; ?>
                                        @else
                                            <?php   $formdabt = 'oobit'; ?>
                                        @endif
                                        <input type="number" id="{{$formdabt}}"  value="0" onkeyup="add_totalt()"/>
                                    @endif
                                </td>
                                <td>
                                    <?php
                                    $datat_bill_data = DB::table('topup_bill')->where('by_office', 'taungyi')->where('date', $date);
                                    if ($datat_bill_data->count() > 0) {
                                        $h = 1;

                                        $datat_bill = $datat_bill_data->first();
                                    } else {
                                        $h = 0;
                                    }
                                    ?>
                                    @if($h==1)
                                        @if($countt ==1)
                                            {{$datat_bill->mptxb}}
                                        @elseif($countt == 2)
                                            {{$datat_bill->telxb}}
                                        @else
                                            {{$datat_bill->ooxb}}
                                        @endif
                                    @else

                                        @if($countt == 1)
                                            <?php   $formdaxt = 'mptxbt'; ?>
                                        @elseif($countt ==2)
                                            <?php $formdaxt = 'telxbt'; ?>

                                        @else
                                            <?php $formdaxt = 'ooxbt'; ?>

                                        @endif

                                        <input type="number" id="{{$formdaxt}}"  value="0" onkeyup="add_totalt()"/>
                                    @endif
                                </td>
                                <td>
                                    {{$date}}
                                    @if($countt == 1)



                                    @endif

                                </td>
                            </tr>
                        @endfor
                        <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="'align">Total Amount:</td>
                            <td> &nbsp;

                                <?php
                                $hasfeft = DB::table('topup_bill')->where('by_office', 'taungyi')->where('date', $date);
                                if($hasfeft->count() > 0){
                                    echo $hasfeft->first()->total;
                                }
                                else{
                                ?>

                                <input type="number" id="totalt" value="0" disabled />
                                

                                <?php

                                }
                                ?>

                            <td>

                                @if($h != 1)

                                    <form method="post" action="{{url('bill_add')}}">
                                        <input type="hidden" name="mptsm" id="uniqueIDmptsmt">
                                        <input type="hidden" name="total" id="uniqueIDmptotalt">
                                        <input type="hidden" name="oosm" id="uniqueIDoosmt">
                                        <input type="hidden" name="telsm" id="uniqueIDtelsmt">
                                        <input type="hidden" name="mptmi" id="uniqueIDmptmit">
                                        <input type="hidden" name="oomi" id="uniqueIDoomit">
                                        <input type="hidden" name="telmi" id="uniqueIDtelmit">
                                        <input type="hidden" name="mptbi" id="uniqueIDmptbit">
                                        <input type="hidden" name="oobi" id="uniqueIDoobit">
                                        <input type="hidden" name="telbi" id="uniqueIDtelbit">
                                        <input type="hidden" name="mptxb" id="uniqueIDmptxbt">
                                        <input type="hidden" name="ooxb" id="uniqueIDooxbt">
                                        <input type="hidden" name="telxb" id="uniqueIDtelxbt">
                                        <input type="hidden" name="by_office" value="taungyi">
                                        <input type="hidden" name="date" value="{{$date}}">


                                        <input type="submit" value="Calculate" onClick="calt()"/>
                                    </form>
                                @else
                                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'SuperAdmin')
                                        <form action="{{url('delete_topup_bill')}}" method="post">
                                            <input type="hidden" name="local" value="taungyi"/>

                                            <input type="hidden" name="created" value="{{$date}}"/>
                                            <input type="submit" value="delete"/>
                                        </form>
                                    @endif
                                @endif</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Topup Count In Database</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                        </div>
                        <div class="btn-group">
                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i>
                                <span class="hidden-xs"> Trigger Tools </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" id="sample_3_tools">
                                <li>
                                    <a href="javascript:;" data-action="0" class="tool-action">
                                        <i class="icon-printer"></i> Print </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="1" class="tool-action">
                                        <i class="icon-check"></i> Copy</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="2" class="tool-action">
                                        <i class="icon-doc"></i> PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="3" class="tool-action">
                                        <i class="icon-paper-clip"></i> Excel</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-action="4" class="tool-action">
                                        <i class="icon-cloud-upload"></i> CSV</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-action="5" class="tool-action">
                                        <i class="icon-refresh"></i> Reload</a>
                                </li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th> ID</th>
                                <th> Card</th>
                                <th> 1000</th>
                                <th> 3000</th>
                                <th> 5000</th>
                                <th> 10000</th>
                                <th> Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($countdt=1;$countdt < 4;$countdt++)

                                <tr>
                                    <td>
                                        {{$countdt}}
                                    </td>
                                    <td>
                                        @if($countdt== 1 )
                                            {{'Mpt'}}
                                        @elseif($countdt == 2)
                                            {{'Tel'}}
                                        @else
                                            {{'OOredoo'}}
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $oneamount=0;
                                        @endphp

                                        @if($countdt==1)
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',1],['amount','=',1000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 1000;
                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @elseif($countdt ==2)
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',3],['amount','=',1000]])->whereDate('created_at',$date);
                                                 $oneamount+=$datat_dbill->count() * 1000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @else
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',2],['amount','=',1000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 1000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($countdt==1)
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',1],['amount','=',3000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 3000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @elseif($countdt ==2)
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',3],['amount','=',3000]])->whereDate('created_at',$date);
                                                 $oneamount+=$datat_dbill->count() * 3000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @else
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',2],['amount','=',3000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 3000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($countdt==1)
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',1],['amount','=',5000]])->whereDate('created_at',$date);                                                                                $oneamount+=$datat_dbill->count() * 3000;
                                                $oneamount+=$datat_dbill->count() * 5000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @elseif($countdt ==2)
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',3],['amount','=',5000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 5000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @else
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',2],['amount','=',5000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 5000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($countdt==1)
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',1],['amount','=',10000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 10000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @elseif($countdt ==2)
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',3],['amount','=',10000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 10000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @else
                                            @php
                                                $datat_dbill=DB::connection('mysql2')->table('topup')->where([['card','=',2],['amount','=',10000]])->whereDate('created_at',$date);
                                                $oneamount+=$datat_dbill->count() * 10000;

                                            @endphp
                                            {{$datat_dbill->count()}}
                                        @endif
                                    </td>
                                    <td>
                                        {{$date}}
                                    </td>
                                </tr>



                            @endfor
                            <tr>
                                <td>4</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="'align">Total Amount:</td>
                                <td> &nbsp;
                                    {{$oneamount}}
                                </td>
                                <td></td>

                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>
    <!-- END CONTAINER -->
@endsection