<?php
/*

*/
include '../system.inc.php';
include 'functions.inc.php';

verifyAction('UPLOAD');
checkAccess('UPLOAD');


$isAjax = (isset($_POST['method']) && $_POST['method'] == 'ajax');
$path = trim(empty($_POST['d'])?getFilesPath():$_POST['d']);
verifyPath($path);
$res = '';
if(is_dir(fixPath($path))){
  if(!empty($_FILES['files']) && is_array($_FILES['files']['tmp_name'])){
    $errors = $errorsExt = array();
    foreach($_FILES['files']['tmp_name'] as $k=>$v){
      $filename = $_FILES['files']['name'][$k];
      $filename = RoxyFile::MakeUniqueFilename(fixPath($path), $filename);
      $filePath = fixPath($path).'/'.$filename;
      $isUploaded = true;
      if(!RoxyFile::CanUploadFile($filename)){
        $errorsExt[] = $filename;
        $isUploaded = false;
      }
      elseif(!move_uploaded_file($v, $filePath)){
         $errors[] = $filename; 
         $isUploaded = false;
      }
      if(is_file($filePath)){
         @chmod ($filePath, octdec(FILEPERMISSIONS));
      }
      if($isUploaded && RoxyFile::IsImage($filename) && (intval(MAX_IMAGE_WIDTH) > 0 || intval(MAX_IMAGE_HEIGHT) > 0)){
        RoxyImage::Resize($filePath, $filePath, intval(MAX_IMAGE_WIDTH), intval(MAX_IMAGE_HEIGHT));
      }
    }
    if($errors && $errorsExt)
      $res = getSuccessRes(t('E_UploadNotAll').' '.t('E_FileExtensionForbidden'));
    elseif($errorsExt)
      $res = getSuccessRes(t('E_FileExtensionForbidden'));
    elseif($errors)
      $res = getSuccessRes(t('E_UploadNotAll'));
    else
      $res = getSuccessRes();
  }
  else
    $res = getErrorRes(t('E_UploadNoFiles'));
}
else
  $res = getErrorRes(t('E_UploadInvalidPath'));

if($isAjax){
  if($errors || $errorsExt)
    $res = getErrorRes(t('E_UploadNotAll'));
  echo $res;
}
else{
  echo '
<script>
parent.fileUploaded('.$res.');
</script>';
}
?>
