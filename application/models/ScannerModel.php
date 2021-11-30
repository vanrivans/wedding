<?php

class ScannerModel extends CI_Model
{
    /**
     * Status Param
     * 0 = cancel
     * 1 = expired
     * 2 = active
     * 3 = used
     * */

    /**
     * Ticket Type
     * 1 = Orientation
     * 2 = Package
     * */

    public function __construct()
    {
        parent::__construct();
    }

    public function orien_check_status($qrcode = null, $nowDate = null)
    {
        if ($qrcode == null || $nowDate == null) {
            return false;
        }

        // Check Status and Orientation Date
        $query = "SELECT orien.id_orientation, 
                        u.id_user as user_id, 
                        CONCAT(u.first_name, ' ', u.last_name) AS user_name,
                        ort.orientation_time,
                        orien.orientation_date,
                        ort.time_start, 
                        ort.time_end
                        FROM orientation orien
                        JOIN orientation_time ort ON ort.id_orientation_time = orien.id_orientation_time
                        JOIN user u ON u.id_user = orien.id_user
                        WHERE orien.qrcode = '$qrcode'
                        AND (status = 2 || status = 3)";

        $result = $this->db->query($query);

        return $result;
    }

    public function orien_gate_status($qrcode = null)
    {
        if ($qrcode == null) {
            return false;
        }

        // Check Gate Status
        $query = "SELECT id, scan_in, scan_out
                        FROM scan
                        WHERE ticket_type = 1
                        AND qrcode = '$qrcode'";

        $result = $this->db->query($query);

        return $result;
    }

    public function save_scanning($data = null, $ortId = null)
    {
        if ($data == null) {
            return false;
        }

        $this->db->insert('scan', $data);

        if ($ortId != null) {

            $ortData['status'] = 3;

            $this->db->where('id_orientation', $ortId);
            $this->db->update('orientation', $ortData);
        }
    }

    public function update_scanning($data = null, $scanId = null)
    {
        if ($data == null || $scanId == null) {
            return false;
        }

        $this->db->where('id', $scanId);
        $this->db->update('scan', $data);
    }

    public function update_booking($data = null, $bookingId = null)
    {
        if ($data == null || $bookingId == null) {
            return false;
        }

        $this->db->where('id_booking', $bookingId);
        $this->db->update('booking', $data);
    }

    public function package_check_available($qrcode = null)
    {
        if ($qrcode == null) {
            return false;
        }

        // Check Available
        $query = "SELECT bk.id_booking,
                        bp.name as package_name,
                        bk.status, 
                        bk.expired_date, 
                        bk.start_date,
                        bk.time_used,
                        (bk.time_duration-bk.time_used) as time_remain,
                        u.id_user as user_id, 
                        CONCAT(u.first_name, ' ', u.last_name) AS user_name
                        FROM booking bk
                        JOIN booking_package bp ON bp.id_booking_package = bk.id_booking_package
                        JOIN user u ON u.id_user = bk.id_user
                        WHERE bk.qrcode = '$qrcode'";

        $result = $this->db->query($query);

        return $result;
    }

    public function package_check_first_scan($qrcode = null)
    {

        if ($qrcode == null) {
            return false;
        }

        // Check first scan
        $query = "SELECT id
                        FROM scan
                        WHERE qrcode = '$qrcode'";

        $result = $this->db->query($query);

        return $result;
    }

    public function package_get_last_data($qrcode = null)
    {
        if ($qrcode == null) {
            return false;
        }

        // Get last data
        $query = "SELECT id,
                        scan_out,
                        scan_in,
                        status
                        FROM scan
                        WHERE qrcode = '$qrcode'
                        ORDER BY updated_at DESC
                        LIMIT 1";

        $result = $this->db->query($query);

        return $result;
    }
}
