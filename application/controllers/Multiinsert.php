<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiinsert extends CI_Controller {

	public function index()
	{
		$output = '';
		$results = $this->Crud->read('tbl_unit');
		foreach ($results as $row) {
			$output .= '<option value="'.$row->unit_name.'">'.$row->unit_name.'</option>';
		}

		$data['fill_box'] = $output;
		$this->load->view('multiinsert', $data);
	}

	public function insert()
	{
		if ($this->input->is_ajax_request()) {
			$table = 'tbl_order_items';

			$order_id = uniqid();
			$item_name = $this->input->post('item_name');
			$item_quantity = $this->input->post('item_quantity');
			$item_unit = $this->input->post('item_unit');
			for ($i=0; $i < sizeof($item_name); $i++) { 
				$ins_data = array('order_id' => $order_id, 
								'item_name' => $item_name[$i],
								'item_quantity' => $item_quantity[$i],
								'item_unit' => $item_unit[$i]);

			 	$ins_id = $this->Crud->create($table, $ins_data);

			}
			if($ins_id > 0) {
				echo "ok";
			}else{
				echo "not ok";	
			}
		}
	}
}