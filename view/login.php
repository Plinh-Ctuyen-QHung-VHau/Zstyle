<div class="app-fixed">
        <ul class="app-fixed-menu">
          <li class="app-fixed-list">
            <a href="index.php" class="app-fixed-link">
              <i class="fa fa-home" aria-hidden="true"></i>
            </a>
          </li>
          <li class="app-fixed-list">
            <a href="index.php?pg=product" class="app-fixed-link">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="35"
                height="28"
                viewBox="0 0 35 28"
                fill="none">
                <path
                  d="M25 14C25 16.7614 22.7614 19 20 19C17.2386 19 15 16.7614 15 14C15 11.2386 17.2386 9 20 9C22.7614 9 25 11.2386 25 14Z"
                  fill="white" />
                <circle cx="20" cy="14" r="5" fill="#46694F" />
                <path
                  d="M34.5175 5.27734L23.8712 0C22.7722 1.52031 20.3389 2.58125 17.501 2.58125C14.6631 2.58125 12.2298 1.52031 11.1307 0L0.48448 5.27734C0.0525059 5.49609 -0.122471 6.02109 0.090782 6.45312L3.21849 12.7148C3.43721 13.1469 3.96214 13.3219 4.39412 13.1086L7.48902 11.5938C8.06863 11.3094 8.74667 11.7305 8.74667 12.3812V26.25C8.74667 27.218 9.52859 28 10.4964 28H24.4946C25.4624 28 26.2444 27.218 26.2444 26.25V12.3758C26.2444 11.7305 26.9224 11.3039 27.502 11.5883L30.5969 13.1031C31.0289 13.3219 31.5538 13.1469 31.7725 12.7094L34.9057 6.45312C35.1244 6.02109 34.9494 5.49062 34.5175 5.27734Z"
                  fill="white" />
              </svg>
            </a>
          </li>
          <li class="app-fixed-list">
            <a href="index.php?pg=design" class="app-fixed-link">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="31"
                height="31"
                viewBox="0 0 31 31"
                fill="none"> qweq
                <path
                  d="M18 15.5C18 16.8807 16.8807 18 15.5 18C14.1193 18 13 16.8807 13 15.5C13 14.1193 14.1193 13 15.5 13C16.8807 13 18 14.1193 18 15.5Z"
                  fill="white" />
              12312312321321312312312312
            </a>
          </li>quotemetawdqw
          <li class="app-fixed-list active">
            <a href="index.php?pg=login" class="app-fixed-link">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
            </a>
          </li>
          <div class="selected-option-bg"></div>
        </ul>dqw
<div class="link-mobile">
        <a href="#">Trang chủ </a>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <a href="#">Áo thun</a>dqw
      </div>
      <!-- Login -->
      <section class="login">
        <div class="container">
          <div class="login-box">
            <div class="login-auth__login">dqwd
              <div class="login-title">ĐĂNG NHẬP</div>
              <div class="login-regiter">qw
                Nếu bạn chưa có tài khoản, đăng ký
                <a href="index.php?pg=register" class="regester-link"> tại đây</a>
              </div>
            </div>
            <form action="index.php?pg=login" method="post" class="login-form">
              <?php
                if(!isset($_SESSION['usernamelogin']) || !isset($_SESSION['passwordlogin'])){
                  $_SESSION['usernamelogin']='';
                  $_SESSION['passwordlogin']='';
               }
                echo '<input name="username" type="text" placeholder="Tên tài khoản" value='.$_SESSION['usernamelogin'].'> 
                <div class="errform mb-unset">'.$errusername.'</div>
  
                <div class="login-password">
                  <input name="password" type="password" placeholder="Mật khẩu" value='.$_SESSION['passwordlogin'].' >
                  <i class="fa fa-eye hien"  onclick="anmatkhau()" aria-hidden="true"></i>
                </div>
                    </button>
                  </div>
                  <div class="form-app__google">
                    <button class="btn_google">
                    <ion-icon style="height:20px; width: 20px; margin-right: 10px" name="logo-google"></ion-icon>
                      <span> Google</span>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>