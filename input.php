<?php
include "Form.php";

$form = new Form("proses.php", "Pesan Sekarang");

$form->addText("nama", "Nama Lengkap");

$form->addText("nohp", "No. HP");

$form->addRadio("layanan", "Jenis Layanan", [
    "kiloan" => "Cuci Kiloan",
    "satuan" => "Cuci Satuan",
    "express" => "Express 1 Hari"
]);

$form->addCheckbox("tambahan", "Tambahan", [
    "setrika" => "Setrika",
    "parfum" => "Parfum Extra",
    "antarjemput" => "Antar Jemput"
]);

$form->addSelect("paket", "Paket", [
    "hemat" => "Hemat (3 Hari)",
    "cepat" => "Cepat (2 Hari)",
    "super" => "Super Cepat (1 Hari)"
]);

$form->addTextarea("catatan", "Catatan Tambahan");

$form->displayForm();
?>
