
<?php
ini_set('display_errors', 1);

$data = file_get_contents("php://input");

if($data)
{
    $dData=json_decode($data);


    require("phpconuser.php");
    include("get_client_ip.php");

        $sql="INSERT INTO Formdata
                (   email,
                    payment,
                    sickness,
                    gear,
                    legal,
                    fund,
                    ip_address)
                VALUES (:email,
                        :payment,
                        :sickness,
                        :gear,
                        :legal,
                        :fund,
                        :ip_address)";

       $stmt = $con->prepare($sql);

        $ip_address=get_client_ip();

        $stmt->bindParam(':email', $dData->email);
        $stmt->bindParam(':payment', $dData->products->paymentCheck);
        $stmt->bindParam(':sickness', $dData->products->sicknessCheck);
        $stmt->bindParam(':gear', $dData->products->gearCheck);
        $stmt->bindParam(':legal', $dData->products->legalCheck);
        $stmt->bindParam(':fund',$dData->products->fundCheck);
        $stmt->bindParam(':ip_address', $ip_address);


        if (!$stmt->execute())
        {
            exit( json_encode($stmt->errorInfo()));
        }

        $dataID=$con->lastInsertId();

        echo json_encode($dataID, JSON_NUMERIC_CHECK);


}








?>
