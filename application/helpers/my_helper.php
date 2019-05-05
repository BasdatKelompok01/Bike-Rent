<?php
function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Batal') {
		$_ci = &get_instance();

		if ($id != '') {
			echo   '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
						      <h3 style="display:block; text-align:center;">' .$title .'</h3>
						      
						      <div class="col-md-6">
						        <button class="form-control btn btn-danger ' .$class .'">  ' .$yes .'</button>
						      </div>
						      <div class="col-md-6">
						        <button class="form-control btn btn-default" data-dismiss="modal">  ' .$no .'</button>
						      </div>
						    </div>
					    </div>
					  </div>
					</div>';
		}
    }
?>