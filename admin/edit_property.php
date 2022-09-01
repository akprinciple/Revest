<?php
    require 'inc/session.php';
    $msg = "";
    if (isset($_POST['submit'])) {
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $location = mysqli_real_escape_string($connect, $_POST['location']);
        $description = mysqli_real_escape_string($connect, $_POST['description']);
        $owner = mysqli_real_escape_string($connect, $_POST['owner']);
        $price = mysqli_real_escape_string($connect, $_POST['price']);
        $return = mysqli_real_escape_string($connect, $_POST['return']);
        $term = mysqli_real_escape_string($connect, $_POST['term']);
        $type = mysqli_real_escape_string($connect, $_POST['type']);
        $distribution = mysqli_real_escape_string($connect, $_POST['distribution']);

        $insert =  mysqli_query($connect, "UPDATE properties SET location = '{$location}', address = '{$address}', description = '{$description}', owner = '{$owner}',price = '{$price}', returns = '{$return}', term = '{$term}', type = '{$type}', distribution = '{$distribution}' WHERE md5(id) = '{$_GET['p_id']}'");
        
           
                if ($insert) {
                    $msg = "<div class='mb-2 text-center'>Project successfully updated</div>";
                    
                }else{
                    $msg = "<div class='mb-2 text-danger text-center'>Error!</div>";
                }
            }
        
    if (isset($_POST['upload'])) {
        $image = urlencode($_FILES['image']['name']);
        $tmp = $_FILES['image']['tmp_name'];
        $no = rand(0000, 9999);
        $image_select = mysqli_query($connect, "SELECT image FROM properties WHERE md5(id) = '{$_GET['p_id']}'");
        $key = mysqli_fetch_array($image_select);
        $del_image = $key['image'];
        unlink('../assets/images/property/'.$del_image);
        $image_update = mysqli_query($connect, "UPDATE properties SET image = '{$no}{$image}' WHERE  md5(id) = '{$_GET['p_id']}'");
        move_uploaded_file($tmp, "../assets/images/property/$no$image");
        if ($image_update) {
            $msg = "<div class='mb-2 text-center'>Image successfully updated</div>";
                    
                }else{
                    $msg = "<div class='mb-2 text-danger text-center'>Error!</div>";
                }
    }

    if (isset($_POST['gallery_upload'])) {
       $gallery = array_filter($_FILES['gallery']['name']);
        $total = count($gallery);
        
                    for($i=0; $i < $total; $i++){
                        $tmp_gallery = $_FILES['gallery']['tmp_name'][$i];
                        $img = $_FILES['gallery']['name'][$i];
                        $no = rand(0000, 9999);
                        $newpath = "./../assets/images/gallery/".$no.$img;
                        $select_id = mysqli_query($connect, "SELECT id FROM properties WHERE md5(id) = '{$_GET['p_id']}' ORDER BY id DESC LIMIT 1");
                        $rw = mysqli_fetch_array($select_id);
                        $id = $rw['id'];
                        $quer = mysqli_query($connect, "INSERT INTO gallery (property_id, name) VALUES ('$id', '$no$img')");
                        move_uploaded_file($tmp_gallery, $newpath);
                    }
                if ($quer) {
                    $msg = "<div class='mb-2 text-center'>$total Image(s) was/were successfully added to gallery</div>";
                    
                }
            }
            if (isset($_POST['files_upload'])) {
                $file = array_filter($_FILES['file']['name']);
                 $total = count($file);
                 
                             for($i=0; $i < $total; $i++){
                                 $tmp_file = $_FILES['file']['tmp_name'][$i];
                                 $file = $_FILES['file']['name'][$i];
                                 $no = rand(0000, 9999);
                                 $newpath = "./../assets/files/".$no.$file;
                                 $select_id = mysqli_query($connect, "SELECT id FROM properties WHERE md5(id) = '{$_GET['p_id']}' ORDER BY id DESC LIMIT 1");
                                 $rw = mysqli_fetch_array($select_id);
                                 $id = $rw['id'];
                                 $quer = mysqli_query($connect, "INSERT INTO files (property_id, name) VALUES ('$id', '$no$file')");
                                 move_uploaded_file($tmp_file, $newpath);
                             }
                         if ($quer) {
                             $msg = "<div class='mb-2 text-center'>$total file(s) was/were successfully Uploaded</div>";
                             
                         }
                     }
                     if (isset($_POST['video_upload'])) {
                        $video = mysqli_real_escape_string($connect, $_POST['video']);
                        $v_sql =  mysqli_query($connect, "UPDATE properties SET video = '$video' WHERE  md5(id) = '{$_GET['p_id']}'");
                        if ($v_sql) {
                            $msg = "<div class='mb-2 text-center'>Video link was successfully updated!</div>";
                            
                        }else{
                            $msg = "<div class='mb-2 text-center'>Error! Pease try again.</div>";
                            
                        }
                     }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Property &dash; Real Estate Investment For Everyone</title>
    <?php require 'inc/toplink.php' ?>
    <style>
        .fa-trash-alt{
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 20px;
        }
    </style>
   
