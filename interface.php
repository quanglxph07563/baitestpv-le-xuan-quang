<?php
class Order
{
   public $total;
}

class Customer 
{
   public $affiliate = null;
   public $name;
   public $address;
   public function __construct(Affiliate $Affiliate)
   {
      $this->affiliate = $Affiliate;
   }

   
   public function PlaceOrder($money)
   {
      $this->affiliate->balance += $money*10/100;
      if ($this->affiliate->upperAffiliate) {
         $this->affiliate->upperAffiliate->balance+=$money*5/100;
         $this->affiliate->StoreOwner->balance1 += $money-($money*10/100 +$money*5/100);
      }else{
         $this->affiliate->StoreOwner->balance1 += $money-$money*10/100;
      }
     
      // echo $this->affiliate->balance1;
   }
}

class Affiliate extends StoreOwner
{
   public $name;
   public $balance = 0;
   public $upperAffiliate = null;
   public $StoreOwner = null;
   public $subAffiliates = array();
   public $customers = array();

   public function __construct(Affiliate $Affiliate =null,StoreOwner $StoreOwner=null)
   {
      $this->upperAffiliate = $Affiliate;
      $this->StoreOwner = $StoreOwner;
   }

   public function Refer($obj)
   {

      if (get_class($obj) == 'Customer') { 
         array_push($this->customers, $obj->name);
      } else {
         array_push($this->subAffiliates, $obj->name);
      }
   }
   public function Withdraw($sotien)
   {
      echo "Sô tiền còn lại trong ví ".$this->name." là: ".$this->balance."<br>";
      echo "Số tiền định rút ".$sotien."<br>";
      if ($this->balance >= 100 && $sotien<$this->balance) {
         $this->balance -=$sotien;
         echo $this->name." đã rút thành công ".$sotien.' bạn còn lại là: '.$this->balance;
      }else{
         echo "Số tiền bạn nhập không phù hợp";
      }
   }
   public function PrintSubAff()
   {
      print_r($this->subAffiliates);
   }
   public function PrintCustomer()
   {
      print_r($this->customers);
   }
}

class StoreOwner
{
   public $name;
   public $balance1 = 0;
   public function PrintBalance()
   {
      echo "Tông tiền của của hàng là ".$this->balance1;
   }
}

$moyes = new StoreOwner;
$moyes->name = "Moyes";

$john = new Affiliate(null,$moyes);
$john->name = "Affiliate John";

$sarah = new Affiliate($john,$moyes);
$sarah->name = "Affiliate Sarah";
$john->Refer($sarah);
$customer1 = new Customer($sarah);
$customer1->name = "Customer 1";
$customer1->address = 'address 1';
$customer1->PlaceOrder(800);
$sarah->Refer($customer1);



$eva = new Affiliate($john,$moyes);
$eva->name = "Affiliate Eva";
$john->Refer($eva);
$customer2 = new Customer($eva);
$customer2->name = "Customer 2";
$customer2->address = 'address 2';
$customer2->PlaceOrder(800);
$eva->Refer($customer2);




$jimmy = new Affiliate($john,$moyes);
$jimmy->name = "Affiliate Jimmy";
$john->Refer($jimmy);
$customer3 = new Customer($jimmy);
$customer3->name = "Customer 3";
$customer3->address = 'address 3';
$customer3->PlaceOrder(800);
$jimmy->Refer($customer3);


$henry = new Affiliate($john,$moyes);
$henry->name = "Affiliate Henry";
$john->Refer($henry);
$customer4 = new Customer($henry);
$customer4->name = "Customer 4";
$customer4->address = 'address 4';
$customer4->PlaceOrder(800);
$henry->Refer($customer4);



// $trum = new Affiliate(null,$moyes);
// $trum->name = "Quảng";
// $customer5 = new Customer($trum);
// $customer5->name = "Customer 5";
// $customer5->address = 'address 5';
// $customer5->PlaceOrder(800);
// $trum->Refer($customer5);




$john->PrintSubAff();
echo "<br>"."-----------------------------------------"."<br>";
$john->Withdraw(300);
echo "<br>"."-----------------------------------------"."<br>";

$john->Withdraw(150);
echo "<br>"."-----------------------------------------"."<br>";

$sarah->Withdraw(50);
echo "<br>"."-----------------------------------------"."<br>";

$moyes->PrintBalance();
