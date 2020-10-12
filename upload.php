        <?php
        $secret_key = ""; // Add here your secret code
        $sharexdir = "i/"; // Directory where the files will be saved
        $domain_url = ""; // URL of your website with a slash at the end
        $lengthofstring = 8; // There is the lenth of the file name

        if ($_POST['secret'] == $secret_key) {
            function RandomString($length) {
            $keys = array_merge(range(0,9), range('a', 'z'));
            $key = '';

            for($i=0; $i < $length; $i++) {
                $key .= $keys[mt_rand(0, count($keys) - 1)];
            }
            return $key;
            }


            $image_ext = array('png', 'gif', 'jpeg', 'jpg', 'cs'); // There is all files extentions allowed
            $filename = RandomString($lengthofstring);

            $target_file = $_FILES["sharex"]["name"];
            $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    
            if (in_array(strtolower($fileType), $image_ext) && move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType)) {
                 echo "$domain_url$sharexdir$filename.$fileType";
            }   
        }
        else {
            echo "Password is incorrect";
        }

        ?>
    