</head>
<body>
<?php require 'inc/header.php'; ?>
<div class="col-xxl-9">
<div class="main__content">
<div class="collapse__sidebar">
<h4>Edit Property</h4>
<a href="javascript:void(0)" class="collapse__sidebar__btn">
    <i class="fa-solid fa-bars-staggered"></i>
</a>
</div>

<div class="main__content-dashboard">
    <div class="breadcrumb-dashboard">
        <h5>Property</h5>
        <div>
            <a href="properties">All properties</a>
            <i class="fa-solid fa-arrow-right-long"></i>
            <a href="javascript:void(0)">Edit Property</a>
        </div>
    </div>
    <?php
        if(isset($_GET['p_id']) && isset($_GET['p_address'])){
    $id = $_GET['p_id'];

    $sql = mysqli_query($connect, "SELECT * FROM properties WHERE md5(id) = '{$id}'ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_array($sql);

    ?>
    <?php echo $msg; ?>
    <!-- Buttons -->
    <div class="account-info">
        <div class="account-info__btn-wrapper">
            <a href="#general" class="account-info__btn account-info__btn-active button button--effect">General</a>
            <a href="#billing" class="account-info__btn button button--effect">Featured Image</a>
            <a href="#security" class="account-info__btn button button--effect">Gallery</a>
            <a href="#investors" class="account-info__btn button button--effect">Investors</a>
            <a href="#others" class="account-info__btn button button--effect">Others</a>
        </div>
        <div class="account-content_wrapper">
            <div class="account-content" id="general">
               <!-- General info -->
                <form enctype="multipart/form-data" method="post" class="save__form">
<div class="row">
  <div class="col-sm-6">
    <div class="input input--secondary">
                        <label>Location*</label>
        <select style="outline: none;" name="location">
           
            <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
            <option value="Los Angeles">Los Angeles</option>
            <option value="San Francisco, CA">San Francisco, CA</option>
            <option value="The Weldon">The Weldon</option>
            <option value="San Diego">San Diego</option>
        </select>
    </div>
  </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="saveFirstName">Address*</label>
            <input type="text" name="address"
                id="saveFirstName" placeholder="Address"
                required="required" value="<?php echo htmlentities($row['address']); ?>" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="textarea">Project Description*</label>
            <textarea name="description" id="textarea"><?php echo htmlentities($row['description']); ?></textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="area">About Project Owner</label>
            <textarea name="owner" id="area"><?php echo htmlentities($row['owner']); ?></textarea>
        </div>
    </div>
     <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="price">Price($)*</label>
            <input type="number" min="0" name="price"
                id="price" placeholder="Price in USD"
                required="required" value="<?php echo $row['price']; ?>" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="return">Annual Return(%)*</label>
            <input type="number" min="0" name="return"
                id="return" value="<?php echo $row['returns']; ?>" placeholder="Annual Return in percentage(%)"
                required="required" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="term">Maximum Term*</label>
            <input type="number" name="term"
                id="term" placeholder="In Months"
                required="required" min="1"  value="<?php echo $row['term']; ?>" />
        </div>
    </div>
    <div class="col-sm-6">
    <div class="input input--secondary">
        <label>Property Type*</label>
    <select style="outline: none;" name="type">
   
       
        <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
        <option value="Commercial">Commercial</option>
        <option value="Residential">Residential</option>
        
    </select>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="input input--secondary">
    <label>Distribution:</label>
    <select style="outline: none;" name="distribution">

    
        <option value="<?php echo $row['distribution']; ?>"><?php echo $row['distribution']; ?></option>
        <option value="Monthly">Monthly</option>
        <option value="Semi-annually">Semi-annually</option>
        <option value="Annually">Annually</option>
        <option value="Bi-annually">Bi-annually</option>
        
    </select>
    </div>
  </div>
  

                <!-- <div class="col-sm-6"></div> -->
  <div class="col-sm-6 m-auto text-center">
     <button type="submit" name="submit" class="button button--effect w-100">Update</button>
  </div>
 </div>
</form>
                    <!-- Approval Button -->
<?php 
    if ($row['status'] ==1) {
      
?>
<div class="delete-account">
    <div class="delete-content">
        <h6>Make Unavailable</h6>
        <p class="secondary">Before making this property unavailable, please note that
            it will not be available to client but will still be visible to the admin.</p>
    </div>
    <a href="approve?app=<?php echo $_GET['p_id']; ?>&p_address=<?php echo $_GET['p_address']; ?>" class="button button--effect">Unapprove</a>
</div> 
<?php }else{ ?>
    <div class="delete-account">
    <div class="delete-content">
        <h6>Make Available</h6>
        <p class="secondary">Make this property visible to Clients.</p>
    </div>
    <a href="approve?approve=<?php echo $_GET['p_id']; ?>&p_address=<?php echo $_GET['p_address']; ?>" class="button button--effect" style="background-color: #0dcaf0">Approve</a>
</div> 
    <?php } ?>
                    <!-- Delete Button -->
<div class="delete-account">
    <div class="delete-content">
        <h6>Delete Property</h6>
        <p class="secondary">Before deleting this property, please note that
            if you delete it, It cannot be recovered.</p>
    </div>
    <a href="delete?del_property=<?php echo $_GET['p_id']; ?>" class="button button--effect">Delete</a>
</div>  
            </div>
            <div class="account-content" id="billing">
                <div class="account-content-single mt-0">
                    <div class="intro">
                        <h5>Update Featured Image</h5>
                        
                    </div>
                     <div class="avatar-wrapper">
                    <div class="avatar-content border w-75">
                            <img src="../assets/images/property/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="w-100" />
                       
                    </div>
                    <form enctype="multipart/form-data" method="post">
                        <input type="file" name="image" accept=".jpg, .png, .gif" id="avatarUpload" required="required" />

                        <label for="avatarUpload">
                            Update featured Image
                        </label>
                         <!-- <div class="col-sm-6 mt-3 text-center border"> -->
                            <button type="submit" name="upload" class="button button--effect w-75 mt-2">Upload</button>
                        <!-- </div> -->
                    </form>
                </div>
                    
               
            </div>
        </div>
        <!-- Gallery -->
            <div class="account-content" id="security">


    <form method="post" enctype="multipart/form-data">
   <div style="">
    <div class="input input--secondary col-sm-9 m-auto text-center">

    <label for="avat">
        Add gallery images <i style="font-size: 12px;">(Hold CTRL to select multiple)</i>
    <input type="file" name="gallery[]" accept=".jpg, .png, .gif" id="avat" required multiple />
    </label>

        <button type="submit" name="gallery_upload" class="button button--effect">Add to gallery</button>
    </div>
    <div class="col-sm-6 pt-3 b">
    </div>
   </div>
    </form>
                <!-- Gallery Images Display -->
                <h4 class="border-bottom mb-0">Property Gallery <b style="font-size: 12px; color: red">(Drag out any image to delete)</b></h4>
                <div class="row">
            <?php
               $query = mysqli_query($connect, "SELECT * FROM gallery WHERE md5(property_id) = '{$_GET['p_id']}' ORDER BY rand()");
            foreach($query AS $rw){
               ?>
               <div class="col-md-3 position-relative p-1" style=" max-height: 300px;" id="txt<?php echo $rw['id']; ?>" draggable="true" ondragend="del<?php echo $rw['id']; ?>(event)">
                   <span title="Double Click to delete Image" class="fa-solid fa-trash-alt text-danger" ondblclick="del<?php echo $rw['id']; ?>(this.value)"></span>
                   <img src="../assets/images/gallery/<?php echo $rw['name']; ?>" class="w-100" style="max-height: 100%;" alt="<?php echo $rw['name']; ?>">
               </div>
               <script type="text/javascript">
                function del<?php echo $rw['id']; ?>(event) {
                    // event.preventDefault();
                    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txt<?php echo $rw['id']; ?>").className = this.responseText;
            }
        };
        xmlhttp.open("GET","del_image.php?q=<?php echo $rw['id']; ?>",true);
        xmlhttp.send();
    
}
</script>
            <?php } ?>
            </div>
        </div>
        <!-------------- Property Investors ------------>
        <div class="account-content" id="investors">
            <div class="investment-table">
        <div class="intro">
            <h5>Property's Investors</h5>
            <h6>
                <?php 
                   $c = mysqli_query($connect, "SELECT DISTINCT user_id FROM investments WHERE md5(property_id) = '{$_GET['p_id']}' ORDER BY id DESC");
                   echo number_format(mysqli_num_rows($c)); 
                 ?> Investor(s) | $ <?php 
                   $c = mysqli_query($connect, "SELECT SUM(amount_invested) AS total FROM investments WHERE md5(property_id) = '{$_GET['p_id']}' ORDER BY id DESC");
                   $q = mysqli_fetch_array($c);
                   echo number_format($q['total']); 
                 ?>
            </h6>
            
        </div>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>Investor's Name</th>
                        <th>Amount Invested</th>
                        <th>Transaction Id</th>
                        <th>Date</th>
                        <!-- <th>ACTIONS</th> -->
                    </tr>
                    <?php
                   $select = mysqli_query($connect, "SELECT * FROM investments WHERE md5(property_id) = '{$_GET['p_id']}' ORDER BY id DESC");
                                                  
                    $n = 1;
                    foreach($select AS $key){
                        $sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$key['user_id']}' LIMIT 1");
                        $r = mysqli_fetch_array($sql);
                        $project = mysqli_query($connect, "SELECT * FROM properties WHERE id = '{$key['property_id']}' LIMIT 1");
                        $pro = mysqli_fetch_array($project);

