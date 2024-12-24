<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');

    class VotingModel extends CI_Model 
    {  
        public function ajax_method_required()
        {
            if ($this->input->is_ajax_request() === false):
                redirect(base_url("login/index"), "refresh");
            endif;
        }

        public function is_login_required()
        {
            if (!$this->session->has_userdata("user_logged_in")):
                redirect(base_url("login/index"), "refresh");
            endif;
        }

        public function is_session_required($name)
        {
            if ($this->session->userdata($name) == 0):
                redirect(base_url("login/index"), "refresh");
            endif;
        }

        public function is_admin_login()
        {
            if ($this->session->has_userdata("admin_logged_in")):
                redirect(base_url("dashboard/index"), "refresh");
            endif;
        }

        public function check_fields_list($fields)
        {
            foreach($fields as $item => $val):
                $str_replace = str_replace("_", " ", $item);

                $rules = ($val == null)? "trim|required": $val;

                $config[] = [
                    "field" => $item,
                    "rules" => $rules,
                    "errors" => array(
                        "required" => "The {$str_replace} field is required",
                        "is_unique" => "The {$str_replace} field must contain a unique value."
                    )
                ];
            endforeach;

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() === FALSE)
            {
                $row = array_map(function($name)
                {
                    return form_error($name);
                }, array_keys($fields));

                $status = false;
            }
            else
            {
                $row = array_map(function($name)
                {
                    return $this->input->post($name);
                }, array_keys($fields));
                $status = true;
            }

            $data = array_combine(array_keys($fields), $row);
            $data["status"] = $status;

            return (object)$data;
        }

        public function getColumn($table)
        {
            $fields = $this->db->list_fields($table);
            return $fields;
        }

        public function insertBatch($table, $data)
        {
            $this->db->insert_batch($table, $data);
        }

        public function insertInvData($table, $item)
        {
            foreach($item as $title => $row):
                $data[$title] = $this->db->escape_str($row); 
            endforeach;

            $this->db->insert($table, $data);
        
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }

        public function updateBatch($table, $data, $where)
        {
            $this->db->update_batch($table, $data, $where);
        }
        
        public function updateInvData($table, $item, $where)
        {
            foreach($item as $title => $row):
                $data[$title] = $this->db->escape_str($row); 
            endforeach;

            $this->db->update($table, $data, $where);
        }

        public function deleteInvData($table, $where)
        {
            $this->db->delete($table, $where);
        }

        public function getResult($table, $condition = [], $orders = [])
        {
            $this->db->select("*")
                     ->from($table);   

            if (!empty($condition)):
                $this->db->where($condition); 
            endif;         

            if (!empty($orders)):
                $this->db->order_by($orders);
            endif;

            $result = $this->db->get()
                               ->result_array();

            return $result;
        }

        public function getRow($table, $condition = [], $orders = [])
        {
            $this->db->select("*")
                     ->from($table);

            if (!empty($condition)):
                $this->db->where($condition); 
            endif; 

            if (!empty($orders)):
                $this->db->order_by($orders);
            endif;
            
            $row = $this->db->get()
                            ->row_array();

            return $row;
        }

        public function getCount($table)
        {
            $this->db->from($table);
            $count = $this->db->count_all_results();

            return $count;
        }
    }