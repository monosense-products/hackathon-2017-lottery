@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> 一番くじ
            <a class="btn btn-success pull-right" href="#">ログイン</a>
        </h1>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">☆ 景品一覧 ☆</h2>

            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">ラストワン賞</h3>
                </div>
                <div class="panel-body">

                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="/img/{{ $lottery->skus()->where('id',1)->get()->first()->image_code }}" alt="" width="250" height="250">
                            <div class="caption">
                                <h4>{{ $lottery->skus()->where('id',1)->get()->first()->name }}</h4>
                                <h4><span class="text-danger">残数：1</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($grades->where('id', '>', 1) as $grade)
            @if ($grade->id === 2)
            <div class="panel panel-success">
            @elseif ($grade->id === 3)
            <div class="panel panel-info">
            @elseif ($grade->id === 4)
            <div class="panel panel-warning">
            @endif
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $grade->name }}</h3>
                </div>
                <div class="panel-body">
                    @foreach($lottery->skus()->where('grade_id', $grade->id)->get()->sortBy('id') as $sku)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="/img/{{ $sku->image_code }}" alt="" width="250" height="250">
                            <div class="caption">
                                <h4>{{ $sku->name }}</h4>
                                <h4><span class="text-danger" id="">残数：1</span></h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            <form action="/lotteries/confirm" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="col-lg-12 text-center">
                    数量：
                    <select name="quantity" class="selectpicker">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <button type="submit" class="btn btn-primary">くじを購入する</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
@endsection
