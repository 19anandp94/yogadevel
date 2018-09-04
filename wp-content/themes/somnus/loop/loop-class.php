<div class="row">
	<div class="col-sm-12 text-center">
		<div class="tabbed-content button-tabs">
			<ul class="tabs mb64 mb-xs-24">
				
				<?php  
					$cats = get_categories('taxonomy=class_category');
		    		$i = 0;
		    		
		    		if( is_array($cats) ){
		    			foreach( $cats as $cat ){
		    				$i++;
		    				
		    				$active = ( $i == 1 ) ? 'active' : '';
		    				
		    				/**
		    				 * Initial query args
		    				 */
		    				$query_args = array(
		    					'post_type' => 'class',
		    					'posts_per_page' => -1
		    				);
		    				
		    				$filter = $cat->term_id;
		    				
		   					if( function_exists( 'icl_object_id' ) ){
		   						$filter = (int)icl_object_id( $cat->term_id, 'class_category', true);
		   					}
		   					$query_args['tax_query'] = array(
		   						array(
		   							'taxonomy' => 'class_category',
		   							'field' => 'id',
		   							'terms' => $filter
		   						)
		   					);
		    				
		    				/**
		    				 * Finally, here's the query.
		    				 */
		    				$cat_query = new WP_Query( $query_args );
		    				
		    				echo '
		    					<li class="'. $active .'">
									<div class="tab-title">
										<span>'. $cat->name .'</span>
									</div>
									<div class="tab-content">
										<div class="table-responsive">
											<table class="table table-responsive mb0 timetable">
												<thead>
													<tr>
														<th class="col-sm-2">'. esc_html__('Time', 'somnus') .'</th>
														<th class="col-sm-6">'. esc_html__('Class', 'somnus') .'</th>
														<th class="col-sm-2">'. esc_html__('Teacher', 'somnus') .'</th>
														<th class="col-sm-2">'. esc_html__('Book', 'somnus') .'</th>
													</tr>
												</thead>
												<tbody>
							';
												
									if ( $cat_query->have_posts() ) : while ( $cat_query->have_posts() ) : $cat_query->the_post(); 
									
										get_template_part('loop/content', 'class');
									
									endwhile;
									else : 
										
										get_template_part('loop/content', 'none');
												
									endif;
													
							echo '
												</tbody>
											</table>
										</div>
									</div>
								</li>
						    ';
		    			}	
		    		}
		    	?>
		
			</ul>
		</div><!--end of button tabs-->
	</div>
</div><!--end of row-->