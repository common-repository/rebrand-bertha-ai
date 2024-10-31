<div class="bai-wl-settings-header">
	<h3><?php _e('Rebranding', 'bzrba'); ?></h3>
</div>
<div class="bai-wl-settings-wrap">

	<div class="bai-wl-settings">
		<form method="post" id="form" action="admin.php?page=wpbertha-rebrand" enctype="multipart/form-data">

			<?php wp_nonce_field( 'bai_wl_nonce', 'bai_wl_nonce' ); ?>

			<div class="bai-wl-setting-tabs">
				<a href="#bai-wl-branding" class="bai-wl-tab active"><?php _e('Branding', 'bzrba'); ?></a>
				<a href="#bai-wl-name-generator" class="bai-wl-tab"><?php _e('Name Generator', 'bzrba'); ?></a>
				<a href="#bai-wl-branding-settings" class="bai-wl-tab"><?php _e('Settings', 'bzrba'); ?></a>
			</div>

			<div class="bai-wl-setting-tabs-content">

				<div id="bai-wl-branding" class="bai-wl-setting-tab-content active">
					<h3 class="bzrba-section-title"><?php esc_html_e('Branding', 'bzrba'); ?></h3>
					<p><?php esc_html_e('You can white label the plugin as per your requirement.', 'bzrba'); ?></p>
					<table class="form-table bai-wl-fields">
						<tbody>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_plugin_name"><?php esc_html_e('Plugin Name', 'bzrba'); ?></label>
								</th>
								<td>
									<input id="bai_wl_plugin_name" name="bai_wl_plugin_name" type="text" class="regular-text" value="<?php echo esc_attr($branding['plugin_name']); ?>" placeholder="" />
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_plugin_desc"><?php esc_html_e('Plugin Description', 'bzrba'); ?></label>
								</th>
								<td>
									<input id="bai_wl_plugin_desc" name="bai_wl_plugin_desc" type="text" class="regular-text" value="<?php echo esc_attr($branding['plugin_desc']); ?>" />
									
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_plugin_author"><?php esc_html_e('Developer / Agency', 'bzrba'); ?></label>
								</th>
								<td>
									<input id="bai_wl_plugin_author" name="bai_wl_plugin_author" type="text" class="regular-text" value="<?php echo esc_attr($branding['plugin_author']); ?>"/>
									
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_plugin_uri"><?php esc_html_e('Website URL', 'bzrba'); ?></label>
								</th>
								<td>
									<input id="bai_wl_plugin_uri" name="bai_wl_plugin_uri" type="text" class="regular-text" value="<?php echo esc_attr($branding['plugin_uri']); ?>"/>
									
								</td>
							</tr>
							
							

							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_primary_color"><?php esc_html_e('Primary Color', 'bzrba'); ?></label>
								</th>
								<td>
									<input id="bai_wl_primary_color" name="bai_wl_primary_color" type="text" class="bai-wl-color-picker" value="" disabled />
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_menu_icon"><?php esc_html_e('Menu Icon', 'bzlc'); ?></label>
								</th>
								<td>
									<input class="regular-text" name="bai_wl_menu_icon" id="bai_wl_menu_icon" type="text" value="" disabled />
									<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Choose Icon">
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_logo"><?php esc_html_e('Logo', 'bzlc'); ?></label>
								</th>
								<td>
									<input class="regular-text" name="bai_wl_logo" id="bai_wl_logo" type="text" value="" disabled />
									<input type="button" name="upload-logo-btn" id="upload-logo-btn" class="button-secondary" value="Choose Logo">
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_robo_icon_select"><?php esc_html_e('Robot Icon and Robot background', 'bzlc'); ?></label>
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</th>
								<td>
									<ul class="robo-icon-list">
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-1" disabled><img src="<?php echo plugins_url('/uploads/RB-1.png', __FILE__) ?>"/> </li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-2" disabled><img src="<?php echo plugins_url('/uploads/RB-2.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-3" disabled><img src="<?php echo plugins_url('/uploads/RB-3.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-4" disabled><img src="<?php echo plugins_url('/uploads/RB-4.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-5" disabled><img src="<?php echo plugins_url('/uploads/RB-5.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-6" disabled><img src="<?php echo plugins_url('/uploads/RB-6.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-7" disabled><img src="<?php echo plugins_url('/uploads/RB-7.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-8" disabled><img src="<?php echo plugins_url('/uploads/RB-8.png', __FILE__) ?>"/> </li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-9" disabled><img src="<?php echo plugins_url('/uploads/RB-9.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-10" disabled><img src="<?php echo plugins_url('/uploads/RB-10.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-11" disabled><img src="<?php echo plugins_url('/uploads/RB-11.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-12" disabled><img src="<?php echo plugins_url('/uploads/RB-12.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-13" disabled><img src="<?php echo plugins_url('/uploads/RB-13.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-14" disabled><img src="<?php echo plugins_url('/uploads/RB-14.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-15" disabled><img src="<?php echo plugins_url('/uploads/RB-15.png', __FILE__) ?>"/> </li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-16" disabled><img src="<?php echo plugins_url('/uploads/RB-16.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-17" disabled><img src="<?php echo plugins_url('/uploads/RB-17.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-18" disabled><img src="<?php echo plugins_url('/uploads/RB-18.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-19" disabled><img src="<?php echo plugins_url('/uploads/RB-19.png', __FILE__) ?>"/>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-20" disabled><img src="<?php echo plugins_url('/uploads/RB-20.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-21" disabled><img src="<?php echo plugins_url('/uploads/RB-21.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-22" disabled><img src="<?php echo plugins_url('/uploads/RB-22.png', __FILE__) ?>"/> </li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-23" disabled><img src="<?php echo plugins_url('/uploads/RB-23.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-24" disabled><img src="<?php echo plugins_url('/uploads/RB-24.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-25" disabled><img src="<?php echo plugins_url('/uploads/RB-25.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-26" disabled><img src="<?php echo plugins_url('/uploads/RB-26.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-27" disabled><img src="<?php echo plugins_url('/uploads/RB-27.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="robo-28" disabled><img src="<?php echo plugins_url('/uploads/RB-28.png', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="other" disabled><label for="bai_wl_robo_icon_select"><?php esc_html_e('Custom Robot Icon', 'bzlc'); ?></label></li>
									<li><input type="radio" id="bai_wl_robo_icon_select" name="bai_wl_robo_icon_select" value="default" disabled><label for="bai_wl_robo_icon_select"><?php esc_html_e('Default', 'bzlc'); ?></label></li>
									
									</ul>
								</td>
							
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_robo_icon"><?php esc_html_e('Custom Robot Icon', 'bzlc'); ?></label>
								</th>
								<td>
									<input class="regular-text" name="bai_wl_robo_icon" id="bai_wl_robo_icon" type="text" value="" disabled />
									<input type="button" name="upload-robo-btn" id="upload-robo-btn" class="button-secondary" value="Choose Robo">
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_robo_bg_icon"><?php esc_html_e('Want Custom Background Robot?', 'bzlc'); ?></label>
								</th>
								<td>
									<input type="checkbox" id="bai_wl_robo_bg_icon" name="bai_wl_robo_bg_icon" value="on" disabled >
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_bertha_loadericon"><?php esc_html_e('Custom Background Robot', 'bzlc'); ?></label>
								</th>
								<td>
									<input class="regular-text" name="bai_wl_bertha_loadericon" id="bai_wl_bertha_loadericon" type="text" value="" disabled />
									<input type="button" name="upload-loadericon-btn" id="upload-loadericon-btn" class="button-secondary" value="Choose Loader background icon">
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_loader"><?php esc_html_e('Loader Image', 'bzlc'); ?></label>
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</th>
								<td>
									<ul class="loader-icon-list">
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-1" disabled><img src="<?php echo plugins_url('/uploads/loader-1.gif', __FILE__) ?>"/> </li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-2" disabled><img src="<?php echo plugins_url('/uploads/loader-2.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-3" disabled><img src="<?php echo plugins_url('/uploads/loader-3.svg', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-4" disabled><img src="<?php echo plugins_url('/uploads/loader-4.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-5" disabled><img src="<?php echo plugins_url('/uploads/loader-5.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-6" disabled><img src="<?php echo plugins_url('/uploads/loader-6.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-7" disabled><img src="<?php echo plugins_url('/uploads/loader-7.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-8" disabled><img src="<?php echo plugins_url('/uploads/loader-8.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-9" disabled><img src="<?php echo plugins_url('/uploads/loader-9.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-10" disabled><img src="<?php echo plugins_url('/uploads/loader-10.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-11" disabled><img src="<?php echo plugins_url('/uploads/loader-11.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-12" disabled><img src="<?php echo plugins_url('/uploads/loader-12.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-13" disabled><img src="<?php echo plugins_url('/uploads/loader-13.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="loader-14" disabled><img src="<?php echo plugins_url('/uploads/loader-14.gif', __FILE__) ?>"/></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="other" disabled><label for="bai_wl_robo_icon_select"><?php esc_html_e('Custom Loader Image', 'bzlc'); ?></label></li>
									<li><input type="radio" id="bai_wl_loader" name="bai_wl_loader" value="default" disabled><label for="bai_wl_robo_icon_select"><?php esc_html_e('Default', 'bzlc'); ?></label></li>
									</ul>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row" valign="top">
									<label for="bai_wl_cus_loader"><?php esc_html_e('Custom Loader Image', 'bzlc'); ?></label>
								</th>
								<td>
									<input class="regular-text" name="bai_wl_cus_loader" id="bai_wl_cus_loader" type="text" value="" disabled />
									<input type="button" name="upload-loader-btn" id="upload-loader-btn" class="button-secondary" value="Choose Loader">
									<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
								</td>
							</tr>
							

						</tbody>
					</table>
				</div>

<div id="bai-wl-name-generator" class="bai-wl-setting-tab-content">
	<p>Click the button to generate plugin name ideas. Then copy and paste the one you like into the 'Plugin Name' field within the Branding tab.</p>
	<input id="clickMe" type="button" value="Generate Random Name" disabled />
	<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
	</div>
				<div id="bai-wl-branding-settings" class="bai-wl-setting-tab-content">
					
					<table class="form-table bai-wl-fields">
			
						<tr valign="top">
							<th scope="row" valign="top">
								<label for="bai_wl_hide_external_links"><?php echo esc_html_e('Hide BerthaAI External Links', 'bzrba'); ?></label>
							</th>
							<td>
								<input id="bai_wl_hide_external_links" name="bai_wl_hide_external_links" type="checkbox" class="" value="on" disabled />
								<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
							</td>
						</tr>
						
						<tr valign="top">
							<th scope="row" valign="top">
									<label for="bai_wl_hide_general_settings"><?php esc_html_e('Hide General Settings', 'bzrba'); ?></label>
							</th>
							<td>
								<input id="bai_wl_hide_general_settings" name="bai_wl_hide_general_settings" type="checkbox" class="" value="on" disabled />
								<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
							</td>
						</tr>
						
						<tr valign="top">
							<th scope="row" valign="top">
									<label for="bai_wl_hide_license_menu"><?php esc_html_e('Hide License Menu', 'bzrba'); ?></label>
							</th>
							<td>
								<input id="bai_wl_hide_license_menu" name="bai_wl_hide_license_menu" type="checkbox" class="" value="on" disabled />
								<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
							</td>
						</tr>
						
						
															
					 </table>
				
				</div>
				
				<div class="bai-wl-setting-footer">
					<p class="submit">
						<input type="submit" name="submit" id="bai_save_branding" class="button button-primary bzrba-save-button" value="<?php esc_html_e('Save Settings', 'bzrba'); ?>" />
					</p>
				</div>
			</div>
		</form>
	</div>
	<div class="metabox-holder">
			<div class="postbox">
				<h3><span><?php _e( 'Export Settings' ); ?></span></h3>
				<div class="inside">
					<p><?php _e( 'Export the plugin settings for this site as a .json file. This allows you to easily import the configuration into another site.' ); ?></p>
					<form method="post">
						<p><input type="hidden" name="bzrba_action" value="export_settings" disabled /></p>
						<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
						<p>
							<?php wp_nonce_field( 'bzrba_export_nonce', 'bzrba_export_nonce' ); ?>
							<?php submit_button( __( 'Export' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div><!-- .inside -->
			</div><!-- .postbox -->

			<div class="postbox">
				<h3><span><?php _e( 'Import Settings' ); ?></span></h3>
				<div class="inside">
					<p><?php _e( 'Import the plugin settings from a .json file. This file can be obtained by exporting the settings on another site using the form above.' ); ?></p>
					<form method="post" enctype="multipart/form-data">
						<p>
							<input type="file" name="import_file" disabled />
							<p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>
						</p>
						<p>
							<input type="hidden" name="bzrba_action" value="import_settings" />
							<?php wp_nonce_field( 'bzrba_import_nonce', 'bzrba_import_nonce' ); ?>
							<?php submit_button( __( 'Import' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div><!-- .inside -->
			</div><!-- .postbox -->
		</div><!-- .metabox-holder -->
</div>
