<?php
    require 'inc/session.php';
    $msg = "";
    if (isset($_POST['submit'])) {
      $content = mysqli_real_escape_string($connect, $_POST['content']);
      $date = date('Y-M-d');
      $insert = mysqli_query($connect, "UPDATE pages SET content = '{$content}', date = '$date' WHERE `page name` = '{$_GET['edit_page']}'");
      if ($insert) {
        $msg = "<div class='text-center'>Page Successfully Update</div>";
      }else{

        $msg = "<div class='text-center text-danger'>Server Encountered an error. Please try again.</div>";
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pages  &dash; Real Estate Investment For Everyone</title>
	<?php require 'inc/toplink.php' ?>
</head>
<body>
					<?php require 'inc/header.php'; ?>
                    <div class="col-xxl-9">
                        <div class="main__content">
                            <div class="collapse__sidebar">
                                <h4>Pages</h4>
                                <a href="javascript:void(0)" class="collapse__sidebar__btn">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </a>
                            </div>
                           <div class="main__content-dashboard">
                                <div class="breadcrumb-dashboard">
                                    <h5>Pages</h5>
                                    <div>
                                        <a href="index">Dashboard</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">Pages</a>
                                    </div>
                                </div>
                                <?php 
                                  if (isset($_GET['edit_page'])) {
                                    $page = $_GET['edit_page'];
                                    $sql = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = '{$page}'"); 

                                    $row = mysqli_fetch_array($sql);
                                    
                                 ?>
                                 <?php echo $msg; ?>
                                <div class="investment-table investment-table-two p-3">
                                 <div class="intro">
                                        <h5>Edit Page: <?php echo $page; ?></h5>
                                        <h6>
                                          <a href="pages" class="btn btn-primary btn--effect">&laquo;Go Back</a>
                                        </h6>
                                    </div>
                                    <form method="post">
                                      <?php if($page == 'mail' || $page == 'address'){ ?>
                                          <input type="mail" name="content" class="form-control p-3 text-center" placeholder="Input Mail" required="required" value="<?php echo $row['content']; ?>">
                                      <?php }elseif($page == 'mobile_number'){ ?>
                                               <input type="text" name="content" class="form-control p-3 text-center" placeholder="Mobile Number" required="required" value="<?php echo $row['content']; ?>">
                                      <?php } else{ ?>
                                  <textarea id="area" name="content" placeholder="Design the page contents">
                                    <?php echo $row['content']; ?>
                                  </textarea>
                                  <?php } ?>
                                  <div class="col-sm-3 mx-auto my-3 text-center">
                                   <button type="submit" name="submit" class="button button--effect w-100">Submit</button>
                                   </div>
                                </form>
                                  </div>
                                  <?php   }else{ ?>
                                <div class="investment-table investment-table-two">
                                    <div class="intro">
                                        <h5>Page</h5>
                                        <h6>Total Number of Pages <span>(
                                            <?php
                                              $sel = mysqli_query($connect, "SELECT * FROM pages");
                                              echo mysqli_num_rows($sel);
                                            ?>
                                        )</span></h6>
                                    </div>
                                    <div class="table-wrapper">
                                        <table>
                                            <tr>
                                                <th>Page Name</th>
                                                <th>Last Update</th>
                                                <th>Action</th>
                                               
                                                
                                            </tr>
                                            <?php
                                                    $select = mysqli_query($connect, "SELECT * FROM pages");
                                                  
                                                    $n = 1;
                                                    foreach($select AS $key){
                                                      

                    ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $key['page name']; ?></td>
                                                        <td><?php echo $key['date']; ?></td>
                                                        
                                                       
                                                        <td>
                                                          <a href="?edit_page=<?php echo $key['page name']; ?>">
                                                           <button class="fa-solid fa-pen btn btn-primary" title="Edit Page"></button>
                                                         </a>

                                                         
                                                        </td>
                                                    </tr>
           
                                                <?php } ?>
                                        </table>
                                    </div>
                                     </div>
                                                <?php } ?>

                                </div>
                            </div>
                            </div>
                        </div>
                    
    <!-- ==== #dashboard section end ==== -->
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