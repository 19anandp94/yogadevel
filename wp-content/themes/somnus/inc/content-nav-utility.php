<?php
	$header_address = get_option('header_address', '1250 Malvern Rd, Glen Iris | (03) 4837 2716');
	$header_email = get_option('header_email', 'hello@somnus.net');
	
	$protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype');
?>

<div class="nav-utility">

	<div class="module left col-sm-12 col-xs-12 col-md-4 text-center-xs">
		<ul class="list-inline social-list">
			<?php
				for( $i = 1; $i < 5; $i++ ){
					if( get_option("header_social_url_$i") ) {
						echo '
							<li>
						      <a href="' . esc_url(get_option("header_social_url_$i"), $protocols) . '" target="_blank">
							      <i class="' . get_option("header_social_icon_$i") . '"></i>
						      </a>
						    </li>
						';
					}
				}
			?>
			<li><span class="sub"><?php echo wp_kses_post($header_email); ?></span></li>
		</ul>
	</div>

	<div class="module right">
		<span class="sub"><?php echo wp_kses_post($header_address); ?></span>
	</div>
	
</div>