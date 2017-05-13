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
          <h2 class="text-center">☆ 抽選結果 ☆</h2>
          <h3 class="text-center alert alert-danger">おめでとうございます!<br><br>こちらの商品が当選しました!</h3>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <img src="/img/15.jpg" alt="" width="250" height="250">
              <div class="caption">
                <h4>景品1</h4>
                <h4><span class="text-danger">残数：1</span></h4>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <img src="/img/8.jpg" alt="" width="250" height="250">
              <div class="caption">
                <h4>景品1</h4>
                <h4><span class="text-danger">残数：1</span></h4>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <img src="/img/2.jpg" alt="" width="250" height="250">
              <div class="caption">
                <h4>景品1</h4>
                <h4><span class="text-danger">残数：1</span></h4>
              </div>
            </div>
          </div>

          <div class="col-lg-12 text-center">
            <a href="/lotteries"><button type="button" class="btn btn-primary">つづけて購入する</button></a>
          </div>
        </div>
    </div>
    <hr>
@endsection