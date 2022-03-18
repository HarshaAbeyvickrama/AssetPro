<?php
    class Department extends DBConnection{
        //Database connection
        private $DBConnection;

        private $departmentCode;
        private $Name;
        private $description;
        private $ContactNum;
        private $DateCreated;
        private $LastModified;

        public function __construct($departmentCode, $Name, $description, $ContactNum, $DateCreated, $LastModified)
        {
            $this->DBConnection = $this->connect();
            $this->departmentCode = $departmentCode;
            $this->Name = $Name;
            $this->description = $description;
            $this->ContactNum = $ContactNum;
            $this->DateCreated = $DateCreated;
            $this->LastModified = $LastModified;
        }

        //Getting all the departments
        protected function getAll() {
            $sql = "SELECT 
                        DepartmentID,
                        DepartmentCode,
                        Name, 
                        ContactNum, 
                        DATE(DateCreated) AS datecreated, 
                        DATE(LastModified) AS lastmodified 
                    FROM 
                        department";
            $pstm = $this->connect()->prepare($sql);
            $pstm->execute();
            return $pstm;
        }

        //Getting the department details using departmentID
        protected function get($DepartmentID) {
            $sql = "SELECT 
                        DepartmentID,
                        Name,
                        DepartmentCode,
                        description
                    FROM
                        department
                    WHERE DepartmentID = $DepartmentID";
            $pstm = $this->DBConnection->prepare($sql);
            $pstm->execute();
            return $pstm;
        }

        //Adding a department
        protected function add() {
            try {
                $this->DBConnection->beginTransaction();

                $DateCreated = date("Y-m-d H:i:s");
                $LastModified = date("Y-m-d H:i:s");

                //Inserting into the department table
                $addDepartment = "INSERT INTO department VALUES (DepartmentCode, Name, Description, ContactNum, DateCreated, LastModified)";
                $stmt = $this->DBConnection->prepare($addDepartment);

                // $stmt->bindParam('DepartmentID', $DepartmentID);
                $stmt->bindParam('DepartmentCode', $this->departmentCode);
                $stmt->bindParam('Name', $this->Name);
                $stmt->bindParam('ContactNum', $this->ContactNum);
                $stmt->bindParam('description', $this->description);
                $stmt->bindParam('DateCreated', $DateCreated);
                $stmt->bindParam('LastModified', $LastModified);

                $stmt->execute();

            } catch (PDOException | Exception $e) {
                $this->DBConnection->rollBack();

                $result = array(
                    "status"=>"Failed",
                    "Error"=>$e->getMessage(),
                    "Message"=>"Cannot add an Employee"
                );

                return $result;
            }
        }

        //Updating department details
        protected function update($DepartmentID) {

        }

        //Deleting a department
        protected function delete($DepartmentID) {
            $sql = "DELETE FROM department WHERE DepartmentID = :DepartmentID";
            $stmt = $this->DBConnection->prepare($sql);
            $stmt->bindParam("DepartmentID", $DepartmentID);
            $stmt->execute();
            return $stmt;
        }

        
        //Getting breakdownAssets of particular Department
        // protected function getBreakdownAssets($departmentId){
        //     $DBConnection = $this->connect();
        //     $sql = "SELECT
        //                 breakdown.AssetID,
        //                 assetdetails.Name AS assetName,
        //                 TYPE.Name AS assetType,
        //                 asset.assignedUser,
        //                 departmentheaduser.DepartmentID
        //             FROM
        //                 breakdown
        //             INNER JOIN assetdetails ON assetdetails.AssetID = breakdown.AssetID
        //             INNER JOIN asset ON asset.AssetID = breakdown.AssetID
        //             INNER JOIN TYPE ON TYPE
        //                 .TypeID = asset.TypeID
        //             INNER JOIN departmentheaduser ON departmentheaduser.DepartmentID = asset.DepartmentID
        //             WHERE
        //                 departmentheaduser.DepartmentID = ? ";
        //     $pstm = $DBConnection->prepare($sql);
        //     $pstm->execute(array($departmentId));
        //     return $pstm;
        // }

    }

?>