<?php $protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype'); ?>

<?php if( get_option("footer_social_url_1") ) : ?>
	<div class="row">
		<div class="col-sm-12 text-center">
			<ul class="list-inline social-list wide">
				<?php
					for( $i = 1; $i < 5; $i++ ){
						if( get_option("footer_social_url_$i") ) {
							echo '
								<li>
							      <a href="' . esc_url(get_option("footer_social_url_$i"), $protocols) . '" target="_blank">
								      <i class="icon icon-sm ' . get_option("footer_social_icon_$i") . '"></i>
							      </a>
							    </li>
							';
						}
					}
				?>
			</ul>
		</div>
	</div><!--end of row-->
<?php endif; ?>