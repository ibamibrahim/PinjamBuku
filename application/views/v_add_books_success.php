<html>
<head>
<title>Upload Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>PPWE_1/assets/css/bootstrap.min.css">
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
<script src="<?php echo base_url();?>PPWE_1/assets/js/jquery-3.1.1.min.js"></script>
     <script src="<?php echo base_url();?>PPWE_1/assets/js/bootstrap.min.js"></script>
</body>
</html>