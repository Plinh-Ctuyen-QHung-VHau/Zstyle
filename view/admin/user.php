<?php
    $html_user='';
    foreach ($usertable as $item) {
        extract($item);
        if(check_img_admin($img)==''){
            $img=check_img_admin('user.webp');
        }else{
            $img=check_img_admin($img);
        }
        $html_user.='<tr>
        <td>'.$name.'</td>
        <td >'.$img.'</td>
        <td>'.$user.'</td>
        <td>'.$pass.'</td>
        <td>'.$sdt.'</td>
        <td>
           
        </td>
        </tr>';
    }


   

    // $active='';
    // $name='';
    // $user='';
    // $pass='';
    // $email='';
    // $sdt='';
    // $gioitinh='';
    // $ngaysinh='';
    // $diachi='';
    // $role='';
    // $img='user.webp';
    // $kichhoat='';
    // $hinhcu='';
    // if(isset($_SESSION['update_id']) && $_SESSION['update_id']){
    //   $active='active';
    //   if(isset($user_detail)){
    //     extract($user_detail);
    //     if($role==1){
    //       $role='Quản trị viên';
    //     }else{
    //       $role='Khách hàng';
    //     }
    //     if($kichhoat==1){
    //         $kichhoat='Kích hoạt';
    //     }else{
    //         $kichhoat='Bị khóa';
    //     }
    //     if($gioitinh==0){
    //         $gioitinh='Khác';
    //     }else{
    //         if($gioitinh==1){
    //             $gioitinh='Nam';
    //         }else{
    //             $gioitinh='Nữ';
    //         }
    //     }
    //     $hinhcu=$img;
    //     if($img==''){
    //       $img='user.webp';
    //     }
    //   }
    // }
?>

<div class="main">
        <div class="header-main">
          <div class="header-left">
            <div class="header-bar">
              <i class="fa fa-angle-left icon-bar" aria-hidden="true"></i>
            </div>
            <form action="index.php?pg=user" method="post" class="header-form">
              <div class="header-input">
                <input name="keyworduser" type="text" placeholder="Tìm kiếm " />
                <div class="header-input-icon">
                  <button name="searchuser"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
              </div>
            </form>
          </div>
          <div class="header-right">
            <div class="header-bell">
              <i class="fa fa-bell" aria-hidden="true"></i>
            </div>
            <div class="header-auth">
              <div class="header-avatar">
                <img src="../layout/assets/images/avatar.png" alt="" />
              </div>
              <div class="header-name">Chào, ZStyle</div>
            </div>
          </div>
        </div>
        <div class="dashboard">
          <div class="container">
<div class="dashboard-content" data-tab="4">
    
<div class="modal modal-addpro <?=$activeadd?>">
                <div class="modal-overlay"></div>
                <div class="modal-content modal-addproduct">
                <a href="index.php?pg=adduser&close=1">
                  <span class="modal-close">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </span>
                </a>
                  <div class="modal-main">
                   
                  </div>
                </div>
              </div>


              <div class="dashboard-heading">
                <h2 class="title-primary">Tài khoản</h2>
                <button class="dashboard-add">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                  Thêm
                </button>
                <div class="modal">
                  <div class="modal-overlay"></div>
                  <div class="modal-content">
                    <span class="modal-close">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
              
                <div class="modal modal-update <?=$activeedit?>">
                  <div class="modal-overlay"></div>
                  <div class="modal-content">
                    <a href="index.php?pg=updateuser&close=1">
                    <span class="modal-close">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </span>
                    </a>
                    <div class="modal-main">
                        
                    </div>
                  </div>
                </div>

                <table class="product">
                <thead>
                  <tr>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>SDT</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    
                    <?=$html_user;?>

                </tbody>
              </table>
            </div>