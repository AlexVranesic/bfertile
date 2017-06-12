
<?php
ini_set('display_errors', 1);

$data = file_get_contents("php://input");

if($data)
{
    $dData=json_decode($data);

    /* -------------------- START TRANSACTION INSERT NAROCNINE ---------------------*/

    require("phpconuser.php");

        $sql="UPDATE Formdata
                SET
                    freelancer_type_ID = :freelancer_type_ID,
                    years_of_experience = :years_of_experience,
                    payment = :payment,
                    sickness = :sickness,
                    gear = :gear,
                    legal = :legal
                WHERE
                    ID_formdata = :id;";

       $stmt = $con->prepare($sql);

        $stmt->bindParam(':freelancer_type_ID', $dData->selectedFreelancerType->id);
        $stmt->bindParam(':years_of_experience', $dData->yearsOfExperience);
        $stmt->bindParam(':payment', $dData->products->paymentCheck);
        $stmt->bindParam(':sickness', $dData->products->sicknessCheck);
        $stmt->bindParam(':gear', $dData->products->gearCheck);
        $stmt->bindParam(':legal', $dData->products->legalCheck);
        $stmt->bindParam(':id', $dData->id);

        if (!$stmt->execute())
        {
            exit( json_encode($stmt->errorInfo()));
        }


        echo json_encode($dData->selectedFreelancerType->id);


}

?>
