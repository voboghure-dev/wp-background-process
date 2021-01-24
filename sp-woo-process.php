<?php

class SP_Woo_Process extends WP_Background_Process {

	protected $action = 'anything';

	protected function task( $item ) {
		sleep(2);
		error_log( $item );

		return false;
    }

    protected function complete() {
		parent::complete();
	}

}