?>
                    <tr>
                        
                        <td><?php echo $r['firstname'] . " " .$r['lastname']; ?></td>
                        <td>$<?php echo number_format($key['amount_invested']); ?></td>
                        
                        <td><?php echo $key['transaction_id']; ?></td>
                        <td><?php echo $key['day'].".".$key['month'].".".$key['year']; ?></td>
                        
                    </tr>
                        <?php } ?>
                        
                </table>
            </div>
        </div>
     </div>
            <!-- Others: File Upload and Video link -->
            <div class="account-content" id="others">
                <div class="row">
                    <div class="col-sm-6">
                   
                        <h5>File Upload</h5>
                        <form enctype="multipart/form-data" method="post">
                        <div class="input input--secondary mt-3">
                            <label for="file">
                                Choose File <span style='font-size:12px; color: red;'>Hold Control to choose Multiple files</span>
                            
                                <input type="file" name="file[]" id="file" accept=".pdf" multiple required>
                            </label>
                        <button type="submit" name="files_upload" class="button button--effect">Add Files</button>

                        </div>
                        </form>
                            <div class="row">
                        <?php
                            $file_query = mysqli_query($connect, "SELECT * FROM files WHERE md5(property_id) = '{$_GET['p_id']}'");
                            foreach($file_query AS $file_row){
                        ?>
                            <div class="col-md-4 border-right position-relative" id="box<?php echo $file_row['id']; ?>">
                            <i class="fa-solid fa-trash-alt" title="Double Click to delete File" ondblclick="del_file<?php echo $file_row['id']; ?>(this.value)"></i>
                            <a href="../assets/files/<?php echo $file_row['name']; ?>" target="_blank" style="color: #4e0dff;">
                                <img src="../assets/images/pdf image.PNG" alt="Pdf Image" class="card-img">
                                
                                <?php echo $file_row['name']; ?>
                            </a>
                           </div>
                           <script type="text/javascript">
                function del_file<?php echo $file_row['id']; ?>() {
                    // event.preventDefault();
                    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("box<?php echo $file_row['id']; ?>").className = this.responseText;
            }
        };
        xmlhttp.open("GET","del_image.php?f=<?php echo $file_row['id']; ?>",true);
        xmlhttp.send();
    
}
</script>
                        <?php } ?>
                        </div>
                    </div>
<div class="col-sm-6">
    <h5>Add Video Link</h5>
    <form method="post">
        <div class="input input--secondary mt-3">
            <label for="video">Video Link</label>
                <input type="link" name="video" id="video" placeholder="https://" value="<?php echo htmlentities($row['video']); ?>" />
            </label>
            <button type="submit" name="video_upload" class="button button--effect mt-1">Add Video link</button>
            <button type="reset" class="button btn-danger button--effect mt-1">Reset</button>
        </div>
    </form>

    <?php
    if(!empty($row['video'])){
    ?>
    <div class="video" style="top: 0">
        <div class="container">
            <div class="video__area">
                <img src="../assets/images/video-illustration.png" alt="Video Illustration" />
                <div class="video__btn">
                    <a class="video__popup" href="<?php echo $row['video']; ?>" target="_blank"
                        title="YouTube video player">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    </div>

<?php require 'inc/footer.php' ?>
<?php require 'inc/footlink.php' ?>
<script src='tinymce/js/tinymce/tinymce.min.js'></script>

<script type="text/javascript">
    
tinymce.init({
    selector: '#textarea, #area',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
    link_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: function (callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }
    
        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }
    
        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
    },
    templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 250,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
});
</script>

</body>
</html>