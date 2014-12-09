<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title><?php echo $title;?> :: New Project </title>
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/layout.css" type="text/css" media="screen" />

	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="<?php echo base_url();?>js/admin/jquery-1.11.0.min.js"></script>
	
	<script src="<?php echo base_url();?>js/admin/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>js/admin/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/admin/jquery.equalHeight.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/admin/general.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/admin/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.fancybox.css" media="screen" />
	
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
<script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
<!------------script for tiny mce--------------->
<script src="<?php echo base_url(); ?>tinymce/tinymce.min.js" ></script>
<script type="text/javascript">
$(document).ready(function() {
	tinymce.init({
		 selector: "textarea#newsletter_desc",
		theme: "modern",
		plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "template paste textcolor colorpicker textpattern"
		],
		width: 868,
		height: 500,
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor",
		image_advtab: true,
		templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'},
    ]

	
	 });
});
</script>
<script type="text/javascript">
	var base_url= '<?php echo base_url(); ?>'+'admin/';
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo base_url();?>admin">Website Admin</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="<?php echo base_url();?>admin">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	