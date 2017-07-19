
<?php
include_once(dirname(__FILE__)."/include/twitter.inc.php");
include_once(dirname(__FILE__)."/include/facebook.inc.php");
include_once(dirname(__FILE__)."/include/myspace.inc.php");

$sl_options = $sl->GetOptions();
?>

<script type='text/javascript' src='<?php bloginfo('url'); ?>/wp-content/plugins/socialite/js/scriptaculous/lib/prototype.js'></script>
<script type='text/javascript' src='<?php bloginfo('url'); ?>/wp-content/plugins/socialite/js/scriptaculous/src/scriptaculous.js'></script>
<script type='text/javascript' src='<?php bloginfo('url'); ?>/wp-content/plugins/socialite/js/scriptaculous/src/effects.js'></script>
<script type='text/javascript' src='<?php bloginfo('url'); ?>/wp-content/plugins/socialite/js/socialite.js'></script>

<?php if($_POST["action"] == "update") : ?>
<div id="message" class="updated fade" style="background-color: rgb(255, 251, 204);">
	<p>Socialite Options <strong>Saved</strong>.</p>
</div>
<?php endif; ?>

<div id="div_left">
	<form method="post">
	<?php wp_nonce_field('update-options'); ?>

	<h3>General Options</h3>

	<table class="form-table">
	<tr valign="top">
		<th scope="row">URL Shortenting</th>
		<td>
			<select name="socialite[short_url_service]" id="short_url_service" size=1 onchange="sl_short_url_options()">
			<option value="zz.gd" <?= $sl_options["short_url_service"] == "zz.gd" ? "selected" : ""; ?>>zz.gd</option>
			<option value="is.gd" <?= $sl_options["short_url_service"] == "is.gd" ? "selected" : ""; ?>>is.gd</option>
			<option value="ur.ly" <?= $sl_options["short_url_service"] == "ur.ly" ? "selected" : ""; ?>>ur.ly</option>
			<option value="bit.ly" <?= $sl_options["short_url_service"] == "bit.ly" ? "selected" : ""; ?>>bit.ly</option>
			<option value="tinyurl.com" <?= $sl_options["short_url_service"] == "tinyurl.com" ? "selected" : ""; ?>>tinyurl.com</option>
			</select>
			<br />
			If you select the URL Shortening option for any Social Networking site below, the service you select here
			will be used.
			<br />
			<strong>zz.gd</strong> - Default. This is the easiest option, and gives the shortest possible URLs.<br />
			<strong>is.gd</strong> - Simple and easy to use, gives the shortest possible URLs.<br />
			<strong>ur.ly</strong> - Simple and easy to use, gives the shortest possible URLs.<br />
			<strong>bit.ly</strong> - Allows for tracking statistics on your links. Bit.ly login and API key required.<br />
			<strong>tinyurl.com</strong> - A popular service, however the URLs are longer than most other services.<br />
			<i>	
				<strong>NOTE:</strong> If you are having problems posting to Facebook, change the URL Shortening service	you selected above
				or uncheck the URL Shortening checkbox in the Facebook options section of this configuration page.
				Facebook blocks some of the URL Shortening services, preventing Socialite from posting to your Wall.
			</i>
		</td>
	</tr>
	<tr valign="top" id="bitly_options" style="display:none">
		<th scope="row">Bit.ly Options</th>
		<td>
			Bit.ly requires you to get an API key. Follow these steps to get your API key:
			<ol>
				<li><a href="http://bit.ly/account/register?rd=/" target="_blank">Sign up for a bit.ly account.</a></li>
				<li><a href="http://bit.ly/account/login?rd=/" target="_blank">Login to your bit.ly account.</a></li>
				<li><a href="http://bit.ly/account/your_api_key" target="_blank">View your bit.ly API key, and enter it below.</a></li> 
			</ol>

			<table border=0 cellspacing=0 cellpadding=0>
			<tr>
				<td>Bit.ly Login</td>
				<td><input type="text" name="socialite[bitly_login]" value="<?= htmlentities($sl_options["bitly_login"]); ?>" /></td>
			</tr>
			<tr>
				<td>Bit.ly API Key</td>
				<td><input type="text" name="socialite[bitly_api_key]" value="<?= htmlentities($sl_options["bitly_api_key"]); ?>" /></td>
			</tr>
			</table>
		<td>
	</tr>
	</table>

	<h3>Twitter Options</h3>
	<input type="hidden" name="socialite[twitter_added_friend]" value="<?= $sl_options["twitter_added_friend"]; ?>" />
	<table class="form-table">
	<tr valign="top">
		<th scope="row">
			Enable Twitter?
			<br />
			<a href="http://www.twitter.com" target="_blank">Create a Twitter Account</a>
		</th>
		<td>
			<input type="checkbox" name="socialite[twitter_enabled]" value="1" <?= $sl_options["twitter_enabled"] == 1 ? "CHECKED" : ""; ?> />
			<i>If not checked, blog posts will not be published to your Twitter account.</i>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Username or Email Address</th>
		<td><input type="text" name="socialite[twitter_login]" value="<?= htmlentities($sl_options["twitter_login"]); ?>" /></td>
	</tr>
	<tr valign="top">
		<th scope="row">Password</th>
		<td><input type="password" name="socialite[twitter_password]" value="<?= htmlentities($sl_options["twitter_password"]); ?>" /></td>
	</tr>
	<tr valign="top">
		<th scope="row">Update Twitter when Post is Created</th>
		<td>
			<input type="checkbox" name="socialite[twitter_new_post_active]" value=1 <?= $sl_options["twitter_new_post_active"] == 1 ? "CHECKED" : ""; ?> />
			Update Twitter When a Post is Created?<br />
			Text to Tweet <i>(use #title# the page title, #link# for the permalink)</i>
			<br />
			<input type="text" name="socialite[twitter_new_post_text]" size=40 value="<?= htmlentities($sl_options["twitter_new_post_text"]); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Update Twitter When an Post is Edited</th>
		<td>
			<input type="checkbox" name="socialite[twitter_edit_post_active]" value=1 <?= $sl_options["twitter_edit_post_active"] == 1 ? "CHECKED" : ""; ?> />
			Update Twitter When a Post is Edited?<br />
			Text to Tweet <i>(use #title# the page title, #link# for the permalink)</i>
			<br />
			<input type="text" name="socialite[twitter_edit_post_text]" size=40 value="<?= htmlentities($sl_options["twitter_edit_post_text"]); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Shorten URLs?</th>
		<td>
			<input type="checkbox" name="socialite[twitter_short_url]" value="1" <?= $sl_options["twitter_short_url"] == 1 ? "CHECKED" : ""; ?> />
			<i>Recommended. Only takes effect if the #link# tag is used in a template above</i>
		</td>
	</tr>
	</table>

	<h3>Facebook Options</h3>

	<table class="form-table">
	<tr valign="top">
		<th scope="row">
			Enable Facebook?
			<br />
			<a href="http://www.facebook.com" target="_blank">Create a Facebook Account</a>
		</th>
		<td>
			<input type="checkbox" name="socialite[facebook_enabled]" value="1" <?= $sl_options["facebook_enabled"] == 1 ? "CHECKED" : ""; ?> />
			<i>If not checked, blog posts will not be published to your Facebook account.</i>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Facebook Account</th>
		<td>

<?php if($sl_options["facebook_auth_token"] == "") : ?>

			<p>
			A Facebook Authentication Token is needed for Wordpress to interact with your Facebook account.
			This is a Two step process.
			</p>
			<ul>
				<li>
					<strong>Step 1:</strong>
					<?php
					// first
					$fb_url = urlencode("http://www.facebook.com/code_gen.php?xxRESULTTOKENxx&api_key=".SL_Facebook::FB_API_KEY."&v=1.0");
					// second
					$fb_url = urlencode("http://www.facebook.com/connect/prompt_permissions.php?v=1.0&fbconnect=true&display=popup&extern=1&next=$fb_url&next_cancel=$fb_url&api_key=".SL_Facebook::FB_API_KEY."&ext_perm=publish_stream&enable_profile_selector=1");
					?>
					<a href="http://www.facebook.com/login.php?v=1.0&api_key=<?= SL_Facebook::FB_API_KEY; ?>&next=<?= $fb_url; ?>&next_cancel=<?= $fb_url; ?>" target="_blank">Follow this link to log into your Facebook account</a>.
					Once you log in, follow the directions Facebook gives you. At the end you will be asked to generate
					a One Time Code. Enter this One Time Code into the text field in Step 2. The Socialite Facebook module will not
					work without the code.
				</li>
				<li>
					<strong>Step 2:</strong>
					Copy the One Time Code you received from Step 1 into the text box below.
					<br />
					Facebook One Time Code: <input type="text" name="socialite[facebook_auth_token]" value="<?= htmlentities($sl_options["facebook_auth_token"]); ?>" />
				</li>
			</ul>
			
<?php
			else :
				$fb = new SL_Facebook($sl);
				$fb_user_info = $fb->GetUserInfo();

				if(is_array($fb_user_info)) :

					$name = $fb_user_info["name"];
					if($name == "")
						$name = "{$fb_user_info["first_name"]} {$fb_user_info["last_name"]}";

					$img = $fb_user_info["pic_square"];
					if($img == "")
						$img = "http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=50";
?>

					<p style="clear: right">
						<img src="<?= $img; ?>" border=0 width=50 height=50 style="float: left; margin: 0px 10px 3px 0px" />
						<div style="clear: right">
							You are logged into Facebook as
							<strong><a href="<?= $fb_user_info["profile_url"]; ?>" target="_blank"><?= $name; ?></a></strong>.
							<br />Your One Time Code: <?= htmlentities($sl_options["facebook_auth_token"]); ?>
							<br />
							<br />Click the button below to reset the login option.
						</div>
						&nbsp;
					</p>

<?php			else : ?>

					<p style="clear: right">
						<img src="<?= $img; ?>" border=0 width=50 height=50 style="float: left; margin: 0px 10px 3px 0px" />
						<div style="clear: right">
							Your login expired. This usually happens because you assigned a one time key to your login
							with another application. Facebook does not permit this and deactivates the old login.
							<br />Click the button below to reset the login option.
						</div>
						&nbsp;
					</p>

<?php			endif; ?>

			<p>
				<input type="hidden" name="socialite[facebook_auth_token]" value="<?= $sl_options["facebook_auth_token"]; ?>" />
				<input type="hidden" name="socialite[facebook_session][session_key]" value="<?= $sl_options["facebook_session"]["session_key"]; ?>" />
				<input type="hidden" name="socialite[facebook_session][uid]" value="<?= $sl_options["facebook_session"]["uid"]; ?>" />
				<input type="hidden" name="socialite[facebook_session][expires]" value="<?= $sl_options["facebook_session"]["expires"]; ?>" />
				<input type="hidden" name="socialite[facebook_session][secret]" value="<?= $sl_options["facebook_session"]["secret"]; ?>" />
				<input type="submit" name="facebook_reset_auth_token" value="Reset Facebook Account Login" onclick="if(confirm('Are you sure you wish to reset your Facebook account? You can always add it back if you reset it and change your mind later.')) { return true; } else { return false ; }" />
			</p>

<?php		endif; ?>

		</td>
	</tr>

<?php if(is_array($fb_user_info)) : ?>
	<tr valign="top">
		<th scope="row">Post to This Facebook Page</th>
		<td>
				<select name="socialite[facebook_post_page_id]" size=1>
				<option value=""><?= $name; ?>'s Profile Page</option>
				<?php
					$page_arr = $fb->GetAdminPagesForUser();
					if(is_array($page_arr))
					{
						foreach($page_arr as $k=>$v)
						{
							$selected = $v["page_id"] == $sl_options["facebook_post_page_id"] ? "SELECTED" : "";
							print "<option value=\"{$v["page_id"]}\" $selected>{$v["name"]}</option>\n";
						}
					}
				?>
				</select>
		</td>
	</tr>
<?php		endif; ?>

	<tr valign="top">
		<th scope="row">Add Status Update to the Wall</th>
		<td>
			<input type="checkbox" name="socialite[facebook_new_post_active]" value=1 <?= $sl_options["facebook_new_post_active"] == 1 ? "CHECKED" : ""; ?> />
			Update the Status on the Wall When a Post is Created?<br />
			Wall Post Format <i>(use #title# the page title, #link# for the permalink)</i>
			<br />
			<input type="text" name="socialite[facebook_new_post_text]" size=40 value="<?= htmlentities($sl_options["facebook_new_post_text"]); ?>" />

			<br /><br />

			<input type="checkbox" name="socialite[facebook_edit_post_active]" value=1 <?= $sl_options["facebook_edit_post_active"] == 1 ? "CHECKED" : ""; ?> />
			Update the Status on the Wall When a Post is Edited?<br />
			Wall Post Format <i>(use #title# the page title, #link# for the permalink)</i>
			<br />
			<input type="text" name="socialite[facebook_edit_post_text]" size=40 value="<?= htmlentities($sl_options["facebook_edit_post_text"]); ?>" />
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Add Links to the Wall</th>
		<td>
			<input type="checkbox" name="socialite[facebook_new_link_active]" value=1 <?= $sl_options["facebook_new_link_active"] == 1 ? "CHECKED" : ""; ?> />
			Add a Link to the Wall When a Post is Created?<br />
			Link Text Format <i>(use #title# the page title, #link# for the permalink)</i>
			<br />
			<input type="text" name="socialite[facebook_new_link_text]" size=40 value="<?= htmlentities($sl_options["facebook_new_link_text"]); ?>" />

			<br /><br />

			<input type="checkbox" name="socialite[facebook_edit_link_active]" value=1 <?= $sl_options["facebook_edit_link_active"] == 1 ? "CHECKED" : ""; ?> />
			Add a Link to the Wall When a Post is Edited?<br />
			Link Text Format <i>(use #title# the page title, #link# for the permalink)</i>
			<br />
			<input type="text" name="socialite[facebook_edit_link_text]" size=40 value="<?= htmlentities($sl_options["facebook_edit_link_text"]); ?>" />
		
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Shorten URLs?</th>
		<td>
			<input type="checkbox" name="socialite[facebook_short_url]" value="1" <?= $sl_options["facebook_short_url"] == 1 ? "CHECKED" : ""; ?> />
			<i>
				Only takes effect if the #link# tag is used in a template above<br />
				<strong>NOTE:</strong> If you are having problems posting to Facebook, uncheck this option or change the URL Shortening service
				you selected above. Facebook blocks some of the URL Shortening services, preventing Socialite from posting to your Wall.
			</i>
		</td>
	</tr>
	</table>

	<h3>MySpace Options</h3>

	<table class="form-table">

<?php if(!function_exists("curl_init")) : ?>

	<tr valign="top">
		<td style="background-color: #C44; color: #000 ;">
			<strong>Warning!</strong> Socialite's MySpace module requires cURL to be installed.
			<a href="http://www.php.net/manual/en/curl.setup.php" target="_blank">Please read
			for more information</a>
		</td>
	</tr>

<?php else: ?>

	<tr valign="top">
		<th scope="row">
			Enable MySpace?
			<br />
			<a href="http://www.myspace.com" target="_blank">Create a MySpace Account</a>
		</th>
		<td>
			<input type="checkbox" name="socialite[myspace_enabled]" value="1" <?= $sl_options["myspace_enabled"] == 1 ? "CHECKED" : ""; ?> />
			<i>If not checked, blog posts will not be published to your MySpace account.</i>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Login Email</th>
		<td><input type="text" name="socialite[myspace_login]" value="<?= htmlentities($sl_options["myspace_login"]); ?>" /></td>
	</tr>
	<tr valign="top">
		<th scope="row">Login Password</th>
		<td><input type="password" name="socialite[myspace_password]" value="<?= htmlentities($sl_options["myspace_password"]); ?>" /></td>
	</tr>
	<tr valign="top">
		<th scope="row">
			Update the MySpace Blog When a Post is Created
			<br /><br />

			<i>Use the following formatting tags to customize your blog layout:</i>
			<ul class="directions">
				<li>#title# </li>
				<li>#content#</li>
				<li>#excerpt#</li>
				<li>#link# </li>
			</ul>
		</th>
		<td>
			<input type="checkbox" name="socialite[myspace_new_post_active]" value=1 <?= $sl_options["myspace_new_post_active"] == 1 ? "CHECKED" : ""; ?> />
			Post to your MySpace Blog When a Post is Created?
			<br /><br />

			Title Template<br />
			<input type="text" name="socialite[myspace_new_post_title]" value="<?= htmlentities($sl_options["myspace_new_post_title"]); ?>" size=40 />
			<i>MySpace sets a max length of <?= SL_MySpace::MS_TITLE_MAX_LEN; ?> characters</i>
			<br />

			Body Template<br />
			<textarea name="socialite[myspace_new_post_body]" cols=45 rows=6><?= htmlentities($sl_options["myspace_new_post_body"]); ?></textarea>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			Update the MySpace Blog When a Post is Edited
			<br /><br />

			<i>Use the following formatting tags to customize your blog layout:</i>
			<ul class="directions">
				<li>#title# </li>
				<li>#content#</li>
				<li>#excerpt#</li>
				<li>#link# </li>
			</ul>
		</th>
		<td>
			<input type="checkbox" name="socialite[myspace_edit_post_active]" value=1 <?= $sl_options["myspace_edit_post_active"] == 1 ? "CHECKED" : ""; ?> />
			Post to your MySpace Blog When a Post is Edited?
			<br /><br />

			Title Template<br />
			<input type="text" name="socialite[myspace_edit_post_title]" value="<?= htmlentities($sl_options["myspace_edit_post_title"]); ?>" size=40 />
			<i>MySpace sets a max length of <?= SL_MySpace::MS_TITLE_MAX_LEN; ?> characters</i>
			<br />

			Body Template<br />
			<textarea name="socialite[myspace_edit_post_body]" cols=45 rows=6><?= htmlentities($sl_options["myspace_edit_post_body"]); ?></textarea>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Blog Category for Posts</th>
		<td>
			<select name="socialite[myspace_category]" size=1>
				<option value="0" <?= $sl_options["myspace_category"] == 0 ? "SELECTED" : ""; ?>>None</option>
				<option value="1" <?= $sl_options["myspace_category"] == 1 ? "SELECTED" : ""; ?>>Art and Photography</option>
				<option value="4" <?= $sl_options["myspace_category"] == 4 ? "SELECTED" : ""; ?>>Automotive</option>
				<option value="2" <?= $sl_options["myspace_category"] == 2 ? "SELECTED" : ""; ?>>Blogging</option>
				<option value="6" <?= $sl_options["myspace_category"] == 6 ? "SELECTED" : ""; ?>>Dreams and the Supernatural</option>
				<option value="3" <?= $sl_options["myspace_category"] == 3 ? "SELECTED" : ""; ?>>Fashion, Style, Shopping</option>
				<option value="7" <?= $sl_options["myspace_category"] == 7 ? "SELECTED" : ""; ?>>Food and Restaurants</option>
				<option value="8" <?= $sl_options["myspace_category"] == 8 ? "SELECTED" : ""; ?>>Friends</option>
				<option value="9" <?= $sl_options["myspace_category"] == 9 ? "SELECTED" : ""; ?>>Games</option>
				<option value="10" <?= $sl_options["myspace_category"] == 10 ? "SELECTED" : ""; ?>>Goals, Plans, Hopes</option>
				<option value="11" <?= $sl_options["myspace_category"] == 11 ? "SELECTED" : ""; ?>>Jobs, Work, Careers</option>
				<option value="12" <?= $sl_options["myspace_category"] == 12 ? "SELECTED" : ""; ?>>Life</option>
				<option value="14" <?= $sl_options["myspace_category"] == 14 ? "SELECTED" : ""; ?>>Movies, TV, Celebrities</option>
				<option value="15" <?= $sl_options["myspace_category"] == 15 ? "SELECTED" : ""; ?>>Music</option>
				<option value="16" <?= $sl_options["myspace_category"] == 16 ? "SELECTED" : ""; ?>>MySpace</option>
				<option value="17" <?= $sl_options["myspace_category"] == 17 ? "SELECTED" : ""; ?>>News and Politics</option>
				<option value="18" <?= $sl_options["myspace_category"] == 18 ? "SELECTED" : ""; ?>>Parties and Nightlife</option>
				<option value="19" <?= $sl_options["myspace_category"] == 19 ? "SELECTED" : ""; ?>>Pets and Animals</option>
				<option value="26" <?= $sl_options["myspace_category"] == 26 ? "SELECTED" : ""; ?>>Podcast</option>
				<option value="20" <?= $sl_options["myspace_category"] == 20 ? "SELECTED" : ""; ?>>Quiz/Survey</option>
				<option value="21" <?= $sl_options["myspace_category"] == 21 ? "SELECTED" : ""; ?>>Religion and Philosophy</option>
				<option value="13" <?= $sl_options["myspace_category"] == 13 ? "SELECTED" : ""; ?>>Romance and Relationships</option>
				<option value="22" <?= $sl_options["myspace_category"] == 22 ? "SELECTED" : ""; ?>>School, College, Greek</option>
				<option value="23" <?= $sl_options["myspace_category"] == 23 ? "SELECTED" : ""; ?>>Sports</option>
				<option value="24" <?= $sl_options["myspace_category"] == 24 ? "SELECTED" : ""; ?>>Travel and Places</option>
				<option value="5" <?= $sl_options["myspace_category"] == 5 ? "SELECTED" : ""; ?>>Web, HTML, Tech</option>
				<option value="25" <?= $sl_options["myspace_category"] == 25 ? "SELECTED" : ""; ?>>Writing and Poetry</option>
			</select>
			<i>These are the categories given by MySpace when publishing a new blog entry
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Allow Comments?</th>
		<td>
			<input type="checkbox" name="socialite[myspace_allow_comments]" value=1 <?= $sl_options["myspace_allow_comments"] == 1 ? "CHECKED" : ""; ?> />
			Yes
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Privacy</th>
		<td>
			<select name="socialite[myspace_privacy]" size=1>
			<option value="0" <?= $sl_options["myspace_privacy"] == 0 ? "SELECTED" : ""; ?>>Public</option>
			<option value="1" <?= $sl_options["myspace_privacy"] == 1 ? "SELECTED" : ""; ?>>Diary</option>
			<option value="2" <?= $sl_options["myspace_privacy"] == 2 ? "SELECTED" : ""; ?>>Friends</option>
			<option value="3" <?= $sl_options["myspace_privacy"] == 3 ? "SELECTED" : ""; ?>>Preferred List</option>
			</select>
			<i>Privacy settings are created by MySpace, please read your MySpace blog page for more info</i>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Shorten URLs?</th>
		<td>
			<input type="checkbox" name="socialite[myspace_short_url]" value="1" <?= $sl_options["myspace_short_url"] == 1 ? "CHECKED" : ""; ?> />
			<i>Only takes effect if the #link# tag is used in a template above</i>
		</td>
	</tr>

<?php endif; ?>

	</table>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="socialite[initialized]" value=1 />

	<p class="submit">
	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>

	</form>
</div> <!-- id=div_left -->
<div id="div_right">
	<table border=0 cellspacing=0 cellpadding=0 width=200>
	<tr>
		<td class="td_header">Socialite</td>
	</tr>
	<tr>
		<td class="td_content">
			<img src="<?= get_bloginfo('siteurl'); ?>/wp-content/plugins/socialite/images/socialite-45x45.jpg" border=0 style="float: left; margin-right: 2px" />
			<a href="http://www.gilfether.com/socialite" target="_blank">Socialite</a> is an open source
			Wordpress plugin that allows you to publish your posts on Twitter, Facebook and MySpace.
			Please visit the <a href="http://www.gilfether.com/socialite" target="_blank">Official Socialite Homepage</a>
			for the latest updates and support questions.
			<br /><br />
			I do my best to answer all support questions, but unfortunately I have to develop this plugin in my spare
			time, so please be patient.
			<br /><br />
			<a href="http://www.gilfether.com">Ryan Gilfether</a>
		</td>
	</tr>
	</table>

	<table border=0 cellspacing=0 cellpadding=0 width=200>
	<tr>
		<td class="td_header">College-Pages.com</td>
	</tr>
	<tr>
		<td class="td_content">
			<div align="center">
				<a href="http://www.college-pages.com" target="_blank">
				<img src="<?php bloginfo('url'); ?>/wp-content/plugins/socialite/images/college-pages-logo-300x96.png" width="198" border=0 />
				</a>
			</div>

			<a href="http://www.college-pages.com" target="_blank">College-Pages.com</a> is a leading provider
			of online college education information. We have all the answers to your distance learning questions.
			Request free information from any college or university on our site. Read our daily news articles, and
			participate in our college education forums.
			<br /><br />
			What are you waiting for? <a href="http://www.college-pages.com">Get Started Today!</a>
			<p>
				<a href="http://twitter.com/collegepages" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/plugins/socialite/images/large-grey-twitter.png" border=0 /></a>
				<br />
				<a href="http://www.facebook.com/pages/College-Pagescom/194249306160" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/plugins/socialite/images/large-grey-facebook.png" border=0 /></a>
			</p>
		</td>
	</tr>
	</table>

	<table border=0 cellspacing=0 cellpadding=0 width=200>
	<tr>
		<td class="td_header">Donate Via Paypal</td>
	</tr>
	<tr>
		<td class="td_content">
			<div align="center">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="3944609">
				<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>

			<a href="http://www.gilfether.com/socialite" target="_blank">Socialite</a>
			is free and open source. Help keep it alive by donating as little or as much as you want.
			I'm a struggle software programmer and any little bit you can donate will go a long way to help!
			<br /><br />
			Thank You,<br />
			<a href="http://www.gilfether.com" target="_blank">Ryan Gilfether</a>
		</td>
	</tr>
	</table>
</div> <!-- id=div_right -->
