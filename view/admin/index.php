<?php
  session_start();
  ob_start();
  if($_SESSION['role']!=1){
    header('location: ../../index.php');
  }
   

    include_once "../../model/connectdb.php";
    include_once "../../model/product.php";
    include_once "../../model/catalog.php";
    include_once "../../model/detail.php";
    include_once "../../model/cart.php";
    include_once "../../model/user.php";
    include_once "../../model/donhang.php";


    include_once "../../model/thongke.php";
    include_once "../../model/global.php";
    include_once "../../model/new.php";
    include_once "../../model/img_product_img.php";


   
   include_once "header.php";
   if(isset($_GET['pg'])&&($_GET['pg']!="")){
      $pg=$_GET['pg'];
      switch ($pg) {
          case 'catalog':
            $catalog=getcatalog();
            if(isset($_POST['searchcatalog'])){
              $catalog=searchcatalog($_POST['keywordcatalog']);
            }
            include_once "catalog.php";
            break;

          case 'addcatalog':
            $err_sttadd='';
            $err_nameadd='';
            if(isset($_POST['btnsave'])){
              $sttadd=$_POST['stt'];
              $nameadd=$_POST['name'];
              $sethome=$_POST['sethome'];
              $_SESSION['addcatalog']=1;
              $catalog=getcatalog();
              if($sethome=='Hiển thị'){
                $sethome=1;
              }else{
                $sethome=0;
              }
              if($sttadd==''){
                $err_sttadd="*Bạn chưa nhập mã sản phẩm";
              }else{
              
                $kt=0;
                foreach ($catalog as $item) {
                  if($item['stt']==$sttadd){
                    $kt=1;
                    break;
                  }
                }
                if($kt==1){
                  $err_sttadd="*Số thứ tự này đã tồn tại";
                }
              }

              if($nameadd==''){
                $err_nameadd="*Bạn chưa nhập tên sản phẩm";
              }else{
                $kt=0;
                foreach ($catalog as $item) {
                  if($item['name']==$nameadd){
                    $kt=1;
                    break;
                  }
                }
                if($kt==1){
                  $err_nameadd="*Tên danh mục này đã tồn tại";
                }
              }

              if($err_sttadd=='' && $err_nameadd=='' ){
                unset($_SESSION['addcatalog']);
                $catalog=getcatalog();
                add_catalog($nameadd, $sttadd,  $sethome);
              }

            }
            if(isset($_GET['close']) && $_GET['close']){
              unset($_SESSION['addcatalog']);
            }

            $catalog=getcatalog();
            include_once "catalog.php";
            break;

          case 'updatecatalog':
            $err_nameup='';
            $err_sttup='';
            if(isset($_GET['id']) && $_GET['id']){
              $_SESSION['update_id']=$_GET['id'];
              $catalogdetail=getcatalogdetail($_SESSION['update_id']);
            }
            if(isset($_SESSION['update_id'])){
              $catalogdetail=getcatalogdetail($_SESSION['update_id']);
            }
            if(isset($_GET['close']) && $_GET['close']){
              unset($_SESSION['update_id']);
              unset($_SESSION['editcatalog']);

            }
            if(isset($_POST['btnupdate'])){
              $sttup=$_POST['stt'];
              $nameup=$_POST['name'];
              $sethomeup=$_POST['sethome'];
              $_SESSION['editcatalog']=1;
              $catalog=getcatalog();
              if($sttup==''){
                $err_sttup="*Bạn chưa nhập số thứ tự danh mục";
              }else{
                foreach ($catalog as $item) {
                  if($item['stt']==$sttup  && $item['stt']!=$catalogdetail['stt']){
                    $err_sttup="*Số thứ tự này đã tồn tại";
                    break;
                  }
                }
              }

              if($nameup==''){
                $err_nameup="*Bạn chưa nhập tên danh mục";
              }else{
                foreach ($catalog as $item) {
                  if($item['name']==$nameup && $item['name']!=$catalogdetail['name']){
                    $err_nameup="*Tên danh mục này đã tồn tại";
                    break;
                  }
                }
              }
              if($sethomeup=='Hiển thị'){
                $sethomeup=1;
              }else{
                $sethomeup=0;
              }
              if(isset($_SESSION['update_id']) && $err_nameup=='' && $err_sttup==''){
                $catalog=getcatalog();
                update_catalog($_SESSION['update_id'], $nameup, $sttup, $sethomeup);
                unset($_SESSION['update_id']);
                unset($_SESSION['editcatalog']);
                
              }    
            }
            $catalog=getcatalog();
            include_once 'catalog.php';
            break;
          case 'delcatalog':
            if(isset($_GET['id']) && $_GET['id']){
              delcatalog($_GET['id']);
            }
            $catalog=getcatalog();
            include_once 'catalog.php';
            break;
          case 'product':
            $product=getproduct();
            $catalog=getcatalog();
            if(isset($_POST['searchproduct'])){
              $product=searchproduct($_POST['keywordproduct']);
            }
            include_once 'product.php';
            break;
          case 'addproduct':
            $errma_sanphamadd='';
            $errnameadd='';
            $errpriceadd='';
            $errviewadd='';
            $errnameup='';
            $errpriceup='';
            $errma_sanphamup='';
            $errviewup='';
            if(isset($_POST['btnsave'])){
              $ma_sanphamadd=$_POST['ma_sanpham'];
              $nameadd=$_POST['name'];
              $priceadd=$_POST['price'];
              $priceoldadd=$_POST['priceold'];
              $chitietadd=$_POST['chitiet'];
              $hotadd=$_POST['hot'];
              $noibatadd=$_POST['noibat'];
              $gioitinhadd=$_POST['gioitinh'];
              $idcatalogadd=$_POST['idcatalog'];
              $bestselladd=$_POST['bestsell'];
              $trendadd=$_POST['trend'];
              $viewadd=$_POST['view'];
              $_SESSION['addproduct']=1;
              $product=getproduct();
              if($ma_sanphamadd==''){
                $errma_sanphamadd="*Bạn chưa nhập mã sản phẩm";
              }else{
               
                $kt=0;
                foreach ($product as $item) {
                  if($item['ma_sanpham']==$ma_sanphamadd){
                    $kt=1;
                    break;
                  }
                }
                if($kt==1){
                  $errma_sanphamadd="*Mã sản phẩm này đã tồn tại";
                }
              }

              if($nameadd==''){
                $errnameadd="*Bạn chưa nhập tên sản phẩm";
              }else{
                $kt=0;
                foreach ($product as $item) {
                  if($item['name']==$nameadd){
                    $kt=1;
                    break;
                  }
                }
                if($kt==1){
                  $errnameadd="*Tên sản phẩm này đã tồn tại";
                }
              }
              if($priceadd==''){
                $errpriceadd="*Bạn chưa nhập giá sản phẩm";
              }
              if($viewadd==''){
                $errviewadd="*Bạn chưa nhập lượt xem của sản phẩm";
              }
              if($hotadd=='Có'){
                $hotadd=1;
              }else{
                $hotadd=0;
              }
              if($noibatadd=='Có'){
                $noibatadd=1;
              }else{
                $noibatadd=0;
              }
              if($bestselladd=='Có'){
                $bestselladd=1;
              }else{
                $bestselladd=0;
              }
              if($trendadd=='Có'){
                $trendadd=1;
              }else{
                $trendadd=0;
              }
              if($gioitinhadd=='Unisex'){
                $gioitinhadd=0;
              }else{
                if($gioitinhadd=='Nam'){
                  $gioitinhadd=1;
                }else{
                  $gioitinhadd=2;
                }
              }
              if($errma_sanphamadd=='' && $errnameadd=='' && $errpriceadd=='' && $errviewadd==''){
                unset($_SESSION['addproduct']);
                $catalog=getcatalog();
                foreach ($catalog as $item) {
                  if($idcatalogadd==$item['name']){
                    $idcatalogadd=$item['id'];
                    break;
                  }
                }
                add_product($ma_sanphamadd,$nameadd,$priceadd,$priceoldadd,$hotadd,$noibatadd,$gioitinhadd,$idcatalogadd,$chitietadd,$bestselladd,$trendadd,$viewadd);
              }
              

              
              
            }
            if(isset($_GET['close']) && $_GET['close']){
              unset($_SESSION['addproduct']);
            }
            $catalog=getcatalog();
            $product=getproduct();
            include_once "product.php";
            break;
          case 'updateproduct':
            $errma_sanphamadd='';
            $errnameadd='';
            $errpriceadd='';
            $errviewadd='';
            $errnameup='';
            $errpriceup='';
            $errma_sanphamup='';
            $errviewup='';
            if(isset($_GET['id']) && $_GET['id']){
              $_SESSION['update_id']=$_GET['id'];
              $product_detail=getproductdetail($_SESSION['update_id']);
              $catalog_product=getcatalogdetail($product_detail['idcatalog']);
            }
            if(isset($_SESSION['update_id'])){
              $product_detail=getproductdetail($_SESSION['update_id']);
              $catalog_product=getcatalogdetail($product_detail['idcatalog']);
            }
            if(isset($_GET['close']) && $_GET['close']){
              unset($_SESSION['update_id']);
              unset($_SESSION['editproduct']);
            }
            if(isset($_POST['btnupdate'])){
              $ma_sanphamup=$_POST['ma_sanpham'];
              $nameup=$_POST['name'];
              $priceup=$_POST['price'];
              $priceoldup=$_POST['priceold'];
              $chitietup=$_POST['chitiet'];
              $hotup=$_POST['hot'];
              $noibatup=$_POST['noibat'];
              $gioitinhup=$_POST['gioitinh'];
              $idcatalogup=$_POST['idcatalog'];
              $bestsellup=$_POST['bestsell'];
              $trendup=$_POST['trend'];
              $viewup=$_POST['view'];
              $danhmucup=$idcatalogup;
              $_SESSION['editproduct']=1;
              if($hotup=='Có'){
                $hotup=1;
              }else{
                $hotup=0;
              }
              if($noibatup=='Có'){
                $noibatup=1;
              }else{
                $noibatup=0;
              }
              if($bestsellup=='Có'){
                $bestsellup=1;
              }else{
                $bestsellup=0;
              }
              if($trendup=='Có'){
                $trendup=1;
              }else{
                $trendup=0;
              }
              if($gioitinhup=='Unisex'){
                $gioitinhup=0;
              }else{
                if($gioitinhup=='Nam'){
                  $gioitinhup=1;
                }else{
                  $gioitinhup=2;
                }
              }
              $product=getproduct();
              if($ma_sanphamup==''){
                $errma_sanphamup="*Bạn chưa nhập mã sản phẩm";
              }else{
               
                $kt=0;
                foreach ($product as $item) {
                  if($item['ma_sanpham']==$ma_sanphamup && $item['ma_sanpham']!=$product_detail['ma_sanpham']){
                    $kt=1;
                    break;
                  }
                }
                if($kt==1){
                  $errma_sanphamup="*Mã sản phẩm này đã tồn tại";
                }
              }

              if($nameup==''){
                $errnameup="*Bạn chưa nhập tên sản phẩm";
              }else{
                $kt=0;
                foreach ($product as $item) {
                  if($item['name']==$nameup  && $item['name']!=$product_detail['name']){
                    $kt=1;
                    break;
                  }
                }
                if($kt==1){
                  $errnameup="*Tên sản phẩm này đã tồn tại";
                }
              }
              if($priceup==''){
                $errpriceup="*Bạn chưa nhập giá sản phẩm";
              }
              if($viewup==''){
                $errviewup="*Bạn chưa nhập lượt xem của sản phẩm";
              }
              
              if(isset($_SESSION['update_id']) && $errnameup=='' && $errpriceup=='' && $errma_sanphamup=='' && $errviewup==''){
                
                $catalog=getcatalog();
                foreach ($catalog as $item) {
                  if($idcatalogup==$item['name']){
                    $idcatalogup=$item['id'];
                    break;
                  }
                }
                update_product($_SESSION['update_id'],$ma_sanphamup,$nameup,$priceup,$priceoldup,$hotup,$noibatup,$gioitinhup,$idcatalogup,$chitietup,$bestsellup,$trendup,$viewup);
                unset($_SESSION['update_id']);
                unset($_SESSION['editproduct']);
              }    
            }
            $product=getproduct();
            $catalog=getcatalog();
            include_once 'product.php';
            break;
          case 'delproduct':
            if(isset($_GET['id']) && $_GET['id']){
              $img_product_color=get_img_product_color();
              $kt=0;
              foreach ($img_product_color as $item) {
                if($item['id_product']==$_GET['id']){
                  $kt=1;
                  break;
                }
              }
              if($kt==1){
                $errdelete=1;
              }else{
                delproduct($_GET['id']);
              }   
            }
            $product=getproduct();
            $catalog=getcatalog();
            include_once 'product.php';
            break;
          case 'user':
            $usertable=getusertable();
            if(isset($_POST['searchuser'])){
              $usertable=searchuser($_POST['keyworduser']);
            }
            include_once 'user.php';
            break;
          case 'img_product_color':
            $img_product_color=get_img_product_color();
            include_once 'img_product_color.php';
            break;
          case 'add_img_product_color':
            if(isset($_POST['btnsave'])){
              $main_img=$_FILES['img1']['name'];
              if($main_img!=''){
                $target_file1 = PATH_IMG_ADMIN . basename($main_img);
                move_uploaded_file($_FILES['img1']["tmp_name"], $target_file1);
              }
              $sub_img1=$_FILES['img2']['name'];
              if($sub_img1!=''){
                $target_file2 = PATH_IMG_ADMIN . basename($sub_img1);
                move_uploaded_file($_FILES['img2']["tmp_name"], $target_file2);
              }
              $sub_img2=$_FILES['img3']['name'];
              if($sub_img2!=''){
                $target_file3 = PATH_IMG_ADMIN . basename($sub_img2);
                move_uploaded_file($_FILES['img3']["tmp_name"], $target_file3);
              }
              $sub_img3=$_FILES['img4']['name'];
              if( $sub_img3!=''){
                $target_file4 = PATH_IMG_ADMIN . basename($sub_img3);
                move_uploaded_file($_FILES['img4']["tmp_name"], $target_file4);
              }
              $id_product=$_POST['id_product'];
              $id_color=$_POST['id_color'];
              create_img_product_color($main_img, $sub_img1, $sub_img2, $sub_img3, $id_product, $id_color );
            }
            $img_product_color=get_img_product_color();
            include_once "img_product_color.php";
            break;

          case 'update_img_product_color':
            if(isset($_GET['id']) && $_GET['id']){
              $_SESSION['update_id']=$_GET['id'];
              $img_product_color_detail=getdetail_product($_SESSION['update_id']);
            }
            if(isset($_GET['close']) && $_GET['close']){
              unset($_SESSION['update_id']);
            }
            if(isset($_POST['btnupdate'])){
              $main_img=$_FILES['img5']['name'];
              if($main_img!=''){
                $target_file = PATH_IMG_ADMIN . basename($main_img);
                move_uploaded_file($_FILES['img5']["tmp_name"], $target_file);
                if($_POST['hinhcu1']!=''){
                  $hinhcu1=PATH_IMG_ADMIN.$_POST['hinhcu1'];
                  delimghost($hinhcu1);
              }
              }else{
                if($main_img==''){
                  $main_img=$_POST['hinhcu1'];
                }
              }
              $sub_img1=$_FILES['img6']['name'];
              if($sub_img1!=''){
                $target_file2 = PATH_IMG_ADMIN . basename($sub_img1);
                move_uploaded_file($_FILES['img6']["tmp_name"], $target_file2);
                if($_POST['hinhcu2']!=''){
                  $hinhcu2=PATH_IMG_ADMIN.$_POST['hinhcu2'];
                  delimghost($hinhcu2);
              }
              }else{
                if($sub_img1==''){
                  $sub_img1=$_POST['hinhcu2'];
                }
              }
              $sub_img2=$_FILES['img7']['name'];
              if($sub_img2!=''){
                $target_file3 = PATH_IMG_ADMIN . basename($sub_img2);
                move_uploaded_file($_FILES['img7']["tmp_name"], $target_file3);
                if($_POST['hinhcu3']!=''){
                  $hinhcu3=PATH_IMG_ADMIN.$_POST['hinhcu3'];
                  delimghost($hinhcu3);
              }
              }else{
                if($sub_img2==''){
                  $sub_img2=$_POST['hinhcu3'];
                }
              }
              $sub_img3=$_FILES['img8']['name'];
              if( $sub_img3!=''){
                $target_file4 = PATH_IMG_ADMIN . basename($sub_img3);
                move_uploaded_file($_FILES['img8']["tmp_name"], $target_file4);
                if($_POST['hinhcu4']!=''){
                  $hinhcu4=PATH_IMG_ADMIN.$_POST['hinhcu4'];
                  delimghost($hinhcu4);
              }
              }else{
                if($sub_img3==''){
                  $sub_img3=$_POST['hinhcu3'];
                }
              }
              $id_product=$_POST['id_product'];
              $id_color=$_POST['id_color'];
              if(isset($_SESSION['update_id'])){
                update_img_product_color($_SESSION['update_id'],$main_img, $sub_img1, $sub_img2, $sub_img3, $id_product, $id_color);
                unset($_SESSION['update_id']);
              }    
            }
            $img_product_color=get_img_product_color();
            include_once 'img_product_color.php';
            break;

          case 'del_img_product_color':
                  if(isset($_GET['id']) && $_GET['id']){
                    $id=$_GET['id'];
                  //   if(getuser($id)['img']!=''){
                  //     $img_file=PATH_IMG_ADMIN.getuser($id)['img'];
                  //     delimghost($img_file);
                  //  }
                   del_img_product_color($_GET['id']);
                  }
                  $img_product_color=get_img_product_color();
                  include_once 'img_product_color.php';
                  break;
          case 'logout':
          unset($_SESSION['loginuser']);
          unset($_SESSION['role']);
          unset($_SESSION['iduser']);
          unset($_SESSION['usernamelogin']);
          unset($_SESSION['passwordlogin']);
          header('location: index.php');
          break;
          
          
              
         default:
            
            include_once "dashboard.php";
            break;
      }
   }else{
        
        include_once "dashboard.php";
      
   }

    include_once "footer.php";
?>

            
            
  

        
