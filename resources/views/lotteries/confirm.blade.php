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
          <h2 class="text-center">☆ 確認画面 ☆</h2>

          <form action="/lotteries/purchase" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="quantity" value="{{ $quantity }}">

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">お客様情報</h3>
              </div>
              <div class="panel-body">
                ID: 1234567890
                <br><br>
                お名前: 山本 太郎
              </div>
            </div>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">購入内容</h3>
              </div>
              <div class="panel-body">
                購入予定金額: {{ $lottery->lotterySpec()->first()->lot_price }} x {{ $quantity }}枚 = ¥{{ number_format($lottery->lotterySpec()->first()->lot_price * $quantity) }}
                <br><br>
                <span class="text-danger">(注意) 購入確定時のくじの残数によって、購入枚数が変わることがあります。ご了承ください。</span>
              </div>
            </div>
            <input type="hidden" name="quantity" value="5">

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">お届け先情報選択</h3>
              </div>
              <div class="panel-body">
                <div class="radio">
                  <label><input type="radio" name="shipping" value="1" checked>
                    〒111-1111 東京都 OOO OOO OOO 1-2-3
                  </label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="shipping" value="2">
                    〒222-2222 千葉県 OOO OOO OOO 1-2-3
                  </label>
                </div>
              </div>
            </div>

              </div>
            </div>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">クレジットカード選択</h3>
              </div>
              <div class="panel-body">
                <div class="radio">
                  <label><input type="radio" name="credit" value="1" checked>
                    1234-****-****-5678
                  </label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="credit" value="2">
                    9876-****-****-5432
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-12 text-center">
              <a href="/lotteries/{{ $id }}"><button type="button" class="btn btn-default">戻る</button></a>
              <button type="submit" class="btn btn-primary">この内容で確定する</button>
            </div>

          </form>

        </div>
    </div>
    <hr>
@endsection
