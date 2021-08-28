<?php
   if (strstr($_SERVER['HTTP_USER_AGENT'], 'Windows' )) {
   	header("Location: block_pc.html");
   	exit;
   }
      
      
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
      
      if ($file = fopen("ban.txt", "r")) {
       while(!feof($file)) {
           $line = fgets($file);
   		if($line){
   			if(get_client_ip() == trim(preg_replace('/\s\s+/', ' ', $line))) {
				header("Location: block.html");
   				exit;
   			}
   		}
       }
       fclose($file);
   	
   	// file_put_contents("chat_data.txt", "");
   }
      
      ?>
<!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml">
   <head runat="server" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
      <meta name="theme-color" content="#0e136e">
      <meta name="author" content="Nguyễn Đạt">
      <title>Lazada - Là Zá Đa</title>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <script>
         const platform = ["Win32","Linux i686","Linux armv7l","Mac68K","MacPPC","MacIntel","Win16","WinCE"];
         if(platform.indexOf(navigator.platform) != "-1")
         { 
         <?php if(!isset($_GET['door'])) echo 'location.href = "block_pc.html";' ?>
         }
      </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160211293-1"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-160211293-1');
      </script>
      <style>
         .container-sm {
         max-width: 850px;
         margin: 0 auto;
         min-height: 100%;
         display: flex;
         flex-direction: column;
         padding-bottom: 70px;
         }
         ._22mspj._1CKvCJ {
         margin-top : .75rem;
         margin-bottom: .75rem;
         }
         ._28ddEb {
         background: repeating-linear-gradient(#c4c4c4,#c4c4c4 5px,transparent 0,transparent 9px,#c4c4c4 0,#c4c4c4 10px) 0/1px 100% no-repeat,radial-gradient(circle at 0,at 7px,transparent,transparent 0,#c4c4c4 0,#c4c4c4 3px,currentColor 0) 1px 0/100% 10px repeat-y;
         background: repeating-linear-gradient(#c4c4c4,#c4c4c4 5px,transparent 0,transparent 9px,#c4c4c4 0,#c4c4c4 10px) 0/1px 100% no-repeat,radial-gradient(circle at 0 7px,transparent,transparent 2px,#c4c4c4 0,#c4c4c4 3px,currentColor 0) 1px 0/100% 10px repeat-y;
         background-clip: padding-box;
         /* border: 1px solid #c4c4c4; */
         border-left: none;
         border-radius: 2px;
         height: 104px;
         display: -webkit-flex;
         display: -moz-box;
         display: -ms-flexbox;
         display: flex;
         min-width: 0;
         }
         ._1bBnhG, ._2zfSe9 {
         text-align: center;
         -moz-box-flex: 0;
         padding: 0 .5rem;
         }
         ._1bBnhG {
         width: 6rem;
         -webkit-flex: 0 0 auto;
         -ms-flex: 0 0 auto;
         flex: 0 0 auto;
         position: relative;
         display: -webkit-flex;
         display: -moz-box;
         display: -ms-flexbox;
         display: flex;
         -webkit-flex-direction: column;
         -moz-box-orient: vertical;
         -moz-box-direction: normal;
         -ms-flex-direction: column;
         flex-direction: column;
         -webkit-justify-content: center;
         -moz-box-pack: center;
         -ms-flex-pack: center;
         justify-content: center;
         }
         ._1Mjupj, .mR8Q41 {
         border-radius: 50%;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         background-size: cover;
         background-repeat: no-repeat;
         background-position: 50%;
         }
         .mR8Q41 {
         margin: 0 auto;
         width: 3.625rem;
         height: 3.625rem;
         }
         ._25_r8I {
         position: relative;
         }
         ._1Mjupj, .mR8Q41 {
         border-radius: 50%;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         background-size: cover;
         background-repeat: no-repeat;
         background-position: 50%;
         }
         ._1Q6dCm, ._3GOM4x {
         word-break: break-word;
         overflow: hidden;
         text-overflow: ellipsis;
         -webkit-box-orient: vertical;
         }
         ._3GOM4x {
         margin-top: .5rem;
         display: block;
         display: -webkit-box;
         -webkit-line-clamp: 2;
         }
         .typo-r10 {
         font-family: -apple-system,Helvetica Neue,Helvetica,Roboto,Droid Sans,Arial,sans-serif;
         font-weight: 400;
         font-size: .625rem;
         }
         ._2GdCzy {
         min-width: .0625rem;
         background-image: repeating-linear-gradient(rgba(0,0,0,.14),rgba(0,0,0,.14) 3px,transparent 0,transparent 6px,rgba(0,0,0,.14) 0);
         }
         ._4DuhLm, ._19KiQd {
         -moz-box-flex: 1;
         min-width: 0;
         }
         ._19KiQd {
         -webkit-flex: 1;
         -ms-flex: 1;
         flex: 1;
         display: -webkit-flex;
         display: -moz-box;
         display: -ms-flexbox;
         display: flex;
         -webkit-align-items: center;
         -moz-box-align: center;
         -ms-flex-align: center;
         align-items: center;
         }
         ._4DuhLm {
         -webkit-flex: 1;
         -ms-flex: 1;
         flex: 1;
         padding-left: .5rem;
         padding-right: .5rem;
         }
         ._4DuhLm, ._19KiQd {
         -moz-box-flex: 1;
         min-width: 0;
         }
         ._1U5AHc {
         margin: 0;
         font-size: 1rem;
         font-weight: 700;
         }
         ._1U5AHc, ._2XrXpv {
         overflow: hidden;
         text-overflow: ellipsis;
         white-space: nowrap;
         }
         ._1Lw8TX {
         margin: .25rem 0 0;
         word-break: break-word;
         overflow: hidden;
         display: -webkit-box;
         text-overflow: ellipsis;
         -webkit-box-orient: vertical;
         -webkit-line-clamp: 2;
         }
         .typo-m10 {
         font-family: -apple-system,HelveticaNeueMedium,HelveticaNeue-Medium,Helvetica Neue Medium,Helvetica Neue,Roboto,Droid Sans,Arial Bold,Arial,sans-serif;
         font-weight: 500;
         font-size: .625rem;
         }
         ._1Yncph {
         color: rgba(0,0,0,.54);
         font-size: .625rem;
         margin-top: .25rem;
         margin-bottom: .5rem;
         }
         ._1pY6-s {
         overflow: hidden;
         display: -webkit-box;
         text-overflow: ellipsis;
         -webkit-box-orient: vertical;
         -webkit-line-clamp: 2;
         }
         ._20kzHc {
         width: 4.5rem;
         height: 1.75rem;
         margin-right: .5rem;
         border-radius: .125rem;
         border: none;
         padding: 0;
         display: block;
         margin-left: auto;
         outline: none;
         -webkit-flex: auto 0;
         -moz-box-flex: 1;
         -ms-flex: auto 0;
         flex: auto 0;
         }
         .typo-r12 {
         font-family: -apple-system,Helvetica Neue,Helvetica,Roboto,Droid Sans,Arial,sans-serif;
         font-weight: 400;
         font-size: .75rem;
         }
         .md-component {
         display: -webkit-flex;
         display: -moz-box;
         display: -ms-flexbox;
         display: flex;
         -webkit-flex-wrap: wrap;
         -ms-flex-wrap: wrap;
         flex-wrap: wrap;
         width: 100%;
         }
         div.hr-or {
         margin-top: 20px;
         margin-bottom: 20px;
         border: 0;
         border-top: 1px solid #eee;
         text-align: center;
         height: 0px;
         line-height: 0px;
         }
         .chat { 
         _background-color: lightblue;
         _width: 100%;
         _height: calc(60vh);
         _overflow: scroll;
         }
         a {
         text-decoration: none;
         }
      </style>
   </head>
   <body style="background-color:#eff4ff; overflow: hidden;">
      <div class="container-sm">
         <!-- Modal -->
         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Nhập tên của bạn</h5>
                  </div>
                  <div class="modal-body">
                     <center>
                        <h6 class="pb-3">Đặt tên không phù hợp sẽ bị khóa!</h6>
                     </center>
                     <input type="text" class="form-control" id="yourname" placeholder="Tên của bạn (>3 ký tự)" value="">	
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-primary" id="btn_name_login">Đăng nhập</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- Modal -->
         <div class="row justify-content-md-center">
            <div class="col text-center p-1 bg-light border-bottom text-white">
               <a onclick="javascript:location.reload()"><img src="logo-lazada-1.png"  width="127px" height="40px";/></a>
            </div>
            <div id="voucher_data">
               <div class="_22mspj _1CKvCJ">
                  <article class="_28ddEb" style="color: rgb(14 19 110);">
                     <div class="_1bBnhG">
                        <div class="_25_r8I mR8Q41" style="background-color: rgb(14 19 110);">
                           <div class="mR8Q41 _2GchKS" style="background-image: url(logo-lazada-2.png);background-size: cover;background-repeat: no-repeat;"></div>
                        </div>
                        <span class="_3GOM4x typo-r10" style="color: rgb(255, 255, 255);">Lazada Voucher</span>
                     </div>
                     <div class="_2GdCzy"></div>
                     <div class="_19KiQd border" style="background-color: rgb(255, 255, 255);">
                        <div class="_19KiQd">
                           <div class="_4DuhLm">
                              <h1 class="typo-m14 _1U5AHc" style="color: rgb(33, 33, 33);">Đang cập nhật</h1>
                              <p class="typo-m10 _1Lw8TX" style="color: rgb(117, 117, 117);">Đang cập nhật</p>
                              <div class="_1Yncph" style="color: rgb(105, 105, 105);">
                                 <div class="_1pY6-s"><span>Đang cập nhật</span></div>
                              </div>
                           </div>
                           <a href="#" target="_blank">
                           <button class="_20kzHc typo-r12" style="background: linear-gradient(to bottom right, #f76a00 0%, #f30283 100%); color: rgb(255, 255, 255);">Sưu tầm</button>
                           </a>
                        </div>
                     </div>
                  </article>
               </div>
            </div>
         </div>
         <div class="d-flex">
            <hr class="my-auto flex-grow-1">
            <div class="px-2" style="font-weight: bold; color: #999;">BẠN NGHĨ GÌ?</div>
            <hr class="my-auto flex-grow-1">
         </div>
         <div class="chat">
            <div class="toast-container position-absolute p-3 top-1 start-50 translate-middle-x overflow-auto" id="toastPlacement">
               <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
               </div>
            </div>
         </div>
         <div class="row align-items-center bg-white g-2 pb-3 p-2 shadow-lg" style="position: fixed;left: 0;right: 0;bottom: 0;z-index: 1000; background-color: #fff;max-width: 850px;margin: 0 auto;">
            <div class="col-10">
               <input type="text" class="form-control" id="message" placeholder="Bạn nghĩ gì? (>5 ký tự)" value="">			
            </div>
            <div class="col-2">
               <center><button class="btn btn-primary" type="submit" id="submit_msg"><i class="fas fa-paper-plane"></i></button></center>
            </div>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
      <script src="script.js"></script>
   </body>
</html>