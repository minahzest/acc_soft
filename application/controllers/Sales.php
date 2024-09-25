<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sales extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->clear_cache();
        $this->load->model("Inventory_modal");
        $this->load->model("Common_modal");
    }
    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
    public function index()
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            $data['outofStock'] = 0;
            $data['products'] = $this->Common_modal->getAll('inventory');
            $data['invoice'] = $this->linkGenerator();
            $this->load->view('sales_main', $data);
        }
    }
    public function billing()
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            $data['outofStock'] = 0;
            $data['products'] = $this->Common_modal->getAll('inventory');
            $data['invoice'] = $this->Common_modal->getrandomOne('sales', 'sale_id');
            $this->load->view('sales', $data);
        }
    }
    public function bill_list()
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            $data['outofStock'] = 0;
            $data['invoice'] = $this->Common_modal->getAllOrderDesc('sales','sale_id');
            $this->load->view('bills', $data);
        }
    }
    public function getProInfo()
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            $id = $this->input->post('id');
            $data['info'] = $this->Common_modal->getAllWhere('inventory', 'inv_id', $id);
            echo json_encode(array('status' => 'success', 'data' => $data['info']));
        }
    }
    public function addList()
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            $id = $this->input->post('pro');
            $qty = $this->input->post('qty');
            $price = $this->input->post('price');
            $selling_price = $this->input->post('selling_price');
            $product_name = $this->input->post('product_name');

            if ($price) {
                $price = $price;
            } else {
                $price = $selling_price;
            }

            $data = array(
                'id' => $id,
                'qty' => $qty,
                'price' => $price,
                'name' => $product_name,
                'options' => array(
                    'sub_pro_id' => 0, 'image' => '', 'weight' => '',
                    'unit_price' => '',
                    'discount_percentage' => 0,
                    'attributes' => ''
                )
            );
            $this->cart->insert($data);
            echo json_encode(array("status" => "success"));
        }
    }


    public function save_brand_ajax()
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            try {
                $id = $this->input->post('brand_id');
                $brand = $this->input->post('brand');
                $data_arr = array();
                $brand_valid = $this->Common_modal->getAllWhereStr('brands', 'brand', $brand);

                if ($brand_valid) {
                    throw new Exception("Brand already exist");
                }

                $data_arr['brand'] = $brand;
                $data_arr['date'] = date('Y-m-d');

                if ($id) {
                    $update_status = $this->Common_modal->update('brand_id', $id, 'brands', $data_arr);
                    if ($update_status) {
                        $res = array('status' => 'success', 'msg' => 'Brand Successfully Updated');
                    } else {
                        throw new Exception("Something went wrong :(");
                    }
                } else {
                    $data_arr['status'] = 1;
                    $insert_status = $this->Common_modal->insert('brands', $data_arr);
                    if ($insert_status) {
                        $res = array('status' => 'success', 'msg' => 'Brand Successfully Created');
                    } else {
                        throw new Exception("Something went wrong :(");
                    }
                }
            } catch (Exception $e) {
                $res = array('status' => 'error', 'msg' => $e->getMessage());
            }
            echo json_encode($res);
        }
    }
    public function remove_cart_item_ajax()
    {
        $rowid = ($this->input->post('rowid'));
        $cart = $this->cart->contents();
        $exists = false;
        $Sub_total = 0;
        foreach ($cart as $item) {
            if ($item['rowid'] == $rowid) {
                $exists = true;
            }
        }
        if ($exists) {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        foreach ($this->cart->contents() as $items) {
            $price = str_replace(".", "", $items['price']);
            $qty = $items['qty'];
            $Sub_total += $price * $qty;
        }
        $rows = count($this->cart->contents());
        $myarray['total'] = $Sub_total;
        $myarray['count'] = $rows;
        if ($rows < 1) {
            $this->session->set_userdata('cart_type', null);
        }
        echo json_encode($myarray);
    }

    public function linkGenerator()
    {
        $chars = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $max = count($chars) - 1;
        $link = '';
        for ($i = 0; $i < 8; $i++) {
            $link .= $chars[rand(0, $max)];
        }
        $link = $link;
        $result = $this->Common_modal->getAllWhere('sales', 'invoice', $link);
        if ($result) {
            $this->linkGenerator();
        } else {
            return $link;
        }
    }

    public function save_invoice_ajax()
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            try {
                $customer = $this->input->post('customer');
                $date = $this->input->post('date');
                $discount = $this->input->post('discount');
                if ($date == '' || $date == null) {
                    $date = date('Y-m-d');
                }
                if ($discount == '') {
                    $discount == 0;
                }
                if (1 > count($this->cart->contents())) {
                    $res = array('status' => 'error', 'msg' => 'Your invoice list is empty');
                } else {
                    $this->session->set_userdata('invoice_data', array('customer' => $customer, 'date' => $date, 'discount' => $discount));
                    $res = array('status' => 'success');
                }
            } catch (Exception $e) {
                $res = array('status' => 'error', 'msg' => $e->getMessage());
            }
            echo json_encode($res);
        }
    }

    public function invoice()
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            if ($this->session->userdata('invoice_data') == null) {
                redirect(base_url('Sales'));
            } else {
                // redirect(base_url('invoice'));
                $invoice_number = $this->linkGenerator();
                // $invoice_number = $this->USERDBAPI->getrandomOne('sales','sale_id');
                $insert_id = $this->Common_modal->insert('sales', array('invoice' => $invoice_number, 'customer' => $this->session->userdata['invoice_data']['customer'], 'amount' => 0, 'date' => $this->session->userdata['invoice_data']['date'], 'discount' => $this->session->userdata['invoice_data']['discount'], 'status' => 1));
                $total = 0;
                foreach ($this->cart->contents() as $key => $value) {
                    $info_id = $this->Common_modal->insert('sales_info', array('inv_id' => $value['id'], 'qty' => $value['qty'], 'price' => $value['price'], 'sale_id' => $insert_id, 'status' => 1));
                    $this->Common_modal->decreaseField('inv_id', $value['id'], 'inventory', 'qty', $value['qty']);
                    $total = $total + $value['subtotal'];
                }
                $this->Common_modal->update('sale_id', $insert_id, 'sales', array('amount' => $total));
                $data['items'] = $this->cart->contents();
                $data['invoice_data'] = $this->session->userdata('invoice_data');
                $data['invoice_number'] = $insert_id;
                $this->cart->destroy();
                $this->session->set_userdata('invoice_data', null);
                $this->load->view('invoice', $data);
            }
        }
    }

    public function view_invoice($id = '')
    {
        if ($this->session->userdata('staff_logged_in') == null) {
            redirect(base_url('back-office'));
        } else {
            // $id = $this->input->post('id');
            $data['invoice'] = $this->Common_modal->get_invoice($id);
            $this->load->view('invoice_view', $data);
        }
    }

    public function update_qty_ajax()
    {
        try {
            $rowid = ($this->input->post('rowid'));
            $qty = ($this->input->post('qty'));
                $data = array(
                    'rowid' => $rowid,
                    'qty' => $qty
                );
                $this->cart->update($data);
                $message = array("status" => "success", "message" => 'succesfull');
        } catch (Exception $ex) {
            $message = array("status" => "error", "message" => $ex->getMessage());
        }
        echo json_encode($message);
    }

    public function update_status_ajax(){
        try {
            $id = ($this->input->post('id'));
            $stat = ($this->input->post('stat'));
            
            $update_status = $this->Common_modal->update('sale_id',$id,'sales',array('status'=>$stat));
            if ($update_status) {
                $message = array("status" => "success", "message" => 'succesfull');
            }else{
                $message = array("status" => "error", "message" => 'something went wrong :(');
            }
        } catch (Exception $ex) {
            $message = array("status" => "error", "message" => $ex->getMessage());
        }
        echo json_encode($message);
    }
}
