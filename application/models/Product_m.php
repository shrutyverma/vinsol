<?php

class Product_m extends CI_Model{


  public function add_product_data($data)
  {
    $this->db->insert('deals', $data);
  }

 
  public function deals_details()
  {
	 $date = date('Y-m-d');
	 $hour = date('H');
	
	 if($hour < 10){
		$date = date('Y-m-d',strtotime("-1 days"));
	 }
	 //echo $date;
	// exit;
	 $this->db->where('Publish_date', $date);
	 $result = $this->db->get('deals')->result();
	 return $result;
  }
  
   public function user_details($user_id)
  {
	
	 $this->db->where('UserID', $user_id);
	 $result = $this->db->get('user')->result();
	 return $result;
  }
  
  public function buy_now($user_id,$details){
	  if($details[0]->Quantity == $details[0]->sold_out_quantity){
			return  'Already Sold out';
			
		}
		$already_buy = $this->db->where('user_id',$user_id)->where('deal_id',$details[0]->id)->get('user_order_history')->result();
		if(count($already_buy ) > 0){
			return  'Already bought';
		
		}else{
			
			$data=array();
			$data = array(
				'deal_id'=>$details[0]->id,
				'user_id'=>$user_id,
			);
			
			$insert = $this->db->insert('user_order_history',$data);
			if($insert){
				$query = "update deals set sold_out_quantity=sold_out_quantity+1 where id=".$details[0]->id;
				$this->db->query($query);
				$query = "update user set returning_count=returning_count+1 where UserID=".$user_id;
				$this->db->query($query);
				return  'Thanks for shopping';
				
			}
		}
	}
}
