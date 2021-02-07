<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_api extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function LoginApi($nip, $password)
    {
        $result = $this->db->query("SELECT
                                       id_pegawai,
                                       nip,
                                       nama_pegawai
                                    FROM
                                        pegawai
                                    WHERE
                                        nip = '$nip'
                                    AND PASSWORD = '$password'");
        return $result->result();
    }

    public function update($data = array(), $nip) {
        $this->db->where('nip', $nip);
        return $this->db->update('pegawai', $data);
    } 


}