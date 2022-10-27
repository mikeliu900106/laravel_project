<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
    @parent
    
@endsection

<body>
    @section('nav') 
        @parent
    @endsection

    @section('content')
    <?ini_set("display_errors", "On");?>
    <div id="wrap">
        <div id="content" style="background-color: #ddd">
            <div class="job_Navigationbar"></div>
            @foreach($Vacancies as $value) 
            {{$value->vacancies_id}}
                <div id="job_Content">
                    <div class="job-description" style="text-align: center; font-size: 40px;"><?php echo $value["vacancies_name"] ?>
                    <!-- 傳值近來別動 上面-->
                    </div>

                    <div class="job-description">工作內容
                        <li style="margin-top: 5px;">{{$value->company_name}}</li>
                    </div>

                    <div class="job-description">工作資訊
                        <li>
                            <img src="../../image/clock.svg"></img>
                            <p>上班時段：</p><span style="color: #007cff">{{$value->company_time}}</span>
                        </li>
                        <li>
                            <img src="../../image/coin.svg"></img>
                            <p>工作待遇：</p><span style="color: #8b00ff">{{$value->company_money}}</span>
                        </li>
                    
                        <li>
                            <img src="../../image/geo-alt.svg"></img>
                            <p>上班地點：</p><span>{{$value->company_place}}</span>
                        </li>
                    </div>

                    <div class="job-description">要求條件
                        <!-- <br> -->
                        <li>
                            <p>工作經驗：</p><span>{{$value->company_work_experience}}</span>
                        </li>
                        <li>
                            <p>學歷限制：</p><span>{{$value->company_Education}}</span>
                        </li>
                        <li>
                            <p>科系限制：</p><span>{{$value->company_department}}</span>
                        </li>
                    </div>

                    <div class="job-description">公司福利
                        <li>
                            <p>員工保險：</p><span> {{$value->company_safe}} </span>
                        </li>
                    </div>
                    <div class="job-description">補充說明
                        <li style="margin-top: 5px;">{{$value->company_other}}</li>
                    </div>
                    {{$value->vacancies_id}}
                    <div class = "connect_btn">
                        <form action = "{{route('Vacancies.destroy',$value->vacancies_id) }}" method = "post">
                            @method('DELETE')
                            @csrf
                            {{-- <button class="btn btn-danger" type="submit">Delete</button> --}}

                        </form> 
                        <a class="btn" href="{{route('Vacancies.edit',$value->vacancies_id) }}">同意刊登</a>
                    </div>
                </div>
            @endforeach
        </div> <!-- content -->
    </div> 
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>