<?php
require('../controllers/pegawaiController.php');

function generateID(Koneksi $obj, $tglmasuk)
{
    $data = $obj->showData('SELECT COUNT(*) AS jumlah FROM pegawai');
    if (empty($data)) {
        return $tglmasuk . '' . 1;
    } else {
        foreach ($data as $value) {
            return $tglmasuk . "" . ($value['jumlah'] + 1);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Pegawai | WG Optical</title>
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="../css/apexcharts.css">
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
</head>

<body class="bg-[#F0F0F0] font-ex-color box-border">


    <!-- modal  -->
    <div id="modal-form" class=""></div>
    <!-- end modal  -->

    <!-- modal delete -->
    <div id="modal-delete" class=""></div>
    <!-- end modal delete -->

    <!-- Background hitam saat sidebar show -->
    <div id="bgbody" class="w-full h-screen bg-black fixed z-50 bg-opacity-50 hidden"></div>
    <!-- End Background hitam saat sidebar show -->
    <!-- sidebar -->
    <div id="ex-sidebar" class="ex-sidebar ex-hide-sidebar fixed z-50 max-lg:transition max-lg:duration-[1s]"></div>
    <!-- end sidebar -->
    <div class="lg:ml-72">
        <div class="w-full h-16 bg-white flex items-center md:justify-between md:px-5 justify-between px-6">
            <div class="flex flex-row uppercase font-ex-bold text-sm items-center">

                <!-- hamburger -->
                <div class="ex-burger mr-2 lg:hidden absolute" id="burger">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode" data-name="Isolation Mode" viewBox="0 0 24 24" width="20" height="20">
                        <rect y="10.5" width="24" height="3" />
                        <rect y="3.5" width="24" height="3" />
                        <rect y="17.5" width="24" height="3" />
                    </svg>
                </div>
                <div class="ex-burger mr-2 lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode" data-name="Isolation Mode" viewBox="0 0 24 24" width="20" height="20">
                        <rect y="10.5" width="24" height="3" />
                        <rect y="3.5" width="24" height="3" />
                        <rect y="17.5" width="24" height="3" />
                    </svg>
                </div>

                <h1>Master Data Pegawai</h1>
            </div>
            <div class="flex flex-row items-center">
                <div class="mr-4">
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.8313 21.0763L23.5594 20.8364C22.788 20.1491 22.1129 19.361 21.5521 18.4933C20.9397 17.2957 20.5727 15.9879 20.4725 14.6467V10.6961C20.4778 8.58936 19.7136 6.55319 18.3235 4.97017C16.9334 3.38714 15.013 2.36623 12.9233 2.09923V1.06761C12.9233 0.784463 12.8108 0.512912 12.6106 0.312696C12.4104 0.11248 12.1388 0 11.8557 0C11.5725 0 11.301 0.11248 11.1008 0.312696C10.9005 0.512912 10.7881 0.784463 10.7881 1.06761V2.11523C8.71703 2.40147 6.81989 3.42855 5.44804 5.00626C4.07618 6.58396 3.32257 8.60538 3.32679 10.6961V14.6467C3.22663 15.9879 2.85958 17.2957 2.24718 18.4933C1.69609 19.3588 1.03178 20.1468 0.271901 20.8364L0 21.0763V23.3315H23.8313V21.0763Z" fill="#444D68" />
                        <path d="M9.81348 24.1712C9.8836 24.6781 10.1348 25.1425 10.5206 25.4787C10.9065 25.8148 11.401 26 11.9127 26C12.4245 26 12.9189 25.8148 13.3048 25.4787C13.6906 25.1425 13.9418 24.6781 14.0119 24.1712H9.81348Z" fill="#444D68" />
                    </svg>
                </div>
                <img class="w-10 h-10 rounded-full" src="https://upload.wikimedia.org/wikipedia/id/d/d5/Aang_.jpg" alt="Rounded avatar">
            </div>


        </div>

        <div class="mt-3 flex items-center flex-col md:flex-row md:justify-between md:px-14 lg:justify-between md:py-[3px]">
            <!-- Search -->
            <div class="flex flex-row shadow-sm rounded-md items-center bg-white box-border">
                <svg width="19" height="19" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-3">
                    <path d="M19.2502 19.25L15.138 15.1305M17.4168 9.62501C17.4168 11.6915 16.5959 13.6733 15.1347 15.1346C13.6735 16.5958 11.6916 17.4167 9.62516 17.4167C7.55868 17.4167 5.57684 16.5958 4.11562 15.1346C2.6544 13.6733 1.8335 11.6915 1.8335 9.62501C1.8335 7.55853 2.6544 5.57669 4.11562 4.11547C5.57684 2.65425 7.55868 1.83334 9.62516 1.83334C11.6916 1.83334 13.6735 2.65425 15.1347 4.11547C16.5959 5.57669 17.4168 7.55853 17.4168 9.62501V9.62501Z" stroke="#797E8D" stroke-width="2" stroke-linecap="round" />
                </svg>

                <input type="text" placeholder="Cari Pegawai" class="h-11 bg-transparent ml-2 outline-none" />
            </div>
            <!-- End Search -->

            <!-- Search and Button Add -->
            <div class="flex flex-col md:flex-row items-center mt-3 md:mt-0">
                <!-- Button Add -->
                <div class="md:my-auto h-10 w-24 font-ex-semibold text-white mt-3 md:mt-0" id="click-modal">
                    <button class="bg-[#3DBD9E] h-full w-full rounded-md">Tambah</button>
                </div>
                <!-- End Button Add -->
            </div>
            <!-- End Search and Button Add -->
        </div>

        <!-- konten table -->
        <div class="" id="table">
            <!-- Table -->
            <div class="overflow-x-auto  text-sm mx-auto w-[90%] md:w-[90%] md:mx-auto bg-white rounded-md mt-4 py-6 px-6 ex-table">
                <table class="w-full ">
                    <thead class="border-b-2 border-gray-100">
                        <tr>

                            <th class="p-3 text-sm tracking-wide text-center">Nama</th>
                            <th class="p-3 text-sm tracking-wide text-center">ID Pegawai</th>
                            <th class="p-3 text-sm tracking-wide text-center">Gender</th>
                            <th class="p-3 text-sm tracking-wide text-center">No Telepon</th>
                            <th class="p-3 text-sm tracking-wide text-center">Alamat</th>
                            <th class="p-3 text-sm tracking-wide text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $execute = $crud->showData('SELECT * FROM `pegawai` ORDER BY SUBSTRING(id_pegawai, -1, 5) DESC');
                        $i = 0;
                        foreach ($execute as $data) {
                        ?>
                            <tr>

                                <td class="p-3 text-sm tracking-wide justify-center">
                                    <div class="flex flex-row items-center content-center">
                                        <img class="w-6 h-6 rounded-full" src="../images/pegawai/foto_pegawai/<?php echo $data['foto_pegawai'] ?>" alt="Rounded avatar">
                                        <p class="px-2"><?php echo $data['nama'] ?></p>
                                    </div>
                                </td>
                                <td class="p-3 text-sm tracking-wide text-center"><?php echo $data['id_pegawai'] ?></td>
                                <td class="p-3 text-sm tracking-wide text-center"><?php echo $data['gender'] ?></td>
                                <td class="p-3 text-sm tracking-wide text-center"><?php echo $data['no.Telp'] ?></td>
                                <td class="p-3 text-sm tracking-wide text-center"><?php echo $data['alamat'] ?></td>
                                <td class="p-3 text-sm tracking-wide text-center">
                                    <button id="edit-button-<?php echo $i; ?>">
                                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="37" height="37" rx="5" fill="#EDC683" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M27.4782 8.38256C27.7335 8.48841 27.9655 8.64355 28.1609 8.83911C28.3564 9.03447 28.5116 9.26646 28.6174 9.52181C28.7233 9.77717 28.7777 10.0509 28.7777 10.3273C28.7777 10.6037 28.7233 10.8774 28.6174 11.1328C28.5116 11.3881 28.3564 11.6201 28.1609 11.8155L25.3473 14.6282L22.3717 11.6526L25.1845 8.83911C25.3798 8.64355 25.6118 8.48841 25.8672 8.38256C26.1225 8.27671 26.3962 8.22223 26.6727 8.22223C26.9491 8.22223 27.2228 8.27671 27.4782 8.38256ZM9.59277 25.7604C9.59295 24.9094 9.93117 24.0933 10.533 23.4916L21.2376 12.787L24.2132 15.7626L13.5086 26.4672C12.9069 27.069 12.0908 27.4072 11.2398 27.4074H9.59277V25.7604Z" fill="#3F2C0D" />
                                        </svg>
                                    </button>
                                    <button id="delete-button-<?php echo $i; ?>">
                                        <svg width="38" height="37" viewBox="0 0 38 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.444336" width="37" height="37" rx="5" fill="#F35E58" />
                                            <path d="M23.3982 10.5062V8.67903C23.3982 8.19444 23.2105 7.72969 22.8764 7.38703C22.5423 7.04437 22.0892 6.85187 21.6167 6.85187H16.2723C15.7998 6.85187 15.3467 7.04437 15.0126 7.38703C14.6785 7.72969 14.4908 8.19444 14.4908 8.67903V10.5062H10.0371V12.3333H11.8186V26.0371C11.8186 26.7639 12.1001 27.4611 12.6013 27.975C13.1024 28.489 13.7821 28.7778 14.4908 28.7778H23.3982C24.1069 28.7778 24.7866 28.489 25.2878 27.975C25.7889 27.4611 26.0704 26.7639 26.0704 26.0371V12.3333H27.8519V10.5062H23.3982ZM18.0538 22.3827H16.2723V16.9012H18.0538V22.3827ZM21.6167 22.3827H19.8353V16.9012H21.6167V22.3827ZM21.6167 10.5062H16.2723V8.67903H21.6167V10.5062Z" fill="#501614" />
                                        </svg>

                                    </button>
                                </td>
                            </tr>
                            <script>

                            </script>
                        <?php
                            $i++;
                        }
                        ?>


                    </tbody>

                </table>
            </div>
            <!-- End Table -->

            <!-- Pagination And Info Data -->
            <div class="flex flex-col-reverse md:flex-row lg:flex-row lg:justify-between md:justify-between lg:px-14 lg:mt-5 items-center mt-3 text-sm">
                <div class="flex flex-row mb-3 font-ex-semibold">
                    <div class="flex justify-center items-center h-10 w-10 mr-2 rounded-sm bg-white drop-shadow-md">
                        <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0.748694C7.99976 0.947765 7.89284 1.13862 7.70275 1.2793L2.51977 5.11966C2.36289 5.23587 2.23845 5.37384 2.15354 5.52569C2.06864 5.67754 2.02494 5.84029 2.02494 6.00466C2.02494 6.16903 2.06864 6.33178 2.15354 6.48363C2.23845 6.63549 2.36289 6.77346 2.51977 6.88967L7.69599 10.7275C7.88058 10.8691 7.98272 11.0588 7.98042 11.2557C7.97811 11.4525 7.87153 11.6409 7.68365 11.7801C7.49576 11.9193 7.2416 11.9983 6.9759 12C6.71021 12.0017 6.45423 11.926 6.26311 11.7892L1.08689 7.95437C0.390892 7.43766 4.76837e-07 6.73745 4.76837e-07 6.00741C4.76837e-07 5.27738 0.390892 4.57717 1.08689 4.06045L6.26986 0.220095C6.41138 0.115167 6.59168 0.0436506 6.78799 0.0145702C6.98431 -0.0145102 7.18786 0.000148773 7.37294 0.0566969C7.55803 0.113245 7.71636 0.209149 7.82796 0.332306C7.93956 0.455462 7.99942 0.600353 8 0.748694Z" fill="#343948" />
                        </svg>
                    </div>
                    <div class="flex justify-center items-center h-10 w-10 mr-2 rounded-sm bg-white drop-shadow-md">2</div>
                    <div class="flex justify-center items-center h-10 w-10 mr-2 rounded-sm bg-white drop-shadow-md">3</div>
                    <div class="flex justify-center items-center h-10 w-10 mr-2 rounded-sm bg-white drop-shadow-md">4</div>
                    <div class="flex justify-center items-center h-10 w-10 mr-2 rounded-sm bg-white drop-shadow-md">
                        <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 11.2513C0.00023652 11.0522 0.107156 10.8614 0.297251 10.7207L5.48023 6.88034C5.63711 6.76413 5.76155 6.62616 5.84646 6.47431C5.93136 6.32246 5.97506 6.15971 5.97506 5.99534C5.97506 5.83097 5.93136 5.66822 5.84646 5.51637C5.76155 5.36451 5.63711 5.22654 5.48023 5.11033L0.304007 1.27248C0.119416 1.13087 0.0172752 0.941199 0.019584 0.744328C0.0218929 0.547457 0.128467 0.359134 0.316351 0.21992C0.504235 0.0807055 0.758398 0.00173914 1.0241 2.83842e-05C1.28979 -0.00168237 1.54577 0.0739993 1.73689 0.210773L6.91311 4.04563C7.60911 4.56234 8 5.26255 8 5.99259C8 6.72262 7.60911 7.42283 6.91311 7.93955L1.73014 11.7799C1.58862 11.8848 1.40832 11.9563 1.21201 11.9854C1.01569 12.0145 0.812142 11.9999 0.627057 11.9433C0.441971 11.8868 0.283639 11.7909 0.17204 11.6677C0.0604405 11.5445 0.000575787 11.3996 0 11.2513Z" fill="#343948" />
                        </svg>
                    </div>
                </div>
                <div class="mb-3">20 from 120 data</div>
            </div>
            <!-- End Pagination And Info Data -->
        </div>
        <!-- end konten table -->
    </div>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/md5.js"></script>

    <script>
        // load sidebar
        $("#ex-sidebar").load("../assets/components/sidebar.html", function() {
            $('#master_data').addClass("hover-sidebar");
            $('#button-logout').on('click', function() {
                // kosong
            });
        });


        $(document).ready(function() {

            $('#click-modal').on('click', function() {
                $('#title-modal').html('Tambah Pegawai');
                $('#modalkonten').toggleClass("scale-100");
                $('#bgmodal').addClass("effectmodal");

                $('#footer-add').removeClass('hidden');
                $('#footer-add').addClass('flex');

                $('#footer-edit').removeClass('flex');
                $('#footer-edit').addClass('hidden');

                $('#form-password').addClass('hidden');
                $('#form-password').removeClass('flex');

                $('#form-modal').addClass('flex');
                $('#form-modal').removeClass('hidden');



            });

            <?php
            for ($index = 0; $index < count($execute); $index++) {
            ?>
                $('#edit-button-<?php echo $index; ?>').on('click', function() {
                    $('#footer-add').removeClass('flex');
                    $('#footer-add').addClass('hidden');

                    $('#footer-edit').removeClass('hidden');
                    $('#footer-edit').addClass('flex');

                    console.log("<?php echo $execute[$index]['nama']; ?>");

                    let getd = '<?php echo $execute[$index]['tgl_masuk']; ?>'.substring(8, 10);
                    let getm = '<?php echo $execute[$index]['tgl_masuk']; ?>'.substring(5, 7);
                    let gety = '<?php echo $execute[$index]['tgl_masuk']; ?>'.substring(0, 4);
                    console.log(gety + '-' + getm + '-' + getd);

                    $('#tglmasuk').val(gety + '-' + getm + '-' + getd);
                    $('#txt_email').val('<?php echo $execute[$index]['email']; ?>');
                    $('#txt_nama').val('<?php echo $execute[$index]['nama']; ?>');
                    $('#txt_gender').val('<?php echo $execute[$index]['gender']; ?>');
                    $('#txt_notelepon').val('<?php echo $execute[$index]['no.Telp']; ?>');
                    $('#txt_alamat').val('<?php echo $execute[$index]['alamat']; ?>');

                    $('#imgpreview_peg').removeClass('hidden');
                    $('#imgdefault_peg').addClass('hidden');
                    $('#imgpreview_peg').attr("src", '../images/pegawai/foto_pegawai/<?php echo $execute[$index]['foto_pegawai']; ?>');

                    imgpeg = '<?php echo $execute[$index]['foto_pegawai']; ?>';
                    console.log(imgpeg);

                    $('#imgpreview_ktp').removeClass('hidden');
                    $('#imgdefault_ktp').addClass('hidden');
                    $('#imgpreview_ktp').attr("src", '../images/pegawai/foto_ktp/<?php echo $execute[$index]['foto_ktp']; ?>');

                    $('#imgpreview_kk').removeClass('hidden');
                    $('#imgdefault_kk').addClass('hidden');
                    $('#imgpreview_kk').attr("src", '../images/pegawai/foto_kk/<?php echo $execute[$index]['foto_kk']; ?>');

                    lokasifotopegawai_lama = '<?php echo $execute[$index]['foto_pegawai']; ?>';
                    lokasifotoktp_lama = '<?php echo $execute[$index]['foto_ktp']; ?>';
                    lokasifotokk_lama = '<?php echo $execute[$index]['foto_kk']; ?>';
                    selected_idpegawai = '<?php echo $execute[$index]['id_pegawai']; ?>';

                    $('#field-password').addClass('hidden');

                    $('#title-modal').html('Ubah Pegawai');
                    $('#modalkonten').toggleClass("scale-100");
                    $('#bgmodal').addClass("effectmodal");


                    $('#form-password').addClass('hidden');
                    $('#form-password').removeClass('flex');

                    $('#form-modal').addClass('flex');
                    $('#form-modal').removeClass('hidden');

                });
            <?php
            }
            ?>
        });

        function getFileExtension(fstring) {
            return fstring.slice((Math.max(0, fstring.lastIndexOf(".")) || Infinity) + 1);
        }

        let lokasifotopegawai_lama = "";
        let lokasifotoktp_lama = "";
        let lokasifotokk_lama = "";
        let selected_idpegawai = "";


        // load modal
        $("#modal-form").load("../assets/components/modal_master_pegawai.html", function() {
            $('#password-button').on('click', function() {
                $('#form-password').toggleClass('hidden');
                $('#form-password').toggleClass('flex');

                $('#form-password').toggleClass('statusclick');




                $('#form-modal').toggleClass('flex');
                $('#form-modal').toggleClass('hidden');

                console.log('awkoawk');
            });

            imgInp_peg.onchange = evt => {
                const [file] = imgInp_peg.files
                if (file) {
                    imgpreview_peg.src = URL.createObjectURL(file)
                    $('#imgpreview_peg').removeClass("hidden");
                    $('#imgdefault_peg').addClass("hidden");

                }
            }

            imgInp_ktp.onchange = evt => {
                const [file] = imgInp_ktp.files
                if (file) {
                    imgpreview_ktp.src = URL.createObjectURL(file)
                    $('#imgpreview_ktp').removeClass("hidden");
                    $('#imgdefault_ktp').addClass("hidden");
                }
            }

            imgInp_kk.onchange = evt => {
                const [file] = imgInp_kk.files
                if (file) {
                    imgpreview_kk.src = URL.createObjectURL(file)
                    $('#imgpreview_kk').removeClass("hidden");
                    $('#imgdefault_kk').addClass("hidden");
                }
            }
            $('#button-logout').on('click', function() {
                // kosong
            });

            $('#cancelmodal, #closemodal').on('click', function() {

                closeModal();

            });

            function closeModal() {
                $('#field-password').removeClass('hidden');
                $('#modalkonten').toggleClass("scale-100");
                $('#bgmodal').removeClass("effectmodal");


                $('#tglmasuk').val("");
                $('#txt_email').val("");
                $('#txt_password').val("");
                $('#txt_nama').val("");
                $('#txt_gender').val("");
                $('#txt_notelepon').val("");
                $('#txt_alamat').val("");

                let lokasifotopegawai_lama = "";
                let lokasifotoktp_lama = "";
                let lokasifotokk_lama = "";
                let selected_idpegawai = "";

                $('#imgpreview_peg').addClass('hidden');
                $('#imgdefault_peg').removeClass('hidden');
                $('#imgpreview_peg').removeAttr("src");

                $('#imgpreview_ktp').addClass('hidden');
                $('#imgdefault_ktp').removeClass('hidden');
                $('#imgpreview_ktp').removeAttr("src");

                $('#imgpreview_kk').addClass('hidden');
                $('#imgdefault_kk').removeClass('hidden');
                $('#imgpreview_kk').removeAttr("src");
            }

            $(document).ready(function() {

                $('#submitform').on('click', function() {

                    if ($('#form-password').hasClass('statusclick')) {
                        if ($('#txt_newpassword').val() == "") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "Password Tidak Boleh Kosong",
                            })
                        } else {
                            $.ajax({
                                url: '../controllers/pegawaiController.php',
                                type: 'post',
                                data: {
                                    'type': 'ubah_password_pegawai',
                                    'query': "UPDATE pegawai SET password = '" + CryptoJS.MD5($("#txt_newpassword").val()).toString() + "' WHERE id_pegawai = '" + selected_idpegawai + "'"
                                },
                                success: function(res) {

                                    const data = JSON.parse(res);
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: data.msg,

                                    }).then(function() {
                                        closeModal();
                                        location.reload();

                                    });
                                }
                            });
                        }


                        console.log('form password');
                    } else {
                        var date = new Date($('#tglmasuk').val());
                        let form_editdata = new FormData();
                        let imgpeg = $("#imgInp_peg")[0].files;
                        let imgktp = $("#imgInp_ktp")[0].files;
                        let imgkk = $("#imgInp_kk")[0].files;

                        var query = "";

                        if (!imgpeg.length > 0 && !imgktp.length > 0 && !imgkk.length > 0) {
                            query = "UPDATE pegawai SET nama = '" + $('#txt_nama').val() + "', gender = '" + $('#txt_gender').val() + "', `no.Telp` = '" + $('#txt_notelepon').val() + "', alamat = '" + $('#txt_alamat').val() + "', tgl_masuk = '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', email = '" + $('#txt_email').val() + "' WHERE id_pegawai = '" + selected_idpegawai + "'";
                            form_editdata.append('opsifoto', "tanpa-foto");
                        } else {
                            if (!imgpeg.length > 0 || !imgktp.length > 0 || !imgkk.length > 0) {
                                if (imgpeg.length > 0) {
                                    if (imgpeg.length > 0 && imgktp.length > 0) {
                                        form_editdata.append('image_peg', imgpeg[0]);
                                        form_editdata.append('image_ktp', imgktp[0]);

                                        var img_name_peg = form_editdata.get('image_peg')['name'];
                                        var img_name_ktp = form_editdata.get('image_ktp')['name'];

                                        var generateUniqPeg = "<?php echo uniqid("foto-pegawai-", true) . "." . '"+getFileExtension(img_name_peg)+"'; ?>";
                                        var generateUniqKTP = "<?php echo uniqid("foto-ktp-", true) . "." . '"+getFileExtension(img_name_ktp)+"'; ?>";


                                        query = "UPDATE pegawai SET nama = '" + $('#txt_nama').val() + "', gender = '" + $('#txt_gender').val() + "', `no.Telp` = '" + $('#txt_notelepon').val() + "', alamat = '" + $('#txt_alamat').val() + "', tgl_masuk = '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', email = '" + $('#txt_email').val() + "', foto_pegawai = '<?= '"+generateUniqPeg+"'; ?>', foto_ktp = '<?= '"+generateUniqKTP+"'; ?>' WHERE id_pegawai = '" + selected_idpegawai + "'";
                                        form_editdata.append('opsifoto', "fotopegawai-dan-ktp");
                                    } else if (imgpeg.length > 0 && imgkk.length > 0) {
                                        form_editdata.append('image_peg', imgpeg[0]);
                                        form_editdata.append('image_kk', imgkk[0]);

                                        var img_name_peg = form_editdata.get('image_peg')['name'];
                                        var img_name_kk = form_editdata.get('image_kk')['name'];

                                        var generateUniqPeg = "<?php echo uniqid("foto-pegawai-", true) . "." . '"+getFileExtension(img_name_peg)+"'; ?>";
                                        var generateUniqKK = "<?php echo uniqid("foto-kk-", true) . "." . '"+getFileExtension(img_name_kk)+"'; ?>";

                                        query = "UPDATE pegawai SET nama = '" + $('#txt_nama').val() + "', gender = '" + $('#txt_gender').val() + "', `no.Telp` = '" + $('#txt_notelepon').val() + "', alamat = '" + $('#txt_alamat').val() + "', tgl_masuk = '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', email = '" + $('#txt_email').val() + "', foto_pegawai = '<?= '"+generateUniqPeg+"'; ?>', foto_kk = '<?= '"+generateUniqKK+"'; ?>' WHERE id_pegawai = '" + selected_idpegawai + "'";
                                        form_editdata.append('opsifoto', "fotopegawai-dan-kk");
                                    } else {
                                        form_editdata.append('image_peg', imgpeg[0]);

                                        var img_name_peg = form_editdata.get('image_peg')['name'];

                                        var generateUniqPeg = "<?php echo uniqid("foto-pegawai-", true) . "." . '"+getFileExtension(img_name_peg)+"'; ?>";

                                        query = "UPDATE pegawai SET nama = '" + $('#txt_nama').val() + "', gender = '" + $('#txt_gender').val() + "', `no.Telp` = '" + $('#txt_notelepon').val() + "', alamat = '" + $('#txt_alamat').val() + "', tgl_masuk = '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', email = '" + $('#txt_email').val() + "', foto_pegawai = '<?= '"+generateUniqPeg+"'; ?>' WHERE id_pegawai = '" + selected_idpegawai + "'";
                                        form_editdata.append('opsifoto', "fotopegawai");
                                    }
                                } else if (imgktp.length > 0) {
                                    if (imgktp.length > 0 && imgkk.length > 0) {
                                        form_editdata.append('image_ktp', imgktp[0]);
                                        form_editdata.append('image_kk', imgkk[0]);

                                        var img_name_ktp = form_editdata.get('image_ktp')['name'];
                                        var img_name_kk = form_editdata.get('image_kk')['name'];

                                        var generateUniqKTP = "<?php echo uniqid("foto-ktp-", true) . "." . '"+getFileExtension(img_name_ktp)+"'; ?>";
                                        var generateUniqKK = "<?php echo uniqid("foto-kk-", true) . "." . '"+getFileExtension(img_name_kk)+"'; ?>";

                                        query = "UPDATE pegawai SET nama = '" + $('#txt_nama').val() + "', gender = '" + $('#txt_gender').val() + "', `no.Telp` = '" + $('#txt_notelepon').val() + "', alamat = '" + $('#txt_alamat').val() + "', tgl_masuk = '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', email = '" + $('#txt_email').val() + "', foto_ktp = '<?= '"+generateUniqKTP+"'; ?>', foto_kk = '<?= '"+generateUniqKK+"'; ?>' WHERE id_pegawai = '" + selected_idpegawai + "'";
                                        form_editdata.append('opsifoto', "fotoktp-dan-kk");
                                    } else {
                                        form_editdata.append('image_ktp', imgktp[0]);

                                        var img_name_ktp = form_editdata.get('image_ktp')['name'];

                                        var generateUniqKTP = "<?php echo uniqid("foto-ktp-", true) . "." . '"+getFileExtension(img_name_ktp)+"'; ?>";

                                        query = "UPDATE pegawai SET nama = '" + $('#txt_nama').val() + "', gender = '" + $('#txt_gender').val() + "', `no.Telp` = '" + $('#txt_notelepon').val() + "', alamat = '" + $('#txt_alamat').val() + "', tgl_masuk = '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', email = '" + $('#txt_email').val() + "', foto_ktp = '<?= '"+generateUniqKTP+"'; ?>' WHERE id_pegawai = '" + selected_idpegawai + "'";
                                        form_editdata.append('opsifoto', "fotoktp");
                                    }
                                } else if (imgkk.length > 0) {
                                    form_editdata.append('image_kk', imgkk[0]);

                                    var img_name_kk = form_editdata.get('image_kk')['name'];

                                    var generateUniqKK = "<?php echo uniqid("foto-kk-", true) . "." . '"+getFileExtension(img_name_kk)+"'; ?>";

                                    query = "UPDATE pegawai SET nama = '" + $('#txt_nama').val() + "', gender = '" + $('#txt_gender').val() + "', `no.Telp` = '" + $('#txt_notelepon').val() + "', alamat = '" + $('#txt_alamat').val() + "', tgl_masuk = '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', email = '" + $('#txt_email').val() + "', foto_kk = '<?= '"+generateUniqKK+"'; ?>' WHERE id_pegawai = '" + selected_idpegawai + "'";
                                    form_editdata.append('opsifoto', "fotokk");
                                }
                            } else {
                                form_editdata.append('image_peg', imgpeg[0]);
                                form_editdata.append('image_ktp', imgktp[0]);
                                form_editdata.append('image_kk', imgkk[0]);

                                var img_name_peg = form_editdata.get('image_peg')['name'];
                                var img_name_ktp = form_editdata.get('image_ktp')['name'];
                                var img_name_kk = form_editdata.get('image_kk')['name'];


                                var generateUniqPeg = "<?php echo uniqid("foto-pegawai-", true) . "." . '"+getFileExtension(img_name_peg)+"'; ?>";
                                var generateUniqKTP = "<?php echo uniqid("foto-ktp-", true) . "." . '"+getFileExtension(img_name_ktp)+"'; ?>";
                                var generateUniqKK = "<?php echo uniqid("foto-kk-", true) . "." . '"+getFileExtension(img_name_kk)+"'; ?>";

                                query = "UPDATE pegawai SET nama = '" + $('#txt_nama').val() + "', gender = '" + $('#txt_gender').val() + "', `no.Telp` = '" + $('#txt_notelepon').val() + "', alamat = '" + $('#txt_alamat').val() + "', tgl_masuk = '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', email = '" + $('#txt_email').val() + "', foto_pegawai = '<?= '"+generateUniqPeg+"'; ?>', foto_ktp = '<?= '"+generateUniqKTP+"'; ?>', foto_kk = '<?= '"+generateUniqKK+"'; ?>' WHERE id_pegawai = '" + selected_idpegawai + "'";
                                form_editdata.append('opsifoto', "semua-foto");
                            }

                        }


                        form_editdata.append('query', query);

                        form_editdata.append('type', "ubah_pegawai");
                        form_editdata.append('img_file_peg', generateUniqPeg);
                        form_editdata.append('img_file_ktp', generateUniqKTP);
                        form_editdata.append('img_file_kk', generateUniqKK);
                        form_editdata.append('img_file_peg_old', lokasifotopegawai_lama);
                        form_editdata.append('img_file_ktp_old', lokasifotoktp_lama);
                        form_editdata.append('img_file_kk_old', lokasifotokk_lama);

                        if (!date.getDate()) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "Tanggal Tidak Boleh Kosong",
                            })
                        } else if ($('#txt_email').val() == "") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "Email Tidak Boleh Kosong",
                            })

                        } else if ($('#txt_nama').val() == "") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "Nama Tidak Boleh Kosong",
                            })
                        } else if ($('#txt_gender').val() == "") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "Gender Tidak Boleh Kosong",
                            })
                        } else if ($('#txt_notelepon').val() == "") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "No Telepon Tidak Boleh Kosong",
                            })

                        } else if ($('#txt_alamat').val() == "") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: "Alamat Tidak Boleh Kosong",
                            })
                        } else {
                            $.ajax({
                                url: '../controllers/pegawaiController.php',
                                type: 'post',
                                data: form_editdata,

                                contentType: false,
                                processData: false,
                                success: function(res) {
                                    const data = JSON.parse(res);
                                    if (data.status == 'error') {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal',
                                            text: data.msg,
                                        })
                                    } else {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil',
                                            text: data.msg,

                                        }).then(function() {
                                            closeModal();
                                            location.reload();

                                        });
                                    }
                                }
                            });
                        }
                    }

                });


                $('#submitformadd').on('click', function(e) {
                    e.preventDefault();
                    //here
                    let form_data = new FormData();
                    let imgpeg = $("#imgInp_peg")[0].files;
                    let imgktp = $("#imgInp_ktp")[0].files;
                    let imgkk = $("#imgInp_kk")[0].files;

                    var date = new Date($('#tglmasuk').val());

                    if (!date.getDate()) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: "Tanggal Tidak Boleh Kosong",
                        })
                    } else if ($('#txt_email').val() == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: "Email Tidak Boleh Kosong",
                        })

                    } else if ($('#txt_password').val() == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: "Password Tidak Boleh Kosong",
                        })
                        console.log($('#txt_password').val());
                    } else if ($('#txt_nama').val() == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: "Nama Tidak Boleh Kosong",
                        })
                    } else if ($('#txt_gender').val() == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: "Gender Tidak Boleh Kosong",
                        })
                    } else if ($('#txt_notelepon').val() == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: "No Telepon Tidak Boleh Kosong",
                        })
                        console.log($('#txt_password').val());
                    } else if ($('#txt_alamat').val() == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: "Alamat Tidak Boleh Kosong",
                        })
                    } else {
                        // Check image selected or not
                        if (imgpeg.length > 0 && imgktp.length > 0 && imgkk.length > 0) {
                            form_data.append('image_peg', imgpeg[0]);
                            form_data.append('image_ktp', imgktp[0]);
                            form_data.append('image_kk', imgkk[0]);
                            form_data.append('type', "tambah_pegawai");
                            var img_name_peg = form_data.get('image_peg')['name'];
                            var img_name_ktp = form_data.get('image_ktp')['name'];
                            var img_name_kk = form_data.get('image_kk')['name'];

                            var generateUniqPeg = "<?php echo uniqid("foto-pegawai-", true) . "." . '"+getFileExtension(img_name_peg)+"'; ?>";
                            var generateUniqKTP = "<?php echo uniqid("foto-ktp-", true) . "." . '"+getFileExtension(img_name_ktp)+"'; ?>";
                            var generateUniqKK = "<?php echo uniqid("foto-kk-", true) . "." . '"+getFileExtension(img_name_kk)+"'; ?>";

                            form_data.append('query', "INSERT INTO pegawai VALUES ('<?= generateID($crud, '"+ date.getDate() + + ( date.getMonth() + 1) + date.getFullYear()+"'); ?>', '" + $('#txt_nama').val() + "', '" + $('#txt_gender').val() + "', '" + $('#txt_notelepon').val() + "', '" + $('#txt_alamat').val() + "', '" + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + "', '<?= '"+generateUniqPeg+"'; ?>', '<?= '"+generateUniqKTP+"'; ?>', '<?= '"+generateUniqKK+"'; ?>', '" + $('#txt_email').val() + "', '" + CryptoJS.MD5($("#txt_password").val()).toString() + "', 2)");
                            form_data.append('img_file_peg', generateUniqPeg);
                            form_data.append('img_file_ktp', generateUniqKTP);
                            form_data.append('img_file_kk', generateUniqKK);


                            $.ajax({
                                url: '../controllers/pegawaiController.php',
                                type: 'post',
                                data: form_data,
                                contentType: false,
                                processData: false,
                                success: function(res) {

                                    const data = JSON.parse(res);

                                    if (data.status == 'error') {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal',
                                            text: data.msg,

                                        })
                                    } else {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil',
                                            text: data.msg,

                                        }).then(function() {
                                            closeModal();
                                            location.reload();
                                        });
                                    }

                                }
                            });

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Masukkan Gambar Terlebih Dahulu',

                            })
                        }
                    }
                });
            });
        });


        // load modal
        $("#modal-delete").load("../assets/components/modal_hapus.html", function() {

            <?php
            for ($index = 0; $index < count($execute); $index++) {
            ?>
                $('#delete-button-<?php echo $index; ?>').on('click', function() {

                    selected_idpegawai = '<?php echo $execute[$index]['id_pegawai']; ?>';
                    lokasifotopegawai_lama = '<?php echo $execute[$index]['foto_pegawai']; ?>';
                    lokasifotoktp_lama = '<?php echo $execute[$index]['foto_ktp']; ?>';
                    lokasifotokk_lama = '<?php echo $execute[$index]['foto_kk']; ?>';

                    $('#title').html('Hapus Data Pegawai ini');

                    $('#modalkontenhapus').toggleClass("scale-100");
                    $('#bgmodalhapus').addClass("effectmodal");
                });
            <?php
            }
            ?>

            $('#submithapus').on('click', function() {
                $.ajax({
                    url: '../controllers/pegawaiController.php',
                    type: 'post',
                    data: {
                        'type': 'hapus_pegawai',
                        'query': "DELETE FROM pegawai WHERE id_pegawai = '" + selected_idpegawai + "'",
                        'pathfotopegawai': lokasifotopegawai_lama,
                        'pathfotoktp': lokasifotoktp_lama,
                        'pathfotokk': lokasifotokk_lama
                    },
                    success: function(res) {
                        $('#modalkontenhapus').toggleClass("scale-100");
                        $('#bgmodalhapus').removeClass("effectmodal");
                        selected_idpegawai = "";
                        lokasifotopegawai_lama = "";
                        lokasifotoktp_lama = "";
                        lokasifotokk_lama = "";

                        const data = JSON.parse(res);
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: data.msg,
                        }).then(function() {
                            location.reload();
                        });
                    }
                });
            });

            $('#closemodalhapus, #cancelmodalhapus').on('click', function() {
                $('#modalkontenhapus').toggleClass("scale-100");
                $('#bgmodalhapus').removeClass("effectmodal");
                selected_idpegawai = "";
            });
        });


        // auto hide sidebar

        $("#burger").on("click", function() {
            $('#bgbody').toggleClass("hidden");

            $('#ex-sidebar').toggleClass("ex-hide-sidebar");
            $('#burger').toggleClass("show");
        });

        $("#bgbody").on("click", function() {
            $('#ex-sidebar').toggleClass("ex-hide-sidebar");
            $('#burger').toggleClass("show");

            $('#bgbody').toggleClass("hidden");

        });



        $('#closemodal').on('click', function() {

            $('#modalkonten').toggleClass("scale-100");
            $('#bgmodal').removeClass("effectmodal");
        });
    </script>


</body>

</html>