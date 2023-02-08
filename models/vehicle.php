<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;

class vehicle
{

    private \PDO $pdo;
    private array $body;

    public function __construct(array $registerBody=[])
    {
       
        $this->body= $registerBody;


    }

    public function addVehicle($img_error,$img_name,$tmp_name,$user_id)
    {
//        $img_name = $this->body['vehicle_image']['name'];
//        $img_size = $this->body['vehicle_image']['size'];
//        $tmp_name = $this->body['vehicle_image']['tmp_name'];
//        $img_error = $this->body['vehicle_image']['error'];

        $errors = $this->validateRegisterBody();

        if (empty($errors) && $img_error===0) {

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
//            try {
//
//            }
//            catch ()
            if (empty($errors) && in_array($img_ex_lc, $allowed_exs)) {
                $availability=1;
                $price = 0;
                if ($this->body["dropdown_vehicletype"]==="Car"){
//


                        $price=3500;
                }
                elseif ($this->body["dropdown_vehicletype"]==="Van"){
                        $price=4000;
                }
                elseif ($this->body["dropdown_vehicletype"]==="Scooter"){
                        $price=2000;
                }
                elseif ($this->body["dropdown_vehicletype"]==="Motercycle"){
                        $price=2500;
                }

                $vehicle_id=uniqid();
                $new_img_name = $vehicle_id.'.'.$img_ex_lc;
                $img_upload_path = '../public/assets/img/Vehicle_img/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                var_dump($user_id);
                $admin_approved=0;

                $query1 = "INSERT INTO vehicle (plate_No,user_ID,model,type,image,fuel_type,price,availability,veh_transmition,admin_approved) VALUES (:vehicle_plateNumber,:user_id,:vehicle_model,:dropdown_vehicletype,:image,:dropdown_fueltype,:price,:availability,:dropdown_transmitiontype,:admin_app)";
                
                $statement1= Application::$app->db->pdo->prepare($query1);
                $statement1->bindValue(":user_id",$user_id);
                $statement1->bindValue(":vehicle_plateNumber",$this->body["vehicle_plateNumber"]);
                $statement1->bindValue(":vehicle_model",$this->body["vehicle_model"]);
                $statement1->bindValue(":dropdown_vehicletype",$this->body["dropdown_vehicletype"]);
                $statement1->bindValue(":image",$new_img_name);
                $statement1->bindValue(":dropdown_fueltype",$this->body["dropdown_fueltype"]);
                $statement1->bindValue(":price",$price);
                $statement1->bindValue(":availability",$availability);
                $statement1->bindValue(":dropdown_transmitiontype",$this->body["dropdown_transmitiontype"]);
                $statement1->bindValue(":admin_app",$admin_approved);

                $statement1->execute();
                
                $veh_No=$this->body["vehicle_plateNumber"];
                // var_dump($veh_No);
                // var_dump("SELECT * FROM vehicle Where plate_No=$veh_No");
                // exit;

                $vehicle_idt= Application::$app->db->pdo->query("SELECT * FROM vehicle Where plate_No='$veh_No'")->fetchAll(\PDO::FETCH_ASSOC);
                

                $query2 = "INSERT INTO vehicle_license (license_No,from_date,ex_date,year,capacity,owner,vehicle_Id) VALUES (:license_No,:license_from,:license_to,:vehicle_year,:vehicle_seat,:owner_name,:vehicle_id)";
                
                $statement2= Application::$app->db->pdo->prepare($query2);
                $statement2->bindValue(":license_No",$this->body["license_No"]);
                $statement2->bindValue(":license_from",$this->body["license_from"]);
                $statement2->bindValue(":license_to",$this->body["license_to"]);
                $statement2->bindValue(":vehicle_year",$this->body["vehicle_year"]);
                $statement2->bindValue(":vehicle_seat",$this->body["vehicle_seat"]);
                // $statement2->bindValue(":vehicle_chasisNo",$this->body["vehicle_chasisNo"]);
                $statement2->bindValue(":owner_name",$this->body["owner_name"]);
                // $statement2->bindValue(":vehicle_weight",$this->body["vehicle_weight"]);
                $statement2->bindValue(":vehicle_id",$vehicle_idt[0]['veh_Id']);
//                $statement2->bindValue(":license_image",$this->body["license_image"]);

                $statement2->execute();
//
                $query3 = "INSERT INTO vehicle_insuarance (Ins_No,Insuarence_com,from_date,ex_date,insure_type,vehicle_Id) VALUES (:ins_No,:ins_com,:ins_from,:ins_to,:ins_type,:vehicle_id)";

                $statement3=Application::$app->db->pdo->prepare($query3);
                $statement3->bindValue(":ins_No",$this->body["ins_No"]);
                $statement3->bindValue(":ins_com",$this->body["ins_com"]);
                $statement3->bindValue(":ins_from",$this->body["ins_from"]);
                $statement3->bindValue(":ins_to",$this->body["ins_to"]);
                $statement3->bindValue(":ins_type",$this->body["ins_type"]);
                $statement3->bindValue(":vehicle_id",$vehicle_idt[0]['veh_Id']);
//                $statement3->bindValue(":ins_image",$this->body["ins_image"]);
                $statement3->execute();






                return true;

            }else{
                return $errors;
            }


        }else{
            return $errors;
        }
    }


