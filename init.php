<?php
$host     = "localhost";
$username = "root";
$password = "";
$database = "crud_native";

$conn = mysqli_connect($host, $username, $password, $database);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function tambah($data)
{
    global $conn;
    $nama   = htmlspecialchars($data["nama"]);
    $email   = htmlspecialchars($data["email"]);
    $no_tlp   = htmlspecialchars($data["no_tlp"]);
    $query = "INSERT INTO data_petugas
              VALUES ('', '$nama', '$email', '$no_tlp') ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data['id'];
    $nama   = htmlspecialchars($data["nama"]);
    $email   = htmlspecialchars($data["email"]);
    $no_tlp   = htmlspecialchars($data["no_tlp"]);
    $query = "UPDATE data_petugas SET nama = '$nama', email = '$email', no_tlp = '$no_tlp' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_petugas WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cari($kata_cari)
{
    $sql  = "SELECT * FROM data_petugas WHERE
                nama LIKE '%$kata_cari%' OR
                email LIKE '%$kata_cari%' OR
                no_tlp LIKE '%$kata_cari%'
                ";
    return query($sql);
}
