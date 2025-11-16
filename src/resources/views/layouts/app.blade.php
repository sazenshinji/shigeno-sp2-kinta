<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>勤怠管理アプリ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css')}}">

  @yield('css')
</head>

<body>
  <header class="header">

    {{-- 左側ロゴ --}}
    <div class="logo">
      <a href="{{ url('/') }}">
        <img class="logo-img" src="{{ asset('images/Coachtech.jpg') }}" alt="勤怠">
      </a>
    </div>

    {{-- ★ 右側メニュー（4 ボタン） --}}
    <nav class="header-nav">

      {{-- 勤怠（トップへ） --}}
      <a href="{{ url('/') }}" class="header-btn">勤怠</a>

      {{-- 勤怠一覧（後で作成） --}}
      <a href="#" class="header-btn">勤怠一覧</a>

      {{-- 申請（後で作成） --}}
      <a href="#" class="header-btn">申請</a>

      {{-- ログアウト --}}
      <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="header-btn btn-logout">
          ログアウト
        </button>
      </form>

    </nav>

  </header>

  <main class="content">
    @yield('content')
  </main>
</body>

</html>