    public function validateRegisterBody():array{
        $errors=[];

        if (strlen($this->body['dropdown_vehicletype'])===0){
            $errors['vehicle_type']="Select vehicle type";
        }
        if (strlen($this->body['vehicle_model'])===0){
            $errors['vehicle_model']="Enter vehicle model";
        }
        if (strlen($this->body['vehicle_plateNumber'])===0){
            $errors['vehicle_model']="Enter vehicle plate No";

            if(preg_match("/(A-Za-z0-9]+)/", $this->body['vehicle_plateNumber']))
            {
                $errors[] = "Only use numbers and letters please";
            }
        }
        if (strlen($this->body['dropdown_transmitiontype'])===0){
            $errors['vehicle_transmitiontype']="Select vehicle transmition type";
        }
        if (strlen($this->body['dropdown_fueltype'])===0){
            $errors['fuel_type']="Select Fuel type";
        }
        if (strlen($this->body['license_No'])===0){
            $errors['license_No']="Enter license No";
        }
        if (strlen($this->body['owner_name'])===0){
            $errors['owner_name']="Enter license No";
        }
        if ($this->body['vehicle_year']===0){
            $errors['vehicle_year']="Enter Manufacturing year";
        }
        // if (strlen($this->body['vehicle_chasisNo'])===0){
        //     $errors['vehicle_chasisNo']="Enter Vehicle chasis No";
        //     if(preg_match("/(A-Za-z0-9]+)/", $this->body['vehicle_plateNumber']))
        //     {
        //         $errors['vehicle_chasisNo'] = "Only use numbers and letters please";
        //     }
        // }
        // if ($this->body['vehicle_weight']===0){
        //     $errors['vehicle_weight']="Enter Vehicle gross weight";
        // }
        if ($this->body['vehicle_seat']===0){
            $errors['vehicle_seat']="Enter No of seats";
        }
        if ($this->body['license_from']===0 && $this->body['license_to']===0){
            $errors['license']="Enter True values";
            if ($this->body['license_from']>=$this->body['license_to']){
                $errors['license']="License expiering Date must be grater than starting date";
            }
        }
        if (strlen($this->body['ins_No'])===0){
            $errors['ins_No']="Enter insurance No";
        }
        if (strlen($this->body['ins_com'])===0){
            $errors['ins_com']="Enter insurance Company";
        }
//        if (strlen($this->body['ins_No'])===0){
//            $errors['ins_No']="Enter insurance No";
//        }
        if (strlen($this->body['ins_type'])===0){
            $errors['ins_type']="Enter insurance type";
        }
        if ($this->body['ins_from']===0 && $this->body['ins_to']===0){
            $errors['insure']="Enter True values";
            if ($this->body['ins_from']>=$this->body['ins_to']){
                $errors['insure']="License expiering Date must be grater than starting date";
            }
        }

        return $errors;
    }


    public function getVehicle(){
        return Application::$app->db->pdo->query("SELECT vehicle.veh_Id, vehicle.model, vehicle.type, vehicle.fuel_type,vehicle.image, vehicle.price, vehicle.availability, vehicle.veh_transmition, vehicle_license.capacity, vehicle_license.owner FROM vehicle INNER JOIN vehicle_license ON vehicle.veh_Id=vehicle_license.vehicle_Id ORDER BY vehicle.veh_Id DESC")->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function vehicleOwnergetVehicle($user_id){
        return Application::$app->db->pdo->query("SELECT vehicle.model, vehicle.type, vehicle.fuel_type,vehicle.image, vehicle.price, vehicle.availability, vehicle.veh_transmition, vehicle_license.capacity, vehicle_license.owner FROM vehicle INNER JOIN vehicle_license ON vehicle.veh_Id=vehicle_license.vehicle_Id where vehicle.user_ID=$user_id")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getVehiclebyId($vehicle_id){
        
        return Application::$app->db->pdo->query("SELECT * FROM vehicle INNER JOIN vehicle_license ON vehicle.veh_Id=$vehicle_id AND vehicle.veh_Id=vehicle_license.vehicle_Id")->fetchAll(\PDO::FETCH_ASSOC);

    }



}