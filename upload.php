<?php 
$result = ''; 

if(is_array($_FILES)) {

    foreach ($_FILES['files']['name'] as $name => $value) { 

        $my_file_name = explode(".", $_FILES['files']['name'][$name]); 
        $extension_name = array("jpg", "jpeg", "png", "gif"); 
        
        if(in_array($my_file_name[1], $extension_name)) { 
            $NewImageName = md5(rand()) . '.' . $my_file_name[1]; 
            $SourcePath = $_FILES['files']['tmp_name'][$name]; 
            $TargetPath = 'upload/' . $NewImageName; 
            print_r($SourcePath);
        
            if(move_uploaded_file($SourcePath, $TargetPath)) { 
                $result .= '<div class="col-md-4"><img src="'.$TargetPath.'" class="img-responsive"></div>'; 
            } 
        }
    }
    echo $result; 
}
 ?>
