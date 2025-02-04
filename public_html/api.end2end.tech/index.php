<?php

  /*!
   * api.end2end.tech - Anonymous File Uploader
   * (c) 2023 ActiveTK.
   * Released under the MIT license.
   */

  // 必須ヘッダーの出力
  header( "X-Frame-Options: deny" );
  header( "Access-Control-Allow-Origin:" );
  header( "Strict-Transport-Security: max-age=63072000; preload" );
  header( "X-XSS-Protection: 1; mode=block" );
  header( "X-Content-Type-Options: nosniff" );
  header( "X-Permitted-Cross-Domain-Policies: none" );
  header( "Referrer-Policy: same-origin" );

  // パスの取得
  // リクエストURIから先頭のスラッシュを削除したもの
  // ex: (GET /hoge/index.php HTTP/1.1) => request_path === "hoge/index.php"
  define( "request_path", ( isset( $_GET["request"] ) && is_string( $_GET["request"] ) ) ? strtolower( $_GET["request"] ) : "" );

  // ホーム
  if ( empty( request_path ) ) {
    exit( "API Docs" );
  }
  else if ( request_path == "upload" ) {
    require_once( "../api/upload.php" );
    exit();
  }

  // ファイルが存在しない場合
  header( "HTTP/1.1 404 Not Found" );
  die( "HTTP 404 - Not Found" );
