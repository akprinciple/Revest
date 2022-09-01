
<?php
    require 'inc/session.php';
    $msg = "";
    $address = $description = $owner = $price = $return = $term = "";
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
        $image = htmlentities($_FILES['image']['name']);
        $gallery = array_filter($_FILES['gallery']['name']);
        $total = count($gallery);
        $no = rand(0000, 9999);
        $tmp = $_FILES['image']['tmp_name'];
        $date = date('d/M/Y');
        $path = pathinfo("upload/$image", PATHINFO_EXTENSION);
        if ($location == "Select Location") {
            $msg = "<div class='mb-2 text-danger'>Please select the location</div>";
        }elseif ($type == "Select Project Type") {
            $msg = "<div class='mb-2 text-danger'>Please select project type</div>";
        }elseif ($distribution == "Distribution") {
            $msg = "<div class='mb-2 text-danger'>Select Distribution</div>";

        }elseif ($_FILES["image"]["size"] > 1000000) {
                $msg = "<div class='text-center text-danger p-2'>The image is larger than 1mb</div>";
                }
                elseif ($path != "JPG" && $path != "jpg"  && $path != "PNG" && $path != "png" && $path != "gif") {
                      $msg = "<div class='text-danger text-center p-2'>Only jpg and png files are allowed</div>";
                    }
                    else{
            $sql =  "SELECT * FROM properties WHERE location = '{$location}' && address = '{$address}' && date = '{$date}'";
            $q_sql = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($q_sql);
            if ($count > 0) {
                $msg = "<div class='mb-2 text-danger'>The property is already existing</div>";
            }else{
                $insert = mysqli_query($connect, "INSERT INTO properties (location, address, description, owner, price, returns, term, type, distribution, image, status, date) VALUES('$location', '$address', '$description', '$owner', '$price', '$return', '$term', '$type', '$distribution', '$no$image', 1, '$date')");
                    move_uploaded_file($tmp, "../assets/images/property/$no$image");
                    for($i=0; $i < $total; $i++){
                        $tmp_gallery = $_FILES['gallery']['tmp_name'][$i];
                        $img = $_FILES['gallery']['name'][$i];
                        $newpath = "./../assets/images/gallery/".$no.$img;
                        $select_id = mysqli_query($connect, "SELECT id FROM properties ORDER BY id DESC LIMIT 1");
                        $rw = mysqli_fetch_array($select_id);
                        $id = $rw['id'];
                        $query = mysqli_query($connect, "INSERT INTO gallery (property_id, name) VALUES ('$id', '$no$img')");
                        move_uploaded_file($tmp_gallery, $newpath);
                    }
                if ($insert) {
                    $msg = "<div class='mb-2'>Project successfully added</div>";
                    
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Properties &dash; Real Estate Investment For Everyone</title>
	<?php require 'inc/toplink.php' ?>
   
</head>
<body>
<?php require 'inc/header.php'; ?>
<div class="col-xxl-9">
<div class="main__content">
<div class="collapse__sidebar">
<h4>Properties</h4>
<a href="javascript:void(0)" class="collapse__sidebar__btn">
    <i class="fa-solid fa-bars-staggered"></i>
</a>
</div>
<div class="main__content-dashboard">
   <div class="text-center"> <?php echo "$msg"; ?></div>
    <div class="account-info">
   <div class="account-info__btn-wrapper">
        <a href="#general"
            class="account-info__btn account-info__btn-active button button--effect">Properties</a> &nbsp;
        <a href="#add" class="account-info__btn button button--effect">Add New</a>
        <!-- <a href="#security" class="account-info__btn button button--effect">Security</a> -->
    </div>
    <div class="account-content_wrapper">
    <div class="account-content" id="general">
        <div class="investment-table">
        <div class="intro">
            <h5>Properties</h5>
        </div>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>LOCATION</th>
                        <th>ADDRESS</th>
                        <th>DATE</th>
                        <th>STATUS</th>
                        <!-- <th>ACTIONS</th> -->
                    </tr>
                    <?php
                        $select_all = mysqli_query($connect, "SELECT * FROM properties LIMIT 35");
                        foreach($select_all AS $key){

                    ?>
                    <tr>
                        <td>
                           <?php echo $key['location']; ?>
                        </td>
                        <td><?php echo $key['address']; ?></td>
                        <td><?php echo $key['date']; ?></td>
                        <td>
                        <?php if($key['status'] == 0){ ?>    
                        <span class="process"></span>Processing
                        <?php }else{ ?>
                            Active &nbsp;
                            <?php } ?>
                            <a href='edit_property?p_id=<?php echo md5($key['id']); ?>&&p_address=<?php echo urlencode($key['address']); ?>' class="fa-solid fa-pen text-primary" title="Edit Property"></a>
                    </td>
                    
                        <!-- <td></td> -->
                    </tr>
                        <?php } ?>
                        
                </table>
            </div>
        </div>
    </div>
        <div class="account-content" id="add">
<form enctype="multipart/form-data" method="post" class="save__form">
<div class="row">
  <div class="col-sm-6">
    <div class="input input--secondary">
                        <label>Location*</label>
        <select style="outline: none;" name="location">
            <?php if(isset($_POST['submit'])) {
               
            echo "<option value='$location'>$location</option>";
            }else{
                echo "<option data-display='Location'>Select Location</option>";

             } ?>
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
                required="required" value="<?php echo $address; ?>" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="textarea">Project Description*</label>
            <textarea name="description" id="textarea"><?php echo $description; ?></textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="area">About Project Owner</label>
            <textarea name="owner" id="area"><?php echo $owner; ?></textarea>
        </div>
    </div>
     <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="price">Price($)*</label>
            <input type="number" min="0" name="price"
                id="price" placeholder="Price in USD"
                required="required" value="<?php echo $price; ?>" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="return">Annual Return(%)*</label>
            <input type="number" min="0" name="return"
                id="return" value="<?php echo $return; ?>" placeholder="Annual Return in percentage(%)"
                required="required" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input input--secondary">
            <label for="term">Maximum Term*</label>
            <input type="number" name="term"
                id="term" placeholder="In Months"
                required="required" min="1"  value="<?php echo $term; ?>" />
        </div>
    </div>
    <div class="col-sm-6">
    <div class="input input--secondary">
        <label>Property Type*</label>
    <select style="outline: none;" name="type">
         <?php if(isset($_POST['submit'])) {
               
            echo "<option value='$type'>$type</option>";
            }else{
                echo "<option data-display='Type'>Select Project Type</option>";

             } ?>
       
        <option value="Commercial">Commercial</option>
        <option value="Residential">Residential</option>
        
    </select>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="input input--secondary">
    <label>Distribution:</label>
    <select style="outline: none;" name="distribution">

        <?php if(isset($_POST['submit'])) {
               
            echo "<option value='$distribution'>$distribution</option>";
            }else{
                echo "<option data-display='Distribution'>Distribution</option>";

             } ?>
        <option value="Monthly">Monthly</option>
        <option value="Semi-annually">Semi-annually</option>
        <option value="Annually">Annually</option>
        <option value="Bi-annually">Bi-annually</option>
        
    </select>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="input input--secondary" id="general">

    <label for="avatarUpload">
        Upload Featured Image*
    </label>
    <input type="file" name="image" accept=".jpg, .png, .gif" id="avatarUpload" required="required" />

    </div>
   </div>

   <div class="col-sm-6">
    <div class="input input--secondary" id="general">

    <label for="avatar">
        Add gallery images <i style="font-size: 12px;">(Hold CTRL to select multiple)</i>
    </label>
    <input type="file" name="gallery[]" accept=".jpg, .png, .gif" id="avatar" multiple />

    </div>
   </div>

                <!-- <div class="col-sm-6"></div> -->
  <div class="col-sm-6 m-auto text-center">
     <button type="submit" name="submit" class="button button--effect w-100">Submit</button>
  </div>
 </div>
</form>
</div>
</div>
</div>
</div>
</div>
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