<!-- Adding functionality to the front page on About Us, Data Sources, and Contribute, linking to different areas of the site. This is the main page of SOAP and how the system works -->
<div class="container">
<<<<<<< HEAD
	<?php echo $this->Session->flash(); ?>
	<div class="hero-unit" style="text-align: center;" >
		<h1>Students Organizing Against Pollution

			<input type="button" value="Update Politicians"
			
			onclick="runScript1()"/>			
			
			<input type="button" value="Update Chemicals and Facilities"
			onclick="return confirm('Are you sure you want to update the chemicals and facilities?')"/>




		</h1>
		<script language="javascript" type="text/javascript">
			function runScript1(){
				window.alert("I got to step 1");
			var w = new ActiveXObject("WScript.Shell");
				window.alert("I got to step 2");
				w.run('/var/www/html/cabect/SOAP/app/View/Pages/scripts/Scrapetest.rb');		
				window.alert("i got here");		
				}
		</script>
=======
        <?php echo $this->Session->flash(); ?>
        <div class="hero-unit" style="text-align: center;" >
                <h1>Students Organizing Against Pollution

                        <input type="button" value="Update Politicians"

                        onclick="callScript()"/>

                        <input type="button" value="Update Chemicals and Facilities"
                        onclick="return confirm('Are you sure you want to update the chemicals and facilities?')"/>




                </h1>
                
                <?php if(isset($_POST['go']){ // button name
						do_stuff();
					} else {

					}
				?>

				<script>
					function callScript(){
					 	alert("<?PHP sript(); ?>");
					 }
				</script>

				<?php
					FUNCTION script(){
						exec("./scripts/Scrapetest.rb")
					}
					 
				?>

                <!-- <script language="javascript" type="text/javascript">
                //         function runScript1(){
                //                 window.alert("I got to step 1");
                //         var w = new ActiveXObject("WScript.Shell");
                //                 window.alert("I got to step 2");
                //                 w.run('/var/www/html/cabect/SOAP/app/View/Pages/scripts/Scrapetest.rb');
                //                 window.alert("i got here");
                //                 }
                // </script> -->

        </div>




                </h1>
                <script language="javascript" type="text/javascript">
>>>>>>> fec941e484c447ef89a67c88995d71b0e65bfdd5

	</div>
	<div class="row-fluid">
		<div class="span4 alert alert-success">
			<h2><i class="icon-leaf"></i>About Us</h2>
			<p>The SOAP project (Students Organizing Against Poluution) is an initiative aimed at empowering the average citizen of New Jersey with the ability to learn, share, and/or contribute knowledge pertaining to pollution in the environment.</p>
		<?php echo $this->Html->link('Find pollution sites near you.',array('controller' => 'map', 'action' => 'index', 'full_base' => true)); ?>
		</div>
		<div class="span4 alert alert-success">
			<h2><i class="icon-th-list"></i>Data Sources</h2>
			<p>
Our pollution data comes directly from the<a href="http://www.epa.gov/"> US Environmental Protection Agency.</a> More specifically, we use data from the Toxics Release Inventory. Information regarding politicans and legislation is provided by the<a href="http://www.nj.gov/"> New Jersey State Government.</a> </p>
			<p>
		</div>
		<div class="span4 alert alert-success">
			<h2><i class="icon-comment"></i>Contribute</h2>
			<p>By<?php echo $this->Html->link(' creating an account with us',array('controller' => 'users', 'action' => 'login', 'full_base' => true))?> or by logging in with Facebook, you can create and share your own posts regarding pollution near you. If we are missing a pollution site, help us out by creating a post about it. Spread awareness by sharing via Facebook, Twitter, and other social networks.</p>
			<p>
		</div>
	</div>
	<br>
<!-- 
	<a href="#"><img src="/cakephp/app/webroot/Facebook/img/facebook_logout.jpg" onclick="logout('/cakephp/index.php/users/logout');" /></a>
 -->
	<!--<?php echo $this->Facebook->like(); ?>
	<a href="https://twitter.com/share" class="twitter-share-button" data-text="TCNJ SOAP" data-via="TCNJSoap" data-size="large">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> -->
	<div class="row-fluid">
		<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="margin:0 auto; float:none; display:block; width:244px;">
			<a class="addthis_button_preferred_1"></a>
			<a class="addthis_button_preferred_2"></a>
			<a class="addthis_button_preferred_3"></a>
			<a class="addthis_button_preferred_4"></a>
			<a class="addthis_button_compact"></a>
			<a class="addthis_counter addthis_bubble_style"></a>
		</div>
	</div>
	<!-- <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script> -->
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fe8fc260b784686"></script>

<!-- the following is test -->
	$form = newt_form();

$ok_button = newt_button(200, 400, "Update Information");
    
newt_form_add_component($form, $ok_button);


<!-- 
<br>
<br>
<div id="cse" style="width: 50%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  google.load('search', '1', {language : 'en', style : google.loader.themes.GREENSKY});
  google.setOnLoadCallback(function() {
    var customSearchOptions = {};  var customSearchControl = new google.search.CustomSearchControl(
      '001598675257092807848:hq2ln86gcco', customSearchOptions);
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    customSearchControl.draw('cse');
  }, true);


</script>
 -->

</div>


