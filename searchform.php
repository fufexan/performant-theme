<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/results' ) ); ?>" class="input-group form-inline">
	<input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'performant' ); ?>" />
	<div class="input-group-append">
		<input type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'performant' ); ?>" />
	</div>
</form>
