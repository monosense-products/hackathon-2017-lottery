@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> {{$lottery['name']}}
            <a class="btn btn-success pull-right" href="#">ログイン</a>
        </h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">☆ 景品一覧 ☆</h2>

            <h3>開始日時：{{$lottery['open_time']}}</h3>
            <h3>終了日時：{{$lottery['close_time']}}</h3>
            <h3>くじの残数：<label class="text-danger" id="last">{{$lottery['lot_count']}}</label>枚</h3>

            @foreach($lottery['grades'] as $key => $grade)
            <div class="panel {{$colors[$key]}}">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$grade['name']}}</h3>
                </div>
                <div class="panel-body">
                    @foreach($grade['skus'] as $sku)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img id="img{{$sku->id}}" src="/img/{{$sku->image_code}}" alt="" width="250" height="250" {!!$sku->on_sale_count === 0 ? 'class="soldout"' : ''!!}>
                                <div class="caption">
                                    <h4>{{$sku->name}}</h4>
                                    <h4>残数：<label class="text-danger" id="sku{{$sku->id}}">{{$sku->on_sale_count}}</label>個</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            @if ($lottery['lot_count'] > 0)
            <form action="/lotteries/confirm" method="post" id="frm">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="{{$id}}">
                <div class="col-lg-12 text-center">
                    数量：
                    <select name="quantity" class="selectpicker">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button type="submit" class="btn btn-primary">くじを購入する</button>
                </div>
            </form>
            @endif
        </div>
    </div>
    <hr>
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    <script>
        var pusher = new Pusher("{{env('PUSHER_KEY')}}");
        var channel = pusher.subscribe('lotteries');
        channel.bind( "App\\Events\\LotteryUpdated", function(data) {
            var lottery = data.lottery;
            var lot_count = lottery.lot_count;
            var grades = lottery.grades;

            // 購入不可にする(ボタンの非表示)
            if (lot_count === 0) {
                $('#frm').hide();
            }

            // ラストワンの設定
            $('#last').text(lot_count);

            // 残数の設定
            for(var grade of grades) {
                for(var sku of grade.skus) {
                    $('#sku' + sku.id).text(sku.on_sale_count);
                    if (sku.on_sale_count === 0) $('#img' + sku.id).addClass('soldout');
                }
            }

        } );
    </script>
@endsection
