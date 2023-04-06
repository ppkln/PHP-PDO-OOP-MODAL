<?php 

    class Util {
        public function testInput($data) {
            $data = trim($data); // ฟังก์ชันสำหรับการลบช่องว่างทั้งหน้าและหลังข้อความทิ้ง
            $data = stripslashes($data); //ฟังก์ชันสำหรับการตัดเครื่องหมาย / ทิ้ง
            $data = htmlspecialchars($data);//ฟังก์ชั่นที่แปลงตัวอักษรที่มีผลต่อการแสดงผลของ tag html ให้แสดงเป็นข้อความปกติ 
            $data = strip_tags($data); //ฟังก์ชันสำหรับการลบแท็ก HTML และ PHP ออกจากข้อความสตริง

            return $data;
        }

        public function showMessage($type, $message) {
            return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
                    <strong>' . $message . '</strong>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close></button>
            </div>';
        }
    }

?>